const { JSDOM } = require('jsdom');

// Set up a basic DOM environment using JSDOM
const { window } = new JSDOM('<!DOCTYPE html>');
const { document } = window;

// Assign the 'document' object to the global scope
global.document = document;

const {
    generateCertificate,
    generateForm,
    showConfirmationModal
  } = require('./script.js');

it('Cerificate Download', () => {
    const name = 'John Doe';
    const id = '123456789';
    const vac_id = '123';
    const vaccine = 'COVID-19';
    const date = '2022-01-01';

    const mockElement = generateCertificate(name, id, vac_id, vaccine, date);

    expect(mockElement.innerHTML).toContain(name);
    expect(mockElement.innerHTML).toContain(id);
    expect(mockElement.innerHTML).toContain(vaccine);
    expect(mockElement.innerHTML).toContain(date);
  });

  it('Form Download', () => {
    const name = 'John Doe';
    const id = '123456789';
    const vac_id = '123';
    const vaccine = 'COVID-19';
    const date = '2022-01-01';

    const mockElement = generateForm(name, id,vac_id, vaccine, date);

    expect(mockElement.innerHTML).toContain(name);
    expect(mockElement.innerHTML).toContain(id);
    expect(mockElement.innerHTML).toContain(vaccine);
    expect(mockElement.innerHTML).toContain(date);
  });