document.getElementById("search-button").addEventListener("click", function () {
    let query = document.getElementById("search-input").value;
    if (query) {
        console.log("Mencari: " + query);
    }
});

document.getElementById("search-input").addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        document.getElementById("search-button").click();
    }
});

function openLogin() {
    let loginPopup = document.getElementById("login_popup");
    let signupPopup = document.getElementById("signup_popup");
    let dashboard = document.getElementById("dashboard");
    let classPopup = document.getElementById("classSelectionPopup");

    classPopup.classList.remove("active");
    signupPopup.classList.remove("active");
    signupPopup.style.display = "none";

    loginPopup.style.display = "block";
    setTimeout(() => loginPopup.classList.add("active"), 10);
    dashboard.classList.add("disabled");
}

function closeLogin() {
    let loginPopup = document.getElementById("login_popup");
    let dashboard = document.getElementById("dashboard");
    loginPopup.classList.remove("active");
    loginPopup.style.display = "none";
    dashboard.classList.remove("disabled");
}

function openSignup() {
    let loginPopup = document.getElementById("login_popup");
    let signupPopup = document.getElementById("signup_popup");
    let dashboard = document.getElementById("dashboard");
    let classPopup = document.getElementById("classSelectionPopup");

    classPopup.classList.remove("active");
    loginPopup.classList.remove("active");
    loginPopup.style.display = "none";

    signupPopup.style.display = "block";
    setTimeout(() => signupPopup.classList.add("active"), 10);
    dashboard.classList.add("disabled");
}

function closeSignup() {
    let signupPopup = document.getElementById("signup_popup");
    let dashboard = document.getElementById("dashboard");
    signupPopup.classList.remove("active");
    signupPopup.style.display = "none";
    dashboard.classList.remove("enable");
}

document.addEventListener("click", function (event) {
    let loginPopup = document.getElementById("login_popup");
    let signupPopup = document.getElementById("signup_popup");
    let loginInput = document.querySelector("#login_popup input");
    let signupInput = document.querySelector("#signup_popup input");

    if (loginPopup.classList.contains("active") &&
        !event.target.closest(".login-container") &&
        !event.target.closest(".log_in")) {
        closeLogin();
    }

    if (signupPopup.classList.contains("active") &&
        !event.target.closest(".signup-container") &&
        !event.target.closest(".sign_up")) {
        closeSignup();
    }

    if (!event.target.closest("input")) {
        if (loginInput) {
            loginInput.blur();
        }
        if (signupInput) {
            signupInput.blur();
        }
    }

    if (!event.target.closest(".login-container") && !event.target.closest(".signup-container") &&
        !event.target.closest(".log_in") && !event.target.closest(".sign_up")) {
        closeLogin();
        closeSignup();
    }
});

document.head.insertAdjacentHTML("beforeend", `
    <style>
        .disabled {
            pointer-events: none;
            opacity: 0.5;
        }
    </style>
`);

function showIconsSD() {
    let subjectIcons = document.querySelectorAll("#iconPelSD");
    subjectIcons.forEach(icon => {
        icon.style.display = "flex";
    });
}

function hideIconsSD() {
    let subjectIcons = document.querySelectorAll("#iconPelSD");
    subjectIcons.forEach(icon => {
        icon.style.display = "none";
    });
}

function showIconsSMP() {
    let subjectIcons = document.querySelectorAll("#iconPelSMP");
    subjectIcons.forEach(icon => {
        icon.style.display = "flex";
    });
}

function hideIconsSMP() {
    let subjectIcons = document.querySelectorAll("#iconPelSMP");
    subjectIcons.forEach(icon => {
        icon.style.display = "none";
    });
}

function showIconsSMA() {
    let subjectIcons = document.querySelectorAll("#iconPelSMA");
    subjectIcons.forEach(icon => {
        icon.style.display = "flex";
    });
}

function hideIconsSMA() {
    let subjectIcons = document.querySelectorAll("#iconPelSMA");
    subjectIcons.forEach(icon => {
        icon.style.display = "none";
    });
}

function selectLevel(level) {
    let levelButton = document.getElementById("level");
    levelButton.textContent = level;

    if (level.startsWith("SD")) {
        showIconsSD();
        hideIconsSMP();
        hideIconsSMA();
    }
    if (level.startsWith("SMP")) {
        showIconsSMP();
        hideIconsSD();
        hideIconsSMA();
    }

    if (level.startsWith("SMA")) {
        showIconsSMA();
        hideIconsSD();
        hideIconsSMP();
    }
}

function openClassSelection() {
    let classPopup = document.getElementById("classSelectionPopup");
    let loginPopup = document.getElementById("login_popup");
    let signupPopup = document.getElementById("signup_popup");

    loginPopup.classList.remove("active");
    signupPopup.classList.remove("active");
    classPopup.classList.add("active");
}

function closeClassSelection() {
    let popup = document.getElementById("classSelectionPopup");
    popup.classList.remove("active");
}

function openClassSelectionSD() {
    let popup = document.getElementById("SelectionSD");
    popup.classList.add("active");
}

function closeClassSelectionSD() {
    let popup = document.getElementById("SelectionSD");
    popup.classList.remove("active");
}

function openClassSelectionSMP() {
    let popup = document.getElementById("SelectionSMP");
    popup.classList.add("active");
}
function closeClassSelectionSMP() {
    let popup = document.getElementById("SelectionSMP");
    popup.classList.remove("active");
}

function openClassSelectionSMA() {
    let popup = document.getElementById("SelectionSMA");
    popup.classList.add("active");
}
function closeClassSelectionSMA() {
    let popup = document.getElementById("SelectionSMA");
    popup.classList.remove("active");
}

function selectAlert() {

}
