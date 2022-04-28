<?php
require_once(__DIR__ . "/../../../partials/nav.php");
is_logged_in(true);
?>

<?php
if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
}

if(isset($_GET["order_ID"])){
    $curr_ID = $_GET["order_ID"];
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
    "SELECT DISTINCT u.username, si.name, i.item_id, i.quantity, o.address, o.payment_method,CAST(o.money_recieved / 100.00 AS decimal(18,2)) AS money ,
    CAST(i.unit_price / 100.00 AS decimal(18,2)) AS price , CAST(( i.unit_price * quantity) / 100.00 AS decimal(18,2)) as subtotal 
    FROM Order_Items i JOIN Shop_Orders o on i.order_id = o.id JOIN Shop_Items si ON si.id = i.item_id JOIN Users u on u.id = o.user_id 
    WHERE o.id = :order_id AND i.order_id = :order_id");

    try {
        $stmt->execute([":uid" => $user_id, ":order_id" => $curr_ID]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $order_items = $results;
        } 
    
    } catch (PDOException $e) {
        error_log("Error fetching cart" . var_export($e, true));
    }
}

?>

<div class="container-fluid">
    <br>
    <div class="card bg-dark">
        <div class="card-header">
            <div class="h3">Order Details (Admin View)</div>
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
                                        <td>$<?php se($item, "subtotal"); ?></td>
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
                                    <form action="/Project/admin/all_purchase_hist.php" method="GET">
                                        <button type="submit" class="btn btn-sm btn-secondary">Return to all Purchase History</button>
                                    </form>
                                </div>
                            </div>
                       </div>
                </div>
                <div class="col-2"></div>
                <div class="col-4">
                    <div class="h4">Payment Info</div>
                        <ul class="list-group list-group-dark">
                            <li class="list-group-item list-group-item-dark"><b>Username:</b> <?php se($item, "username"); ?></li>
                            <li class="list-group-item list-group-item-dark"><b>Address:</b> <?php se($item, "address"); ?></li>
                            <li class="list-group-item list-group-item-dark"><b>Payment Method:</b> <?php se($item, "payment_method"); ?></li>
                            <li class="list-group-item list-group-item-dark"><b>Payment Total:</b> $<?php  se($item, "money");  ?></li>
                        </ul>
                
                </div>
                
        </div> <!-- end card body -->
    
    </div> <!--  end card --> 
    
</div> <!-- End Page-->



<?php
require_once(__DIR__ . "/../../../partials/flash.php");
?>