<?php

function db_object() {
	try {
    	$db = new PDO("mysql:host=localhost;dbname=quotesys;charset=utf8","root","");
    	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException  $e ) {
        $_SESSION['error'] = $e;
		return false;
    }
	return $db;
}

function db_authenticate($u, $p) {
	$conn = db_object();
	if($conn == false) {
		return false;
	}

    $encrypted_p = encrypt_password($p);

	$sql = "SELECT * FROM ACL WHERE username = :username AND password = :password AND state = 1";

	try {
		$res = $conn->prepare($sql);
		$res->bindParam(':username', $u);	
		$res->bindParam(':password', $encrypted_p);	
		$res->execute();
    } catch (PDOException  $e ) {
        $_SESSION['error'] = $e;
		return false;
	}

	if($res->rowCount() == 1) {
		return true;
	} else {
		return false;
	}
}

function db_get_admin_list() {
    $conn = db_object();
	if($conn == false) {
		return false;
	}

	$sql = "SELECT * FROM ACL";

	try {
		$res = $conn->prepare($sql);
		$res->execute();
    } catch (PDOException  $e ) {
        $_SESSION['error'] = $e;
		return false;
	}
    return $res->fetchAll(PDO::FETCH_ASSOC);	
}

function db_get_admin($key) {
    $conn = db_object();
	if($conn == false) {
		return false;
	}

	$sql = "SELECT * FROM ACL WHERE user_id = :uid";

	try {
		$res = $conn->prepare($sql);
		$res->bindParam(':uid', $key);	
		$res->execute();
    } catch (PDOException  $e ) {
        $_SESSION['error'] = $e;
		return false;
	}
    return $res->fetchAll(PDO::FETCH_ASSOC);	
}

function db_add_admin($formsubmit) {
	$conn = db_object();
	if($conn == false) {
		return false;
	}

    $sql = "INSERT INTO ACL (username, password, state) VALUES (:username, :password, '1')";
    try {
        $res = $conn->prepare($sql);
        $res->bindParam(':username', $formsubmit['username']);
        $res->bindParam(':password',  $formsubmit['password']);
        $res->execute();
    } catch (PDOException  $e ) {
        $_SESSION['error'] .= $e;
        return false;
    }

    return true;
}

function db_update_admin($key, $formdata) {
	$conn = db_object();
	if($conn == false) {
		return false;
	}

    $sql = "UPDATE ACL SET username = :username, password = :password, state = '1' WHERE user_id = :userid";

    try {
        $res = $conn->prepare($sql);
        $res->bindParam(':username', $formdata['username']);
        $res->bindParam(':password',  $formdata['password']);
        $res->bindParam(':userid',  $key);
        $res->execute();
    } catch (PDOException  $e ) {
        $_SESSION['error'] = $e;
        return false;
    }

    return true;
}

function db_get_quotation_list() {
	$conn = db_object();
	if($conn == false) {
		return false;
	}

	$sql = "SELECT * FROM quotation, customer WHERE quotation.quote_cust_id = customer.cust_id ORDER BY quate_created";

	try {
		$res = $conn->prepare($sql);
		$res->execute();
    } catch (PDOException  $e ) {
        $_SESSION['error'] = $e;
		return false;
	}
    return $res->fetchAll(PDO::FETCH_ASSOC);
}

function db_get_quotation($key) {
	$conn = db_object();
	if($conn == false) {
		return false;
	}

	$sql = "SELECT * FROM quotation WHERE quote_qote_id = :quoid";

	try {
		$res = $conn->prepare($sql);
		$res->bindParam(':quoid', $key);	
		$res->execute();
    } catch (PDOException  $e ) {
        $_SESSION['error'] = $e;
		return false;
	}
    return $res->fetchAll(PDO::FETCH_ASSOC);
}

function db_get_line_items() {
	$conn = db_object();
	if($conn == false) {
		return false;
	}

	$sql = "SELECT * FROM line_item";

	try {
		$res = $conn->prepare($sql);
		$res->execute();
    } catch (PDOException  $e ) {
        $_SESSION['error'] = $e;
		return false;
	}
    return $res->fetchAll(PDO::FETCH_ASSOC);
}

function db_get_line_item($key) {
	$conn = db_object();
	if($conn == false) {
		return false;
	}

	$sql = "SELECT * FROM line_item WHERE line_item_id = :litid";
    
	try {
		$res = $conn->prepare($sql);
		$res->bindParam(':litid', $key);	
		$res->execute();
    } catch (PDOException  $e ) {
        $_SESSION['error'] = $e;
		return false;
	}
    return $res->fetchAll(PDO::FETCH_ASSOC);
}

