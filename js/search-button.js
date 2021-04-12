($ => {
  document.addEventListener('mousedown', maybeToggleSearchForm);

  function maybeToggleSearchForm(event) {
    const isSearchBoxVisible = document.querySelector('#show-search').checked;
    const isEventChildOfMainHeader = event.target.closest('.main-header');

    if (!isSearchBoxVisible) {
      return;
    }

    if (isEventChildOfMainHeader) {
      event.stopPropagation();
    } else {
      document.querySelector('.main-header__menu-search').click();
    }
  }
})();
