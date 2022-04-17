<?php
require(__DIR__ . "/../../partials/nav.php");
require_once(__DIR__ . "/../../lib/functions.php");
require(__DIR__ . "/cart_helpers.php");
require(__DIR__ . "/api/delete_cart.php");

?>
<?php if(isset($_POST['delete'])): ?>

<script>// window.location.reload(); </script>

<?php endif;?>

<!--WCK3 04/16/2022 user must be logged in for any cart activity-->
<?php if(!is_logged_in()){
    //redirected to login page if not logged in
    flash("You must be logged in to view the cart.", "warning");
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
                        <td><?php se($item, "quantity"); ?></td>
                        <td>$<?php se($item, "subtotal"); ?></td>
                        <td>
                        <!-- WCK3 04/12/2022 more details button -->
                        <div class="col">
                            <form action="product_details.php" method="GET">
                                <input type="hidden" name="product_id" value="<?php echo $item["item_id"]?>">
                                <button type="submit" class="btn btn-sm btn-secondary">More Details </button>
                            </form>
                        </div>
                        
                            <form onsubmit="deleteLineItem('<?php echo json_encode($item['line_id']); ?>')"  method="POST">
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
                        <button method="POST" onclick="deleteLineItem()"  class="btn btn-sm btn-secondary">Clear Cart</button> 
                        </div>

                </div>
            <?php endif;?>
       </div>
    

    </div> <!-- end card -->
</div>


<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>