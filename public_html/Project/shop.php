<?php
require(__DIR__ . "/../../partials/nav.php");

$results = [];
$db = getDB();
$stmt = $db->prepare("SELECT id, name, description, CAST(price / 100.00 AS decimal(18,2)) AS price, stock, visibility, category ,image FROM Shop_Items WHERE stock > 0 LIMIT 100");
try {
    $stmt->execute();
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
    }
} catch (PDOException $e) {
    echo $e;
    error_log(var_export($e, true));
    flash("Error fetching items", "danger");
}
?>
<script>
    function purchase(item) {
        console.log("TODO purchase item", item);
        alert("It's almost like you purchased an item, but not really");
        //TODO create JS helper to update all show-balance elements
    }
</script>

<div class="container-fluid">
    <h1>Shop</h1>
        <div class="row row-cols-1 row-cols-md-5 g-4">
            <?php foreach ($results as $item) : ?>
                <?php if(se($item, "visibility", "", false)==1 || has_role("Admin")) : ?> <!---->
                    <div class="col md-6">
                        <div class="card bg-dark">
                            <div class="card-header">
                                      
                            </div>
                            <?php if (se($item, "image", "", false)) : ?>
                                <img src="<?php se($item, "image"); ?>" class="card-img-top" alt="...">
                            <?php endif; ?>
                                <div class="card-body"> 
                                <h5 class="card-title">Name: <?php se($item, "name"); ?></h5>
                                <p class="card-text">Description: <?php se($item, "description"); ?></p>
                            </div>
                            <div class="card-footer">
                                Price: $<?php se($item, "price");?><br>
                                <!--<div class="col text-left">-->
                                    <button onclick="purchase('<?php se($item, 'id'); ?>')" class="btn btn-sm btn-secondary">Buy Now</button>
                                    
                                    <!-- WCK3 04/12/2022 more details button -->
                                    <form action="product_details.php" method="GET">
                                        <input type="hidden" name="product_id" value="<?php echo $item["id"]?>">
                                        <button type="submit" class="btn btn-sm btn-secondary">More Details </button>
                                    </form>
                                     <!-- WCK3 04/12/2022 edit items button -->
                                    <?php if(has_role("Admin")) : ?> 
                                        <form action="admin/edit_item.php" method="GET">
                                            <input type="hidden" name="id" value="<?php echo $item["id"]?>">
                                            <button type="submit" class="btn btn-sm btn-secondary ">Edit </button>
                                        </form>
                                    <?php endif;?> 
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                
            <?php endif; endforeach; ?>
        </div>
 
</div>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>