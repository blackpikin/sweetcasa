<?php
$ref= $_SESSION['id'];
?>
<?php include "./includes/loginRow.php" ?>
<div id="firstline">
    <br>
    <div class="row">
        <div class="col-md-2 col-sm-4 col-xs-12" style="border-right:thin solid lightgray;">
        <?php include "./includes/adminSidebar.php" ?>
        </div>
        <div class="col-md-9 col-sm-7 col-xs-12" >
        <h2 class="centered-title">My properties</h2>
            <div >
               <table class="table table-responsive table-bordered table-striped">
                    <tr class="table-header">
                        <td>Property Name</td>
                        <td>Actions</td>
                        <td>Actions</td>
                        <td>Actions</td>
                    </tr>
                    <?php
                    
                    $stores = $Model->GetAllWithCriteria('properties', ['user_id' => $ref]);
                    if(!empty($stores)){
                        foreach($stores as $store){
                            ?>
                                <tr class="table-row">
                        <td><?= $store['name'] ?></td>
                        <td>
                            <p class="action-link" onmouseover="SetPointer(this)" onclick="GotoPage('modifyStore&ref=<?= $store['id']  ?>')">Update property</p>
                            <p class="action-link" onmouseover="SetPointer(this)" onclick="GotoPage('dimensions&ref=<?= $store['id']  ?>')">Add dimensions</p>
                        </td>
                        <td>
                            <p class="action-link" onmouseover="SetPointer(this)" onclick="GotoPage('uploadPics&ref=<?= $store['id']  ?>')">Upload pictures</p>
                        </td>
                        <td>
                            <?php
                                if (empty($Model->GetAllWithCriteria('properties', ['id' => $store['id'], 'status' => 1]))){
                                    ?>
                                        <p class="action-link" onmouseover="SetPointer(this)" onclick="GotoPage('payfees&ref=<?= $store['id']  ?>')">Pay fees</p> 
                                    <?php
                                }else{
                                    ?>
                                    <p class="action-link" onmouseover="SetPointer(this)" onclick="GotoPage('unlist&ref=<?= $store['id']  ?>')">Unlist property</p>
                                <?php    
                                }
                            ?>                           
                        </td>
                    </tr>
                            <?php
                        }
                    }

                    ?>
                </table>
            </div>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-12" style="border-right:thin solid lightgray;">
        
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>