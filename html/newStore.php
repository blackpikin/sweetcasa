<?php
    $name = '';
    $type = '';
    $city = '';
    $quarter = '';
    $price = '';
    $min_months = '';
    $error = false;
    $result = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $Model->test_input($_POST['name']);
        $type = $Model->test_input($_POST['type']);
        $city = $Model->test_input($_POST['city']);
        $quarter = $Model->test_input($_POST['quarter']);
        $price = $Model->test_input($_POST['price']);
        $min_months = $Model->test_input($_POST['min_months']);
                
        if(empty($name)){
            $error = true;
            $result = "A name for the property is required";
        }
        if(empty($type)){
            $error = true;
            $result = "The type of house is required";
        }
        if(empty($city)){
            $error = true;
            $result = "The city is required";
        }
        if(empty($quarter)){
            $error = true;
            $result = "The quarter is required";
        }
        if(empty($price) || $price <= 0){
            $error = true;
            $result = "Invalid price";
        }
        if(empty($min_months)){
            $error = true;
            $result = "Invalid minimum months";
        }
        if(!$error){
            $data = [
                'user_id' => $_SESSION['id'],
                'name' => $name,
                'p_type' => $type,
                'city' => $city,
                'quarter' => $quarter,
                'price' => $price,
                'min_month' => $min_months,
                'dateof' => date('Y-m-d h:i:s'),
                'status'=> 0,
                'code' => ''
            ];
            $result = $Model->Insert('properties', $data);
        }

        if($result == "Successful"){
            $name = '';
            $type = '';
            $city = '';
            $quarter = '';
            $price = '';
            $min_months = '';
            $error = false;
        } 
        
    }
?>
<?php include "./includes/loginRow.php" ?>
<div id="firstline">
    <br>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-12" style="border-right:thin solid lightgray;">
        <?php include "./includes/adminSidebar.php" ?>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-12" >
            <h2 class="centered-title">List new property</h2>
            <div class="trans-frame">
            <span style="color:red;"><?= $result ?></span>
            <form action="" method="post">
            <p>    
            <label class="form-label">Property name</label>
            <input type="text" value="<?= $name ?>" name="name" class="form-control" required="required" placeholder="Enter a name to identify the property" />
            </p>
            <p>
                    <label>Type of house</label>
                    <select name="type" id="type" class="form-control">
                        <option value="">Select one</option>
                        <option value="Room(simple)">Room(simple)</option>
                        <option value="Room(modern)">Room(Modern)</option>
                        <option value="Studio(simple)">Studio(simple)</option>
                        <option value="Studio(modern)">Studio(Modern)</option>
                        <option value="Duplex">Duplex</option>
                        <option value="Guest house">Guest house</option>
                        <option value="Apartment">Apartment</option>
                        <option value="Villa">Villa</option>
                        <option value="Office">Office</option>
                        <option value="Warehouse">warehouse</option>
                    </select>
                </p>  
                <p>
                    <label>City</label>
                    <select name="city" id="city" class="form-control">
                        <option value="">Select one</option>
                        <option value="Yaounde">Yaounde</option>
                        <option value="Douala">Douala</option>
                        <option value="Maroua">Maroua</option>
                        <option value="Garoua">Garoua</option>
                        <option value="Bertoua">Bertoua</option>
                        <option value="Ebolowa">Ebolowa</option>
                        <option value="Bamenda">Bamenda</option>
                        <option value="Buea">Buea</option>
                        <option value="Baffoussam">Baffoussam</option>
                        <option value="Ngaoundere">Ngaoundere</option>
                    </select>
                </p> 
                <p>
                    <label>Quarter</label>
                    <input type="text" value="<?= $quarter ?>" name="quarter" class="form-control" required="required" placeholder="Enter the quarter the property is located" />
                </p>
                <p>
                    <label>Price per month</label>
                    <input type="number" name="price" value="<?= $price ?>" class="form-control" placeholder="Price">
                </p>  
                <p>
                    <label>Minimum number of months</label>
                    <input type="number" name="min_months" value="<?= $min_months ?>" class="form-control" placeholder="e.g. 6">
                </p>  
            <button type="submit" class="btn casa-btn">List property</button>
            </form>
            </div>
            <br>
            <span style="margin-left:15px; margin-right:15px; color:white;">After creating the listing, you can modify it under 'View My properties'</span>
        </div>
        <div class="col-md-2 col-sm-1 col-xs-12" >

        </div>
    </div>
</div>
<br>