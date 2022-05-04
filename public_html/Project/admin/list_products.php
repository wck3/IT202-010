<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect("$BASE_PATH/home.php");
}
//get name partial search
$name = se($_POST, "name", "", false);


$db = getDB();
$results = [];
$params = [];
$query = "";

$base_query="SELECT id, name, description, stock, CAST(price / 100.00 AS decimal(18,2)) AS price, visibility, image from Shop_Items WHERE 1=1";
$total_query = "SELECT count(1) as total FROM Shop_Items WHERE 1=1 ";
//apply name filter

if (!empty($name)) {
    $query .= " AND name like :name";
    $params[":name"] = "%$name%";
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
    <h1>List Items</h1>
    <form method="POST" class="row row-cols-lg-auto g-3 align-items-center">
        <div class="input-group mb-3">
            <input class="form-control" type="search" name="name" placeholder="Item Filter" value="<?php se($name); ?>"/>
            <input class="btn btn-secondary" type="submit" value="Search" />
        </div>
    </form>
    <?php if (count($results) == 0) : ?>
        <p>No results to show</p>
    <?php else : ?>
        <table class="table text-white">
            <?php foreach ($results as $index => $record) : ?>
                <?php if ($index == 0) : ?>
                    <thead>
                        <?php foreach ($record as $column => $value) : ?>
                            <th><?php se($column); ?></th>
                        <?php endforeach; ?>
                        <th>Actions</th>
                    </thead>
                <?php endif; ?>
                <tr>
                    <?php foreach ($record as $column => $value) : ?>
                        <td><?php se($value, null, "N/A"); ?></td>
                    <?php endforeach; ?>
    
                    <td>    <!-- WCK3 4/13/2022 -->
                        <form action="edit_item.php" method="GET">
                            <input type="hidden" name="id" value="<?php echo $record["id"];?>">
                            <button type="submit" class="btn btn-sm btn-secondary align-center">Edit </button>
                        </form>
                          
                    </td> 
              
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/pagination.php");
require_once(__DIR__ . "/../../../partials/flash.php");

?>