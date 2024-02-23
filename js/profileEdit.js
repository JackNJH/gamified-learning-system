document.addEventListener('DOMContentLoaded', function() {
    const valueSpans = document.querySelectorAll('.value');
    const saveChangesBtn = document.getElementById('saveChangesBtn');
    const errorMessagesContainer = document.getElementById('errorMessages');

    valueSpans.forEach(function(span) {
        span.addEventListener('input', function() {
            saveChangesBtn.style.display = 'inline'; // Show the "SAVE" button when user changes content
        });

        //Prevent user from line-breaking
        if (!span.classList.contains('bio')) {
            span.addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                }
            });
        }
    });

    saveChangesBtn.addEventListener('click', function() {
        const updatedData = {};
        valueSpans.forEach(function(span) {
            const field = span.dataset.field;
            let value;
            if (field === 'UserBio') {
                // For UserBio, capture the innerHTML to preserve line breaks
                value = span.innerHTML.trim();
            } else {
                // For other fields, capture textContent as before
                value = span.textContent.trim();
            }
            updatedData[field] = value;
        });
    
        const validationErrors = validateData(updatedData);
        if (validationErrors.length === 0) {
            checkExistingData(updatedData);
        } else {
            displayErrors(validationErrors);
        }
    });

    // Validate information for Email and Phone Number formats
    function validateData(data) {

        // Regex: https://www.w3schools.com/jsref/jsref_regexp_ncaret.asp
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const telRegex = /^[0-9]{7,15}$/;
    
        const validationErrors = []; // Create an array to store validation errors
    
        // Error Handling
        for (const field in data) {
            if (field === 'UserEmail' && !emailRegex.test(data[field])) {
                validationErrors.push('Error: Invalid email format.'); 
            }
            if (field === 'UserTel' && !telRegex.test(data[field])) {
                validationErrors.push('Error: Invalid telephone number format.'); 
            }
        }
    
        if (validationErrors.length > 0) {
            return validationErrors; 
        }
        return []; 
    }

    // Validate so there's no duplicate Email or Tel number
    function checkExistingData(data) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../modules/check_existing_data.php');
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onload = function() {
            const responseText = xhr.responseText;
            const jsonStartIndex = responseText.indexOf('>') + 1; // Find the index after '>'
            const jsonResponse = responseText.substring(jsonStartIndex); // Extract JSON part
            console.log(jsonResponse); // Log the extracted JSON to the console
        
            const response = JSON.parse(jsonResponse);
            if (response.emailExists) {
                displayErrors('Error: Email already exists.');
            } else if (response.telExists) {
                displayErrors('Error: Telephone number already exists.');
            } else {
                saveChanges(data);
            }
        };
        xhr.send(JSON.stringify(data));
    }

    // Save changes
    function saveChanges(data) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../modules/update_profile.php');
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onload = function() {
            if (xhr.status === 200) {
                alert('Successfully Updated!');
                window.location.href = '../public/profile.php';
            } else {
                console.error('Error updating data: ' + xhr.statusText);
            }
        };
        xhr.send(JSON.stringify(data));
    }
    

    // Return error messages to be displayed
    function displayErrors(error) {
        errorMessagesContainer.innerHTML = ''; // Clear previous error messages
        const errorElement = document.createElement('div');
        errorElement.textContent = error;
        errorElement.classList.add('error-message'); // Add CSS class for error message styling
        errorMessagesContainer.appendChild(errorElement);
        errorMessagesContainer.style.display = 'block'; // Show error messages container
    }
    
});
