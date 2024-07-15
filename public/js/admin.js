document.addEventListener("DOMContentLoaded", function () {
    const fileInput = document.getElementById('foto-produk');
    const fileLabel = document.querySelector('.custom-file-label');

    fileLabel.addEventListener('click', function () {
        fileInput.click();
    });

    fileInput.addEventListener('change', function () {
        const fileName = fileInput.files.length > 1 ? fileInput.files.length + ' files selected' : fileInput.files[0].name;
        fileLabel.innerHTML = '<i class="fa-solid fa-upload"></i> ' + fileName;
    });

    const fileContainer = document.getElementById('file-upload-container');
    fileContainer.addEventListener('dragover', function (e) {
        e.preventDefault();
        e.stopPropagation();
        fileContainer.classList.add('dragging');
    });

    fileContainer.addEventListener('dragleave', function (e) {
        e.preventDefault();
        e.stopPropagation();
        fileContainer.classList.remove('dragging');
    });

    fileContainer.addEventListener('drop', function (e) {
        e.preventDefault();
        e.stopPropagation();
        fileContainer.classList.remove('dragging');
        fileInput.files = e.dataTransfer.files;
        const fileName = fileInput.files.length > 1 ? fileInput.files.length + ' files selected' : fileInput.files[0].name;
        fileLabel.innerHTML = '<i class="fa-solid fa-upload"></i> ' + fileName;
    });
});