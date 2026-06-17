// Toggle Navigation
function toggleNav() {
    const nav = document.getElementById('mobileNav');
    const overlay = document.getElementById('overlay');
    const hamburger = document.getElementById('hamburger');
    nav.classList.toggle('open');
    overlay.classList.toggle('show');
    hamburger.classList.toggle('active');
}

// Scroll to Top
window.addEventListener('scroll', function() {
    const scrollTopBtn = document.getElementById('scrollTop');
    if (window.scrollY > 300) {
        scrollTopBtn.classList.add('show');
    } else {
        scrollTopBtn.classList.remove('show');
    }
});

function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Form Validation
const form = document.getElementById('sbpForm');
const submitBtn = document.getElementById('submitBtn');

// Real-time validation
const fields = ['applicationNo', 'businessName', 'typeOfBusiness', 'townMarket', 'amountPaid', 'email', 'ward', 'sbpNo'];

fields.forEach(fieldId => {
    const field = document.getElementById(fieldId);
    field.addEventListener('input', function() {
        validateField(fieldId);
    });
    field.addEventListener('change', function() {
        validateField(fieldId);
    });
    field.addEventListener('blur', function() {
        validateField(fieldId);
    });
});

function validateField(fieldId) {
    const field = document.getElementById(fieldId);
    const errorEl = document.getElementById(fieldId + 'Error');
    let isValid = true;

    if (fieldId === 'email') {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        isValid = emailRegex.test(field.value.trim());
    } else if (fieldId === 'amountPaid') {
        isValid = field.value !== '' && parseFloat(field.value) >= 0;
    } else if (fieldId === 'ward') {
        isValid = field.value !== '';
    } else {
        isValid = field.value.trim() !== '';
    }

    if (!isValid && field.value !== '') {
        field.classList.add('error');
        if (errorEl) errorEl.classList.add('show');
    } else {
        field.classList.remove('error');
        if (errorEl) errorEl.classList.remove('show');
    }

    return isValid;
}

function validateAll() {
    let allValid = true;
    fields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        const errorEl = document.getElementById(fieldId + 'Error');
        let isValid = true;

        if (fieldId === 'email') {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            isValid = emailRegex.test(field.value.trim());
        } else if (fieldId === 'amountPaid') {
            isValid = field.value !== '' && parseFloat(field.value) >= 0;
        } else if (fieldId === 'ward') {
            isValid = field.value !== '';
        } else {
            isValid = field.value.trim() !== '';
        }

        if (!isValid) {
            field.classList.add('error');
            if (errorEl) errorEl.classList.add('show');
            allValid = false;
        } else {
            field.classList.remove('error');
            if (errorEl) errorEl.classList.remove('show');
        }
    });
    return allValid;
}

// Form Submit
form.addEventListener('submit', function(e) {
    if (!validateAll()) {
        e.preventDefault();
        const firstError = document.querySelector('.error');
        if (firstError) {
            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
            firstError.focus();
        }
        return;
    }
});

// Close Modal
function closeModal() {
    document.getElementById('successModal').classList.remove('show');
}

// Close modal on overlay click
document.getElementById('successModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});

// Close modal on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeModal();
        const nav = document.getElementById('mobileNav');
        if (nav.classList.contains('open')) {
            toggleNav();
        }
    }
});