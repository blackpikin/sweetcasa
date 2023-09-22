<br>
<?php include "./includes/homeLoginRow.php" ?>
<div id="firstline">
    <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-1">

        </div>
        <div class="col-md-6 col-sm-6 col-xs-10">
                <h1 class="main-title" style="text-align:center;"><?= $app_name ?></h1>
                <br>
                <div>
                <div class="trans-frame">
                <p>
                    <label>City</label>
                    <select name="city" id="city" class="form-control" onchange="LoadQuarters()">
                        <option value="">Select one</option>
                        <?php 
                            $quarters = $Model->GetDistinct('properties', 'city');
                            print_r($quarters);
                            foreach ($quarters as $q){
                                ?>
                                    <option value="<?= $q['city'] ?>"><?= $q['city'] ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </p> 
                <p>
                    <label>Quarter</label>
                    <select name="quarter" id="quarter" class="form-control">
                        <option value="">Select one</option>
                    </select>
                </p>
                <p>
                    <label>Type of house</label>
                    <select name="typeof" id="typeof" class="form-control">
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
                    <label>Price range</label>
                    <input type="number" id="min_price" name="min_price" value="" class="form-control" placeholder="Minimum price">
                    <input type="number" id="max_price" name="max_price" value="" class="form-control" placeholder="Maximum price">
                </p>             
                <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-2">
                
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <button onclick="Search()" class="btn main-btn">Search houses</button>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">

                </div>
                </div>
                </div>
                </div>
            <br>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-1">

        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>


