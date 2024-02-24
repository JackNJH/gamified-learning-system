function showPassword(inputId, buttonId) {
    var inputField = document.getElementById(inputId);
    var showBtn = document.getElementById(buttonId);

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



