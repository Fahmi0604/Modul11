function validation() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    if (email != "" && password != "") {
        return true;
    } else {
        alert('Email dan Password harus di isi !');
        return false;
    }
}
