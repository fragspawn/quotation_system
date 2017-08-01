// remove get parameters from user view
//    if(typeof window.history.pushState == 'function') {
//        window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
//    }

    function showModal(funcCall, indexVal) {
        document.getElementById('modal_background').style.display = 'block';
        document.getElementById('modal').style.display = 'block';
        if(funcCall == 'edit_line_item') {
            document.getElementById('line_item').style.display = 'block';
            document.getElementById('editlineitem').style.display = 'inline';
            getSingleLineItem(indexVal);
        }
        if(funcCall == 'add_line_item') {
            document.getElementById('line_item').style.display = 'block';
            document.getElementById('addlineitem').style.display = 'inline';
        }
        if(funcCall == 'view_quote') {
            document.getElementById('edit_customer').style.display = 'block';
        }
        if(funcCall == 'view_cust') {
            document.getElementById('edit_customer').style.display = 'block';
        }
        if(funcCall == 'edit_admin') {
            document.getElementById('admin').style.display = 'block';
            document.getElementById('editadmin').style.display = 'inline';
            getSingleAdmin(indexVal);
        }
        if(funcCall == 'add_admin') {
            document.getElementById('admin').style.display = 'block';
            document.getElementById('addadmin').style.display = 'inline';
        }
    }

    function getSingleLineItem(keyVal) {
        $.ajax({
            url: 'ws.php?state=getLineItem&index=' + keyVal,
            method: 'GET',
            datatype: 'json',
            success: function(data) {
                console.log(data[0]);
            }
        });
    }

    function getSingleAdmin(keyVal) {
        $.ajax({
            url: 'ws.php?state=getAdmin&index=' + keyVal,
            method: 'GET',
            datatype: 'json',
            success: function(data) {
                console.log(data[0]);
            }
        });
    }

    function hideAllModals() {
        // screens
        document.getElementById('modal_background').style.display = 'none'; 
        document.getElementById('modal').style.display = 'none';
        document.getElementById('line_item').style.display = 'none';
        document.getElementById('edit_customer').style.display = 'none';
        document.getElementById('admin').style.display = 'none';
        
        // buttons
        document.getElementById('addlineitem').style.display = 'none';
        document.getElementById('editlineitem').style.display = 'none';
        document.getElementById('editadmin').style.display = 'none';
        document.getElementById('addadmin').style.display = 'none';
        
        // clear form values
        var fields = document.getElementsByTagName('input');
        for(var l = 0;l < fields.length; l++) {
            if(fields[l].type == 'text' || fields[l].type == 'number') {
                fields[l].value = '';
            }
        }
    }
    
    function updateLineItem(sendForm) {
        // do AJAX to commit update changes
    }
    
    function addLineItem(sendForm) {
        // do AJAX to commit new record
    }
    
    function updateAdmin(sendForm) {
        // do AJAX to commit update changes
    }
    
    function addAdmin(sendForm) {
        // do AJAX to commit new record
    }

    function validateForm(buttonPress) {
        // Give the WAITING MSG TO THE USER
        if(buttonPress.id == 'editlineitem') {
            updateLineItem(buttonPress.form);
        }
        if(buttonPress.id == 'addlineitem') {
            addLineItem(buttonPress.form);
        }
        if(buttonPress.id == 'editadmin') {
            updateAdmin(buttonPress.form);
        }
        if(buttonPress.id == 'addadmin') {
            addAdmin(buttonPress.form);
        }
    }
    
    function enableDisableLineItem(checkedItem) {
        var enabled;
        if(checkedItem.checked) {
            enabled = '1';
        } else {
            enabled = '0';
        }

        $.ajax({
            url: "ws.php?state=enableLineItem&index=" + checkedItem.value,
            method: 'POST',
            data: {'enabled': enabled },
            datatype: 'json',
            success: function(data){
 //               console.log(data);
            }
        });
    }
    
    function enableDisableAdmin(checkedItem) {
        var enabled;
        if(checkedItem.checked) {
            enabled = '1';
        } else {
            enabled = '0';
        }

        $.ajax({
            url: "ws.php?state=enableAdmin&index=" + checkedItem.value,
            method: 'POST',
            data: {'enabled': enabled },
            datatype: 'json',
            success: function(data){
//                console.log(data);
            }
        });
    }
