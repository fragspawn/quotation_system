<?php
    function db_object() {
        try {
            $db = new PDO("mysql:host=localhost;dbname=quotesys;charset=utf8","root","");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException  $e ) {
            echo $e;
            die();
        }
        return $db;
    }

    $db = db_object();
    try {
        $sql = "SELECT * FROM line_item";
        $sth = $db->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException  $e ) {
        echo $e;
        die();
    }
    
    header('Content-Type: application/json');
    echo json_encode($result);    


// To incorporate into WS:

    function insert_quotation() {
        $conn = db_object();
        $sql = "INSERT INTO customer (name, phone, email, address_1, address_2, suburb, state, postcode, session_id) VALUES ('asdf', '1234', 'asdf@asdf.com', '11 asdf st', 'asdf', 'asdf', 'qld', '4000', '01293u54lkno0135kjsf0u');";

        try {
            $res = $conn->prepare($sql);
            $res->execute();
            $user_key = $conn->lastInsertId(); 
        } catch (PDOException  $e ) {
            echo $e;
            die();
        }

        $sql2 = "INSERT INTO quotation (quote_cust_id, total_cost) VALUES (:foregin_key , '69.99');";

        try {
            $res = $conn->prepare($sql2);
            $res->bindParam(':foregin_key', $user_key);
            $res->execute();
            $quote_key = $conn->lastInsertId(); 
        } catch (PDOException  $e ) {
            echo $e;
            die();
        }

        $sql3 = "INSERT INTO quote_lines (quote_qote_id, quote_item_id) VALUES (:quotation_key, :line_item);";

        try {
            $res = $conn->prepare($sql3);
            $res->bindParam(':quotation_key', $quote_key);
            $line_item_ex = 6;
            $res->bindParam(':line_item', $line_item_ex);
            $res->execute();
        } catch (PDOException  $e ) {
            echo $e;
            die();
        }
    }
?>
