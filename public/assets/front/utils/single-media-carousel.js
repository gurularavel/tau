document.addEventListener('DOMContentLoaded', () => {
  const mediaContainer = document.querySelector('.medias');
  const prevBtn = document.querySelector('.carousel-arrows button:first-child');
  const nextBtn = document.querySelector('.carousel-arrows button:last-child');

  if (!mediaContainer || !prevBtn || !nextBtn) return;

  const getScrollStep = () => {
    const card = mediaContainer.querySelector('.media-element');
    const style = window.getComputedStyle(mediaContainer);
    const gap = parseInt(style.columnGap || style.gap) || 24;

    return card ? card.offsetWidth + gap : 400;
  };

  nextBtn.addEventListener('click', () => {
    mediaContainer.scrollBy({
      left: getScrollStep(),
      behavior: 'smooth',
    });
  });

  prevBtn.addEventListener('click', () => {
    mediaContainer.scrollBy({
      left: -getScrollStep(),
      behavior: 'smooth',
    });
  });
});
