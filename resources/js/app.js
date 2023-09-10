import './bootstrap';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import Clipboard from '@ryangjchandler/alpine-clipboard';
 
Alpine.plugin(Clipboard);
Livewire.start();

// Get dark mode toggle elements
const darkModeToggle = document.getElementsByClassName('dark_mode');
const htmlElement = document.documentElement;

// Check if dark mode preference is stored in localStorage
let isDarkMode = localStorage.getItem('darkMode') === 'true';

// Function to update dark mode state and styles
function updateDarkMode() {
  if (isDarkMode) {
    htmlElement.classList.add('dark');
    htmlElement.style.setProperty('--border', '#D1D5DB');
  } else {
    htmlElement.classList.remove('dark');
    htmlElement.style.setProperty('--border', '#1e293b');
  }
}

// Call the function initially
updateDarkMode();

// Add click event listener to dark mode toggle elements
for (let i = 0; i < darkModeToggle.length; i++) {
  darkModeToggle[i].addEventListener('click', () => {
    isDarkMode = !isDarkMode;
    updateDarkMode();

    // Update dark mode preference in localStorage
    localStorage.setItem('darkMode', isDarkMode ? 'true' : 'false');
  });
}