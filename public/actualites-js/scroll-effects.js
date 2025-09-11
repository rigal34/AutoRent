
/* SCRIPT DE GESTION GLOBALE DES ANIMATIONS AU DÉFILEMENT SCROLL */

console.log('Actualités Prestige - Multi-Pages');

let observer = null;

// GESTION DES ANIMATIONS D'APPARITION AU SCROLL 
function createObserver() {
    if (observer) {
        observer.disconnect();
    }
    
    observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
            } else {
                entry.target.classList.remove('show');
            }
        });
    }, { 
        threshold: 0.1, // sensible déclencheur apparition pour le texte en haut
        rootMargin: '50px 0px -30px 0px' // Déclenche l animation pour évite des effets visuels saccadés
    });
}

// LANCE LE DÉTECTEUR D'ANIMATIONS AU SCROLL 
function initScrollEffects() {
    console.log('Init scroll effects...');
    
    
    createObserver();
    
    //  SÉLECTIONNE ET PRÉPARE LES CARTES POUR L'ANIMATION
    const cards = document.querySelectorAll('.col-xl-4, .col-lg-6, .col-md-6');
    cards.forEach(card => {
        card.classList.remove('show');
        card.classList.add('scroll-card');
        observer.observe(card);
    });
    
    //  PRÉPARE LES ÉLÉMENTS TEXTE POUR L'ANIMATION DE SCROLL
    const textElements = document.querySelectorAll('.text-animation');
    textElements.forEach(text => {
        text.classList.remove('show');
        text.classList.add('scroll-card');
        observer.observe(text);
    });
    
    console.log('Cards observées:', cards.length);
    console.log('Textes observés:', textElements.length);
}

//  ARRÊTE LA SURVEILLANCE DES ANIMATIONS DE SCROLL
function cleanupScrollEffects() {
    if (observer) {
        observer.disconnect();
        observer = null;
    }
}

// LANCE ET ARRÊTE LES ANIMATIONS SELON LES ÉVÉNEMENTS DE LA PAGE
document.addEventListener('DOMContentLoaded', initScrollEffects);
document.addEventListener('turbo:load', initScrollEffects);
document.addEventListener('turbo:before-cache', cleanupScrollEffects);
window.addEventListener('load', initScrollEffects);
window.addEventListener('pageshow', initScrollEffects);
window.addEventListener('beforeunload', cleanupScrollEffects);

//  LANCE IMMÉDIATEMENT LES EFFETS SI LA PAGE EST DÉJÀ CHARGÉE
if (document.readyState !== 'loading') {
    initScrollEffects();
}

//ANIMATION D'APPARITION DES TITRES 

setTimeout(() => {
    document.querySelectorAll('.fade-in-on-load').forEach(el => {
        el.style.opacity = '1';
        el.style.transform = 'translateY(0)';
        el.style.transition = 'all 1.5s ease-out';
    });
    console.log(' TEXTE FORCÉ VISIBLE !');
}, 100);
