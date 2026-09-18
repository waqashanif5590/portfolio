const toggleButton = document.querySelector('.theme_changer');

if (toggleButton) {
    toggleButton.addEventListener('click', function (event) {
        event.preventDefault();
    // change body background color
        if (document.body.style.background === 'linear-gradient(45deg, rgb(14, 22, 37), rgb(0, 9, 22))') {
        toggleButton.classList.remove('dark-theme');
        toggleButton.classList.add('light-theme');
    } else {
        toggleButton.classList.remove('light-theme');
        toggleButton.classList.add('dark-theme');
    }
    });
}