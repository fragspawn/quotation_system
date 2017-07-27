<?php

function show_header($state_msg) {
?>
<html>
    <head>
        <title>Quote Admin - <?php echo $state_msg; ?></title>
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
            <h1>Quote Admin</h1><h2><?php echo $state_msg; ?></h2>
        </header>
        <aside>
<?php
}

function show_footer() {
?>
            </section>
            <footer>
                <h5>Debug goes here<br/></h5>
                <?php echo print_r($_GET) . '<br/>'; ?>
                <?php echo print_r($_POST) . '<br/>'; ?>
                <?php echo print_r($_SESSION) . '<br/>'; ?>
                <?php 
                    if(isset($_SESSION['error'])) {
                        unset($_SESSION['error']);
                    }
                ?>
            </footer>
        </aside>
    </body>
</html>
<?php
}

function show_menu($usr) {
?>
        <nav>
			<ul>
<?php
    if($usr == 'anon') {
        echo '<li><a href="index.php?state=login">login</a></li>';
		echo '<li><a href="index.php?state=about">about</a></li>';
    }
    if($usr == 'admin') {
        echo '<li><a href="index.php?state=lineItems">Line Items</a></li>';
        echo '<li><a href="index.php?state=quotations">Quotations</a></li>';
        echo '<li><a href="index.php?state=admins">Admins</a></li>';
        echo '<li><a href="index.php?state=logout">logout</a></li>';
    }
?>
			</ul>
        </nav>
		<section>
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
    <fieldset>
        <main>Login</main>
        <form action="index.php?state=loginprocessing" method="POST">
            <div>
                <label>User Name</label>
                <input type="text" name="username">
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <input type="submit" name="submit" value="login">
        </form>
    </fieldset>
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
function show_about() {
	echo 'This interface is not for the puclic';
}
?>
