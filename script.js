
    function generateCertificate(name, id, vaccine, date) {
const element = document.createElement('div');
    element.innerHTML = `
    <h1>Vaccination Certificate</h1>
    <p>Name: ${name}</p>
    <p>ID: ${id}</p>
    <p>Vaccine: ${vaccine}</p>
    <p>Date: ${date}</p>
    `;

    html2pdf()
    .from(element)
    .save('certificate.pdf');
}

    function generateForm(name, id, vaccine, date) {
const element = document.createElement('div');
    element.innerHTML = `
    <h1>Vaccination Certificate</h1>
    <p>Name: ${name}</p>
    <p>ID: ${id}</p>
    <p>Vaccine: ${vaccine}</p>
    <p>Date: ${date}</p>
    `;

    html2pdf()
    .from(element)
    .save('form.pdf');
}


function showConfirmationModal() {
    const userId = document.getElementById('userId').value;
    const userName = 'John Doe'; // Replace with your logic to retrieve user name
    const vaccineName = 'COVID-19'; // Replace with your logic to retrieve vaccine name
    const nid='12345678910';

    document.getElementById('userName').textContent = userName;
    document.getElementById('nid').textContent = nid;
    document.getElementById('vaccineName').textContent = vaccineName;

    const modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
    modal.show();
}

function sum(a,b) {
    return a+b;
}

module.exports = {
    sum,
    generateCertificate,
    generateForm,
    showConfirmationModal
  };