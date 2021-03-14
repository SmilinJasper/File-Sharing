console.log(studentsDatabase);

// Get HTML elements

const submitButton = document.querySelector("#submit-button");
const studentRegNo = document.querySelector("#student-reg-no");
const studentName = document.querySelector("#student-name");
const subject = document.querySelector("#subject");
const date = document.querySelector("#date");

// Array of objects to store data

const studentsDatabase = [];

// Store data when form is submitted

submitButton.addEventListener("submit", e => {
    e.preventDefault();

    studentsDatabase.push({
        "Register Number": studentRegNo.value,
        "Name": studentName.value,
        "Subject": subject.value,
        "Date": date.value
    });
    console.log(studentsDatabase);
});