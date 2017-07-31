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
		$res->bindParam(':name', $data_array['']);	
		$res->bindParam(':sysname',  $data_array['']);
		$res->bindParam(':desc',  $data_array['']);
		$res->bindParam(':is', $data_array['']);
		$res->bindParam(':im', $data_array['']);
		$res->bindParam(':il', $data_array['']);
		$res->bindParam(':units', $data_array['']);
		$res->bindParam(':inc', $data_array['']);
		$res->bindParam(':cost', $data_array['']);
		$res->bindParam(':unsm', $data_array['']);
		$res->bindParam(':unme', $data_array['']);
		$res->bindParam(':unlg', $data_array['']);
		$res->bindParam(':unmin', $data_array['']);
		$res->bindParam(':unmax', $data_array['']);
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
        units_max :unmax, 
        enabled = 1
    WHERE line_item_id` = :primarykey";

	try {
		$res = $conn->prepare($sql);
		$res->bindParam(':name', $data_array['']);	
		$res->bindParam(':sysname',  $data_array['']);
		$res->bindParam(':desc',  $data_array['']);
		$res->bindParam(':is', $data_array['']);
		$res->bindParam(':im', $data_array['']);
		$res->bindParam(':il', $data_array['']);
		$res->bindParam(':units', $data_array['']);
		$res->bindParam(':inc', $data_array['']);
		$res->bindParam(':cost', $data_array['']);
		$res->bindParam(':unsm', $data_array['']);
		$res->bindParam(':unme', $data_array['']);
		$res->bindParam(':unlg', $data_array['']);
		$res->bindParam(':unmin', $data_array['']);
		$res->bindParam(':unmax', $data_array['']);
		$res->bindParam(':primarykey', $key);
		$res->execute();
    } catch (PDOException  $e ) {
        $_SESSION['error'] = $e;
		return false;
	}
    
    return true; 
}

function db_disable_line_item($key) {
	$conn = db_object();
	if($conn == false) {
		return false;
	}

	$sql = "UPDATE line_item SET enabled = 1 WHERE line_item_id = :litid";

	try {
		$res = $conn->prepare($sql);
		$res->bindParam(':litid', $key);	
		$res->execute();
    } catch (PDOException  $e ) {
        $_SESSION['error'] = $e;
		return false;
	}
    
    return true; 
}

function db_enable_line_item($key) {
	$conn = db_object();
	if($conn == false) {
		return false;
	}

	$sql = "UPDATE line_item SET enabled = 0 WHERE line_item_id = :litid";

	try {
		$res = $conn->prepare($sql);
		$res->bindParam(':litid', $key);	
		$res->execute();
    } catch (PDOException  $e ) {
        $_SESSION['error'] = $e;
		return false;
	}

    return true; 
}

?>
