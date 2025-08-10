 
import './bootstrap.js';
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css'; 
import '@fortawesome/fontawesome-free/css/all.min.css'; // <-- AJOUTE CETTE LIGNE

import './styles/app.css';





// Initialisation spécifique pour le menu burger
document.addEventListener('DOMContentLoaded', function() {
    // Vérifier que Bootstrap est bien chargé
    if (typeof bootstrap !== 'undefined') {
        // Initialiser tous les éléments collapse
        const collapseElements = document.querySelectorAll('.collapse');
        collapseElements.forEach(el => {
            new bootstrap.Collapse(el, {
                toggle: false
            });
        });

        // Gestion spécifique du menu burger
        const navbarToggler = document.querySelector('.navbar-toggler');
        if (navbarToggler) {
            navbarToggler.addEventListener('click', function() {
                const target = this.getAttribute('data-bs-target');
                const collapse = new bootstrap.Collapse(document.querySelector(target), {
                    toggle: true
                });
            });
        }

        // Fermer le menu quand on clique sur un lien
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                const navbarCollapse = document.querySelector('#navbarNav');
                if (navbarCollapse && window.innerWidth < 992) {
                    const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                    if (bsCollapse) {
                        bsCollapse.hide();
                    }
                }
            });
        });
    } else {
        console.error('Bootstrap n\'est pas chargé correctement');
    }
});

console.log('Bootstrap et AssetMapper sont correctement initialisés');
