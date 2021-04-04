const sectionMarksInput = document.getElementsByClassName("section-marks-input");
const totalMarks = document.getElementsByClassName("total-marks");

for (let i = 0; i < sectionMarksInput.length; i++) {
    sectionMarksInput[i].addEventListener("change", updateTotalMarks);
}

function updateTotalMarks() {
    let marks = 0;
    for (let i = 0; i < sectionMarksInput.length; i++) {
        marks += parseInt(sectionMarksInput[i].value);
    }
    totalMarks[0].value = marks;
}