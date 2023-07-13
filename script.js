
    function generateCertificate(name, id, vac_id, vaccine, date) {
const element = document.createElement('div');
    element.innerHTML = `
    <h1>Vaccination Certificate</h1>
    <p>Name: ${name}</p>
    <p>NID: ${id}</p>
    <p>Vaccine ID: ${vac_id}</p>
    <p>Vaccine: ${vaccine}</p>
    <p>Date: ${date}</p>
    `;

    try{
        html2pdf()
        .from(element)
        .save('certificate.pdf');
    }
    catch(error){
        console.log(error);
    }
    

    return element;
}

    function generateForm(name, id,vac_id, vaccine, date) {
const element = document.createElement('div');
    element.innerHTML = `
    <h1>Vaccination Certificate</h1>
    <p>Name: ${name}</p>
    <p>NID: ${id}</p>
    <p>Vaccine ID: ${vac_id}</p>
    <p>Vaccine: ${vaccine}</p>
    <p> Scheduled Date: ${date}</p>
    `;

    try{
        html2pdf()
        .from(element)
        .save('form.pdf');
    }
    catch(error){
        console.log(error);
    }

    return element;
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

module.exports = {
    generateCertificate,
    generateForm,
    showConfirmationModal
  };

