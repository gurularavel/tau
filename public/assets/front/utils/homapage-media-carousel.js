const initCarousel = (listSelector, controlContainerSelector) => {
  const list = document.querySelector(listSelector);
  const controls = document.querySelector(controlContainerSelector);

  if (!list || !controls) return;

  const prevBtn = controls.querySelector('button:first-of-type');
  const nextBtn = controls.querySelector('button:last-of-type');

  const getMoveWidth = () => {
    const firstItem = list.children[0];
    const gap = parseInt(window.getComputedStyle(list).gap) || 0;
    return firstItem.offsetWidth + gap;
  };

  nextBtn.addEventListener('click', () => {
    list.scrollBy({
      left: getMoveWidth(),
      behavior: 'smooth',
    });
  });

  prevBtn.addEventListener('click', () => {
    list.scrollBy({
      left: -getMoveWidth(),
      behavior: 'smooth',
    });
  });
};

document.addEventListener('DOMContentLoaded', () => {
  initCarousel('.news-list', '.media-news-controllers');
  initCarousel('.announcement-list', '.media-announcements-controllers');
});
