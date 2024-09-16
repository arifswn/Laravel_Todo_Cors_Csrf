import "./bootstrap";

document.addEventListener("DOMContentLoaded", () => {
    const darkModeToggle = document.getElementById("darkModeToggle");

    // Function to apply dark mode
    const applyDarkMode = () => {
        document.body.classList.add("dark-mode");
    };

    // Function to remove dark mode
    const removeDarkMode = () => {
        document.body.classList.remove("dark-mode");
    };

    // Check if dark mode is enabled from localStorage
    const isDarkMode = localStorage.getItem("darkMode") === "true";
    if (isDarkMode) {
        applyDarkMode();
    }

    // Toggle dark mode on button click
    if (darkModeToggle) {
        darkModeToggle.addEventListener("click", () => {
            if (document.body.classList.contains("dark-mode")) {
                removeDarkMode();
                localStorage.setItem("darkMode", "false");
            } else {
                applyDarkMode();
                localStorage.setItem("darkMode", "true");
            }
        });
    }
});
