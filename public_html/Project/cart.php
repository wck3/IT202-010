<?php
require(__DIR__ . "/../../partials/nav.php");
require_once(__DIR__ . "/../../lib/functions.php");
require(__DIR__ . "/cart_helpers.php");
require(__DIR__ . "/api/delete_cart.php");
?>

<!--WCK3 04/16/2022 user must be logged in for any cart activity-->
<?php if(!is_logged_in()){
    //redirected to login page if not logged in
    flash("You must be logged in to view the cart.", "warning");
    die(header("Location: $BASE_PATH/login.php"));
}

//changing quantity of cart
if (isset($_POST["update"])) {
    if (update_data("Shop_Cart", $_POST["item_id"], $_POST)) {
        flash("Updated Quantity", "success");
    }
    if($_POST["quantity"]==0){
        deleteLineItem($_POST["item_id"], " ");
    }
}

//removing a single item
if (isset($_POST["delete"])) {

    if (deleteLineItem($_POST["item_id"], " ")) {
        flash("Removed item", "success");
    }
}

//clearing entire cart
if (isset($_POST["clear"])) {
    if (deleteLineItem("", " ")) {
        flash("Cart Cleared", "success");
    }
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
<script>
    //get_cart();
</script>
<script>
    function purchase(item) {
        console.log("TODO purchase item", item);
        alert("It's almost like you purchased an item, but not really");
        //TODO create JS helper to update all show-balance elements
    }
</script>

</script>

<div class="container-fluid">
    
    <br><div class="card bg-dark">
        <div class="card-header">
            <div class="card-text">
                <div class="h3">Cart</div>
                <div class="cart g-4">
                </div>
            </div>
        </div>
        <div class="card-body">
        </form>
    <?php if (count($results) == 0) : ?>
        <p>No Items in Cart</p>
        <?php else : ?>
            <table class="table text-white">
        <thead>
            <th>Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Actions</th>
        </thead>
        <tbody>
           
                <?php $total=0; foreach ($cart_items as $item) : $total+=$item["subtotal"];?>
                    <tr>
                        <td><?php se($item, "name"); ?></td>
                        <td><?php se($item, "description"); ?></td>
                        <td> 
                        <form method="POST" >
                            <div class="col-md-2">
                                <label class="form-label" for="<?php se($item); ?>"></label>
                                <input class="form-control " id="<?php se($item, "line_id"); ?>" type="number" min="0" value="<?php se($item, "quantity"); ?>" name="quantity" />
                                <input class="form-control" hidden name="item_id" value="<?php se($item, "line_id");?>">
                                <input class="btn btn-secondary" type="submit" value="Update" name="update" />
                            </div>
                            
                        </form>
                    </td>
                        <td>$<?php se($item, "subtotal"); ?></td>
                        <td>
                        <!-- WCK3 04/12/2022 more details button -->
                        <div class="col">
                            <form action="product_details.php" method="GET">
                                <input type="hidden" name="product_id" value="<?php echo $item["item_id"]?>">
                                <button type="submit" class="btn btn-sm btn-secondary">More Details </button>
                            </form>
                        </div>
                            <form method="POST"> 
                            <input type="hidden" name="item_id" value="<?php se($item, "line_id");?>">
                                <input class="btn btn-secondary" type="submit" value="Remove" name="delete"/>
                               
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $total;?>
          
        </tbody>
    </table>
    <?php endif; ?>
        </div>
       
                        
        <div class="card-footer">
            <?php if(!empty($results)) :?>
            Total: $<?php se($total); ?> <br>
                <div class="row sm-1">
                    <div class="col">
                 
                        <button onclick="purchase('<?php echo json_encode($item['line_id']); ?>')" class="btn btn-sm btn-secondary">Buy Now</button> 
                        <!-- WIP Delete all -->
                        <form method="POST"> 
                           <input class="btn btn-secondary" type="submit" value="Clear Cart" name="clear"/>
                        </form>
                    </div>

                </div>
            <?php endif;?>
       </div>
    

    </div> <!-- end card -->
</div>


<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>