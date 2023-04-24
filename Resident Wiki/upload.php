<?php

include 'connection.php';

$statusMsg = '';


$targetDir = "uploads/";

if(isset($_POST["submit"])){
    if(!empty($_FILES["file"]["name"])){
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);


        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                
                $statusMsg = "The file ".$fileName. " has been uploaded succesfully.";
                 
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }else{
            $statusMsg = "Sorry, only JPG, JPEG, PNG, GIF & PDF files are allowed to upload.";
        }
    }else{
        $statusMsg = "Please select a file to upload.";
    
    }
}