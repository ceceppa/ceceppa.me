($ => {
  const mobileMenuButton = document.querySelector('.mobile-menu__menu');

  mobileMenuButton.addEventListener('click', toggleNoScroll);

  function toggleNoScroll(event) {
    document.body.classList.toggle('no-scroll');
  }
})();
