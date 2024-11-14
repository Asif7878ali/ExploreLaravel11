$(document).ready(function () {
    // Phone number validation: Allow only digits and limit to 10 characters
    $('#number').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);
    });

    // Form submission validation
    $('form').on('submit', function (e) {
        let isValid = true;

        // Name validation: Minimum 3 characters
        const name = $('#name').val().trim();
        if (name.length < 3) {
            console.error('Name must be at least 3 characters long.')
            $('#name').focus();
            isValid = false;
        }

        // Email validation using HTML5 pattern
        const email = $('#email').val();
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailPattern.test(email)) {
            console.error('Please enter a valid email address.');
            $('#email').focus();
            isValid = false;
        }

        // Phone number validation: Exactly 10 digits
        const phone = $('#number').val();
        if (phone.length !== 10) {
            console.error('Phone number must be exactly 10 digits.');
            $('#number').focus();
            isValid = false;
        }

        // Gender validation: Ensure one radio button is selected
        if (!$('input[name="gender"]:checked').val()) {
            console.error('Please select your gender.');
            isValid = false;
        }

        // Admin dropdown validation: Ensure a valid option is selected
        if (!$('#admin').val()) {
            console.error('Please select an admin option.');
            $('#admin').focus();
            isValid = false;
        }

        // If any validation fails, prevent form submission
        if (!isValid) {
            e.preventDefault();
        }
    });
});
