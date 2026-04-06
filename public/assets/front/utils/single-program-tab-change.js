// document.addEventListener('DOMContentLoaded', () => {
//   const buttons = document.querySelectorAll('.tab-btn');
//   const contents = document.querySelectorAll('.tab-content');
//   const defaultTab = document.getElementById('tab-default');

//   buttons.forEach((btn) => {
//     btn.addEventListener('click', () => {
//       const tabId = btn.getAttribute('data-tab');

//       buttons.forEach((b) => b.classList.remove('active'));

//       btn.classList.add('active');

//       contents.forEach((content) => content.classList.remove('active'));

//       document.getElementById(`tab-${tabId}`).classList.add('active');
//     });
//   });
// });

document.addEventListener('DOMContentLoaded', () => {
  const buttons = document.querySelectorAll('.tab-btn');
  const tabContents = document.querySelectorAll('.tab-content');
  const defaultTab = document.getElementById('tab-default');

  buttons.forEach((button) => {
    button.addEventListener('click', () => {
      const targetTabId = `tab-${button.getAttribute('data-tab')}`;

      buttons.forEach((btn) => btn.classList.remove('active'));

      button.classList.add('active');

      tabContents.forEach((content) => {
        content.classList.remove('active');
      });

      if (defaultTab) {
        defaultTab.classList.remove('active');
      }

      const targetContent = document.getElementById(targetTabId);
      if (targetContent) {
        targetContent.classList.add('active');
      }
    });
  });
});
