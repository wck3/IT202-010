<?php
require(__DIR__ . "/../../partials/nav.php");
require_once(__DIR__ . "/../../lib/functions.php");
require(__DIR__ . "/cart_helpers.php");

?>
<script>
    function purchase(item, price) {
        //console.log("TODO purchase item", item);
        //alert("It's almost like you purchased an item, but not really");
        //TODO create JS helper to update all show-balance elements
        console.log("TODO purchase item", item);
        //alert("It's almost like you purchased an item, but not really");
        if (add_to_cart) {
            add_to_cart(item, price*100);
        }
    }
</script>

<?php
$results = [];
$db = getDB();
//process filters/sorting
//Sort and Filters

//WCK3 04/15/2022 all filters done below
$col = se($_GET, "col", "", false);

//allowed list
if (!in_array($col, ["price", "stock", "name", "created","avg_rate" ,""])) {
    $col = ""; //default value, prevent sql injection
}

$order = se($_GET, "order", "asc", false);
//allowed list
if (!in_array($order, ["asc", "desc"])) {
    $order = ""; //default value, prevent sql injection
}
//get name partial search
$name = se($_GET, "name", "", false);

//get category selection
$category = se($_GET, "category", "", false);

//dynamic query
$base_query = "SELECT id, name, avg_rate,description, CAST(price / 100.00 AS decimal(18,2)) AS price, stock, visibility, category ,image FROM Shop_Items"; //1=1 shortcut to conditionally build AND clauses
$total_query = "SELECT count(1) as total FROM Shop_Items";
$params = []; //define default params, add keys as needed and pass to execute
$query = " WHERE 1=1 and stock > 0"; 

//apply category filter
if (!empty($category)){
    $query .= " AND category=:category";
    $params[":category"] = $category;
}

//apply name filter
if (!empty($name)) {
    $query .= " AND name like :name";
    $params[":name"] = "%$name%";
}
   
//apply column and order sort
if (!empty($col) && !empty($order)) {

    $query .= " ORDER BY $col $order"; 
}

//shop pagination
$per_page = 10;
paginate($total_query . $query, $params, $per_page);

$query .= " LIMIT :offset, :count";
$params[":offset"] = $offset;
$params[":count"] = $per_page;
//get the records
$stmt = $db->prepare($base_query . $query); //dynamically generated query

foreach ($params as $key => $value) {
    $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
    $stmt->bindValue($key, $value, $type);
}
$params = null; //set it to null to avoid issues

//fetch items
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
    <!--WK 04/15/2022 Filters-->
    <h1>Shop</h1>
    <form class="row row-cols-auto g-4 align-items-center">
        <div class="col">
            <div class="input-group" data="i">
                <div class="input-group-text text-white bg-dark">Search</div>
                <input class="form-control" name="name" value="<?php se($name);?>" placeholder="enter product name"/>
            </div>
        </div>
        <div class="col-4">
            <div class="input-group">
                <div class="input-group-text bg-dark text-white">Sort By</div>
                <!-- make sure these match the in_array filter above-->
            
                <select class="form-control bg-secondary text-white" name="col" value="<?php se($col); ?>" data="took" >
                    
                    <option value="">none ▼</option> 
                    <option value="price">price</option>
                    <option value="stock">stock</option>
                    <option value="name">name</option>
                    <option value="avg_rate">average rating</option>
                  
                </select>
               
                <select class="form-control bg-secondary text-white" name="category" value="<?php se($category); ?>" data="took" >
                   
                    <?php $db = getDB();
                    $stmt = $db->prepare("SELECT DISTINCT category from Shop_Items ORDER BY category");
                    $stmt->execute();
                    $r = $stmt->fetchAll(); ?>
                        
                    <option value="" selected >category: all ▼</i></option> 
                    <?php foreach($r as $thing):?>
                        <option value="<?php se($thing, 'category');?>"> <?php se($thing, 'category');?> </option>
                    <?php endforeach;?>
              
                </select>
                
                <script>
                    //quick fix to ensure proper value is selected since
                    //value setting only works after the options are defined and php has the value set prior
                    document.forms[0].col.value = "<?php se($col); ?>";
                    document.forms[0].category.value = "<?php se($category); ?>";
            
                </script>
                <select class="form-control  bg-secondary text-white" name="order" value="<?php se($order); ?>">
                    <option class="bg-secondary" value="asc">ascending</option>
                    <option class="bg-secondary" value="desc">descending</option>
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
           <input type="submit" class="btn btn-secondary" value="Apply" /> 
        </div>
        <div class="col"> 
            <input type="Reset" class="btn btn-secondary" value="Reset" />
        </div>
    </form>
    <!--End Filters-->
    <!--WK 04/15/2022 Items-->
    <?php if (count($results) == 0) : ?>
        <p>No results to show</p>
    <?php else : $item_count=0; ?>
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
                                        <button onclick="purchase('<?php se($item, 'id'); ?>', '<?php se($item, 'price'); ?>')" class="btn btn-sm btn-secondary">Add to Cart</button>
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
            <?php if($item_count>1) : ?>
                <p>No results to show</p>
            <?php endif;?>
        </div>
    <?php endif;?>
    <br>
</div> 

<?php

require(__DIR__ . "/../../partials/pagination.php");
require_once(__DIR__ . "/../../partials/flash.php");
?>