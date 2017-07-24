<?php
/* TODO 
 * 1. Create a Form with username & password
 * 2. Submit form to a processing page that checks that user is 'bob' pass: 'brown'
 * 3. If true redirect to a secure page with a logout button
 * 4. If Bad return to login form and display an error
 */
session_start();

if(isset($_GET['state'])) {
    if($_GET['state'] == 'loginpage') {
        show_login('');
    }
    if($_GET['state'] == 'logout') {
        session_destroy();
        show_login('logout');
    }
    if($_GET['state'] == 'secure') {
        if($_SESSION['loggedin'] == true) {
            show_secure();
        } else {
            show_login('admin');
        }
    }
    if($_GET['state'] == 'loginprocessing') {
        if($_POST['username'] == 'bob' && $_POST['password'] == 'brown') {
            $_SESSION['loggedin'] = true;
            show_secure();
        } else {
            show_login('bad');
        }
    }
} else {
    // login.php
    show_login('');
}
function show_login($msg) {
    if($msg == 'bad') {
        echo 'you done gone goofed';
    }
    if($msg == 'logout') {
        echo 'you done gone loggedout';
    }
    if($msg == 'admin') {
        echo 'you gone done accessed an admin page';
    }

?>
<html>
    <form action="index.php?state=loginprocessing" method="POST">
        <label>User Name</label>
        <input type="text" name="username">
        <label>Password</label>
        <input type="password" name="password">
        <input type="submit" name="submit" value="login">
    </form>
</html>
<?php
}

function show_secure() {
?>
<html>
    <form action="index.php?state=logout" method="post">
        <input type="submit" name="submit" value="logout">
    </form>
</html>
<?php
}
?>
