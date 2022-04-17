<?php
require_once(__DIR__ . "/../../../lib/functions.php");
error_log("add_to_cart received data: " . var_export($_REQUEST, true));
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}



$user_id = get_user_id();



$line_id = se($_REQUEST, "line_id", 0, false);
if ($user_id > 0 && $line_id > 0) {
    $db = getDB();
    $stmt = $db->prepare("DELETE FROM Shop_Cart where id = :id and :uid and quantity=1");
    try {
        //added user_id to ensure the user can only delete their own items
        $stmt->execute([":id" => $line_id, ":uid" => $user_id]);
       
    } catch (PDOException $e) {
        echo $e;
        error_log("Error deleting line item: " . var_export($e, true));
      
    }
}


if ($user_id > 0 && $line_id > 0) {
    $db = getDB();
    $stmt = $db->prepare("UPDATE Shop_Cart SET quantity=quantity-1 where id = :id and :uid and quantity>1");
    try {
        //added user_id to ensure the user can only delete their own items
        $stmt->execute([":id" => $line_id, ":uid" => $user_id]);     
    } catch (PDOException $e) {
        echo $e;
        error_log("Error deleting line item: " . var_export($e, true));
      
    }
}

if ($user_id > 0 && $line_id > 0) {
    $db = getDB();
    $stmt = $db->prepare("DELETE FROM Shop_Cart WHERE sum(quantity)>0");
    try {
        //added user_id to ensure the user can only delete their own items
        $stmt->execute([":id" => $line_id, ":uid" => $user_id]);
       
    } catch (PDOException $e) {
        echo $e;
        error_log("Error deleting line item: " . var_export($e, true));
      
    }
}
?>





