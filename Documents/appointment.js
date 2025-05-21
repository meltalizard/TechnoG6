// Menu toggle functionality
document.getElementById('menu-button').addEventListener('click', function () {
    document.getElementById('navbar-links').classList.toggle('active');
});

document.addEventListener('click', function (event) {
    const menuButton = document.getElementById('menu-button');
    const navbarLinks = document.getElementById('navbar-links');

    if (!menuButton.contains(event.target) && !navbarLinks.contains(event.target)) {
        navbarLinks.classList.remove('active');
    }
});

// Service option selection
document.addEventListener('DOMContentLoaded', function() {
    const serviceOptions = document.querySelectorAll('.service-option');
    
    serviceOptions.forEach(option => {
        option.addEventListener('click', function() {
            // Find the radio button within this option
            const radio = this.querySelector('input[type="radio"]');
            if (radio) {
                // Check this radio button
                radio.checked = true;
                
                // Highlight the selected option
                resetServiceOptions();
                this.style.backgroundColor = '#d4ebff';
                this.style.borderLeft = '4px solid #1fa1c9';
            }
        });
    });
    
    // Also add click handler for the radio buttons directly
    const radioButtons = document.querySelectorAll('.service-option input[type="radio"]');
    radioButtons.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.checked) {
                resetServiceOptions();
                const parentOption = this.closest('.service-option');
                if (parentOption) {
                    parentOption.style.backgroundColor = '#d4ebff';
                    parentOption.style.borderLeft = '4px solid #1fa1c9';
                }
            }
        });
    });
});

function resetServiceOptions() {
    // Reset all service options to default styling
    const allOptions = document.querySelectorAll('.service-option');
    allOptions.forEach(option => {
        option.style.backgroundColor = '#f0f8ff';
        option.style.borderLeft = 'none';
    });
}

// Section navigation
function showSection(sectionNumber) {
    // Validate service selection before proceeding to section 2
    if (sectionNumber === 2) {
        const serviceSelected = document.querySelector('input[name="service"]:checked');
        if (!serviceSelected) {
            alert("Please select a service before proceeding.");
            return;
        }
    }
    
    // Hide all sections
    document.getElementById('section1').style.display = 'none';
    document.getElementById('section2').style.display = 'none';
    
    // Show the requested section
    document.getElementById('section' + sectionNumber).style.display = 'block';
    
    // Scroll to top for better user experience
    window.scrollTo(0, 0);
}

// Form submission with confirmation and redirection
function confirmSubmission() {
    if (confirm("Are you sure you want to register and schedule this appointment?")) {
        document.getElementById('appointmentForm').submit();
    }
}

// Redirect to appointment history after confirmation
function redirectToAppointmentHistory() {
    // Form validation
    const form = document.getElementById('appointmentForm');
    if (form.checkValidity()) {
        if (confirm("Are you sure you want to register and schedule this appointment?")) {
            // Get the selected service
            const selectedService = document.querySelector('input[name="service"]:checked').value;
            
            // You could store form data in localStorage or sessionStorage here if needed
            // localStorage.setItem('selectedService', selectedService);
            
            // Redirect to appointment-history.html
            window.location.href = 'appointment-history.html';
        }
    } else {
        // Trigger HTML5 validation UI
        form.reportValidity();
    }
}