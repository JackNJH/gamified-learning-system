document.addEventListener('DOMContentLoaded', function () {
    const earnedBadges = document.querySelectorAll('.earned-badge');
    
    earnedBadges.forEach(badge => {
        badge.addEventListener('click', function () {
            const badgeID = this.getAttribute('data-badge-id');
            const slot = prompt("Enter slot (1, 2, or 3) to equip the badge:");
            
            if (slot !== null && (slot === '1' || slot === '2' || slot === '3')) {
                // Send AJAX request
                const xhr = new XMLHttpRequest();
                xhr.open('POST', '../modules/update_badge.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        // Handle response
                        console.log(xhr.responseText);
                        if (xhr.responseText === '<link rel="shortcut icon" type="image/png" href="../images/tabicon.png">success') { // Idk a workaround for this
                            alert("Badge equipped successfully.");
                            location.reload();
                        } else {
                            alert("Error equipping badge. Please try again.");
                        }
                    }
                };
                xhr.send(`badgeID=${badgeID}&slot=${slot}`);
            } else {
                alert("Invalid slot. Please enter 1, 2, or 3.");
            }
        });
    });
});

