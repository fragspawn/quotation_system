<?php

function db_object() {
	try {
    	$db = new PDO("mysql:host=localhost;dbname=quotesys;charset=utf8","admin","");
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

	$sql = "SELECT * FROM ACL WHERE username = :username AND password = :password";
	try {
		$res = $conn->prepare($sql);
		$res->bindParam(':username', $u);	
		$res->bindParam(':password', $p);	
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
function db_get_quotation_list() {
}

function db_get_quotation($key) {
}

function db_get_line_items() {
}

function db_get_line_item($key) {
}

function db_update_line_item($key, $data_array) {
}

function db_disable_line_item($key) {
}

function db_enable_line_item($key) {
}

?>
