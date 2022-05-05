<?php
require_once(__DIR__ . "/../../partials/nav.php");
require_once(__DIR__ . "/../../lib/functions.php");

is_logged_in(true);

$db = getDB();
$results=[];
$params=[];

$from = se($_GET, "from", "01", false);
$to = se($_GET, "to", "12", false);

//allowed lists
if (!in_array($from, ["", "01","02","03","04","05", "06", "07","08","09","10","11","12"])) {
    $from="";

}
if (!in_array($to, ["","01","02","03","04","05", "06", "07","08","09","10","11","12"])) {
    $to="";

}
$col = se($_GET, "col", "", false);
//echo $col ." ";
//allowed list
if (!in_array($col, ["money_recieved", "name", "o.created", ""])) {
    $col = ""; //default value, prevent sql injection
}

$order = se($_GET, "order", "asc", false);
//allowed list
if (!in_array($order, ["asc", "desc"])) {
    $order = ""; //default value, prevent sql injection
}
//get category selection
$category = se($_GET, "category", "", false);


$query="";
$user_id = get_user_id();

$ignore=["item_id", "price", "order_id"];

if ($user_id > 0) {

    //big big query
    $base_query= "SELECT o.id as order_id, si.name, i.item_id, i.quantity, CAST(( i.unit_price * quantity) / 100.00 AS decimal(18,2)) as subtotal, CAST(o.money_recieved / 100.00 AS decimal(18,2)) AS order_total , o.created as date , o.payment_method, o.address,
    CAST(i.unit_price / 100.00 AS decimal(18,2)) AS price
    FROM Order_Items i JOIN Shop_Orders o on i.order_id = o.id JOIN Shop_Items si ON si.id = i.item_id WHERE 1=1";
    $total_query = "SELECT count(1) as total FROM Order_Items i JOIN Shop_Orders o on i.order_id = o.id JOIN Shop_Items si ON si.id = i.item_id
    WHERE 1=1";

    $query = " AND o.user_id = :uid";
    $params[":uid"]=$user_id;


    //apply category filter
    if (!empty($category)){
        $query .= " AND category=:category";
        $params[":category"] = $category;
    }

    //order by date range query (by month was easiest for me)
    if(!empty($from) && !empty($to)){
        $query .= " AND MONTH(FROM_UNIXTIME(UNIX_TIMESTAMP(o.created))) >= :from AND MONTH(FROM_UNIXTIME(UNIX_TIMESTAMP(o.created))) <= :to";
        $params[":from"] = $from;
        $params[":to"] = $to;
    }
    else{
        $from=1; $to=12;
        $query .= " AND MONTH(FROM_UNIXTIME(UNIX_TIMESTAMP(o.created))) >= :from AND MONTH(FROM_UNIXTIME(UNIX_TIMESTAMP(o.created))) <= :to";
        $params[":from"] = $from;
        $params[":to"] = $to;
    }

    //apply column and order sort
    if (!empty($col) && !empty($order)) {
        $query .= " ORDER BY $col $order ";  
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

}

?>

<div class="container-fluid">
    <h1>Purchase History</h1>
    <form class="row row-cols-auto g-4 align-items-center">
        <div class="col-4">
            <div class="input-group">
                <div class="input-group-text bg-dark text-white">Sort By</div>
                <!-- make sure these match the in_array filter above-->
            
                <select class="form-control bg-secondary text-white" name="from" value="<?php se($from); ?>" data="took" >
                    
                    <option value="01" selected >From ▼</option> 
                    <option value="01">Jan</option>
                    <option value="02">Feb</option>
                    <option value="03">Mar</option>
                    <option value="04">Apr</option>
                    <option value="05">May</option>
                    <option value="06">Jun</option>
                    <option value="07">Jul</option>
                    <option value="08">Aug</option>
                    <option value="09">Sep</option>
                    <option value="10">Oct</option>
                    <option value="11">Nov</option>
                    <option value="12">Dec</option>
                  
                </select>

                <select class="form-control bg-secondary text-white" name="to" value="<?php se($to); ?>" data="took" >
                    
                    <option value="12" selected >To ▼</option> 
                    <option value="01">Jan</option>
                    <option value="02">Feb</option>
                    <option value="03">Mar</option>
                    <option value="04">Apr</option>
                    <option value="05">May</option>
                    <option value="06">Jun</option>
                    <option value="07">Jul</option>
                    <option value="08">Aug</option>
                    <option value="09">Sep</option>
                    <option value="10">Oct</option>
                    <option value="11">Nov</option>
                    <option value="12">Dec</option>
                  
                </select>
                <script>
                
                    document.forms[0].from.value = "<?php se($from); ?>";
                    document.forms[0].to.value = "<?php se($to); ?>";
            
                </script>
                
                <select class="form-control bg-secondary text-white md-3" name="category" value="<?php se($category); ?>" data="took" >
                   
                    <?php $db = getDB();
                    $stmt = $db->prepare("SELECT DISTINCT category from Shop_Items ORDER BY category");
                    $stmt->execute();
                    $r = $stmt->fetchAll(); ?>
                        
                    <option value="" selected >category ▼</i></option> 
                    <?php foreach($r as $thing):?>
                        <option value="<?php se($thing, 'category');?>"> <?php se($thing, 'category');?> </option>
                    <?php endforeach;?>
              
                </select>
                
                <script>
                    //quick fix to ensure proper value is selected since
                    //value setting only works after the options are defined and php has the value set prior
                    document.forms[0].category.value = "<?php se($category); ?>";
            
                </script>
                <select class="form-control bg-secondary text-white" name="col" value="<?php se($col); ?>" data="took" >
                    
                    <option value="" selected>none ▼</option> 
                    <option value="money_recieved">total</option>
                    <option value="o.created">date</option>
                    <option value="name">name</option>
               
                </select>
                <script>
                    document.forms[0].col.value = "<?php se($col); ?>";
                    
                </script>
                <select class="form-control  bg-secondary text-white" name="order" value="<?php se($order); ?>">
                    <option class="bg-secondary" value="asc">ascending </option>
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
    <?php if (count($results) == 0) : ?>
        <p>No results to show</p>
    <?php else : ?>
        <table class="table text-white">
            <?php foreach ($results as $index => $record) : ?>
                <?php if ($index == 0) : ?>
                    <thead>
                        <?php foreach ($record as $column => $value) : ?>
                            <?php if(!in_array($column, $ignore)) : ?>
                                <th><?php se($column); ?></th>
                            <?php endif;?>
                        <?php endforeach; ?>
                        <th>actions</th>
                    </thead>
                <?php endif; ?>
                <tr>
                    <?php foreach ($record as $column => $value) : ?>
                        <?php $curr_ID = $record["order_id"];?>
                        <?php if(!in_array($column, $ignore)) : ?>
                        
                            <?php if($column == "subtotal" || $column == "total") : ?>
                                <td>$<?php se($value, null, "N/A"); ?></td>
                            <?php else : ?>
                                <td><?php se($value, null, "N/A"); ?></td>
                            <?php endif;?>
                        <?php endif;?>
                    <?php endforeach; ?>
                    <td>
                        <!-- WCK3 04/28/2022 orderdetails button -->
                        <div class="col">
                            <form action="order_details.php" method="GET">
                                <input type="hidden" name="order_ID", value="<?php se($curr_ID);?>">
                                <button type="submit" class="btn btn-sm btn-secondary">Order Details </button>
                            </form>
                        </div>
                    
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
<?php
require_once(__DIR__ . "/../../partials/pagination.php");
require_once(__DIR__ . "/../../partials/flash.php");
?>