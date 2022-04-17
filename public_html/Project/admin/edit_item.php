<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

$TABLE_NAME = "Shop_Items";
if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH/home.php"));
}
//update the item
if (isset($_POST["submit"])) {
    if (update_data($TABLE_NAME, $_GET["id"], $_POST)) {
        flash("Updated item", "success");
        echo $_GET["id"];
    }
}

//get the table definition
$result = [];
$columns = get_columns($TABLE_NAME);
//echo "<pre>" . var_export($columns, true) . "</pre>";
$ignore = ["id", "modified", "created"];
$db = getDB();
//get the item
$id = se($_GET, "id", -1, false); //here is where id is fetched
$stmt = $db->prepare("SELECT * FROM $TABLE_NAME where id =:id");
try {
    $stmt->execute([":id" => $id]);
    $r = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($r) {
        $result = $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error looking up record", "danger");
}
//uses the fetched columns to map via input_map()
function map_column($col)
{
    global $columns;
    foreach ($columns as $c) {
        if ($c["Field"] === $col) {
            return input_map($c["Type"]);
        }
    }
   return "text";
}
// WCK3 4/13/2022 cheesy way to get input type of each column
 function get_type($col){
    global $columns;
    foreach ($columns as $c) {
        if($c["Field"] === $col){
            return $c["Type"];
        }
    }
 }
?>
<div class="container-fluid">
    <h1>Edit Item</h1>
    <form method="POST">
        <?php foreach ($result as $column => $value) : ?>
            <?php /* Lazily ignoring fields via hardcoded array*/ ?>
            <?php if (!in_array($column, $ignore)) : ?>
                
                <!-- WCK3 4/13/2022 make visibility a radio option-->
                <?php if( get_type($column) =="tinyint" &&  se($value, "", "" ,false)==1) :  ?>
                    <label>make item public?</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="<?php se($column); ?>"  value="1" name="<?php se($column); ?>" checked >
                        <label class="form-check-label" for="<?php se($column); ?>">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input  type="radio" class="form-check-input" id="<?php se($column); ?>"value="0" name="<?php se($column); ?>">
                        <label class="form-check-label" for="<?php se($column); ?>">No</label>
                    </div>
             
                <?php elseif(get_type($column) =="tinyint" &&  se($value, "", "" ,false)==0) : ?>
                    <label>make item public?</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="<?php se($column); ?>" type="radio"  value="<?php se(1)?>" name="<?php se($column); ?>" >
                        <label class="form-check-label" for="<?php se($column); ?>">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="<?php se($column); ?>" type="radio"  value="<?php se(0)?>" name="<?php se($column); ?>" checked>
                        <label class="form-check-label" for="<?php se($column); ?>">No</label>
                    </div>
                <!------------------------------------------------------------------------>
                <?php else : ?>
                            
                <div class="col-2">  
                    <div class="mb-4">
                        <label class="form-label" for="<?php se($column); ?>"><?php se($column, "Field"); ?></label>
                        <input class="form-control" id="<?php se($column); ?>" type="<?php echo map_column($column); ?>" value="<?php se($value); ?>" name="<?php se($column); ?>" />
                    </div>
                </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>
        <br>
        <input class="btn btn-secondary" type="submit" value="Update" name="submit" />
    </form>
</div> 

<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");
?>