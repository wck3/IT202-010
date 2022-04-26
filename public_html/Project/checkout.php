<?php
require(__DIR__ . "/../../partials/nav.php");
require_once(__DIR__ . "/../../lib/functions.php");

if(!is_logged_in()){
    //redirected to login page if not logged in
    flash("You must be logged in to view this page", "warning");
    die(header("Location: $BASE_PATH/login.php"));
}

$user_id = get_user_id();
$results=[];
if ($user_id > 0) {
    $db = getDB();
    $stmt = $db->prepare("SELECT name, c.id as line_id, item_id, quantity,description ,CAST(price / 100.00 AS decimal(18,2)) AS price , CAST((price*quantity) / 100.00 AS decimal(18,2)) as subtotal FROM Shop_Items i JOIN Shop_Cart c on c.item_id = i.id WHERE c.user_id = :uid");
    try {
        $stmt->execute([":uid" => $user_id]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $cart_items = $results;
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
            <div class="h3">Checkout</div>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-4">
                    <div class="h4">Payment Info</div>
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input  class="form-control" type="text" name="username" />
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input  class="form-control" type="text" name="address"/>
                    </div>
                    <div class="mb-3">
                        <label for="payment">Payment Method</label>
                        <input class="form-control" type="text" name="payment"  />
                    </div>
                    <div class="mb-3">
                        <label for="payment_total">Payment Total</label>
                        <input class="form-control" type="number" min="0" name="payment"  />
                    </div>
                        <input class="btn btn-secondary" type="submit" value="Submit" />
                </div>
                <div class="col-2"></div>
                <div class="col-5">
                    <div class="h4">Items</div>
                    <table class="table text-white">
                        <thead>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody>
                            <?php $total=0; foreach ($cart_items as $item) : $total+=$item["subtotal"];?>
                                <tr>
                                    <td><?php se($item, "name"); ?></td>
                                    <td><?php se($item, "description"); ?></td>
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
                            <form method="GET">
                                <button type="submit" class="btn btn-sm btn-secondary">Confirm Purchase</button>
                            </form>
                        </div>
                        <div class="col">
                            <form action="cart.php" method="GET">
                                <button type="submit" class="btn btn-sm btn-secondary">Return to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end card body -->
    </div> <!--  end card --> 
   
   
</div> <!-- End Page-->

<?php 
require_once(__DIR__ . "/../../partials/flash.php");
?>