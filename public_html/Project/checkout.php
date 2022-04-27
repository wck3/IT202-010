<?php
require(__DIR__ . "/../../partials/nav.php");
require_once(__DIR__ . "/../../lib/functions.php");

if(!is_logged_in()){
    //redirected to login page if not logged in
    flash("You must be logged in to view this page", "warning");
    die(header("Location: $BASE_PATH/login.php"));
}


//Fetch cart information to display items in checkout
$user_id = get_user_id();
$results=[];
if ($user_id > 0) {
    $db = getDB();
    $stmt = $db->prepare("SELECT name, c.id as line_id, item_id, quantity,description ,CAST(price / 100.00 AS decimal(18,2)) AS price , CAST((price*quantity) / 100.00 AS decimal(18,2)) as subtotal FROM Shop_Items i JOIN Shop_Cart c on c.item_id = i.id WHERE c.user_id = :uid");
    try {
        $stmt->execute([":uid" => $user_id]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $cart_items = $results;
        } 
    
    } catch (PDOException $e) {
        error_log("Error fetching cart" . var_export($e, true));
    }
}

if(empty($results)){
    flash("You must add items to your cart to checkout", "warning");
    die(header("Location: $BASE_PATH/shop.php"));
}
?>

<div class="container-fluid">
    <br>
    <div class="card bg-dark">
        <div class="card-header">
            <div class="h3">Checkout</div>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-4">
                    <div class="h4">Payment Info</div>
                    <form method="POST"  onsubmit="return validate(this)" >
                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input  class="form-control" type="text" name="username" value="<?php se(get_username()); ?>"/>
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input  class="form-control" type="text" name="address"/>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="address">City</label>
                                    <input class="form-control" type="text" name="City"/>
                                </div>
                               
                               <?php require(__DIR__ . "/address_fields.php");?>
                              
                            </div>
                            <div class="row">  
                                <div class="col">
                                    <label for="address">Zip/postal code</label>
                                    <input  class="form-control" type="text" name="zip"/>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="payment">Payment Method: </label>
                            <!--<input class="form-control" type="text" name="payment"  /> -->
                            <select class="form-control-md-3 bg-white " name="payment_method">
                    
                                <option value="poop" selected>Select</i></option> 
                                <option value="Cash" name="Cash" >Cash</option>
                                <option value="Visa" name="Visa">Visa</option>
                                <option value="MasterCard" name="MasterCard">MasterCard</option>
                                <option value="Amex" name="Amex" >Amex</option>
                                <option value="PayPal" name="PayPal" >PayPal</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="payment_total">Payment Total: $</label>
                            <input class="form-control-3" type="number" min="0" step="0.01" name="payment"  />
                        </div>
                            <input class="btn btn-secondary" type="submit" value="Submit" />
                    </form>
                </div>
                <div class="col-2"></div>
                <div class="col-5">
                    <div class="h4">Items</div>
                    <table class="table text-white">
                        <thead>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody>
                            <?php $total=0; foreach ($cart_items as $item) : $total+=$item["subtotal"];?>
                                <tr>
                                    <td><?php se($item, "name"); ?></td>
                                    <td><?php se($item, "description"); ?></td>
                                    <td> <?php se($item, "quantity"); ?></td>
                                    <td>$<?php se($item, "subtotal"); ?></td>
                                </tr>
                            <?php endforeach; $total;?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-3">
                            Total: $<?php se($total); ?>
                        </div>
                        <div class="col-md-3">
                            <form method="GET">
                                <button type="submit" class="btn btn-sm btn-secondary">Confirm Purchase</button>
                            </form>
                        </div>
                        <div class="col">
                            <form action="cart.php" method="GET">
                                <button type="submit" class="btn btn-sm btn-secondary">Return to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end card body -->
    </div> <!--  end card --> 
   
   
</div> <!-- End Page-->

<script>
    //WCK3 4/26/2022 client side payment method validation
    function validate(form) {
        //template
         
        //let con = form.confirmPassword.value;
        let username=form.username.value;
        let address=form.address.value;
        let city=form.City.value;
        let state=form.state.value;
        let payment_method=form.payment_method.value;
        let money_recieved=form.payment.value;
        let zipcode=form.zip.value;
        let isValid=true;

         
        //regex expressions to validate various payment method fields
        var usernamePattern = /[a-zA-Z0-9_-]{3,16}$/;
        var addressPattern = /^[#.0-9a-zA-Z\s,-]+$/;
        var cityPattern = /^([a-zA-Z\u0080-\u024F]+(?:. |-| |'))*[a-zA-Z\u0080-\u024F]*$/;
        var currencyPattern = /^(?=.*?\d)^\$?(([1-9]\d{0,2}(,\d{3})*)|\d+)?(\.\d{1,2})?$/;
        

        if((username.length < 3 || username.length > 16) || !usernamePattern.test(username)){
            isValid=false;
            flash("Invalid username. Username must only contain 3-16 characters a-z, 0-9, _, or -", "danger");
        }
        if(!addressPattern.test(address) || address.length==0){
            isValid=false;
            flash("Please enter a valid address", "warning");
        }
        if(!cityPattern.test(city) || city.length==0){
            isValid=false;
            flash("Please enter a valid city", "warning");
        }
        
        //validates using array defined in address_fields partial
        if(!states.includes(state)){
            isValid=false;
            flash("Please enter a valid state", "warning");
        }
        payment_methods=["Cash", "Visa", "MasterCard", "Amex", "PayPal"];
        if(!payment_methods.includes(payment_method)){
            isValid=false;
            flash("Please enter a valid payment method", "warning");
        }

        if(!currencyPattern.test(money_recieved) || money_recieved.length==0){
            isValid=false;
            flash("Please enter a valid payment amount in USD", "warning");
        }
        if(zipcode.length < 5 || zipcode.length > 5){
            isValid=false;
            flash("Please enter a vaild 5-digit zipcode", "warning");
        }
        
        if(isValid){
            console.log("client side validation successful");
        }
        return isValid;
    }
</script>

<?php 
require_once(__DIR__ . "/../../partials/flash.php");
?>