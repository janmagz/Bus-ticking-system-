document.addEventListener('DOMContentLoaded', function() {
    // JavaScript code goes here
    console.log('Document is ready');
    
    // Example: Toggle menu
    const menuToggle = document.querySelector('.menu-toggle');
    const nav = document.querySelector('nav');

    menuToggle.addEventListener('click', function() {
        nav.classList.toggle('open');
    });

    // Add more JavaScript as needed
});
