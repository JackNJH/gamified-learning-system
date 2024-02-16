function showPassword(button) {
    var inputField;
    var showBtn = document.getElementById(button);

    if (button === "show-password") {
        inputField = document.getElementById("password");
    } else if (button === "confirm-password") {
        inputField = document.getElementById("cpassword");
    }

    if (inputField.type === "password") {
        inputField.type = "text";
        showBtn.src = "../images/hidepw.png";
        showBtn.title = "Click to hide password";
    } else {
        inputField.type = "password";
        showBtn.src = "../images/showpw.png";
        showBtn.title = "Click to show password";
    }
}


