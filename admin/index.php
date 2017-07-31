<?php
session_start();

// Include external files
include('utility.php');
include('view.php');
include('model.php');

// Validate page control $_GET parameter
if(isset($_GET['state'])) {
    $state = util_validity_check($_GET['state'], '[a-z]{3,12}');
} else {
    $state = 'null';
}

// Do authentication Checks
if($state == 'loginprocessing') {
	if(isset($_POST['username']) && isset($_POST['password'])) {
		if(db_authenticate(util_validity_check($_POST['username'], '[a-zA-Z0-9]{8,16}'), 
    					   util_validity_check($_POST['password'], '[a-zA-Z0-9]{8,16}'))) {
        	$_SESSION['userstate'] = 'admin';
		} 
    }    
}

// Page Start
show_header($state);
if(isset($_SESSION['userstate'])) {
    // ANONYMOUS USER
    if($_SESSION['userstate'] == 'anonymous') {
        show_menu('anon');
        switch($state) {
            case 'login':
                show_login('nul');
                break;
            case 'about': 
                show_about();
				break;
            case 'loginprocessing': 
                show_login('bad');
                break;
            default:
                show_login('nul');
                break;
        }
    }
    // ADMIN USER
    if($_SESSION['userstate'] == 'admin') {
        show_menu('admin');
        switch($state) {
            case 'lineItems':
                $line_items = db_get_line_items();  // go to the database
                if($line_items != false) { // check we got something from the db
                    show_line_items($line_items); // show results
                } else {
                    echo 'err';
                }

                break;
            case 'quotations':
                $quote_items = db_get_quotation_list();
                if($quote_items != false) {
                    show_quotes($quote_items);
                } else {
                    echo 'err';
                }
                break;
            case 'admins':
                $admin_items = db_get_admin_list();
                if($admin_items != false) {
                    show_admins($admin_items);
                } else {
                    echo 'err';
                }
                break;
            case 'quoteItem':
                show_items();
                break;
            case 'lineItem':
                show_item($_GET['item']);
                break;
            case 'updateItem':
                update_item($_GET['item']);
                break;
            case 'enableItem':
                disable_item($_GET['item']);
                break;
            case 'disableItem':
                enable_item($_GET['item']);
                break;
            case 'logout':
                session_destroy();
                header('Location:index.php');
                break;
            default:
                show_secure();
                break;
        }
    }
// set a DEFAULT $_SESSION state
} else {
    $_SESSION['userstate'] = 'anonymous';
    show_login('nul');
}
show_footer();
// Page End
