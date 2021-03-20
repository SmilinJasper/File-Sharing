// Get HTML ELements

const adminLoginForm = document.querySelector(".admin-login-form");
const loginButton = document.querySelector(".login");
const usernameInput = document.querySelector(".input-username");
const passwordInput = document.querySelector(".input-password");
const loginErrorMessage = document.querySelector(".login-error-message");

// Object to store Admin credentials

const adminCredentials = {
    username: "admin",
    password: "123@dmin"
};

// Login button redirects to upload page or throws error

adminLoginForm.addEventListener("submit", e => {
    if (usernameInput.value == adminCredentials.username && passwordInput.value == adminCredentials.password) return true;
    else loginErrorMessage.style.display = "block";
    e.preventDefault();
});

// Remove error message when input fields are focused

const removeLoginErrorMessage = () => loginErrorMessage.style.display = "none";
usernameInput.addEventListener("focus", () => { if (loginErrorMessage.style.display = "block") removeLoginErrorMessage() });
passwordInput.addEventListener("focus", () => { if (loginErrorMessage.style.display = "block") removeLoginErrorMessage() });