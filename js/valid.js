function validateLoginForm() {
    var email = document.forms["loginForm"]["idemail"].value;
    var pass = document.forms["loginForm"]["idpass"].value;
    if ((email == "") || (pass == "")) {
        alert("Please fill out your email/password");
        return false;
    }
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!re.test(String(email))) {
        alert("Please correct your email");
        return false;
    }
    setCookies(10);
}

function validateRegForm() {
    var name = document.forms["registerForm"]["idname"].value;
	var email = document.forms["registerForm"]["idemail"].value;
	var phone = document.forms["registerForm"]["idphone"].value;
	var pass = document.forms["registerForm"]["idpass"].value;
	var passb = document.forms["registerForm"]["idpassb"].value;
	
    if ((name == "") || (email == "")|| (phone == "")|| (pass == "")|| (passb == "")) {
        alert("Please fill in all required fields");
        return false;
	}
	
	else if ((pass != passb))
	{
        alert("Password is not matched with comfirm password");
        return false;
	}
	
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!re.test(String(email))) {
        alert("Please correct your email");
        return false;
	}
    var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
     if(phone.match(phoneno))
     {
	   return true;      
	 }
     else
     {
	   alert("Phone Number must be digits");
	   return false;
     }
}

function validateProForm() {
    var name = document.forms["profileForm"]["idname"].value;
	var email = document.forms["profileForm"]["idemail"].value;
	var phone = document.forms["profileForm"]["idphone"].value;
	
    if ((name == "") || (email == "")|| (phone == "")) {
        alert("Please fill in all required fields");
        return false;
	}
	
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!re.test(String(email))) {
        alert("Please correct your email");
        return false;
	}
    var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
     if(phone.match(phoneno))
     {
	   return true;      
	 }
     else
     {
	   alert("Phone Number must be digits");
	   return false;
     }
}

function setCookies(exdays) {
    var email = document.forms["loginForm"]["idemail"].value;
    var pass = document.forms["loginForm"]["idpass"].value;
    var rememberme = document.forms["loginForm"]["idremember"].checked;
    console.log(email, pass, rememberme);
    if (rememberme) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = "cusername=" + email + ";" + expires + ";path=/";
        document.cookie = "cpass=" + pass + ";" + expires + ";path=/";
        document.cookie = "rememberme=" + rememberme + ";" + expires + ";path=/";
    } else {
        document.cookie = "cusername=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;";
        document.cookie = "cpass=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/";
        document.cookie = "rememberme=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/";
    }
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function loadCookies() {
    var username = getCookie("cusername");
    var password = getCookie("cpass");
    var rememberme = getCookie("rememberme");
    console.log("COOKIES:" + username, password, rememberme);
    document.forms["loginForm"]["idemail"].value = username;
    document.forms["loginForm"]["idpass"].value = password;
    if (rememberme) {
        document.forms["loginForm"]["idremember"].checked = true;
    } else {
        document.forms["loginForm"]["idremember"].checked = false;
    }
}