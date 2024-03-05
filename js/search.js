function searchFunction(contentType) {

    var input = document.getElementById(contentType + '-content-search-input').value.toUpperCase();
    var rows = document.querySelectorAll('#' + contentType + '-content table tbody tr');

    // Loop through all table rows
    for (var i = 0; i < rows.length; i++) {
        var className = rows[i].querySelector('.class-name-label');
        var teacherName = rows[i].querySelector('.other-class-data');
        var difficulty = rows[i].querySelector('.class-difficulty');

        var searchText = "";
        if (contentType === 'user') {
            var username = rows[i].querySelector('.username-label');
            var userType = rows[i].querySelector('.user-type');
            var userID = rows[i].querySelector('.other-data');
            searchText = username.textContent.toUpperCase() + " " + userType.textContent.toUpperCase() + " " + userID.textContent.toUpperCase();
        } else if (contentType === 'class') {
            searchText = className.textContent.toUpperCase() + " " + teacherName.textContent.toUpperCase() + " " + difficulty.textContent.toUpperCase();
        }

        if (searchText.indexOf(input) > -1) {
            rows[i].style.display = '';
        } else {
            rows[i].style.display = 'none';
        }
    }
}

