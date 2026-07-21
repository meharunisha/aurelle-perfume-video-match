(() => {
    'use strict';

    const root = document.querySelector('.premium-reference-home');
    if (!root) return;

    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const hero = document.querySelector('.video-match-hero');
    const copies = [...document.querySelectorAll('[data-hero-copy]')];
    const arts = [...document.querySelectorAll('[data-hero-art]')];
    const selectors = [...document.querySelectorAll('[data-hero-index]')];
    const current = document.getElementById('heroCurrent');
    const slides = [
        { theme: '#d10035', dark: '#7e001c', soft: '#ff5877' },
        { theme: '#81502f', dark: '#3a2114', soft: '#d49967' },
        { theme: '#6658ff', dark: '#2f2789', soft: '#aaa2ff' },
    ];
    let active = 0;
    let timer = 0;

    const animateCopy = (panel) => {
        if (!panel || reduceMotion || !window.gsap) return;
        gsap.fromTo(panel.querySelectorAll('.hero-line > span'),
            { yPercent: 115 },
            { yPercent: 0, duration: .95, stagger: .08, ease: 'power4.out' }
        );
        gsap.fromTo(
            [panel.querySelector('.hero-eyebrow'), panel.querySelector('p'), ...panel.querySelectorAll('.video-pill')].filter(Boolean),
            { opacity: 0, y: 18 },
            { opacity: 1, y: 0, duration: .7, stagger: .06, delay: .15, ease: 'power3.out' }
        );
    };

    const setSlide = (index, userAction = false) => {
        active = (index + copies.length) % copies.length;
        copies.forEach((item, i) => item.classList.toggle('is-active', i === active));
        arts.forEach((item, i) => item.classList.toggle('is-active', i === active));
        selectors.forEach((item, i) => item.classList.toggle('is-active', i === active));
        if (current) current.textContent = String(active + 1).padStart(2, '0');
        const slide = slides[active] || slides[0];
        hero?.style.setProperty('--hero-theme', slide.theme);
        hero?.style.setProperty('--hero-theme-dark', slide.dark);
        hero?.style.setProperty('--hero-theme-soft', slide.soft);
        animateCopy(copies[active]);
        if (userAction) restartTimer();
    };

    const restartTimer = () => {
        window.clearInterval(timer);
        if (!reduceMotion) timer = window.setInterval(() => setSlide(active + 1), 5200);
    };

    document.querySelector('[data-hero-prev]')?.addEventListener('click', () => setSlide(active - 1, true));
    document.querySelector('[data-hero-next]')?.addEventListener('click', () => setSlide(active + 1, true));
    selectors.forEach((button) => button.addEventListener('click', () => setSlide(Number(button.dataset.heroIndex || 0), true)));
    setSlide(0);
    restartTimer();

    document.querySelectorAll('[data-drag-scroll]').forEach((track) => {
        let down = false;
        let startX = 0;
        let startScroll = 0;
        const stop = () => { down = false; track.classList.remove('is-dragging'); };
        track.addEventListener('pointerdown', (event) => {
            down = true;
            startX = event.clientX;
            startScroll = track.scrollLeft;
            track.classList.add('is-dragging');
            track.setPointerCapture?.(event.pointerId);
        });
        track.addEventListener('pointermove', (event) => {
            if (!down) return;
            event.preventDefault();
            track.scrollLeft = startScroll - (event.clientX - startX) * 1.25;
        });
        track.addEventListener('pointerup', stop);
        track.addEventListener('pointercancel', stop);
        track.addEventListener('pointerleave', stop);
    });

    if (!reduceMotion && window.matchMedia('(pointer:fine)').matches) {
        const stage = document.querySelector('[data-hero-parallax]');
        stage?.addEventListener('mousemove', (event) => {
            const bounds = stage.getBoundingClientRect();
            const x = (event.clientX - bounds.left) / bounds.width - .5;
            const y = (event.clientY - bounds.top) / bounds.height - .5;
            stage.style.transform = `perspective(1100px) rotateX(${y * -2.2}deg) rotateY(${x * 3.4}deg)`;
        });
        stage?.addEventListener('mouseleave', () => { stage.style.transform = ''; });
    }

    if (!reduceMotion && window.gsap && window.ScrollTrigger) {
        gsap.utils.toArray('.reveal-video').forEach((element, index) => {
            gsap.from(element, {
                y: 52,
                opacity: 0,
                duration: .95,
                delay: (index % 4) * .045,
                ease: 'power3.out',
                scrollTrigger: { trigger: element, start: 'top 90%', once: true },
            });
        });

        gsap.to('.hero-big-orb', {
            xPercent: 18,
            yPercent: -12,
            ease: 'none',
            scrollTrigger: { trigger: '.video-match-hero', start: 'top top', end: 'bottom top', scrub: 1.2 },
        });

        gsap.utils.toArray('.section-title-row h2, .story-video-title, .video-newsletter-section h2').forEach((heading) => {
            gsap.from(heading, {
                yPercent: 28,
                opacity: 0,
                duration: .9,
                ease: 'power4.out',
                scrollTrigger: { trigger: heading, start: 'top 88%', once: true },
            });
        });

        gsap.utils.toArray('.collage-card').forEach((card, index) => {
            gsap.from(card, {
                clipPath: 'inset(0 0 100% 0 round 14px)',
                duration: 1.05,
                delay: (index % 3) * .08,
                ease: 'power4.inOut',
                scrollTrigger: { trigger: card, start: 'top 90%', once: true },
            });
        });

        gsap.to('.story-image-composition > img', {
            yPercent: -10,
            ease: 'none',
            scrollTrigger: { trigger: '.story-video-section', start: 'top bottom', end: 'bottom top', scrub: 1 },
        });
    }
})();
