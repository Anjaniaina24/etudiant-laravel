// Gestion des messages de confirmation
document.addEventListener('DOMContentLoaded', function() {
    // Confirmation de suppression
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            if (!confirm(this.getAttribute('data-confirm') || 'Êtes-vous sûr de vouloir supprimer ?')) {
                e.preventDefault();
            }
        });
    });
    
    // Validation des formulaires
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('error');
                    
                    // Créer un message d'erreur
                    let errorMessage = field.parentElement.querySelector('.error-message');
                    if (!errorMessage) {
                        errorMessage = document.createElement('span');
                        errorMessage.className = 'error-message';
                        errorMessage.style.color = 'red';
                        errorMessage.style.fontSize = '0.875rem';
                        errorMessage.textContent = 'Ce champ est obligatoire';
                        field.parentElement.appendChild(errorMessage);
                    }
                } else {
                    field.classList.remove('error');
                    
                    // Supprimer le message d'erreur
                    const errorMessage = field.parentElement.querySelector('.error-message');
                    if (errorMessage) {
                        errorMessage.remove();
                    }
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Veuillez remplir tous les champs obligatoires.');
            }
        });
    });
    
    // Gestion des dates
    const dateInputs = document.querySelectorAll('input[type="date"]');
    dateInputs.forEach(input => {
        if (!input.value) {
            // Définir la date d'aujourd'hui comme valeur par défaut
            const today = new Date().toISOString().split('T')[0];
            input.value = today;
        }
    });
    
    // Recherche en temps réel
    const searchInput = document.querySelector('input[name="search"]');
    if (searchInput) {
        let searchTimeout;
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                this.form.submit();
            }, 500);
        });
    }
    
    // Gestion des notifications
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            alert.style.transition = 'opacity 0.5s';
            setTimeout(() => alert.remove(), 500);
        }, 5000);
    });
    
    // Toggle du menu sur mobile
    const mobileMenuToggle = document.createElement('button');
    mobileMenuToggle.innerHTML = '<i class="fas fa-bars"></i>';
    mobileMenuToggle.className = 'mobile-menu-toggle';
    mobileMenuToggle.style.display = 'none';
    
    const navMenu = document.querySelector('.nav-menu');
    if (navMenu) {
        navMenu.parentElement.insertBefore(mobileMenuToggle, navMenu);
        
        mobileMenuToggle.addEventListener('click', function() {
            navMenu.classList.toggle('show');
        });
        
        // Cacher le menu sur les grands écrans
        function handleResize() {
            if (window.innerWidth <= 768) {
                mobileMenuToggle.style.display = 'block';
                navMenu.classList.remove('show');
            } else {
                mobileMenuToggle.style.display = 'none';
                navMenu.classList.add('show');
            }
        }
        
        window.addEventListener('resize', handleResize);
        handleResize();
    }
});

// Fonction pour formater les dates
function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('fr-FR', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    });
}

// Fonction pour valider les emails
function isValidEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

// Fonction pour valider les téléphones
function isValidPhone(phone) {
    const re = /^[\+]?[0-9\s\-\(\)]{10,}$/;
    return re.test(phone);
}
