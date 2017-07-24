
<?php
/*
 * TODO
 * Write a register form that:
 * Takes an e-mail address, but onChange, checks to see if the e-mail pre-exists
 * Write a web service that check only for pual@pual.com
 * Password (twice): onChange checks to see if both passwords are the same
 * if recycled e-mail, give the user a 'recover e-mail' link
 * Ask for first name - blank is not acceptable
 * Ask for Last name - blank is not acceptable
 * Give a submit button if all the above are good (otherwise gray the submit button)
 *
 */

?>
<!doctype html>
<html>
    <head>
        <script
            src="https://code.jquery.com/jquery-3.1.1.js"
            integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
            crossorigin="anonymous"></script>
        <style>
            label {
                display: inline-block;
                width: 10em;
                text-align: right;
                padding-right: 1em;
            }
            input:invalid {
                background: pink; 
            }
        </style>
    </head>
    <script>
        function comparePass() {
            if(password1.value.length > 0 && password2.value.length > 0) {
                if(password1.value != password2.value) {
                    error.innerHTML = 'passwords don\'t match'; 
                    return false;
                } else {
                    error.innerHTML = ''; 
                    return true;
                }
            } else {
                return false;
            }
        }

        function checkEmail() {
            if(useremail.checkValidity() && useremail.value.length > 0) {
                var ret_res = $.post("reg_chk_email.php", $('#registration').serialize());
                    ret_res.done(function( data ) {
                        console.log(data);
                        if(data == 'true') {
                            error.innerHTML = 'email exists';
                            return false;
                        } else {
                            error.innerHTML = '';
                            return false;
                        }
                    });
            } else {
                return false;
            }
        }

        function enableSubmit() {
            err = false;
            if(checkEmail() == true) {
                err = true;
            }
            if(comparePass() == false) { 
                err = true;
            }
            if(firstname.checkValidity() && firstname.value.length > 0) {
                // nothing 
            } else {
               err = true;
            }
            if(lastname.checkValidity() && lastname.value.length > 0) {
                // nothing
            } else {
                err = true;
            }
            if(err == false) {
                submit.disabled = false;            
            }
        }
    </script>
    <body>
        <div id="error"></div>
        <fieldset>
            <legend>Registration Form</legend>
                <form id="registration">
                <div>
                    <label>First Name</label>
                    <input type="text" width="24" name="firstname" id="firstname" 
                        pattern="[A-Za-z]{2,32}" onChange="enableSubmit()">
                    <span></span>
                </div>
                <div>
                    <label>Last Name</label>
                    <input type="text" width="24" name="lastname" id="lastname" 
                        pattern="[A-Za-z]{2,32}" onChange="enableSubmit()">
                    <span></span>
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" width="32" name="useremail" id="useremail" 
                        onChange="enableSubmit()">
                    <span></span>
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" width="16" name="password1" id="password1" 
                        pattern="[A-Za-z0-9]{8,16}" onchange="enableSubmit()">
                    <span></span>
                </div>
                <div>
                    <label>Password Again</label>
                    <input type="password" width="16" name="password2" id="password2" 
                        pattern="[A-Za-z0-9]{8,16}" onchange="enableSubmit()">
                    <span></span>
                </div>
                <div>
                    <input type="submit" name="submit" value="submit" id="submit" 
                        disabled>
                </div>
                </form>
            </fieldset>
    </body>
</html>
