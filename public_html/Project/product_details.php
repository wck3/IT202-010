
<?php
require(__DIR__ . "/../../partials/nav.php");
require(__DIR__ . "/cart_helpers.php");


if(isset($_GET['product_id'])){
    $id=$_GET['product_id'];
 
   /*if($id){echo $id . "is set";}*/
}
else{
    flash("error retrieving item", "warning");
}


//insert review into table
if(isset($_POST["rating"]) && isset($_POST["comment"])){
    $rating=$_POST["rating"];
    $comment=$_POST["comment"];
    $user=get_user_id();
    $db = getDB();
    $stmt = $db->prepare("INSERT INTO ratings (product_id, user_id, rating, comment) VALUE(:p_id,:u_id,:rating, :comment) ");
    try {
        $stmt->execute([":p_id"=>$id, "u_id" => $user, ":rating"=> $rating, ":comment"=>$comment]);
       
        //once inserted, unset post so review does not duplicate on refresh
        unset($_POST);
        flash("Review submitted. Thank you!", "success");
        redirect("product_details.php?product_id=$id"); 
        
    } catch (PDOException $e) {
        echo $e;
        error_log(var_export($e, true));
        flash("Error submitting rating", "danger");
    }

}
//fetch product details
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
    error_log(var_export($e, true));
    flash("Error fetching items", "danger");
}

//fetch user reviews
$reviews = [];
$sum=0;
$avg_review=0;
$db = getDB();
$stmt = $db->prepare("SELECT u.username ,r.id, r.rating, r.comment FROM Users u, ratings r WHERE r.user_id=u.id AND product_id=:p_id ORDER BY r.id DESC");

try {
    $stmt->execute([":p_id"=> $id]);
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $reviews = $r;
        foreach($reviews as $rev){
            $sum+=$rev["rating"];
        }
        $avg_review=$sum/count($reviews);
    }

    //$avg_review = se($r, "avg_rate", "", false);
} catch (PDOException $e) {
    echo $e;
    error_log(var_export($e, true));
    flash("Error fetching reviews", "danger");
}


?>
<script>
    function purchase(item) {
        console.log("TODO purchase item", item);
        //alert("It's almost like you purchased an item, but not really");
        //TODO create JS helper to update all show-balance elements
        if (add_to_cart) {
            add_to_cart(item);
        }
    }
</script>
<div class="container-fluid">
      
    <?php foreach ($results as $item) : ?>
        <br>
        <!-- details card-->
        <div class="card bg-dark">
          <?php if (se($item, "image", "", false)) : ?>
            <img src="<?php se($item, "image"); ?>" class="card-img-top" alt="...">
            <?php endif; ?>
            <div class="card-header">
                <h3>More Details</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <h4 class="card-title"><?php se($item, "name"); ?></h4>
                        <h6 class="card-text">Category: <?php se($item, "category"); ?></h6>
                        <p class="card-text">Description: <?php se($item, "description");?> <br> Stock: <?php se($item, "stock"); ?> items remain</p>
                   </div>
                   <div class="col">
                       <h4>Write a review: </h4>
                       <br>
                       <?php if(is_logged_in()) :?>
                            <form autocomplete="off" method="POST"> 
                                    <label for="rating">Rating (out of 5 stars):</label>
                                    <div class="col-1">
                                    <input class="form-control" type="number" min="1" max="5" value="1" name="rating" />
                                    </div>
                                    <div class="col-6">
                                        <label for="comment">Comment:</label>
                                        <textarea class="form-control input-lg" type="text" name="comment" rows="3" placeholder=" "> </textarea>
                                    </div>
                                    <div class="col">
                                        <br>
                                        <button class="btn btn-sm btn-secondary" name="review"> Submit Review</button>
                                    </div>
                            </form>
                        <?php else : ?>
                            <form action="login.php" method="GET">
                                <button type="submit" class="btn btn-sm btn-secondary">Login</button>
                            </form>
                          
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                Price: $<?php se($item, "price");?><br>
                <div class="row sm-1">
                    <div class="col">
                        <div class = "row">
                            <div class = "col-1">
                                <button  onclick="purchase('<?php se($item, 'id'); ?>', '<?php se($item, 'price'); ?>')"  class="btn btn-sm btn-secondary">Add to Cart</button>
                            </div>
                            <div class = "col">
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
            </div>
        </div>            
    <?php endforeach; ?>
        <br>
        <div class="card bg-dark">
            <div class="card-header">
                <?php if($reviews) : ?>
                    <h3>User Ratings (<?php se(number_format($avg_review, 2, '.', '')); ?>/5 stars) </h3>
                <?php else :  ?>
                    <h3>User Ratings</h3>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <?php if($reviews) : ?>
                    <?php foreach($reviews as $r) : ?>
                        <ul class="list-unstyled list-group-flush">
                            <li class="list-group-item-dark"> <b>User:</b> <?php se($r, "username"); ?> <b>Rating:</b> <?php se($r, "rating"); ?>/5 stars</li>
                            <li class="list-group-item-secondary">   <?php se($r, "comment"); ?></li>
                        </ul>
                    <?php endforeach;?>
                <?php else: ?>
                    No reviews
                <?php endif; ?>
            </div>
            <div class="footer">

            </div>



        </div>
    
      
</div>
        
 

<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>