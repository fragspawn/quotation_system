<?php

function show_header($state_msg) {
?>
<html>
    <head>
        <title>Quote Admin - <?php echo $state_msg; ?></title>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <script src="./js/admin.js"></script>
    </head>
    <body>
        <header>
            <h1>Quote Admin</h1><h2><?php echo $state_msg; ?></h2>
        </header>
        <section>
<?php
}

function show_footer() {
?>
            </section>
            <footer>
                <h5>Debug goes here</h5>
                <?php echo '<p>GET: ' . var_dump($_GET) . '</p>'; ?>
                <?php echo '<p>POST: ' . var_dump($_POST) . '</p>'; ?>
                <?php echo '<p>SESSION: ' . var_dump($_SESSION) . '</p>'; ?>
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
        echo '<li><a href="index.php?state=logout" onClick="return confirm(\'are you sure\')">logout</a></li>';
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
            <input type="submit" name="submit" value="login" >
        </form>
    </fieldset>
<?php
}
function show_secure() {
?>
<p>Something goes here!</p>
<?php
}
function show_about() {
	echo 'This interface is not for the puclic';
}
function hidden_components() {
?>

    <fieldset>
        <main>Customer</main>
            <form id="edit_customer">
                <input type="hidden" name="cust_id" id="cust_id">
                <div>
                    <label>Full Name</label>
                    <input type="text" name="full_name" id="full_name">
                </div>
                <div>
                    <label>Phone</label>
                    <input type="text" name="phone" size="16" id="phone">
                </div>
                <div>
                    <label>E-Mail</label>
                    <input type="email" name="email" id="email">
                </div>
                <div>
                    <label>Address Line 1</label>
                    <input type="text" name="address_1" id="address_1">
                </div>
                <div>
                    <label>Address Line 2</label>
                    <input type="text" name="address_2" id="address_2">
                </div>
                <div>
                    <label>Suburb</label>
                    <input type="text" name="suburb" id="suburb">
                </div>
                <div>
                    <label>State</label>
                    <input type="text" name="state" size="3" id="state">
                </div>
                <div>
                    <label>Postcode</label>
                    <input type="number" name="postcode" size="4" id="postcode">
                </div>
                <div>
            </form>
        </main>
    </fieldset>

    <fieldset>
        <main>Line Item</main>
            <form id="line_items">
                <input type="hidden" name="line_item_id" id="line_item_id">
                <div>
                    <label>Line Item Title</label>
                    <input type="text" name="item_name" id="item_name">
                </div>
                <div>
                    <label>System Name</label>
                    <input type="text" name="system_name" id="system_name">
                </div>
                <div>
                    <label>Description</label>
                    <input type="text" name="description" id="description">
                </div>
                <div>
                    <label>Image Small</label>
                    <input type="text" name="image_small" id="image_small">
                </div>
                <div>
                    <label>Image Medium</label>
                    <input type="text" name="image_medium" id="image_medium">
                </div>
                <div>
                    <label>Image Large</label>
                    <input type="text" name="image_large" id="image_large">
                </div>
                <div>
                    <label>Units</label>
                    <input type="text" name= "units" id= "units">
                </div>
                <div>
                    <label>Unit Increment</label>
                    <input type="number" name="unit_increment" id="unit_increment">
                </div>
                <div>
                    <label>Unit Cost</label>
                    <input type="number" name="unit_cost" id="unit_cost">
                </div>
                <div>
                    <label>Units Small</label>
                    <input type="number" name="units_small">
                </div>
                <div>
                    <label>Units Medium</label>
                    <input type="number" name="units_medium">
                </div>
                <div>
                    <label>Units Large</label>
                    <input type="number" name="units_large" id="units_large">
                </div>
                <div>
                    <label>Units Min</label>
                    <input type="number" name="units_min" id="units_min">
                </div>
                <div>
                    <label>Units Max</label>
                    <input type="number" name="units_max" id="units_max"> 
                </div>
                <div>
                    <label>Enabled</label>
                    <input type="checkbox" name="enabled" id="enabled" checked> 
                </div>
            </form>
        </main>
    </fieldset>


    <fieldset>
        <main>Administrator</main>
            <form id="admins">
                <input type="hidden" name="user_id">
                <div>
                    <label>Username</label>
                    <input type="text" name="username" id="username">
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" name="password" value="foobarfoobar" id="password">
                </div>
                <div>
                    <label>Enabled</label>
                    <input type="checkbox" name="state" id="state" checked>
                </div>
            </form>
        </main>
    </fieldset>



<?php
} // end hidden Components

function show_line_items($items) {
    echo'<fieldset><main>Line Item</main>';
    foreach($items as $item) {
        echo '<div>';
        echo '<span><input type="checkbox" name="enable_line_item"';
        if($item['enabled'] == 1) { 
            echo ' checked>';
        } else {
            echo '>';
        }
        echo '</span>';


        echo '<span>' . $item['name'] . '</span><span>' . $item['units'] . '</span>';
        echo '<span><a href="index.php?state=edititem&item=' . $item['line_item_id'] . '">edit</a></span>';
        echo '<div>';
    }
    echo'</fieldset>';
}

function show_quotes($items) {
    echo'<fieldset><main>Line Item</main>';
    foreach($items as $item) {
        echo '<div>';
        echo '<span>' . $item['name'] . '</span><span>' . $item['quate_created'] . '</span>';
        echo '<span><a href="index.php?state=viewquote?item=' . $item['quote_id'] . '">detail</a></span>';
        echo '<div>';
    }
    echo'</fieldset>';
}

function show_admins($items) {
    echo'<fieldset><main>Line Item</main>';
    foreach($items as $item) {
        echo '<div>';
        echo '<span><input type="checkbox" name="enable_admin"';
        if($item['state'] == 1) { 
            echo ' checked>';
        } else {
            echo '>';
        }
        echo '</span>';
        echo '<span>' . $item['username'] . '</span><span>' . $item['password'] . '</span>';
        echo '<span><a href="index.php?state=editadmin?item=' .$item['user_id'] . '">edit</a></span>';
        echo '<div>';
    }
    echo'</fieldset>';
}




?>
