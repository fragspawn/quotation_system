<?php

    $db = new PDO("mysql:host=localhost;dbname=quotesys;charset=utf8","root","");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM line_item";
    try {
        $sth = $db->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException  $e ) {
        echo $e;
        die();
    }
    
    header('Content-Type: application/json');
    echo json_encode($result);    
    
?>
