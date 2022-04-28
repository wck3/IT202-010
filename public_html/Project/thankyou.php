<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
?>

<?php
/*
Show the entire order details from the Order and OrderItems table (similar to cart)
Including a the cost of each line item and the total value
Show how they purchased and how much they paid
Displays a Thank you message
*/
$user_id = get_user_id();
$results=[];
if ($user_id > 0) {
    $db = getDB();
    $stmt = $db->prepare("SELECT name, c.id as line_id, item_id, quantity,description ,CAST(c.price / 100.00 AS decimal(18,2)) AS cart_price , CAST(( c.price *quantity) / 100.00 AS decimal(18,2)) as subtotal FROM Shop_Items i JOIN Shop_Cart c on c.item_id = i.id WHERE c.user_id = :uid");
    try {
        $stmt->execute([":uid" => $user_id]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $cart_items = $results;
        } 
    
    } catch (PDOException $e) {
         echo $e;
        error_log("Error fetching cart" . var_export($e, true));
    }
}


//
?>

<div class="container-fluid">
    <br>
    <h1> Thank you for your purchase!</h1>
    <br>
    <div class="card bg-dark">
        <div class="card-header">
            <div class="h3">Order Details</div>
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
                                <?php $total=0; foreach ($cart_items as $item) : $total+=$item["subtotal"];?>
                                    <tr>
                                        <td><?php se($item, "name"); ?></td>
                                        <td> <?php se($item, "quantity"); ?></td>
                                        <td>$<?php se($item, "subtotal"); ?></td>
                                    </tr>
                                <?php endforeach; $total;?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-3">
                                Total: $<?php se($total); ?>
                            </div>
                            <div class="col-md-3">

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
                        <div class="mb-3">
                            Address:
                        </div>
                        <div class="mb-3">
                            <!--<div class="row">
                                partial used for state dropdown 
                               <?php require(__DIR__ . "/../../partials/address_fields.php");?>
                              
                            </div>-->
                        </div>
                        <div class="mb-3">
                            Payment Method:
                            
                        </div>
                        <div class="mb-3">
                            Payment Total: 
                           
                        </div>
                </div>
                
        </div> <!-- end card body -->
    </div> <!--  end card --> 
   
   
</div> <!-- End Page-->



<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>