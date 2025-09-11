//  VERSION SIMPLE MAIS ROBUSTE
function setupAnimations() {
    console.log(' Setup animations...');
    
    // Nettoyer
    if (window.myObserver) {
        window.myObserver.disconnect();
    }

    // Créer observer
    window.myObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            const isHero = entry.target.classList.contains('hero-text') || entry.target.classList.contains('hero-subtitle');
            
            if (entry.isIntersecting) {
                entry.target.classList.add(isHero ? 'show' : 'visible');
            } else {
                entry.target.classList.remove(isHero ? 'show' : 'visible');
            }
        });
    }, { threshold: 0.2, rootMargin: '0px 0px -80px 0px' });

    // Observer éléments
    document.querySelectorAll('.hero-text, .hero-subtitle, .category-title, .category-card').forEach(el => {
        window.myObserver.observe(el);
    });

    // Animation immédiate si en vue
    setTimeout(() => {
        document.querySelectorAll('.hero-text, .hero-subtitle').forEach(el => {
            const rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight) {
                el.classList.add('show');
            }
        });
    }, 100);

    console.log(' Animations OK !');
}

//  TOUS LES ÉVÉNEMENTS
document.addEventListener('DOMContentLoaded', setupAnimations);
document.addEventListener('turbo:load', setupAnimations);
window.addEventListener('pageshow', setupAnimations);
setTimeout(setupAnimations, 500); // Sécurité

console.log(' Script robuste chargé !');