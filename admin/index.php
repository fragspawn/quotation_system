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
    if(util_validity_check($_POST['username'], '[a-zA-Z0-9]{8,16}') == 'bob' && 
       util_validity_check($_POST['password'], '[a-zA-Z0-9]{8,16}') == 'brown') {
        $_SESSION['userstate'] = 'admin';
    }    
}

// Page Start
show_header();
if(isset($_SESSION['userstate'])) {
    // ANONYMOUS USER
    if($_SESSION['userstate'] == 'anonymous') {
        show_menu('anon');
        switch($state) {
            case 'login':
                show_login('nul');
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
            case 'secure':
                show_secure();
                break;
            case 'quotelist':
                show_quotes();
                break;
            case 'quoteitem':
                show_qote_item($_GET['qitem']);
                break;
            case 'itemlist':
                show_items();
                break;
            case 'lineitem':
                show_item($_GET['item']);
                break;
            case 'updateitem':
                update_item($_GET['item']);
                break;
            case 'enableitem':
                disable_item($_GET['item']);
                break;
            case 'disableitem':
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