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
                <?php if (se($item, "image", "", false)) : ?>
                    <img src="<?php se($item, "image"); ?>" class="card-img-top" alt="...">
                        <?php endif; ?>
                            <div class="card-body"> 
                                <h5 class="card-title">Name: <?php se($item, "name"); ?></h5>
                                <p class="card-text">Description: <?php se($item, "description"); ?></p>
                            </div>
                            <div class="card-footer">
                                Price: $<?php se($item, "price");?><br>
                                <div class="col text-left">
                                    <button onclick="purchase('<?php se($item, 'id'); ?>')" class="btn btn-sm btn-secondary">Buy Now</button>
                                    <?php if(has_role("Admin")) : ?> 
                                    
                                        <button onclick="window.location='/Project/admin/edit_item.php';" class="btn btn-sm btn-secondary ">Edit</button>
                                 
                                <?php endif;?>       
                                    
                                </div>
                            </div>
                <?php endif; endforeach; ?>
        
 
 
</div>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>