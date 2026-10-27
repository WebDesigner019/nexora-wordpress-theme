(function () {
  'use strict';

  var navigation = document.querySelector('.main-navigation');
  var toggle = document.querySelector('.menu-toggle');

  if (!navigation || !toggle) {
    return;
  }

  var menu = navigation.querySelector('.menu');

  if (!menu) {
    return;
  }

  function setMenuState(isOpen) {
    navigation.classList.toggle('is-open', isOpen);
    toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    toggle.setAttribute('aria-label', isOpen ? 'Close menu' : 'Open menu');
  }

  toggle.addEventListener('click', function () {
    setMenuState(!navigation.classList.contains('is-open'));
  });

  menu.addEventListener('click', function (event) {
    if (event.target.closest('a')) {
      setMenuState(false);
    }
  });

  window.addEventListener('resize', function () {
    if (window.innerWidth > 480) {
      setMenuState(false);
    }
  });
}());
