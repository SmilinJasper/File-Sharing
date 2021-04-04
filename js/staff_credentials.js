// Get HTML ELements

const staffLoginForm = document.querySelector(".staff-login-form");
const loginButton = document.querySelector(".login");
const usernameInput = document.querySelector(".input-username");
const passwordInput = document.querySelector(".input-password");
const loginErrorMessage = document.querySelector(".login-error-message");

// Object to store Admin credentials

const staffCredentials = {
    username: "staff1",
    password: "123$t@ff"
};

// Login button redirects to upload page or throws error

staffLoginForm.addEventListener("submit", e => {
    if (usernameInput.value == staffCredentials.username && passwordInput.value == staffCredentials.password) return true;
    else loginErrorMessage.style.display = "block";
    e.preventDefault();
});

// Remove error message when input fields are focused

const removeLoginErrorMessage = () => loginErrorMessage.style.display = "none";
usernameInput.addEventListener("focus", () => { if (loginErrorMessage.style.display = "block") removeLoginErrorMessage() });
passwordInput.addEventListener("focus", () => { if (loginErrorMessage.style.display = "block") removeLoginErrorMessage() });