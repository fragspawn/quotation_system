<?php
    // web service
    include('model.php');
    include('utility.php');

    header('Content-Type: application/json');
    if(isset($_GET)) {
        if(isset($_POST)) {

            $primary_key = util_validity_check($_GET['index'], '[0-9]');
            $get_state = util_validity_check($_GET['state'], '[A-Za-z]');

            switch($_GET['state']) {
                case 'enableLineItem':
                    $key_state = util_validity_check($_POST['enabled'], '[0-1]');
                    if(db_disable_line_item($primary_key, $key_state) == true) {
                        echo json_encode(array('state'=>'success'));
                    } else {
                        echo json_encode(array('state'=>'lineItemEnableErr'));
                    }
                    break;
                case 'enableAdmin':
                    $key_state = util_validity_check($_POST['enabled'], '[0-1]');
                    if(db_disable_admin($primary_key, $key_state) == true) {
                        echo json_encode(array('state'=>'success'));
                    } else {
                        echo json_encode(array('state'=>'adminEnableErr'));
                    }
                    break;
                case 'getAdmin':
                    $result = db_get_admin($primary_key);
                    if($result != false) {
                        echo json_encode($result);
                    } else {
                        echo json_encode(array('state'=>'getAdminErr'));
                    }
                    break;
                case 'addAdmin':
                    $formdata['username'] = util_validity_check($_POST['username'], '[A-Za-z0-9]');
                    $formdata['password'] = util_validity_check($_POST['password'], '[A-Za-z0-9]'); 
                    $result = db_add_admin($formdata);
                    if($result != false) {
                        echo json_encode(array('state'=>'success'));
                    } else {
                        echo json_encode(array('state'=>'addAdminErr'));
                    }
                    break;
                case 'updateAdmin':
                    $formdata['usern<F2><F2><F2><F2><F2>ame'] = util_validity_check($_POST['username'], '[A-Za-z0-9]');
                    $formdata['password'] = util_validity_check($_POST['password'], '[A-Za-z0-9]'); 
                    $result = db_update_admin($primary_key, $formdata);
                    if($result != false) {
                        echo json_encode(array('state'=>'success'));
                    } else {
                        echo json_encode(array('state'=>'updateAdminErr'));
                    }
                    break;
                case 'getLineItem':
                    $result = db_get_line_item($primary_key);
                    if($result != false) {
                        echo json_encode($result);
                    } else {
                        echo json_encode(array('state'=>'getLineItemErr'));
                    }
                    break;
                case 'addLineItem':
                    $formdata['item_name'] = util_validity_check($_POST['item_name'], '[A-Za-z0-9]');
                    $formdata['system_name'] = util_validity_check($_POST['system_name'], '[A-Za-z0-9]');
                    $formdata['description'] = util_validity_check($_POST['description'], '[A-Za-z0-9]');
                    $formdata['image_small'] = util_validity_check($_POST['image_small'], '[A-Za-z0-9]');
                    $formdata['image_medium'] = util_validity_check($_POST['image_medium'], '[A-Za-z0-9]');
                    $formdata['image_large'] = util_validity_check($_POST['image_large'], '[A-Za-z0-9]');
                    $formdata['units'] = util_validity_check($_POST['units'], '[A-Za-z0-9]');
                    $formdata['unit_increment'] = util_validity_check($_POST['unit_increment'], '[A-Za-z0-9]');
                    $formdata['unit_cost'] = util_validity_check($_POST['unit_cost'], '[A-Za-z0-9]');
                    $formdata['units_small'] = util_validity_check($_POST['units_small'], '[A-Za-z0-9]');
                    $formdata['units_medium'] = util_validity_check($_POST['units_medium'], '[A-Za-z0-9]');
                    $formdata['units_large'] = util_validity_check($_POST['units_large'], '[A-Za-z0-9]');
                    $formdata['units_min'] = util_validity_check($_POST['units_min'], '[A-Za-z0-9]');
                    $formdata['units_max'] = util_validity_check($_POST['units_max'], '[A-Za-z0-9]');
                    $result = db_insert_line_item($formdata);
                    if($result != false) {
                        echo json_encode(array('state'=>'success'));
                    } else {
                        echo json_encode(array('state'=>'addLineItemErr'));
                    }
                    break;
                case 'updateLineItem':
                    $post_primary_key = util_validity_check($_POST['line_item_id'], '[0-9]');
                    $formdata['item_name'] = util_validity_check($_POST['item_name'], '[A-Za-z0-9]');
                    $formdata['system_name'] = util_validity_check($_POST['system_name'], '[A-Za-z0-9]');
                    $formdata['description'] = util_validity_check($_POST['description'], '[A-Za-z0-9]');
                    $formdata['image_small'] = util_validity_check($_POST['image_small'], '[A-Za-z0-9]');
                    $formdata['image_medium'] = util_validity_check($_POST['image_medium'], '[A-Za-z0-9]');
                    $formdata['image_large'] = util_validity_check($_POST['image_large'], '[A-Za-z0-9]');
                    $formdata['units'] = util_validity_check($_POST['units'], '[A-Za-z0-9]');
                    $formdata['unit_increment'] = util_validity_check($_POST['unit_increment'], '[A-Za-z0-9]');
                    $formdata['unit_cost'] = util_validity_check($_POST['unit_cost'], '[A-Za-z0-9]');
                    $formdata['units_small'] = util_validity_check($_POST['units_small'], '[A-Za-z0-9]');
                    $formdata['units_medium'] = util_validity_check($_POST['units_medium'], '[A-Za-z0-9]');
                    $formdata['units_large'] = util_validity_check($_POST['units_large'], '[A-Za-z0-9]');
                    $formdata['units_min'] = util_validity_check($_POST['units_min'], '[A-Za-z0-9]');
                    $formdata['units_max'] = util_validity_check($_POST['units_max'], '[A-Za-z0-9]');
                    $result = db_update_line_item($post_primary_key, $formdata); 
                    if($result != false) {
                        echo json_encode(array('state'=>'success'));
                    } else {
                        echo json_encode(array('state'=>'updateLineItemErr'));
                    }
                    break;
                case 'getCustomer':
                    $result = db_get_customer($primary_key);
                    if($result != false) {
                        echo json_encode($result);
                    } else {
                        echo json_encode(array('state'=>'getAdminErr'));
                    }
                    break;
                case 'getQuote':
                    echo json_encode(array('state'=>'success'));
                    break;
                default:
                    echo json_encode(array('state'=>'err'));
                    break;
            }
        }
    }
?>
