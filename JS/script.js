function validation()
{
    var username = document.forms["RegForm"]["username"];
    var email = document.forms["RegForm"]["EMail"];
    var password = document.forms["RegForm"]["Password"];
    var address = document.forms["RegForm"]["Address"];

    if (username.value == "")
    {
        window.alert("Please enter your name.");
        name.focus();
        return false;
    }

    if (address.value == "")
    {
        window.alert("Please enter your address.");
        name.focus();
        return false;
    }

    if (email.value == "")
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }

    if (email.value.indexOf("@", 0) < 0)
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }

    if (email.value.indexOf(".", 0) < 0)
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }



    if (password.value == "")
    {
        window.alert("Please enter your password");
        password.focus();
        return false;
    }
    if(password.length<6)
    {
      //alert("Password must be at least 6 characters long.");
      error++;
      document.getElementById('password_error').innerHTML ="Password must be at least 6 character long!";

    }
    if(password !=confirmPass)
    {
      error++;
      document.getElementById('password_error').innerHTML ="Password doesn't match to the previous one!";
    }
    if(error>0)
    {
      return false;
    }
    return true;

    if (what.selectedIndex < 1)
    {
        alert("Please enter your course.");
        what.focus();
        return false;
    }

    return true;
}



function myFunction() {
  var x = document.getElementById("msg");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
