<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");
$TABLE_NAME = "Shop_Items";
if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH/home.php"));
}
if (isset($_POST["submit"])) {
    $id = save_data($TABLE_NAME, $_POST);
    //die(header("Location: $BASE_PATH/admin/add_product.php"));
    if ($id > 0) {
        flash("Created Item with id $id", "success");
    }
}
//get the table definition
$columns = get_columns($TABLE_NAME);
//echo "<pre>" . var_export($columns, true) . "</pre>";
$ignore = ["id", "modified", "created"];
?>
<div class="container-fluid">
    <h1>Add a Product</h1>
    <form method="POST">
        <?php foreach ($columns as $index => $column) : ?>
            <?php /* Lazily ignoring fields via hardcoded array*/ ?>
            <?php if (!in_array($column["Field"], $ignore)) : ?>
                
                <!-- WCK3 4/12/2022 make visibility a radio option-->
                <?php if($column["Type"]=="tinyint") : ?>
                    <label>make item public?</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="<?php se($column, "Field"); ?>" type="radio" name="<?php se($column, "Field"); ?>" value="1">
                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="<?php se($column, "Field"); ?>" type="radio" name="<?php se($column, "Field"); ?>" value="0" >
                        <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>
                <?php else : ?>
                    <div class="col-2">  
                        <div class="mb-4">
                            <label class="form-label" for="<?php se($column, "Field"); ?>"><?php se($column, "Field"); ?></label>
                            <input class="form-control" id="<?php se($column, "Field"); ?>" type="<?php echo input_map(se($column, "Type", "", false)); ?>" name="<?php se($column, "Field"); ?>" />
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>
        <br>
        <input class="btn btn-secondary" type="submit" value="Save" name="submit" />
    </form>
</div>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");

?>