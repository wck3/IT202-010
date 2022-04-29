<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);


//order items : quantity, item ID, subtotal (calculate)
//shop orders : address, payment method, payment total
$user_id = get_user_id();
$order_items=[];
$results=[];
$ignore=["item_id", "price", "order_id"];
if ($user_id > 0) {
    $db = getDB();
    //big big query
    $stmt = $db->prepare(
    "SELECT o.id as order_id, si.name, i.item_id, i.quantity, CAST(( i.unit_price * quantity) / 100.00 AS decimal(18,2)) as subtotal, CAST(o.money_recieved / 100.00 AS decimal(18,2)) AS order_total , o.payment_method,o.address,
    CAST(i.unit_price / 100.00 AS decimal(18,2)) AS price 
    FROM Order_Items i JOIN Shop_Orders o on i.order_id = o.id JOIN Shop_Items si ON si.id = i.item_id
    WHERE o.user_id = :uid ORDER BY o.id ASC LIMIT 10");

    try {
        $stmt->execute([":uid" => $user_id]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
         echo $e;
        error_log("Error fetching cart" . var_export($e, true));
    }
}

?>

<div class="container-fluid">
    <h1>Purchase History</h1>
    <?php if (count($results) == 0) : ?>
        <p>No results to show</p>
    <?php else : ?>
        <table class="table text-white">
            <?php foreach ($results as $index => $record) : ?>
                <?php if ($index == 0) : ?>
                    <thead>
                        <?php foreach ($record as $column => $value) : ?>
                            <?php if(!in_array($column, $ignore)) : ?>
                                <th><?php se($column); ?></th>
                            <?php endif;?>
                        <?php endforeach; ?>
                        <th>actions</th>
                    </thead>
                <?php endif; ?>
                <tr>
                    <?php foreach ($record as $column => $value) : ?>
                        <?php $curr_ID = $record["order_id"];?>
                        <?php if(!in_array($column, $ignore)) : ?>
                        
                            <?php if($column == "subtotal" || $column == "total") : ?>
                                <td>$<?php se($value, null, "N/A"); ?></td>
                            <?php else : ?>
                                <td><?php se($value, null, "N/A"); ?></td>
                            <?php endif;?>
                        <?php endif;?>
                    <?php endforeach; ?>
                    <td>
                        <!-- WCK3 04/28/2022 orderdetails button -->
                        <div class="col">
                            <form action="order_details.php" method="GET">
                                <input type="hidden" name="order_ID", value="<?php se($curr_ID);?>">
                                <button type="submit" class="btn btn-sm btn-secondary">Order Details </button>
                            </form>
                        </div>
                    
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>