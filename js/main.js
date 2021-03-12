// Get HTML ELements

const inputs = document.querySelectorAll(".input");
const loginButton = document.querySelector(".login");
const usernameInput = document.querySelector(".input-username");
const passwordInput = document.querySelector(".input-password");
const loginErrorMessage = document.querySelector(".login-error-message");

// Focus animation on input fields

function addcl() {
    let parent = this.parentNode.parentNode;
    parent.classList.add("focus");
}

function remcl() {
    let parent = this.parentNode.parentNode;
    if (this.value == "") {
        parent.classList.remove("focus");
    }
}


inputs.forEach(input => {
    input.addEventListener("focus", addcl);
    input.addEventListener("blur", remcl);
});

// Object to store Admin credentials

const adminCredentials = {
    username: "admin",
    password: "123@dmin"
};

// Login button redirects to upload page or throws error

loginButton.addEventListener("click", e => {
    e.preventDefault();
    if (usernameInput.value == adminCredentials.username && passwordInput.value == adminCredentials.password) window.location.href = "/upload_form.html";
    else loginErrorMessage.style.display = "block";
});

// Remove error message when input fields are focused

const removeLoginErrorMessage = () => loginErrorMessage.style.display = "none";
usernameInput.addEventListener("focus", () => { if (loginErrorMessage.style.display = "block") removeLoginErrorMessage() });
passwordInput.addEventListener("focus", () => { if (loginErrorMessage.style.display = "block") removeLoginErrorMessage() });