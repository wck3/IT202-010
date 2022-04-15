<?php
require(__DIR__ . "/../../partials/nav.php");

$results = [];

$db = getDB();
$stmt = $db->prepare("SELECT id, name, description, CAST(price / 100.00 AS decimal(18,2)) AS price, stock, visibility, category ,image FROM Shop_Items WHERE stock > 0 LIMIT 100");
try {
    $stmt->execute();
    if (isset($_POST["itemName"])) {
    $stmt2->execute([":name" => "%" . $_POST["itemName"] . "%"]); }
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

<?php
$results = [];
$db = getDB();
//process filters/sorting
//Sort and Filters
$col = se($_GET, "col", "price", false);
//allowed list
if (!in_array($col, ["price", "stock", "name", "created"])) {
    $col = "price"; //default value, prevent sql injection
}
$order = se($_GET, "order", "asc", false);
//allowed list
if (!in_array($order, ["asc", "desc"])) {
    $order = "asc"; //default value, prevent sql injection
}
//get name partial search
$name = se($_GET, "name", "", false);

//dynamic query
$query = "SELECT id, name, description, price, stock, visibility, image FROM Shop_Items WHERE 1=1 and stock > 0"; //1=1 shortcut to conditionally build AND clauses
$params = []; //define default params, add keys as needed and pass to execute
//apply name filter
if (!empty($name)) {
    $query .= " AND name like :name";
    $params[":name"] = "%$name%";
}
//apply column and order sort
if (!empty($col) && !empty($order)) {
    $query .= " ORDER BY $col $order"; //be sure you trust these values, I validate via the in_array checks above
}
$stmt = $db->prepare($query); //dynamically generated query
//$stmt = $db->prepare("SELECT id, name, description, cost, stock, image FROM BGD_Items WHERE stock > 0 LIMIT 50");
try {
    $stmt->execute($params); //dynamically populated params to bind
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching items", "danger");
}

?>
<div class="container-fluid">
    <!--Filters-->
    <h1>Shop</h1>
    <form class="row row-cols-auto g-3 align-items-center">
        <div class="col">
            <div class="input-group" data="i">
                <div class="input-group-text text-white bg-dark">Search</div>
                <input class="form-control" name="name" value="<?php se($name);?>" placeholder="enter product name"/>
            </div>
        </div>
        <div class="col">
            <div class="input-group">
                <div class="input-group-text bg-dark text-white">Sort By</div>
                <!-- make sure these match the in_array filter above-->
                <select required class="form-control bg-secondary text-white" name="col" value="<?php se($col); ?>" data="took" >
                    
                    <option value="cost">Cost</option>
                    <option value="stock">Stock</option>
                    <option value="name">Name</option>
                    <option value="created">Created</option>
                </select>
                <script>
                    //quick fix to ensure proper value is selected since
                    //value setting only works after the options are defined and php has the value set prior
                    document.forms[0].col.value = "<?php se($col); ?>";
                </script>
                <select class="form-control" name="order" value="<?php se($order); ?>">
                    <option class="bg-white" value="asc">Up</option>
                    <option class="bg-white" value="desc">Down</option>
                </select>
                <script data="this">
                    //quick fix to ensure proper value is selected since
                    //value setting only works after the options are defined and php has the value set prior
                    document.forms[0].order.value = "<?php se($order); ?>";
                    if (document.forms[0].order.value === "asc") {
                        document.forms[0].order.className = "form-control bg-secondary text-white";
                    } else {
                        document.forms[0].order.className = "form-control bg-secondary text-white";
                    }
                </script>
            </div>
        </div>
        <div class="col">
            <div class="input-group">
                <input type="submit" class="btn btn-secondary" value="Apply" />
            </div>
        </div>
    </form>
    <!--End Filters-->

    <div class="row row-cols-1 row-cols-md-5 g-4">
        <?php foreach ($results as $item) : ?>
            <?php if(se($item, "visibility", "", false)==1 || has_role("Admin")) : ?> 
                <div class="col md-6">
                    <div class="card bg-dark h-100">
                        <div class="card-header">
                        </div>
                        <?php if (se($item, "image", "", false)) : ?>
                            <img src="<?php se($item, "image"); ?>" class="card-img-top" alt="...">
                        <?php endif; ?>
                        <div class="card-body"> 
                            <h5 class="card-title"><?php se($item, "name"); ?></h5>
                            <p class="card-text"><?php se($item, "description"); ?></p>
                        </div>
                        <div class="card-footer"> 
                            $<?php se($item, "price");?> </br>
                            <div class="row">
                                <div class="col">
                                    <button onclick="purchase('<?php se($item, 'id'); ?>')" class="btn btn-sm btn-secondary">Buy Now</button>
                                </div>
                                <!-- WCK3 04/12/2022 more details button -->
                                <div class="col">
                                    <form action="product_details.php" method="GET">
                                        <input type="hidden" name="product_id" value="<?php echo $item["id"]?>">
                                        <button type="submit" class="btn btn-sm btn-secondary">More Details </button>
                                    </form>
                                </div>
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
            <?php endif;?>     
        <?php endforeach; ?>
    </div>
</div> 



<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>