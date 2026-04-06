document.addEventListener('DOMContentLoaded', () => {
  const filters = document.querySelectorAll('.filter-wrapper');

  filters.forEach((filter) => {
    filter.addEventListener('click', (e) => {
      filters.forEach((other) => {
        if (other !== filter) other.classList.remove('active');
      });

      filter.classList.toggle('active');
      e.stopPropagation();
    });

    const options = filter.querySelectorAll('.option');
    options.forEach((option) => {
      option.addEventListener('click', () => {
        const label = filter.querySelector('.label-text');
        label.textContent = option.textContent;
        filter.classList.remove('active');
      });
    });
  });

  document.addEventListener('click', () => {
    filters.forEach((f) => f.classList.remove('active'));
  });
});