function db_insert_line_item($data_array) {
	$conn = db_object();
	if($conn == false) {
		return false;
	}

    $sql = "INSERT INTO line_item (name, system_name, description, image_small, image_medium, image_large, units, unit_increment, unit_cost, units_small, units_medium, units_large, units_min, units_max, enabled) 
            VALUES (:name, :sysname, :desc, :is, :im, :il, :units, :inc, :cost, :unsm, :unme, :unlg, :unmin, :unmax, 1)";

	try {
		$res = $conn->prepare($sql);
		$res->bindParam(':name', $data_array['item_name']);	
		$res->bindParam(':sysname',  $data_array['system_name']);
		$res->bindParam(':desc',  $data_array['description']);
		$res->bindParam(':is', $data_array['image_small']);
		$res->bindParam(':im', $data_array['image_medium']);
		$res->bindParam(':il', $data_array['image_large']);
		$res->bindParam(':units', $data_array['units']);
		$res->bindParam(':inc', $data_array['unit_increment']);
		$res->bindParam(':cost', $data_array['unit_cost']);
		$res->bindParam(':unsm', $data_array['units_small']);
		$res->bindParam(':unme', $data_array['units_medium']);
		$res->bindParam(':unlg', $data_array['units_large']);
		$res->bindParam(':unmin', $data_array['units_min']);
		$res->bindParam(':unmax', $data_array['units_max']);
		$res->execute();
    } catch (PDOException  $e ) {
        $_SESSION['error'] = $e;
		return false;
	}
    
    return true; 
}

function db_update_line_item($key, $data_array) {
	$conn = db_object();
	if($conn == false) {
		return false;
	}
    $sql = "UPDATE line_item SET 
        name = :name, 
        system_name = :sysname,
        description = :desc, 
        image_small = :is,
        image_medium = :im,
        image_large = :il, 
        units = :units, 
        unit_increment = :inc, 
        unit_cost = :cost, 
        units_small = :unsm, 
        units_medium = :unme, 
        units_large = :unlg, 
        units_min = :unmin, 
        units_max = :unmax, 
        enabled = 1
    WHERE line_item_id = :primarykey";

	try {
		$res = $conn->prepare($sql);
		$res->bindParam(':name', $data_array['item_name']);	
		$res->bindParam(':sysname',  $data_array['system_name']);
		$res->bindParam(':desc',  $data_array['description']);
		$res->bindParam(':is', $data_array['image_small']);
		$res->bindParam(':im', $data_array['image_medium']);
		$res->bindParam(':il', $data_array['image_large']);
		$res->bindParam(':units', $data_array['units']);
		$res->bindParam(':inc', $data_array['unit_increment']);
		$res->bindParam(':cost', $data_array['unit_cost']);
		$res->bindParam(':unsm', $data_array['units_small']);
		$res->bindParam(':unme', $data_array['units_medium']);
		$res->bindParam(':unlg', $data_array['units_large']);
		$res->bindParam(':unmin', $data_array['units_min']);
		$res->bindParam(':unmax', $data_array['units_max']);
		$res->bindParam(':primarykey', $key, PDO::PARAM_INT);
		$res->execute();
    } catch (PDOException  $e ) {
        $_SESSION['error'] = $e;
echo $e; die();
		return false;
	}
    return true; 
}

function db_disable_line_item($key, $state) {
	$conn = db_object();
	if($conn == false) {
		return false;
	}

	$sql = "UPDATE line_item SET enabled = :state  WHERE line_item_id = :id";

	try {
		$res = $conn->prepare($sql);
		$res->bindParam(':state', $state);
		$res->bindParam(':id', $key);	
		$res->execute();
    } catch (PDOException  $e ) {
        $_SESSION['error'] = $e;
		return false;
	}
    return true; 
}

function db_disable_admin($key, $state) {
	$conn = db_object();
	if($conn == false) {
		return false;
	}

	$sql = "UPDATE ACL SET state = :state  WHERE user_id = :id";

	try {
		$res = $conn->prepare($sql);
		$res->bindParam(':state', $state);
		$res->bindParam(':id', $key);	
		$res->execute();
    } catch (PDOException  $e ) {
        $_SESSION['error'] = $e;
		return false;
	}
    return true; 
}

function db_get_customer($key) {
    $conn = db_object();
    if($conn == false) {
        return false;
    }

    $sql = "SELECT * FROM customer WHERE cust_id = :custid";

    try {
        $res = $conn->prepare($sql);
        $res->bindParam(':custid', $key);
        $res->execute();
    } catch (PDOException  $e ) {
        $_SESSION['error'] = $e;
        return false;
    }
    return $res->fetchAll(PDO::FETCH_ASSOC);
}


?>
