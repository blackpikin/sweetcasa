<?php 
include "./includes/loginRow.php";
$company_id = $_SESSION['id'];
$company = $Model->GetOne('users', $company_id);
$name = $company['name'];
$phone = $company['phone'];
$email = $company['email'];
$country = '';
$region = '';
$city = '';
$address = '';
$taxnum = '';
$idcard = '';
$typeof = '';
$err = false;
$result = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $country = $Model->test_input($_POST['country']);
    $region = $Model->test_input($_POST['region']);
    $city = $Model->test_input($_POST['city']);
    $address = $Model->test_input($_POST['address']);
    $taxnum = $Model->test_input($_POST['taxnum']);
    $idcard = $Model->test_input($_POST['idcard']);
    $typeof = $Model->test_input($_POST['typeof']);

    if(empty($country) || empty($region) || empty($city) || empty($address) || empty($taxnum) || empty($idcard) || empty($typeof)){
        $result = 'Incomplete or invalid information';
        $err = true;
    }

    if (!$err){
        $data = [
            'company_id' => $company_id,
            'country' => $country,
            'region' => $region,
            'city' => $city,
            'address' => $address, 
            'taxpayer' => $taxnum, 
            'idcard'=>$idcard,
            'typeof' => $typeof,
            'dateof' => date('Y-m-d H:i:s'),
            'datemod' => date('Y-m-d H:i:s')
        ];
        $data_u = [
            'country' => $country,
            'region' => $region,
            'city' => $city,
            'address' => $address, 
            'taxpayer' => $taxnum, 
            'idcard'=>$idcard,
            'typeof' => $typeof,
            'datemod' => date('Y-m-d H:i:s')
        ];

        if(empty($Model->ContentExists('company_details', 'company_id', $company_id))){
            $result = $Model->Insert('company_details', $data);
        }else{
            $result = $Model->Update('company_details', $data_u, ['company_id' => $company_id]);
        }
    }
}
?>
<div id="firstline">
    <br>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-12" style="border-right:thin solid lightgray;">
        <?php include "./includes/adminSidebar.php" ?>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-12" >
            <h2 class="centered-title">Company details</h2>
            <div class="trans-frame">
            <span style="color:red;"><?= $result ?></span>
            <form action="" method="post">
            <p>    
            <label class="form-label">Company name<sup>*</sup></label>
            <input readonly type="text" value="<?= $name ?>" name="name" class="form-control" required="required" placeholder="Enter a name to identify the property" />
            </p>
            <p>
                <label>Phone<sup>*</sup></label>
                <input type="text" name="type"  class="form-control" value="<?= $phone ?>" readonly>
            </p> 
            <p>
                <label>Email<sup>*</sup></label>
                <input type="email" name="phone" class="form-control" value="<?= $email ?>" placeholder="" readonly>
            </p> 
            <p>
                <label>Country<sup>*</sup></label>
                <input type="text" name="country" class="form-control" value="<?= $country ?>" required>
            </p>
            <p>
                <label>Region<sup>*</sup></label>
                <input type="text" name="region" class="form-control" value="<?= $region ?>" required>
            </p>  
            <p>
                <label>City<sup>*</sup></label>
                <input type="text" name="city" class="form-control" value="<?= $city ?>" required >
            </p> 
            <p>
                <label>Address<sup>*</sup></label>
                <textarea name="address" class="form-control" required ><?= $address ?></textarea>
            </p> 
            <p>
                <label>Tax payer number<sup>*</sup></label>
                <input type="text" name="taxnum" value="<?= $taxnum ?>" class="form-control" >
            </p> 
            <p>
                <label>ID card number<sup>*</sup></label>
                <input type="text" name="idcard" value="<?= $idcard ?>" class="form-control" >
            </p> 
            <p>
                <label>Type of Entity<sup>*</sup></label><br>
                <input type="radio" name="typeof" value="Moral" required> <label>Moral person</label>
                <input type="radio" name="typeof" value="Physical" required> <label>Physical person</label>
            </p> 
            <button type="submit" class="btn casa-btn">Save</button>
        </div>
        <div class="col-md-2 col-sm-1 col-xs-12" >

        </div>
    </div>
</div>
<br>