document.addEventListener("DOMContentLoaded", function(event) { 

//Add class to header on scroll by @changoman
function debounce(func, wait = 10, immediate = true) {
    let timeout;
    return function() {
      let context = this, args = arguments;
      let later = function() {
        timeout = null;
        if (!immediate) func.apply(context, args);
      };
      let callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func.apply(context, args);
    };
  };
  let scrollPos = 0;
  const nav = document.querySelector('.site-header');
  function checkPosition() {
    let windowY = window.scrollY;
    if (windowY < scrollPos) {
      // Scrolling UP
      nav.classList.add('is-visible');
      nav.classList.remove('is-hidden');
    } else {
      // Scrolling DOWN
      nav.classList.add('is-hidden');
      nav.classList.remove('is-visible');
    }
    scrollPos = windowY;
  }
  // window.addEventListener('scroll', checkPosition);
  window.addEventListener('scroll', debounce(checkPosition));
});