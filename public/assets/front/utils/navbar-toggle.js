document.addEventListener('DOMContentLoaded', () => {
  const menuToggle = document.getElementById('menuToggle');
  const mainNav = document.getElementById('mainNav');

  menuToggle.addEventListener('click', (e) => {
    e.stopPropagation();
    mainNav.classList.toggle('active');
  });

  const dropdownToggles = document.querySelectorAll('.has-dropdown > p');

  dropdownToggles.forEach((toggle) => {
    toggle.addEventListener('click', (e) => {
      if (window.innerWidth <= 450) {
        e.stopPropagation();
        const parentLi = toggle.parentElement;

        const siblings = parentLi.parentElement.children;
        for (let sibling of siblings) {
          if (sibling !== parentLi) {
            sibling.classList.remove('open');
          }
        }

        parentLi.classList.toggle('open');
      }
    });
  });

  document.addEventListener('click', (e) => {
    if (!mainNav.contains(e.target) && !menuToggle.contains(e.target)) {
      mainNav.classList.remove('active');
      document.querySelectorAll('.has-dropdown').forEach((li) => {
        li.classList.remove('open');
      });
    }
  });
});
