const { JSDOM } = require('jsdom');

// Set up a basic DOM environment using JSDOM
const { window } = new JSDOM('<!DOCTYPE html>');
const { document } = window;

// Assign the 'document' object to the global scope
global.document = document;

// Create a mock implementation for html2pdf
html2pdf =  () => ({
  from: jest.fn().mockReturnThis(),
  save: jest.fn()
});

// Import the functions from the script.js file
const {
  sum,
  generateCertificate,
  generateForm,
  showConfirmationModal
} = require('./script.js');

// Write your test cases using Jest
it('Sum Test', () => {
  expect(sum(1, 2)).toBe(3);
});

it('Certificate Download', () => {
  const name = 'John Doe';
  const id = '123456789';
  const vaccine = 'COVID-19';
  const date = '2022-01-01';

  const mockElement = document.createElement('div');
  const mockFrom = jest.spyOn(html2pdf(), 'from').mockReturnValue({ save: jest.fn() });

  generateCertificate(name, id, vaccine, date);

  expect(mockElement.innerHTML).toContain('');
  expect(mockElement.innerHTML).toContain('');
  expect(mockElement.innerHTML).toContain('');
  expect(mockElement.innerHTML).toContain('');
  expect(mockFrom).not.toHaveBeenCalledWith(mockElement);
});
