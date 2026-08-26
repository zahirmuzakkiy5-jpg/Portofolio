(() => {
  'use strict';

  const projects = Array.isArray(window.portfolioProjects) && window.portfolioProjects.length
    ? window.portfolioProjects
    : [
        { no: '01', type: 'WEB / DEVELOPMENT', title: 'Portfolio Website', copy: 'An editorial portfolio built from a simple idea.', visual: 'linear-gradient(140deg,#111 0 42%,#2f3b3e 43% 58%,#c7c5bd 59%)', url: '#contact' },
        { no: '02', type: 'BRANDING / WEB', title: 'Creative Landing', copy: 'A focused landing page with a strong visual voice.', visual: 'linear-gradient(135deg,#c8c5ba 0 35%,#16191b 36% 65%,#747a78 66%)', url: '#contact' },
        { no: '03', type: 'UI / EXPERIMENT', title: 'A to Z Directory', copy: 'A small interface experiment for finding things fast.', visual: 'linear-gradient(90deg,#1a1d20 0 28%,#ddd9d0 29% 68%,#9b9d98 69%)', url: '#contact' },
      ];

  const track = document.getElementById('holoTrack');
  const dots = document.getElementById('holoDots');
  const previous = document.getElementById('prev');
  const next = document.getElementById('next');

  if (track && dots && previous && next) {
    let index = 0;
    let timer;

    const renderProject = () => {
      const project = projects[index];
      track.innerHTML = `
        <article class="holo-card" data-tilt>
          <div class="holo-visual" style="background:${project.visual || 'linear-gradient(135deg,#111,#777)'}"></div>
          <div class="holo-copy">
            <div class="holo-type">${project.no || String(index + 1).padStart(2, '0')} / ${project.type || 'PROJECT'}</div>
            <h3>${project.title || 'Untitled project'}</h3>
            <p>${project.copy || ''}</p>
            <a href="${project.url || '#contact'}">View project →</a>
          </div>
        </article>`;
      dots.innerHTML = projects.map((_, itemIndex) => `<span class="${itemIndex === index ? 'active' : ''}"></span>`).join('');

      const card = track.querySelector('[data-tilt]');
      if (!card) return;
      card.addEventListener('pointermove', (event) => {
        const rect = card.getBoundingClientRect();
        card.style.setProperty('--rx', ((.5 - (event.clientY - rect.top) / rect.height) * 5) + 'deg');
        card.style.setProperty('--ry', (((event.clientX - rect.left) / rect.width - .5) * 7) + 'deg');
      });
      card.addEventListener('pointerleave', () => {
        card.style.setProperty('--rx', '0deg');
        card.style.setProperty('--ry', '0deg');
      });
    };

    const move = (direction) => {
      index = (index + direction + projects.length) % projects.length;
      renderProject();
    };

    previous.addEventListener('click', () => move(-1));
    next.addEventListener('click', () => move(1));
    renderProject();
    if (projects.length > 1 && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      timer = window.setInterval(() => move(1), 6500);
    }

    let isDown = false;
    let startX = 0;
    track.addEventListener('pointerdown', (event) => {
      isDown = true;
      startX = event.clientX;
      track.setPointerCapture?.(event.pointerId);
    });
    track.addEventListener('pointerup', (event) => {
      if (!isDown) return;
      isDown = false;
      const delta = event.clientX - startX;
      if (Math.abs(delta) > 35) move(delta < 0 ? 1 : -1);
    });
    track.addEventListener('pointercancel', () => { isDown = false; });
    window.addEventListener('beforeunload', () => window.clearInterval(timer));
  }

  const morphWord = document.getElementById('morphWord');
  const morphWords = ['curiosity', 'discipline', 'experiments', 'good ideas'];
  if (morphWord && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    let morphIndex = 0;
    window.setInterval(() => {
      morphIndex = (morphIndex + 1) % morphWords.length;
      morphWord.style.opacity = '0';
      morphWord.style.transform = 'translateY(7px) skewX(-8deg)';
      window.setTimeout(() => {
        morphWord.textContent = morphWords[morphIndex];
        morphWord.style.opacity = '1';
        morphWord.style.transform = 'none';
      }, 180);
    }, 2400);
  }

  const cat = document.getElementById('catCompanion');
  if (cat) {
    window.addEventListener('pointermove', (event) => {
      cat.style.setProperty('--cat-x', Math.max(-5, Math.min(5, (event.clientX - window.innerWidth / 2) / 90)) + 'px');
      cat.style.setProperty('--cat-y', Math.max(-4, Math.min(4, (event.clientY - window.innerHeight / 2) / 110)) + 'px');
    }, { passive: true });
  }

  const contactType = document.getElementById('contactType');
  const contactCommands = ['send good ideas', 'build something useful', 'make it real'];
  if (contactType && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    let commandIndex = 0;
    window.setInterval(() => {
      commandIndex = (commandIndex + 1) % contactCommands.length;
      contactType.style.opacity = '0';
      window.setTimeout(() => {
        contactType.textContent = contactCommands[commandIndex];
        contactType.style.opacity = '1';
      }, 160);
    }, 2200);
  }

  document.querySelectorAll('.navlinks a, .site-nav a').forEach((link) => {
    link.addEventListener('click', () => {
      document.querySelectorAll('.navlinks a, .site-nav a').forEach((item) => item.classList.remove('active'));
      link.classList.add('active');
    });
  });

  const photoUpload = document.getElementById('photoUpload');
  if (photoUpload) {
    photoUpload.addEventListener('change', (event) => {
      const file = event.target.files?.[0];
      const image = document.getElementById('userPhoto');
      const ghost = document.getElementById('userPhotoGhost');
      const silhouette = document.querySelector('.person-silhouette');
      if (!file || !image || !ghost) return;
      const source = URL.createObjectURL(file);
      image.src = source;
      ghost.src = source;
      image.style.display = 'block';
      ghost.style.display = 'block';
      if (silhouette) silhouette.style.display = 'none';
    });
  }

  const aboutUpload = document.getElementById('aboutUpload');
  if (aboutUpload) {
    aboutUpload.addEventListener('change', (event) => {
      const file = event.target.files?.[0];
      const image = document.getElementById('aboutPhoto');
      const figure = document.querySelector('.about-figure');
      if (!file || !image) return;
      image.src = URL.createObjectURL(file);
      image.style.display = 'block';
      if (figure) figure.style.display = 'none';
    });
  }

  const observer = 'IntersectionObserver' in window
    ? new IntersectionObserver((entries) => entries.forEach((entry) => {
        if (entry.isIntersecting) entry.target.classList.add('is-visible');
      }), { threshold: .12 })
    : null;
  document.querySelectorAll('.reveal').forEach((element) => {
    if (observer) observer.observe(element);
    else element.classList.add('is-visible');
  });

  window.openCertModal = (url, type) => {
    const modal = document.getElementById('certModal');
    const content = document.getElementById('certModalContent');
    if (!modal || !content) return;
    content.innerHTML = type === 'pdf'
      ? `<iframe src="${url}" title="Certificate PDF" style="width:100%;height:70vh;border:0"></iframe>`
      : `<img src="${url}" alt="Certificate" style="display:block;max-width:100%;max-height:70vh;margin:0 auto">`;
    modal.classList.add('is-open');
  };

  window.closeCertModal = () => {
    const modal = document.getElementById('certModal');
    const content = document.getElementById('certModalContent');
    if (modal) modal.classList.remove('is-open');
    if (content) content.innerHTML = '';
  };
})();
