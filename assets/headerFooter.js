document.addEventListener('DOMContentLoaded', async () => {
  try {
    const [header, footer] = await Promise.all([
      fetch('header.html').then(r => r.text()),
      fetch('footer.html').then(r => r.text())
    ]);

    document.body.insertAdjacentHTML('afterbegin', header);
    document.body.insertAdjacentHTML('beforeend', footer);

    if (window.lucide && window.lucide.createIcons) {
      window.lucide.createIcons();
    }

    const year = document.getElementById('year');
    if (year) year.textContent = new Date().getFullYear();

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', e => {
        e.preventDefault();
        const target = document.querySelector(anchor.getAttribute('href'));
        if (target) target.scrollIntoView({ behavior: 'smooth' });
      });
    });

    const backToTop = document.getElementById('back-to-top');
    if (backToTop) {
      window.addEventListener('scroll', () => {
        if (window.scrollY > 300) backToTop.classList.remove('hidden');
        else backToTop.classList.add('hidden');
      });
      backToTop.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    }

    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    if (mobileMenuButton && mobileMenu) {
      mobileMenuButton.addEventListener('click', e => {
        e.stopPropagation();
        mobileMenu.classList.toggle('hidden');
      });
      document.addEventListener('click', e => {
        if (!mobileMenu.contains(e.target) && !mobileMenuButton.contains(e.target)) {
          mobileMenu.classList.add('hidden');
        }
      });
    }
  } catch (err) {
    console.error('Failed to load header or footer', err);
  }
});
