const containers = document.querySelectorAll('.selection-container');

containers.forEach((container) => {
  const header = container.querySelector('.selection-header');
  const options = container.querySelector('.selection-options');

  header.addEventListener('click', (e) => {
    e.stopPropagation();
    containers.forEach((c) => {
      if (c !== container) c.classList.remove('active');
    });
    container.classList.toggle('active');
  });

  options.addEventListener('click', (e) => {
    e.stopPropagation();
  });
});

window.addEventListener('click', () => {
  containers.forEach((c) => c.classList.remove('active'));
});
