(() => {
    'use strict';

    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    document.querySelectorAll('[data-current-year]').forEach((element) => {
        element.textContent = String(new Date().getFullYear());
    });
    const loader = document.getElementById('siteLoader');
    const loaderPercent = document.getElementById('loaderPercent');
    const loaderBar = document.getElementById('loaderBar');
    let loaded = false;
    let progress = 0;

    const finishLoader = () => {
        if (loaded) return;
        loaded = true;
        progress = 100;
        if (loaderPercent) loaderPercent.textContent = '100';
        if (loaderBar) loaderBar.style.width = '100%';
        window.setTimeout(() => {
            loader?.classList.add('is-complete');
            document.body.classList.add('page-ready');
            window.setTimeout(() => loader?.remove(), 900);
        }, reduceMotion ? 50 : 350);
    };

    if (loader) {
        const timer = window.setInterval(() => {
            progress = Math.min(progress + Math.ceil(Math.random() * 7), 92);
            loaderPercent.textContent = String(progress);
            loaderBar.style.width = `${progress}%`;
            if (loaded) window.clearInterval(timer);
        }, 90);
        window.addEventListener('load', () => {
            window.clearInterval(timer);
            finishLoader();
        }, { once: true });
        window.setTimeout(finishLoader, 2400);
    } else {
        document.body.classList.add('page-ready');
    }

    if (window.gsap && window.ScrollTrigger) {
        gsap.registerPlugin(ScrollTrigger);
    }

    let lenis = null;
    if (!reduceMotion && window.Lenis) {
        lenis = new Lenis({ lerp: 0.085, smoothWheel: true, wheelMultiplier: 0.92 });
        lenis.on('scroll', () => ScrollTrigger?.update());
        gsap?.ticker.add((time) => lenis.raf(time * 1000));
        gsap?.ticker.lagSmoothing(0);
        document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
            anchor.addEventListener('click', (event) => {
                const target = anchor.getAttribute('href');
                if (!target || target === '#') return;
                const element = document.querySelector(target);
                if (!element) return;
                event.preventDefault();
                lenis.scrollTo(element, { offset: -60, duration: 1.2 });
            });
        });
    }

    const header = document.getElementById('siteHeader');
    const progressBar = document.getElementById('scrollProgress');
    const updateChrome = () => {
        const y = window.scrollY || document.documentElement.scrollTop;
        header?.classList.toggle('is-scrolled', y > 24);
        const max = document.documentElement.scrollHeight - window.innerHeight;
        if (progressBar) progressBar.style.transform = `scaleY(${max > 0 ? y / max : 0})`;
    };
    window.addEventListener('scroll', updateChrome, { passive: true });
    updateChrome();

    if (!reduceMotion && window.gsap && window.ScrollTrigger) {
        gsap.utils.toArray('.reveal-up').forEach((element) => {
            gsap.from(element, { y: 48, opacity: 0, duration: 1, ease: 'power3.out', scrollTrigger: { trigger: element, start: 'top 88%', once: true } });
        });
        gsap.utils.toArray('.reveal-card').forEach((element, index) => {
            gsap.from(element, { y: 64, opacity: 0, duration: 1, delay: (index % 3) * 0.08, ease: 'power3.out', scrollTrigger: { trigger: element, start: 'top 90%', once: true } });
        });
        gsap.utils.toArray('.reveal-image').forEach((element) => {
            gsap.from(element, { clipPath: 'inset(0 0 100% 0)', duration: 1.4, ease: 'power4.inOut', scrollTrigger: { trigger: element, start: 'top 82%', once: true } });
        });

        document.querySelectorAll('.split-words').forEach((element) => {
            if (element.dataset.splitReady) return;
            const words = element.textContent.trim().split(/\s+/);
            element.innerHTML = words.map((word) => `<span class="word-mask"><span>${word}</span></span>`).join(' ');
            element.dataset.splitReady = 'true';
            gsap.from(element.querySelectorAll('.word-mask > span'), { yPercent: 115, duration: 0.9, stagger: 0.025, ease: 'power4.out', scrollTrigger: { trigger: element, start: 'top 82%', once: true } });
        });

        if (document.body.classList.contains('home-page')) {
            const heroTimeline = gsap.timeline({ delay: 1.6 });
            heroTimeline
                .from('.hero-title .title-line > span', { yPercent: 110, duration: 1.1, stagger: 0.12, ease: 'power4.out' })
                .from('.hero-bottle', { y: 80, rotate: 7, opacity: 0, scale: 0.88, duration: 1.5, ease: 'power4.out' }, '-=1')
                .from('.floating-note', { opacity: 0, y: 18, stagger: 0.12, duration: 0.7 }, '-=0.65');

            gsap.to('.hero-bottle', { yPercent: 12, ease: 'none', scrollTrigger: { trigger: '.hero-home', start: 'top top', end: 'bottom top', scrub: 1 } });
            gsap.to('.hero-orb-one', { xPercent: 20, yPercent: -25, ease: 'none', scrollTrigger: { trigger: '.hero-home', start: 'top top', end: 'bottom top', scrub: 1.2 } });

            const stage = document.querySelector('.product-stage');
            const triggers = gsap.utils.toArray('.story-trigger');
            const copies = gsap.utils.toArray('.story-copy');
            const products = gsap.utils.toArray('.story-product');
            const segments = gsap.utils.toArray('[data-story-segment]');
            const current = document.getElementById('storyCurrent');

            const activateStory = (index) => {
                copies.forEach((item, i) => item.classList.toggle('active', i === index));
                products.forEach((item, i) => item.classList.toggle('active', i === index));
                segments.forEach((item, i) => item.style.transform = `scaleX(${i < index ? 1 : i === index ? 0.72 : 0})`);
                if (current) current.textContent = String(index + 1).padStart(2, '0');
                const accent = products[index]?.dataset.accent || '#a66a42';
                stage?.style.setProperty('--story-accent', accent);
            };

            triggers.forEach((trigger, index) => {
                ScrollTrigger.create({
                    trigger,
                    start: 'top center',
                    end: 'bottom center',
                    onEnter: () => activateStory(index),
                    onEnterBack: () => activateStory(index),
                });
            });

            gsap.to('.atelier-bg', { scale: 1.12, yPercent: 5, ease: 'none', scrollTrigger: { trigger: '.atelier-band', start: 'top bottom', end: 'bottom top', scrub: 1 } });
        }
    }

    const cursorDot = document.querySelector('.cursor-dot');
    const cursorRing = document.querySelector('.cursor-ring');
    if (window.matchMedia('(pointer:fine)').matches && cursorDot && cursorRing && !reduceMotion) {
        let mouseX = 0, mouseY = 0, ringX = 0, ringY = 0;
        window.addEventListener('mousemove', (event) => { mouseX = event.clientX; mouseY = event.clientY; cursorDot.style.transform = `translate3d(${mouseX}px,${mouseY}px,0)`; });
        const renderCursor = () => { ringX += (mouseX - ringX) * 0.14; ringY += (mouseY - ringY) * 0.14; cursorRing.style.transform = `translate3d(${ringX}px,${ringY}px,0)`; requestAnimationFrame(renderCursor); };
        renderCursor();
        document.querySelectorAll('a, button, [data-cursor]').forEach((item) => {
            item.addEventListener('mouseenter', () => cursorRing.classList.add('is-active'));
            item.addEventListener('mouseleave', () => cursorRing.classList.remove('is-active'));
        });
    }

    const filterButtons = document.querySelectorAll('.filter-btn');
    const filterItems = document.querySelectorAll('.product-filter-item');
    filterButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const filter = button.dataset.filter;
            filterButtons.forEach((item) => item.classList.remove('active'));
            button.classList.add('active');
            filterItems.forEach((item) => {
                const show = filter === 'all' || item.dataset.family === filter;
                item.classList.toggle('d-none', !show);
            });
            ScrollTrigger?.refresh();
        });
    });

    let bagCount = 0;
    document.querySelectorAll('.add-bag').forEach((button) => {
        button.addEventListener('click', () => {
            bagCount += 1;
            document.querySelectorAll('.bag-count').forEach((count) => count.textContent = String(bagCount));
            button.innerHTML = '<i class="bi bi-check-lg"></i>';
            button.classList.add('is-added');
        });
    });

    const contactForm = document.getElementById('contactForm');
    contactForm?.addEventListener('submit', (event) => {
        event.preventDefault();
        const name = contactForm.elements.name.value.trim();
        const email = contactForm.elements.email;
        const message = contactForm.elements.message.value.trim();
        const errors = [];

        if (!name) errors.push('Please enter your name.');
        if (!email.value.trim() || !email.validity.valid) errors.push('Please enter a valid email address.');
        if (!message) errors.push('Please tell us how we can assist.');

        contactForm.parentElement.querySelector('.alert-danger')?.remove();
        if (errors.length) {
            const alert = document.createElement('div');
            alert.className = 'alert alert-danger';
            errors.forEach((error) => {
                const line = document.createElement('div');
                line.textContent = error;
                alert.appendChild(line);
            });
            contactForm.before(alert);
            return;
        }

        const success = document.createElement('div');
        success.className = 'success-state';
        success.innerHTML = '<i class="bi bi-check2-circle"></i><h2></h2><p>Your note has been received. A fragrance advisor will reply shortly.</p><a href="index.html" class="btn-luxury btn-luxury-dark">Return home</a>';
        success.querySelector('h2').textContent = `Thank you, ${name}.`;
        contactForm.parentElement.replaceChildren(success);
    });
})();
