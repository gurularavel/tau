// export function initNavigation() {
//   const navItems = document.querySelectorAll('nav > ul > li');

//   navItems.forEach((item) => {
//     const pTag = item.querySelector('p');
//     const dropdown = item.querySelector('.nav-element-dropdown');

//     if (dropdown && pTag) {
//       pTag.addEventListener('click', (e) => {
//         e.stopPropagation();

//         document.querySelectorAll('.nav-element-dropdown').forEach((d) => {
//           if (d !== dropdown) d.style.display = 'none';
//         });

//         const isVisible = dropdown.style.display === 'block';
//         dropdown.style.display = isVisible ? 'none' : 'block';
//       });
//     }
//   });

//   document.addEventListener('click', () => {
//     document.querySelectorAll('.nav-element-dropdown').forEach((d) => {
//       d.style.display = 'none';
//     });
//   });
// }

// export function initNavigation() {
//   const navItems = document.querySelectorAll('nav > ul > li');

//   navItems.forEach((item) => {
//     const pTag = item.querySelector('p');
//     const dropdown = item.querySelector('.nav-element-dropdown');

//     if (dropdown && pTag) {
//       pTag.addEventListener('click', (e) => {
//         e.stopPropagation();

//         dropdown.style.removeProperty('display');

//         const isActive = item.classList.contains('active');

//         document.querySelectorAll('.has-dropdown').forEach((el) => {
//           el.classList.remove('active');
//           const otherDropdown = el.querySelector('.nav-element-dropdown');
//           if (otherDropdown) otherDropdown.style.removeProperty('display');
//         });

//         if (!isActive) {
//           item.classList.add('active');
//         }
//       });
//     }
//   });

//   document.addEventListener('click', () => {
//     document.querySelectorAll('.has-dropdown').forEach((el) => {
//       el.classList.remove('active');
//       const dropdown = el.querySelector('.nav-element-dropdown');
//       if (dropdown) dropdown.style.removeProperty('display');
//     });
//   });
// }

export function initNavigation() {
  const navItems = document.querySelectorAll('nav > ul > li.has-dropdown');

  navItems.forEach((item) => {
    const pTag = item.querySelector('p');

    pTag.addEventListener('click', (e) => {
      e.stopPropagation();

      navItems.forEach((otherItem) => {
        if (otherItem !== item) {
          otherItem.classList.remove('active');
        }
      });

      item.classList.toggle('active');
    });
  });

  document.addEventListener('click', () => {
    navItems.forEach((item) => {
      item.classList.remove('active');
    });
  });
}
