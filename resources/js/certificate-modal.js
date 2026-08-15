// resources/js/certificate-modal.js

function openCertModal(url, type) {
    const modal = document.getElementById("certModal");
    const content = document.getElementById("certModalContent");

    if (type === "pdf") {
        content.innerHTML = `<iframe src="${url}"></iframe>`;
    } else {
        content.innerHTML = `<img src="${url}" alt="Sertifikat">`;
    }

    modal.classList.add("is-open");
}

function closeCertModal() {
    const modal = document.getElementById("certModal");
    document.getElementById("certModalContent").innerHTML = "";
    modal.classList.remove("is-open");
}

// biar tetep bisa dipanggil dari atribut onclick="" di blade
window.openCertModal = openCertModal;
window.closeCertModal = closeCertModal;
