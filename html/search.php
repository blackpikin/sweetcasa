<?php
include "./includes/loginRow.php";
$city = $_GET['city'];
$quarter = $_GET['quarter'];
$type = $_GET['type'];
$min = $_GET['min'];
$max = $_GET['max'];

$results = $Model->SearchWithCriteria('properties', ['city'=>$city, 'quarter'=>$quarter, 'p_type'=>$type, 'status'=>1], "price BETWEEN $min AND $max");

?>
<div id="firstline">
    <h2 class="centered-title">Search results</h2>
    <?php 
    if(!empty($results)){
        foreach ($results as $r){
            ?>
                <div class="row trans-frame-color">
                    <div class="col-md-2 col-sm-3 col-xs-12">
                            <?php 
                                $ext_pic = $Model->GetSomeWithCriteria('graphics', ['exterior'], ['prop_id'=>$r['id']]);
                                if(empty($ext_pic) || $ext_pic[0]['exterior'] == '') {
                                    ?>
                                        <img src="./img/logo.png" alt="Exterior" class="img-responsive ext-pic">
                                        <p class="label-search">Exterior view unavailable</p>
                                    <?php
                                }else{
                                    ?>
                                    <img src="./img/houses/<?= $ext_pic[0]['exterior'] ?>" alt="Exterior" class="img-responsive ext-pic">
                                    <p class="label-search">Exterior view</p>
                                    <?Php
                                }
                            ?>
                    </div>
                <div class="col-md-7 col-sm-6 col-xs-12">
                <p class="big-search-title"><?= $r['p_type'] ?> at <?= $r['name'] ?>, <?= $r['quarter'] ?>, <?= $r['city'] ?></p>
                        <div class="row">
                            <div class="col-sm-7 col-xs-7">
                        <div class="curved-box-fill">
                            <span class="">Rents: <?= $r['price'] ?> frs per month </span><br>
                            <span class="">Minimum rents required: <?= $r['min_month'] ?> months</span><br>
                            <span class="">Total amount: <?= $r['min_month'] * $r['price'] ?> frs</span>
                        </div>
                        <?php 
                            $int_pics = $Model->GetSomeWithCriteria('graphics', ['interior1'], ['prop_id'=>$r['id']]);
                            if(empty($int_pics) || $int_pics[0]['interior1'] ==''){
                                ?>
                                    <p class="label-search">Interior views unavailable</p>
                                <?php
                            }else{
                                ?>
                                    <img src="./img/houses/<?= $Model->GetSomeWithCriteria('graphics', ['interior1'], ['prop_id'=>$r['id']])[0]['interior1'] ?>" alt="Interior" class="img-responsive int-pic">
                                    <img src="./img/houses/<?= $Model->GetSomeWithCriteria('graphics', ['interior2'], ['prop_id'=>$r['id']])[0]['interior2'] ?>" alt="Interior" class="img-responsive int-pic">
                                    <img src="./img/houses/<?= $Model->GetSomeWithCriteria('graphics', ['interior3'], ['prop_id'=>$r['id']])[0]['interior3'] ?>" alt="Interior" class="img-responsive int-pic">
                                    <p class="label-search">Interior views</p>
                                <?php
                            }
                        
                        ?>
                            </div>
                            <div class="col-sm-5 col-xs-5">
                                <div class="curved-box">
                                    <?php 
                                        $dims = $Model->GetAllWithCriteria('dimensions', ['prop_id' =>$r['id']]);
                                        if(empty($dims)){
                                            ?>
                                                <span class="label-search">Dimensions unavailable</span>
                                            <?php
                                        }else{
                                            if ($type == 'Room(simple)'){
                                                ?>
                                                <span class="label-search">Area of room: <?= $dims[0]['len_room'] * $dims[0]['wid_room'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_room'] ?>m x <?= $dims[0]['wid_room'] ?>m)</span><br>
                                                <?php
                                            }elseif($type == 'Room(modern)'){
                                                ?>
                                                    <span class="label-search">Area of room: <?= $dims[0]['len_room'] * $dims[0]['wid_room'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_room'] ?>m x <?= $dims[0]['wid_room'] ?>m)</span><br>
                                                    <span class="label-search">Area of Bathroom: <?= $dims[0]['len_bath'] * $dims[0]['wid_bath'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_bath'] ?>m x <?= $dims[0]['wid_bath'] ?>m)</span><br>
                                                    <span class="label-search">Area of Kitchen: <?= $dims[0]['len_kitchen'] * $dims[0]['wid_kitchen'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_kitchen'] ?>m x <?= $dims[0]['wid_kitchen'] ?>m)</span>
                                                <?php
                                            }elseif($type == 'Studio(simple)'){
                                                ?>
                                                    <span class="label-search">Area of parlour: <?= $dims[0]['len_parlour'] * $dims[0]['wid_parlour'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_parlour'] ?>m x <?= $dims[0]['wid_parlour'] ?>m)</span><br>
                                                    <span class="label-search">Area of room: <?= $dims[0]['len_room'] * $dims[0]['wid_room'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_room'] ?>m x <?= $dims[0]['wid_room'] ?>m)</span><br>
                                                <?php
                                            }elseif ($type == 'Studio(modern)'){
                                                ?>
                                                    <span class="label-search">Area of parlour: <?= $dims[0]['len_parlour'] * $dims[0]['wid_parlour'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_parlour'] ?>m x <?= $dims[0]['wid_parlour'] ?>m)</span><br>
                                                    <span class="label-search">Area of room: <?= $dims[0]['len_room'] * $dims[0]['wid_room'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_room'] ?>m x <?= $dims[0]['wid_room'] ?>m)</span><br>
                                                    <span class="label-search">Area of Bathroom: <?= $dims[0]['len_bath'] * $dims[0]['wid_bath'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_bath'] ?>m x <?= $dims[0]['wid_bath'] ?>m)</span><br>
                                                    <span class="label-search">Area of Kitchen: <?= $dims[0]['len_kitchen'] * $dims[0]['wid_kitchen'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_kitchen'] ?>m x <?= $dims[0]['wid_kitchen'] ?>m)</span>
                                                <?php
                                            }elseif($type == 'Duplex'){
                                                ?>
                                                    <span class="label-search">Number of parlours: <?= $dims[0]['num_parlour'] ?></span><br>
                                                    <span class="label-search">Number of rooms: <?= $dims[0]['num_room'] ?></span><br>
                                                    <span class="label-search">Number of bathrooms: <?= $dims[0]['num_bath'] ?></span><br>
                                                    <span class="label-search">Number of kitchens: <?= $dims[0]['num_kitchen'] ?></span><br>
                                                    <span class="label-search">Area of parlour: <?= $dims[0]['len_parlour'] * $dims[0]['wid_parlour'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_parlour'] ?>m x <?= $dims[0]['wid_parlour'] ?>m)</span><br>
                                                    <span class="label-search">Area of room: <?= $dims[0]['len_room'] * $dims[0]['wid_room'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_room'] ?>m x <?= $dims[0]['wid_room'] ?>m)</span><br>
                                                    <span class="label-search">Area of Bathroom: <?= $dims[0]['len_bath'] * $dims[0]['wid_bath'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_bath'] ?>m x <?= $dims[0]['wid_bath'] ?>m)</span><br>
                                                    <span class="label-search">Area of Kitchen: <?= $dims[0]['len_kitchen'] * $dims[0]['wid_kitchen'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_kitchen'] ?>m x <?= $dims[0]['wid_kitchen'] ?>m)</span>
                                                <?php
                                            }elseif($type == 'Apartment'){
                                                ?>
                                                    <span class="label-search">Number of parlours: <?= $dims[0]['num_parlour'] ?></span><br>
                                                    <span class="label-search">Number of rooms: <?= $dims[0]['num_room'] ?></span><br>
                                                    <span class="label-search">Number of bathrooms: <?= $dims[0]['num_bath'] ?></span><br>
                                                    <span class="label-search">Number of kitchens: <?= $dims[0]['num_kitchen'] ?></span><br>
                                                    <span class="label-search">Area of parlour: <?= $dims[0]['len_parlour'] * $dims[0]['wid_parlour'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_parlour'] ?>m x <?= $dims[0]['wid_parlour'] ?>m)</span><br>
                                                    <span class="label-search">Area of room: <?= $dims[0]['len_room'] * $dims[0]['wid_room'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_room'] ?>m x <?= $dims[0]['wid_room'] ?>m)</span><br>
                                                    <span class="label-search">Area of Bathroom: <?= $dims[0]['len_bath'] * $dims[0]['wid_bath'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_bath'] ?>m x <?= $dims[0]['wid_bath'] ?>m)</span><br>
                                                    <span class="label-search">Area of Kitchen: <?= $dims[0]['len_kitchen'] * $dims[0]['wid_kitchen'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_kitchen'] ?>m x <?= $dims[0]['wid_kitchen'] ?>m)</span>
                                                <?php
                                            }elseif($type == 'Villa'){
                                                ?>
                                                    <span class="label-search">Compound size: <?= $dims[0]['cpd_size'] ?>m<sup>2</sup></span><br>
                                                    <span class="label-search">Number of parlours: <?= $dims[0]['num_parlour'] ?></span><br>
                                                    <span class="label-search">Number of rooms: <?= $dims[0]['num_room'] ?></span><br>
                                                    <span class="label-search">Number of bathrooms: <?= $dims[0]['num_bath'] ?></span><br>
                                                    <span class="label-search">Number of kitchens: <?= $dims[0]['num_kitchen'] ?></span><br>
                                                    <span class="label-search">Area of parlour: <?= $dims[0]['len_parlour'] * $dims[0]['wid_parlour'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_parlour'] ?>m x <?= $dims[0]['wid_parlour'] ?>m)</span><br>
                                                    <span class="label-search">Area of room: <?= $dims[0]['len_room'] * $dims[0]['wid_room'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_room'] ?>m x <?= $dims[0]['wid_room'] ?>m)</span><br>
                                                    <span class="label-search">Area of Bathroom: <?= $dims[0]['len_bath'] * $dims[0]['wid_bath'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_bath'] ?>m x <?= $dims[0]['wid_bath'] ?>m)</span><br>
                                                    <span class="label-search">Area of Kitchen: <?= $dims[0]['len_kitchen'] * $dims[0]['wid_kitchen'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_kitchen'] ?>m x <?= $dims[0]['wid_kitchen'] ?>m)</span>
                                                <?php
                                            }elseif($type == 'Office'){
                                                ?>
                                                <span class="label-search">Area of office: <?= $dims[0]['len_room'] * $dims[0]['wid_room'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_room'] ?>m x <?= $dims[0]['wid_room'] ?>m)</span><br>
                                                <?php
                                            }elseif($type == 'Warehouse'){
                                                ?>
                                                <span class="label-search">Area of warehouse: <?= $dims[0]['len_room'] * $dims[0]['wid_room'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_room'] ?>m x <?= $dims[0]['wid_room'] ?>m)</span><br>
                                                <?php
                                            }elseif($type == 'Guest house'){
                                                ?>
                                                    <span class="label-search">Number of parlours: <?= $dims[0]['num_parlour'] ?></span><br>
                                                    <span class="label-search">Number of rooms: <?= $dims[0]['num_room'] ?></span><br>
                                                    <span class="label-search">Number of bathrooms: <?= $dims[0]['num_bath'] ?></span><br>
                                                    <span class="label-search">Number of kitchens: <?= $dims[0]['num_kitchen'] ?></span><br>
                                                    <span class="label-search">Area of parlour: <?= $dims[0]['len_parlour'] * $dims[0]['wid_parlour'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_parlour'] ?>m x <?= $dims[0]['wid_parlour'] ?>m)</span><br>
                                                    <span class="label-search">Area of room: <?= $dims[0]['len_room'] * $dims[0]['wid_room'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_room'] ?>m x <?= $dims[0]['wid_room'] ?>m)</span><br>
                                                    <span class="label-search">Area of Bathroom: <?= $dims[0]['len_bath'] * $dims[0]['wid_bath'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_bath'] ?>m x <?= $dims[0]['wid_bath'] ?>m)</span><br>
                                                    <span class="label-search">Area of Kitchen: <?= $dims[0]['len_kitchen'] * $dims[0]['wid_kitchen'] ?> m<sup>2</sup> (i.e. <?= $dims[0]['len_kitchen'] ?>m x <?= $dims[0]['wid_kitchen'] ?>m)</span>
                                                <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <br>
                    <br>
                        <div class="curved-box">
                            <?php 
                                $company = $Model->GetSomeWithCriteria('users', ['name', 'phone', 'email'], ['id'=>$r['user_id']])
                            ?>
                            <label>Posted by:</label><br>
                            <span><?= $company[0]['name'] ?></span><br>
                            <span><i class="bi-phone"></i> <?= $company[0]['phone'] ?></span><br>
                            <span><i class="bi-envelope"></i> <?= $company[0]['email'] ?></span><br>
                            <?php 
                                $company_det = $Model->GetAllWithCriteria('company_details', ['company_id'=>$r['user_id']]);
                                if(!empty($company_det)){
                            ?>
                            <span><i class="bi-marker"></i><?= isset($company_det[0]['address'])? $company_det[0]['address'] : ''  ?></span><br>
                            <span><i class="bi-marker"></i><?= isset($company_det[0]['city']) ? $company_det[0]['city'] : ''  ?></span>,
                            <span><i class="bi-marker"></i><?= isset($company_det[0]['region']) ? $company_det[0]['region'] : ''  ?></span>,
                            <span><i class="bi-marker"></i><?= isset($company_det[0]['country']) ? $company_det[0]['country'] : '' ?></span><br>
                            <?php 
                                if (isset($company_det[0]['typeof'])){
                                    if ($company_det[0]['typeof'] == 'Moral') {
                                        ?>
                                            <span><i class="bi-marker"></i><?= isset($company_det[0]['taxpayer']) ? $company_det[0]['taxpayer'] : '' ?></span>
                                        <?php
                                    }else{
                                        ?>
                                            <span><i class="bi-marker"></i><?= isset($company_det[0]['taxpayer']) ? $company_det[0]['taxpayer'] : '' ?></span>
                                            <span><i class="bi-marker"></i><?= isset($company_det[0]['idcard']) ? $company_det[0]['idcard'] : ''  ?></span>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </div>

                </div> 
    </div>
            <?php
        }
    }else{
        ?>
            <label>We could not find any properties that match your search criteria.</label>
        <?php
        $results = $Model->GetAllWithCriteria('properties', ['city'=>$city]);
    }
    ?>
</div>

        