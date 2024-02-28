function clearBadges() {
    if (confirm("Are you sure you want to clear all selected badges?")) {

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../modules/clear_badge.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                // Handle response
                console.log(xhr.responseText);
                if (xhr.responseText === '<link rel="shortcut icon" type="image/png" href="../images/tabicon.png">success') { // Idk a workaround for this
                    alert("Cleared!");
                    location.reload();
                } else {
                    alert("Error clearing badges. Please try again.");
                }
            }
        };
        xhr.send();
    }
}