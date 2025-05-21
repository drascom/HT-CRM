// Add your custom JavaScript here
document.addEventListener('DOMContentLoaded', function() {
    const uploadModal = document.getElementById('uploadModal');
    const uploadPatientIdInput = document.getElementById('upload-patient-id');
    const albumTypeSelect = document.getElementById('photo_album_type_id');

    if (uploadModal) {
        uploadModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const patientId = button.getAttribute('data-patient-id');
            uploadPatientIdInput.value = patientId;
        });
    }
});
Dropzone.autoDiscover = false;

document.addEventListener('DOMContentLoaded', function() {
    if (window.location.pathname.includes("view_album") || window.location.pathname.includes("patient_surgeries")) {
        var myDropzone = new Dropzone("#photo-dropzone", {
            url: "upload.php",
            paramName: "file",
            maxFilesize: 8,
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            dictDefaultMessage: "Drop files here to upload",
            init: function() {
                this.on("sending", function(file, xhr, formData) {
                    formData.append("patient_id", document.getElementById("upload-patient-id").value);
                    formData.append("photo_album_type_id", document.getElementById("photo_album_type_id").value);
                });
                this.on("success", function(file, response) {
                    console.log("File uploaded successfully:", response);
                    window.location.reload();
                });
                this.on("error", function(file, errorMessage) {
                    console.error("File upload error:", errorMessage);
                });
            }
        });
    }
});
