<?php
require(__DIR__ . "/../../partials/nav.php");


if(isset($_GET['product_id'])){
    $id=$_GET['product_id'];
  
   /*if($id){echo $id . "is set";}*/
}
else{
    flash("error retrieving item", "warning");
}

$results = [];
$db = getDB();
$stmt = $db->prepare("SELECT id, name, description, CAST(price / 100.00 AS decimal(18,2)) AS price, stock, visibility, category ,image FROM Shop_Items WHERE id=:id");
try {
    $stmt->execute([":id" => $id]);
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
    <h1>More Details</h1>
        <?php foreach ($results as $item) : ?>
            <?php if(se($item, "visibility", "", false)==1) : ?> <!---->
                <div class="row row-cols-1 row-cols-md-5 g-4">
                    <div class = "col md">
                        <?php if (se($item, "image", "", false)) : ?>
                        <img src="<?php se($item, "image"); ?>" class="card-img-top" alt="...">
                        <?php endif; ?>
                            
                        <div class="card-body"> 
                            <h4 class="card-title">Product: <?php se($item, "name"); ?></h4>
                            <h6 class="card-text">Category: <?php se($item, "category"); ?></h6>
                            <p class="card-text">Description: <?php se($item, "description");?> <br> Stock: <?php se($item, "stock"); ?> items remain</p>
                        </div>
                        <div class="card-footer">
                            Price: $<?php se($item, "price");?><br>
                            <div class="row">
                                <div class="col">
                                    <button onclick="purchase('<?php se($item, 'id'); ?>')" class="btn btn-sm btn-secondary">Buy Now</button>
                                </div>
                                <div class="col">
                                    <!-- WCK3 04/12/2022 edit items button --> 
                                    <?php if(has_role("Admin")) : ?> 
                                    <form action="admin/edit_item.php" method="GET">
                                        <input type="hidden" name="id" value="<?php echo $item["id"]?>">
                                        <button type="submit" class="btn btn-sm btn-secondary ">Edit </button>
                                        <?php if(se($item, "visibility", "", false)==0) : ?> 
                                            Not Public
                                        <?php endif; ?>
                                    </form>
                                    <?php endif;?> 
                                </div>
                            </div>
                        </div>
                    </div>
        <?php endif; endforeach; ?>
</div>
        
 
 
</div>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>