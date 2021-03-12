const uploadForm = document.querySelector(".upload-form");
const uploadFile = document.querySelector("#upload-file");

//Uploading Files

uploadForm.addEventListener("submit", e => {
    e.preventDefault();

    const endPoint = "upload.php";
    const formData = new FormData();

    formData.append("upload-file", uploadFile.files[0]);

    fetch(endPoint, {
        method: "post",
        body: formData
    }).catch(console.error);
})