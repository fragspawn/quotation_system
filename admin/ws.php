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
                case 'getLineItem':
                    $result = db_get_line_item($primary_key);
                    if($result != false) {
                        echo json_encode($result);
                    } else {
                        echo json_encode(array('state'=>'getLineItemErr'));
                    }
                    break;
                default:
                    echo json_encode(array('state'=>'err'));
                    break;
            }
        }
    }
?>
