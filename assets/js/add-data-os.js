// This script adds a data-os attribute to all elements in the document
window.addEventListener('load', function() {
  // Set data-os="fade-up" for all elements except <html> and <body>
  var all = document.querySelectorAll('body *');
  all.forEach(function(el) {
    if (!el.hasAttribute('data-os')) {
      el.setAttribute('data-os', 'fade-up');
    }
  });
});
