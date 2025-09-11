
/* LANCEUR  POUR LES ANIMATIONS DE SCROLL */

//  Réinitialise le système d'animation avant de commencer le code
function setupAnimations() {
    console.log(' Setup animations...');
    
    
    if (window.myObserver) {
        window.myObserver.disconnect();
    }

    //  CRÉE UN OBSERVATEUR AVEC UNE LOGIQUE D'ANIMATION CONDITIONNELLE
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

    
    document.querySelectorAll('.hero-text, .hero-subtitle, .category-title, .category-card').forEach(el => {
        window.myObserver.observe(el);
    });

    // APRÈS UN COURT DÉLAI, VÉRIFIE ET AFFICHE LES TITRES
    setTimeout(() => {
        document.querySelectorAll('.hero-text, .hero-subtitle').forEach(el => {
            const rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight) {
                el.classList.add('show');
            }
        });
    }, 100);

    
}

//  LANCE LA CONFIGURATION DES ANIMATIONS DE PLUSIEURS FAÇONS
document.addEventListener('DOMContentLoaded', setupAnimations);
document.addEventListener('turbo:load', setupAnimations);
window.addEventListener('pageshow', setupAnimations);
setTimeout(setupAnimations, 500); 

