<?php

function show_header($state_msg) {
?>
<html>
    <head>
        <title>Quote Admin - <?php echo $state_msg; ?></title>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <script src="./js/admin.js"></script>
        <script
            src="https://code.jquery.com/jquery-3.1.1.js"
            integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
            crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <h1>Quote Admin</h1><h2><?php echo $state_msg; ?></h2>
        </header>
        <section>
<?php
} // End Header

function show_footer() {
?>
            </section> <!-- end content -->
            <footer>
                <h5>Debug goes here</h5>
                <?php echo '<p>GET: ' . var_dump($_GET) . '</p>'; ?>
                <?php echo '<p>POST: ' . var_dump($_POST) . '</p>'; ?>
                <?php echo '<p>SESSION: ' . var_dump($_SESSION) . '</p>'; ?>
                <?php 
                    if(isset($_SESSION['error'])) {
                        echo '### ' . $_SESSION['error'] . ' ###';
                        unset($_SESSION['error']);
                    }
                ?>
            </footer> <!-- end footer -->
        </aside>
    </body>
</html>
<?php
} // End Footer

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
        </nav> <!-- end menu -->
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

function show_about() {
	echo 'This interface is not for the puclic';
}

function hidden_components() {
?>
<div id="modal_background"></div>
    <aside id="modal">
        <fieldset id="edit_customer">
            <main>Customer</main>
                <form>
                    <input type="hidden" name="cust_id" id="cust_id">
                    <div>
                        <label>Full Name</label>
                        <input type="text" name="full_name" id="full_name" disabled>
                    </div>
                    <div>
                        <label>Phone</label>
                        <input type="text" name="phone" size="16" id="phone" disabled>
                    </div>
                    <div>
                        <label>E-Mail</label>
                        <input type="email" name="email" id="email" disabled>
                    </div>
                    <div>
                        <label>Address Line 1</label>
                        <input type="text" name="address_1" id="address_1" disabled>
                    </div>
                    <div>
                        <label>Address Line 2</label>
                        <input type="text" name="address_2" id="address_2" disabled>
                    </div>
                    <div>
                        <label>Suburb</label>
                        <input type="text" name="suburb" id="suburb" disabled>
                    </div>
                    <div>
                        <label>State</label>
                        <input type="text" name="state" size="3" id="state" disabled>
                    </div>
                    <div>
                        <label>Postcode</label>
                        <input type="number" name="postcode" size="4" id="postcode" disabled>
                    </div>
                    <div>
                        <input type="button" value="cancel" onClick="hideAllModals()">
                    </div>                           
                </form>
            </main>
        </fieldset>

        <fieldset id="line_item">
            <main>Line Item</main>
                <form id="line_item_form">
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
                        <input type="number" name="units_small" id="units_small">
                    </div>
                    <div>
                        <label>Units Medium</label>
                        <input type="number" name="units_medium" id="units_medium">
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
                    <div>
                        <input type="button" value="edit" class="addedit" id="editlineitem" onClick="validateForm(this)">
                        <input type="button" value="add" class="addedit" id="addlineitem" onClick="validateForm(this)">
                        <input type="button" value="cancel" onClick="hideAllModals()">
                    </div>   
                </form>
            </main>
        </fieldset>


        <fieldset id="admin">
            <main>Administrator</main>
                <form id="admin_form">
                    <input type="hidden" name="user_id" id="user_id">
                    <div>
                        <label>Username</label>
                        <input type="text" name="username" id="username">
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" name="password" placeholder="New Password" id="password">
                    </div>
                    <div>
                        <label>Enabled</label>
                        <input type="checkbox" name="state" id="state" checked>
                    </div>
                    <div>
                        <input type="button" value="edit" class="addedit" id="editadmin" onClick="validateForm(this)">
                        <input type="button" value="add" class="addedit" id="addadmin" onClick="validateForm(this)">
                        <input type="button" value="cancel" onClick="hideAllModals()">
                    </div>   
                </form>
            </main>
        </fieldset>
    </aside> <!-- end modals -->
<?php
} // end hidden Components
function show_line_items($items) {
    echo'<fieldset><main>Line Items <a href="#" onClick="showModal(\'add_line_item\', 0)">(add)</a></main>';
    foreach($items as $item) {
        echo '<div>';
        echo '<span><input type="checkbox" name="enable_line_item" onClick="enableDisableLineItem(this)" value ="' . $item['line_item_id'] . '"';
        if($item['enabled'] == 1) { 
            echo ' checked>';
        } else {
            echo '>';
        }
        echo '</span>';
        echo '<span>' . $item['name'] . '</span><span>' . $item['units'] . '</span>';
        echo '<span><a href="#" onClick="showModal(\'edit_line_item\', ' . $item['line_item_id'] . ')">edit</a></span>';
        echo '</div>';
    }
    echo'</fieldset>';
}

function show_quotes($items) {
    echo'<fieldset><main>Quote Items</main>';
    foreach($items as $item) {
        echo '<div>';
        echo '<span>' . $item['name'] . '</span><span>' . number_format($item['total_cost'], 2, '.', ',') . '</span>';
        echo '<span><a href="#" onClick="showModal(\'view_quote\', ' . $item['quote_id'] . ')">quote detail</a></span>';
        echo '<span><a href="#" onClick="showModal(\'view_cust\', ' . $item['cust_id'] . ')">cust detail</a></span>';
        echo '</div>';
    }
    echo'</fieldset>';
}

function show_admins($items) {
    echo'<fieldset><main>Admins <a href="#" onClick="showModal(\'add_admin\', 0)">(add)</a></main>';
    foreach($items as $item) {
        echo '<div>';
        echo '<span><input type="checkbox" name="enable_admin" onClick="enableDisableAdmin(this)" value="' . $item['user_id'] . '"';
        if($item['state'] == 1) { 
            echo ' checked>';
        } else {
            echo '>';
        }
        echo '</span>';
        echo '<span>' . $item['username'] . '</span>';
        echo '<span><a href="#" onClick="showModal(\'edit_admin\', ' . $item['user_id'] . ')">edit</a></span>';
        echo '</div>';
    }
    echo'</fieldset>';
}

function show_secure() {
    // don't know what to do here...
}
?>
