window.onload = function(){
    let formHandle = document.forms.form_checkout;

    let errorStart = document.getElementById("error-start")
    let error = document.getElementById("error")

    let errorContainer = document.getElementById("div-error")

    let structureEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    formHandle.onsubmit = processForm;

	function processForm(){
        
        let fname = formHandle.form_fname;
		let fnameValue = fname.value;

        let lname = formHandle.form_lname;
		let lnameValue = lname.value;

        let email = formHandle.form_email;
		let emailValue = email.value;

        let emailConfirm = formHandle.form_emailConfirm;
		let emailConfirmValue = emailConfirm.value;

        if(fnameValue === "" || lnameValue === "" || !structureEmail.test(emailValue) || !structureEmail.test(emailConfirmValue)){
            errorContainer.style.display = "flex"
            errorContainer.style.gap = "5px"
            errorStart.innerHTML = "***"
        }

        if(fnameValue === ""){
            fname.style.background= "red";
            lname.style.background= "white";
            email.style.background= "white";
            emailConfirm.style.background= "white";
            fname.focus()
            error.innerHTML = "Please provide your First Name"
            return false
        } 
        else if(lnameValue === ""){
            fname.style.background= "white";
            lname.style.background= "red";
            email.style.background= "white";
            emailConfirm.style.background= "white";
            lname.focus()
            error.innerHTML = "Please provide your Last Name"
            return false
        } 
        else if(!structureEmail.test(emailValue)){
            fname.style.background= "white";
            lname.style.background= "white";
            email.style.background= "red";
            emailConfirm.style.background= "white";
            email.focus()
            error.innerHTML = "Please provide a valid email address"
            return false
        } 
        else if(!structureEmail.test(emailConfirmValue)){
            fname.style.background= "white";
            lname.style.background= "white";
            email.style.background= "white";
            emailConfirm.style.background= "red";
            emailConfirm.focus()
            error.innerHTML = "Please provide a valid confirmation email address"
            return false
        } 
        else if(emailValue !== emailConfirmValue){
            error.innerHTML = "Both email address should be the same"
            return false
        }else{
            fname.style.background= "white";
            lname.style.background= "white";
            email.style.background= "white";
            emailConfirm.style.background= "white";
        }

    }
}