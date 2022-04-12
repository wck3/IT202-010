<?php
require(__DIR__ . "/../../partials/nav.php");

$results = [];
$db = getDB();
$stmt = $db->prepare("SELECT id, name, description, CAST(price / 100.00 AS decimal(18,2)) AS price, stock, image FROM Shop_Items WHERE stock > 0 LIMIT 100");
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
            <div class="col">
                <div class="card bg-dark">
                    <div class="card-header">
                        <?php se($item, "category");?>
                    </div>
                    <?php if (se($item, "image", "", false)) : ?>
                        <img src="<?php se($item, "image"); ?>" class="card-img-top" alt="...">
                    <?php endif; ?>
                     <div class="card-body">
                        <h5 class="card-title">Name: <?php se($item, "name"); ?></h5>
                        <p class="card-text">Description: <?php se($item, "description"); ?></p>
                    </div>
                    <div class="card-footer">
                        <!-- TODO convert pennies to dollars -->
                        Price: $<?php se($item, "price");?>
                        <button onclick="purchase('<?php se($item, 'id'); ?>')" class="btn btn-secondary">Buy Now</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
#require(__DIR__ . "/../../partials/footer.php");
?>