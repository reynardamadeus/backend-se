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

    if (classPopup) classPopup.classList.remove("active");
    if (signupPopup) {
        signupPopup.classList.remove("active");
        signupPopup.style.display = "none";
    }

    if (loginPopup) {
        loginPopup.style.display = "block";
        setTimeout(() => loginPopup.classList.add("active"), 10);
    }
    if (dashboard) dashboard.classList.add("disabled");
}

function closeLogin() {
    let loginPopup = document.getElementById("login_popup");
    let dashboard = document.getElementById("dashboard");
    
    if (loginPopup) {
        loginPopup.classList.remove("active");
        loginPopup.style.display = "none";
    }
    if (dashboard) dashboard.classList.remove("disabled");
}

function openSignup() {
    let loginPopup = document.getElementById("login_popup");
    let signupPopup = document.getElementById("signup_popup");
    let dashboard = document.getElementById("dashboard");
    let classPopup = document.getElementById("classSelectionPopup");

    if (classPopup) classPopup.classList.remove("active");
    if (loginPopup) {
        loginPopup.classList.remove("active");
        loginPopup.style.display = "none";
    }

    if (signupPopup) {
        signupPopup.style.display = "block";
        setTimeout(() => signupPopup.classList.add("active"), 10);
    }
    if (dashboard) dashboard.classList.add("disabled");
}

function closeSignup() {
    let signupPopup = document.getElementById("signup_popup");
    let dashboard = document.getElementById("dashboard");
    
    if (signupPopup) {
        signupPopup.classList.remove("active");
        signupPopup.style.display = "none";
    }
    if (dashboard) dashboard.classList.remove("disabled"); 
}


function closeLogin() {
    let loginPopup = document.getElementById("login_popup");
    let dashboard = document.getElementById("dashboard");
    
    if (loginPopup) {
        loginPopup.classList.remove("active");
        loginPopup.style.display = "none";
    }
    if (dashboard) dashboard.classList.remove("disabled");
}

function openMaterialAdd() {
    let add_material_popup = document.getElementById("add_material_popup");
    let dashboard = document.getElementById("dashboard");
    let classPopup = document.getElementById("classSelectionPopup");

    if (classPopup) classPopup.classList.remove("active");
    if (add_material_popup) {
        add_material_popup.style.display = "block";
        setTimeout(() => add_material_popup.classList.add("active"), 10);
    }
    if (dashboard) dashboard.classList.add("disabled");
}

function closeMaterialAdd() {
    let add_material_popup = document.getElementById("add_material_popup");
    let dashboard = document.getElementById("dashboard");
    
    if (add_material_popup) {
        add_material_popup.classList.remove("active");
        add_material_popup.style.display = "none";
    }
    if (dashboard) dashboard.classList.remove("disabled"); 
}

document.addEventListener('DOMContentLoaded', function() {
    const signupForm = document.querySelector('#signup_popup form');
    if (signupForm) {
        signupForm.addEventListener('submit', function(e) {
            const password = this.querySelector('input[name="password"]').value;
            const passwordConfirmation = this.querySelector('input[name="password_confirmation"]').value;
            
            if (password !== passwordConfirmation) {
                e.preventDefault();
                alert('Passwords do not match');
                return false;
            }
            
        });
    }
});


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
