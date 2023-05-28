function ValidateEmail(mail){
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(signUpForm.txtEmail.value)){
        return true;
    } else {
        alert("You have entered an invalid email address!");
        return false;
    }
}