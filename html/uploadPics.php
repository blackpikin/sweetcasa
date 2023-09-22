<?php 
include "./includes/loginRow.php";
$store_id = $_GET['ref'];
$store = $Model->GetOne('properties', $store_id);
$name = $store['name'];
$type = $store['p_type'];
$result = '';
$err = false;
$statusMsg = $errorMsg = $errorUpload = $errorUploadType = ''; 
$fileArray = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['interior'])){
        // File upload configuration 
        $targetDir = "./img/houses/"; 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        $fileNames = array_filter($_FILES['intpics']['name']); 
        if(!empty($fileNames)){ 
            foreach($_FILES['intpics']['name'] as $key=>$val){ 
                // File upload path 
                $fileName = basename($_FILES['intpics']['name'][$key]); 
                $targetFilePath = $targetDir . $fileName; 
                
                // Check whether file type is valid 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                if(in_array($fileType, $allowTypes)){ 
                    // Upload file to server 
                    if(move_uploaded_file($_FILES["intpics"]["tmp_name"][$key], $targetFilePath)){ 
                        // Image db insert sql 
                        array_push($fileArray, $fileName); 
                    }else{ 
                        $errorUpload .= $_FILES['intpics']['name'][$key].' | '; 
                    } 
                }else{ 
                    $errorUploadType .= $_FILES['intpics']['name'][$key].' | '; 
                } 
            } 
         
        // Error message 
        $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
        $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
        $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
         
        if(!empty($fileArray)){ 
            // Insert image file name into database
            if (empty($Model->ContentExists('graphics', 'prop_id', $store_id))){
                $result = $Model->InsertFiles('graphics', $fileArray, $store_id, 'int');
            }else{
                $result = $Model->UpdateFiles('graphics', $fileArray, $store_id, 'int');
            }

            if($result){ 
                $statusMsg = "Files are uploaded successfully.".$errorMsg; 
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file.".$errorMsg; 
            } 
        }else{ 
            $statusMsg = "Upload failed! ".$errorMsg; 
        } 
        }else{ 
            $statusMsg = 'Please select a file to upload.'; 
        } 
    }

    if(isset($_POST['exterior'])){
        // File upload configuration 
        $targetDir = "./img/houses/"; 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        // File upload path 
        $fileName = basename($_FILES['extpic']['name']); 
        $targetFilePath = $targetDir . $fileName; 
        // Check whether file type is valid 
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
        if(in_array($fileType, $allowTypes)){ 
            // Upload file to server 
            if(move_uploaded_file($_FILES["extpic"]["tmp_name"], $targetFilePath)){ 
                // Image db insert sql 
                array_push($fileArray, $fileName); 
            }else{ 
                $errorUpload .= $_FILES['extpic']['name'].' | '; 
            } 
        }else{ 
            $errorUploadType .= $_FILES['extpic']['name'].' | '; 
        } 

            // Error message 
            $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
            $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
            $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;

            if(!empty($fileArray)){ 
                // Insert image file name into database
                if (empty($Model->ContentExists('graphics', 'prop_id', $store_id))){
                    $result = $Model->InsertFiles('graphics', $fileArray, $store_id, 'ext');
                }else{
                    $result = $Model->UpdateFiles('graphics', $fileArray, $store_id, 'ext');
                }

                if($result){ 
                    $statusMsg = "Files are uploaded successfully.".$errorMsg; 
                }else{ 
                    $statusMsg = "Sorry, there was an error uploading your file.".$errorMsg; 
                } 
            }else{ 
                $statusMsg = "Upload failed! ".$errorMsg; 
            } 
        }else{ 
            $statusMsg = 'Please select a file to upload.'; 
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
            <h2 class="centered-title">Upload pictures</h2>
            <div class="trans-frame">
            <span style="color:red;"><?= $statusMsg ?></span>
            <form action="" method="post" enctype="multipart/form-data">
                <p>    
                <label class="form-label">Property name</label>
                <input readonly type="text" value="<?= $name ?>" name="name" class="form-control" required="required" placeholder="Enter a name to identify the property" />
                </p>
                <p>
                    <label>Type of house</label>
                    <input type="text" name="type"  class="form-control" value="<?= $type ?>" readonly>
                </p> 
                <p>
                    <label>Exterior picture (Shows in search results)</label>
                    <input type="file" name="extpic" class="form-control" placeholder="This picture shows up in search results">
                </p> 
                <button type="submit" name="exterior" class="btn casa-btn">Save Exterior picture</button>
            </form>
            <br>
            <form action="" method="post" enctype="multipart/form-data">
                <p>
                    <label>Interior pictures</label>
                    <input type="file" name="intpics[]" multiple class="form-control" >
                </p>
                <button type="submit" name="interior" class="btn casa-btn">Save pictures</button>
            </form>
        </div>
        <div class="col-md-2 col-sm-1 col-xs-12" >

        </div>
    </div>
</div>
<br>