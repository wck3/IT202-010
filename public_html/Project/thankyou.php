<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
?>

<?php

$order_ID=[];
$user_id = get_user_id();
//get last order ID for user
$db = getDB();
$stmt = $db->prepare("SELECT id FROM Shop_Orders WHERE user_id = :id ORDER BY id DESC LIMIT 1  ");
try {
    $stmt->execute([":id" => $user_id]);
    $order_ID = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e;
    error_log("Error fetching Order ID" . var_export($e, true));
}

foreach ($order_ID as $item){
    $curr_ID = $item["id"];
}

//order items : quantity, item ID, subtotal (calculate)
//shop orders : address, payment method, payment total
$user_id = get_user_id();
$order_items=[];
$results=[];
if ($user_id > 0) {
    $db = getDB();
    //big big query
    $stmt = $db->prepare(
    "SELECT DISTINCT si.name, i.item_id, i.quantity, o.address, o.payment_method,CAST(o.money_recieved / 100.00 AS decimal(18,2)) AS money ,
    CAST(i.unit_price / 100.00 AS decimal(18,2)) AS price , CAST(( i.unit_price * quantity) / 100.00 AS decimal(18,2)) as subtotal
    FROM Order_Items i JOIN Shop_Orders o on i.order_id = o.id JOIN Shop_Items si ON si.id = i.item_id
    WHERE o.id = :order_id AND i.order_id = :order_id AND o.user_id = :uid");

    try {
        $stmt->execute([":uid" => $user_id, ":order_id" => $curr_ID]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $order_items = $results;
        } 
    
    } catch (PDOException $e) {
         echo $e;
        error_log("Error fetching cart" . var_export($e, true));
    }
}

?>

<div class="container-fluid">
    <br>
    <h1> Thank you for your purchase, <?php se(get_username()); ?>!</h1>
    <br>
    <div class="card bg-dark">
        <div class="card-header">
            <div class="h3">Order Details <?php se($item, "created");?></div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-5">
                    <div class="h4">Items</div>
                        <!-- just make these text -->
                        <table class="table text-white">
                            <thead>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </thead>
                            <tbody>
                                <?php $total=0; foreach ($order_items as $item) : $total+=$item["subtotal"];?>
                                   
                                    <tr>
                                        <td><?php se($item, "name"); ?></td>
                                        <td> <?php se($item, "quantity"); ?></td>
                                        <td>$<?php se($item, "subtotal"); ?>
                                    
                                    </td>
                                    </tr>
                                
                                <?php endforeach; $total;?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-4">
                                Total: $<?php se($total); ?>
                            </div>
                           <div class="col-md-5">
                                <div class="col">
                                    <form action="shop.php" method="GET">
                                        <button type="submit" class="btn btn-sm btn-secondary">Continue Shopping</button>
                                    </form>
                                </div>
                            </div>
                       </div>
                </div>
                <div class="col-2"></div>
                <div class="col-4">
                    <div class="h4">Payment Info</div>
                        <ul class="list-group list-group-dark">
                            <li class="list-group-item list-group-item-dark"><b>Address:</b> <?php se($item, "address"); ?></li>
                            <li class="list-group-item list-group-item-dark"><b>Payment Method:</b> <?php se($item, "payment_method"); ?></li>
                            <li class="list-group-item list-group-item-dark"><b>Payment Total:</b> $<?php  se($item, "money");  ?></li>
                        </ul>
                
                </div>
                
        </div> <!-- end card body -->
    
    </div> <!--  end card --> 
    
</div> <!-- End Page-->



<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>