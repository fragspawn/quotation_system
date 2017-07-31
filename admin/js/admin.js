// remove get parameters from user view
//    if(typeof window.history.pushState == 'function') {
//        window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
//    }
//
//
    function showModal($func, $index) {
        document.getElementById('modal_background').style.dispay = 'block';
        document.getElementById('modal').style.dispay = 'block';
        if($func == 'edit_line_item') {
            document.getElementById('line_item').style.dispay = 'block';
        }
        if($func == 'view_quote') {
            document.getElementById('edit_customer').style.dispay = 'block';
        }
        if($func == 'edit_admin') {
            document.getElementById('admin').style.dispay = 'block';
        }
        if($func == 'add_line_item') {
            document.getElementById('line_item').style.dispay = 'block';
        }
        if($func == 'add_admin') {
            document.getElementById('admin').style.dispay = 'block';
        }
    }

    function hideAllModals() {
        document.getElementById('modal_background').style.dispay = 'none'; 
        document.getElementById('modal').style.dispay = 'none';
        document.getElementById('line_item').style.dispay = 'none';
        document.getElementById('edit_customer').style.dispay = 'none';
        document.getElementById('admin').style.dispay = 'none';
    }
