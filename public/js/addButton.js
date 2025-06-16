function addsubject() {
    let addsubjectPopup = document.getElementById("addsubject_popup");
    let dashboard = document.getElementById("dashboard");

    addsubjectPopup.style.display = "block";
    setTimeout(() => addsubjectPopup.classList.add("active"), 10);
    dashboard.classList.add("disabled");
}

function closeaddsubject() {
    let addsubjectPopup = document.getElementById("textboxInputBab");
    let dashboard = document.getElementById("dashboard");
    addsubjectPopup.classList.remove("active");
    addsubjectPopup.style.display = "none";
    dashboard.classList.remove("disabled");
}
