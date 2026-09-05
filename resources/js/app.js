import './bootstrap';
import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';

Alpine.plugin(intersect);

/* ─── Synchronized Count-Up Animation Component ─── */
Alpine.data('countUp', () => ({
    started: false,
    startAll() {
        if (this.started) return;
        this.started = true;

        const isReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        const animate = (el, target, suffix = '', useComma = false, duration = 1200) => {
            if (!el) return;

            if (isReduced) {
                el.textContent = (useComma ? target.toLocaleString() : target) + suffix;
                return;
            }

            const startTime = performance.now();

            const step = (currentTime) => {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                /* Ease-out cubic for smooth deceleration */
                const eased = 1 - Math.pow(1 - progress, 3);
                const current = Math.floor(eased * target);

                const formatted = useComma ? current.toLocaleString() : current;
                el.textContent = formatted + suffix;

                if (progress < 1) {
                    requestAnimationFrame(step);
                } else {
                    const finalFormatted = useComma ? target.toLocaleString() : target;
                    el.textContent = finalFormatted + suffix;
                }
            };

            requestAnimationFrame(step);
        };

        /* Run all animations in lockstep simultaneously */
        if (this.$refs.stat1) animate(this.$refs.stat1, 1957, '', false, 1200);
        if (this.$refs.stat2) animate(this.$refs.stat2, 20, 'k m²', false, 1200);
        if (this.$refs.stat3) this.$refs.stat3.textContent = 'BPS';
    }
}));

/* ─── Hero Parallax (subtle, ~3% scroll offset) ─── */
Alpine.data('heroParallax', () => ({
    init() {
        /* Respect prefers-reduced-motion */
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

        const hero = this.$el;
        const photo = hero.querySelector('.hero-photo img');
        if (!photo) return;

        let ticking = false;
        const onScroll = () => {
            if (!ticking) {
                requestAnimationFrame(() => {
                    const scrollY = window.scrollY;
                    const heroHeight = hero.offsetHeight;
                    /* Only apply parallax while hero is in view */
                    if (scrollY <= heroHeight) {
                        const offset = scrollY * 0.03; // 3% scroll speed offset
                        photo.style.transform = `scale(1) translateY(${offset}px)`;
                    }
                    ticking = false;
                });
                ticking = true;
            }
        };

        window.addEventListener('scroll', onScroll, { passive: true });
    }
}));

window.Alpine = Alpine;

Alpine.start();
