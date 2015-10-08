<?php

include_once('config.php');
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 16000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        var_dump($_POST);
        $sql = "insert into shop.item (name, code, category, description, imageurl, imagetype) values ('$_POST[name]', $_POST[code], '$_POST[category]', '$_POST[description]', \"".$target_file."\", '$check[mime]')";
        $result = $conn->query($sql);
        echo $conn->error;
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $sql = "select imageurl,imagetype from shop.item";
        $result = $conn->query($sql);
        $imageData = $result->fetch_assoc();
        var_dump($imageData);
        echo "<img src='$imageData[imageurl]'>";
        
// For Multiple image file upload
//        var_dump($_POST);
//        $sql = " insert into shop.item (name, code, category, description) values ('$_POST[name]', $_POST[code], '$_POST[category]', '$_POST[description]');";
//        $result = $conn->query($sql);
//        echo $conn->error;
//        $sql = " Insert into shop.item_images (code, imageurl, imagetype) values ($_POST[code],  '".$target_file."', '$check[mime]');";
//        $result = $conn->query($sql);
//        echo $conn->error;
//        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
//        $sql = "select imageurl,imagetype from shop.item_images where code = $_POST[code]";
//        $result = $conn->query($sql);
//        $imageData = $result->fetch_assoc();
//        var_dump($imageData);
//        echo "<img src='$imageData[imageurl]'>";
//        die;


    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}