// Get the form element
const form = document.getElementById('feedback-form');

// Get all the form pages
const formPages = Array.from(document.getElementsByClassName('form-page'));

// Set the current page index
let currentPageIndex = 0;

// Function to show the current page
const showPage = (index) => {
  // Hide all form pages
  formPages.forEach((page) => {
    page.style.display = 'none';
  });

  // Show the current page
  formPages[index].style.display = 'block';
};

// Function to go to the next page
const nextPage = () => {
  // Check if it's the last page, then submit the form
  if (currentPageIndex === formPages.length - 1) {
    form.submit();
    return;
  }

  // Increment the current page index
  currentPageIndex++;

  // Show the next page
  showPage(currentPageIndex);
};

// Function to go to the previous page
const previousPage = () => {
  // Decrement the current page index
  currentPageIndex--;

  // Show the previous page
  showPage(currentPageIndex);
};

// Show the initial page
showPage(currentPageIndex);
