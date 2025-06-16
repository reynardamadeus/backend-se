window.onload = function () {
    const videos = JSON.parse(localStorage.getItem("videos")) || [];
    videos.forEach(({ namaBab, videoLink }) => {
        addVideo(videoLink, namaBab);
        addVideoToList(videoLink, namaBab);
    });
};


function addText() {
    const { namaBab, videoLink } = storeInput();

    const namePara = document.createElement("p");
    namePara.textContent = "Bab: " + namaBab;

    const linkPara = document.createElement("p");
    linkPara.textContent = "Video: " + videoLink;

    const element = document.getElementById("vids");
    element.appendChild(namePara);
    element.appendChild(linkPara);

    const TextboxPopup = document.getElementById("textboxInputBab");
    TextboxPopup.style.display = "none";
}

function getBabName() {
    let TextboxPopup = document.getElementById("textboxInputBab");
    if (TextboxPopup.style.display == "block") {
        TextboxPopup.style.display = "none"
    } else {
        TextboxPopup.style.display = "block";
    }
}

function storeInput() {
    const namaBab = document.getElementById("nama_bab").value;
    const videoLink = document.getElementById("video_link").value;

    const videos = JSON.parse(localStorage.getItem("videos")) || [];
    videos.push({ namaBab, videoLink });
    localStorage.setItem("videos", JSON.stringify(videos));

    return { namaBab, videoLink };
}


function addVideo(videoLink, namaBab) {
    const embedLink = convertToEmbedURL(videoLink);
    const videoContainer = document.querySelector(".videoContainer");

    const existingVideos = videoContainer.querySelectorAll("iframe[class^='videoMateri']");
    const newIndex = existingVideos.length;

    const videoWrapper = document.createElement("div");
    videoWrapper.className = "videoWrapper";
    videoWrapper.style.marginBottom = "40px";
    videoWrapper.style.display = "flex";
    videoWrapper.style.flexDirection = "column";
    videoWrapper.style.alignItems = "center";
    videoWrapper.id = `video-${newIndex}`;

    const label = document.createElement("p");
    label.textContent = `${namaBab}`;
    label.style.fontWeight = "bold";
    label.style.marginBottom = "12px";
    label.style.textAlign = "center";

    const newVid = document.createElement("iframe");
    newVid.className = newIndex === 0 ? "videoMateri" : `videoMateri${newIndex}`;
    newVid.src = embedLink;
    newVid.setAttribute("allowfullscreen", "");
    newVid.width = "560";
    newVid.height = "315";
    newVid.style.border = "none";

    videoWrapper.appendChild(label);
    videoWrapper.appendChild(newVid);
    videoContainer.appendChild(videoWrapper);
}



function addVideoToList(videoLink, namaBab) {
    const videoIdMatch = videoLink.match(/(?:\?v=|\/embed\/|\.be\/)([a-zA-Z0-9_-]{11})/);
    if (!videoIdMatch) {
        alert("Invalid YouTube link");
        return;
    }

    const videoId = videoIdMatch[1];
    const thumbnailURL = `https://img.youtube.com/vi/${videoId}/0.jpg`;

    const listOfVidsContainer = document.querySelector(".listOfVids");

    const existingVideos = document.querySelectorAll(".videoContainer iframe");
    const videoIndex = existingVideos.length - 1;
    const targetId = `video-${videoIndex}`;

    const videoItem = document.createElement("div");
    videoItem.className = "videoListItem";
    videoItem.style.display = "flex";
    videoItem.style.flexDirection = "column";
    videoItem.style.alignItems = "center";
    videoItem.style.marginBottom = "20px";

    const clickableArea = document.createElement("div");
    clickableArea.style.cursor = "pointer";
    clickableArea.style.textAlign = "center";

    clickableArea.onclick = () => {
        const targetVideo = document.getElementById(targetId);
        if (targetVideo) {
            targetVideo.scrollIntoView({ behavior: "smooth", block: "start" });
        }
    };

    const label = document.createElement("label");
    label.textContent = namaBab;
    label.style.fontWeight = "bold";
    label.style.marginBottom = "8px";

    const thumbnail = document.createElement("img");
    thumbnail.src = thumbnailURL;
    thumbnail.alt = "Video thumbnail";
    thumbnail.width = 120;
    thumbnail.style.borderRadius = "4px";

    clickableArea.appendChild(label);
    clickableArea.appendChild(thumbnail);

    videoItem.appendChild(clickableArea);
    listOfVidsContainer.appendChild(videoItem);
}


function handleSubmit() {
    const { namaBab, videoLink } = storeInput();
    addVideo(videoLink, namaBab);
    addVideoToList(videoLink, namaBab);
    getBabName();
}
document.addEventListener('DOMContentLoaded', function () {
    const chapters = document.querySelectorAll('.chapter-item');
    const allContent = document.querySelectorAll('.lesson-content');

    chapters.forEach(item => {
        item.addEventListener('click', function () {
            const targetId = this.getAttribute('data-target');

            // Hide all content
            allContent.forEach(div => div.classList.add('hidden'));

            // Show selected content
            document.getElementById(targetId)?.classList.remove('hidden');
        });
    });
});
