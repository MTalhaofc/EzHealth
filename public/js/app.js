// Import Alpine.js
import Alpine from 'alpinejs';

// Make Alpine available globally
window.Alpine = Alpine;

// Function to handle data for Alpine.js
function data() {
    function getThemeFromLocalStorage() {
        // Check if the user has previously set a theme
        if (window.localStorage.getItem('dark')) {
            return JSON.parse(window.localStorage.getItem('dark'));
        }

        // Return the user's preferred color scheme
        return (
            !!window.matchMedia &&
            window.matchMedia('(prefers-color-scheme: dark)').matches
        );
    }

    function setThemeToLocalStorage(value) {
        // Store the theme preference in localStorage
        window.localStorage.setItem('dark', value);
    }

    return {
        dark: getThemeFromLocalStorage(), // Initialize dark mode
        toggleTheme() {
            this.dark = !this.dark; // Toggle the theme
            setThemeToLocalStorage(this.dark); // Save to localStorage
        },
        // Side Menu Toggle
        isSideMenuOpen: false,
        toggleSideMenu() {
            this.isSideMenuOpen = !this.isSideMenuOpen;
        },
        closeSideMenu() {
            this.isSideMenuOpen = false;
        },
        // Notifications Menu Toggle
        isNotificationsMenuOpen: false,
        toggleNotificationsMenu() {
            this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen;
        },
        closeNotificationsMenu() {
            this.isNotificationsMenuOpen = false;
        },
        // Profile Menu Toggle
        isProfileMenuOpen: false,
        toggleProfileMenu() {
            this.isProfileMenuOpen = !this.isProfileMenuOpen;
        },
        closeProfileMenu() {
            this.isProfileMenuOpen = false;
        },
        // Pages Menu Toggle
        isPagesMenuOpen: false,
        togglePagesMenu() {
            this.isPagesMenuOpen = !this.isPagesMenuOpen;
        },
        // Modal Management
        isModalOpen: false,
        trapCleanup: null,
        openModal() {
            this.isModalOpen = true;
            // Assuming you have focusTrap imported or defined elsewhere
            this.trapCleanup = focusTrap(document.querySelector('#modal'));
        },
        closeModal() {
            this.isModalOpen = false;
            this.trapCleanup();
        },
    };
}

// Assign data function to global window object
window.data = data;

// Start Alpine.js
Alpine.start();
