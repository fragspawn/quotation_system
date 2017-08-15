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
                line_item_id.value = data[0]['line_item_id'];
                item_name.value = data[0]['name'];
                system_name.value = data[0]['system_name'];
                description.value = data[0]['description'];
                image_small.value = data[0]['image_small'];
                image_medium.value = data[0]['image_medium'];
                image_large.value = data[0]['image_large'];
                units.value = data[0]['units'];
                unit_increment.value = data[0]['unit_increment'];
                unit_cost.value = data[0]['unit_cost'];
                units_small.value = data[0]['units_small'];
                units_medium.value = data[0]['units_medium'];
                units_large.value = data[0]['units_large'];
                units_min.value = data[0]['units_min'];
                units_max.value = data[0]['units_max'];
            }
        });
    }

    function getSingleAdmin(keyVal) {
        $.ajax({
            url: 'ws.php?state=getAdmin&index=' + keyVal,
            method: 'GET',
            datatype: 'json',
            success: function(data) {
                user_id.value = data[0]['user_id'];
                username.value = data[0]['username']; 
                password.value = data[0]['password'];
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
            if(fields[l].type == 'text' || fields[l].type == 'number' || fields[l].type == 'password') {
                fields[l].value = '';
            }
        }
    }
    
    function updateLineItem(sendForm) {
        // do AJAX to commit update changes
        $.ajax({
            url: "ws.php?state=updateLineItem&index=" + line_item_id.value,
            method: 'POST',
            data: $('#line_item_form').serialize(),
            datatype: 'json',
            success: function(data){
                console.log(data);
                hideAllModals();
            }
        });
    }
    
    function addLineItem(sendForm) {
        // do AJAX to commit new record
        $.ajax({
            url: "ws.php?state=addLineItem",
            method: 'POST',
            data: $('#line_item_form').serialize(),
            datatype: 'json',
            success: function(data){
                console.log(data);
                hideAllModals();
            }
        });
    }
    
    function updateAdmin(sendForm) {
        // do AJAX to commit update changes
        $.ajax({
            url: "ws.php?state=updateAdmin&index=" + user_id.value,
            method: 'POST',
            data: $('#admin_form').serialize(),
            datatype: 'json',
            success: function(data){
                console.log(data);
                hideAllModals();
            }
        });

    }
    
    function addAdmin(sendForm) {
        // do AJAX to commit new record
        $.ajax({
            url: "ws.php?state=addAdmin",
            method: 'POST',
            data: $('#admin_form').serialize(),
            datatype: 'json',
            success: function(data){
                console.log(data);
                hideAllModals();
            }
        });

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
