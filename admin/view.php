<?php

function show_header() {
?>
<html>
    <head>
        <title>Quote System - Admin Panel</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script>    
            // remove get parameters from user view
            if(typeof window.history.pushState == 'function') {
                window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
            }
        </script>
    </head>
    <body>
        <header>
            <h1>Quote System - Admin Panel</h1>
        </header>

<?php
}

function show_footer() {
?>
        <footer>
            <h5>Debug goes here</h5>
        </footer>
    </body>
</html>
<?php
}

function show_menu($usr) {
?>
        <nav>
<?php
    if($usr == 'anon') {
        echo '- login - ';
    }
    if($usr == 'admin') {
        echo '- logout - ';
    }
?>
        </nav>
<?php
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