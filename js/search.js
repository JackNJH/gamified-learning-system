function searchFunction(contentType) {

    var input = document.getElementById('user-content-search-input').value.toUpperCase();
    var rows = document.querySelectorAll('#user-content table tbody tr');

    // Loop through all table rows
    for (var i = 0; i < rows.length; i++) {
        var username = rows[i].querySelector('.username-label').textContent.toUpperCase();
        var userType = rows[i].querySelector('.user-type').textContent.toUpperCase();
        var userID = rows[i].querySelector('.other-data').textContent.toUpperCase();
        
        // Hide the row if any of the fields doesn't match the search query
        if (username.indexOf(input) > -1 || userType.indexOf(input) > -1 || userID.indexOf(input) > -1) {
            rows[i].style.display = '';
        } else {
            rows[i].style.display = 'none';
        }
    }
}

