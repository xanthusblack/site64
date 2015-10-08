<?php
/**
 * Created by PhpStorm.
 * User: MRazz-DesktopUS
 * Date: 07-10-2015
 * Time: 00:49
 */

var_dump($_POST);

include_once('config.php');
if($_POST['cmdLoginSubmit']){
    $sql = "select * from shop.users where username = '".$_POST['username']."' and password = '".md5($_POST['password'])."'";
    $result = $conn->query($sql);
    //var_dump($result->fetch_assoc());
    $data = $result;
    if($result->num_rows != null)
    {

        $timestring = strtotime("now");
        $session_id = md5($_POST['username'].$timestring);
        $exptime = strtotime("+60 minutes");
        $sql = "delete from shop.sessions where username = '".$_POST['username']."'";
        $result = $conn->query($sql);
        $sql = "insert into shop.sessions (username, session_id, exptime) values ('".$_POST['username']."','$session_id', '".date("Y-m-d H:i:s", $exptime)."')";
        $result = $conn->query($sql);
        header("Location: home.php?session_id=$session_id"); /* Redirect browser */
    }
    else
    {
        header("location: login.php?status=retry");
    }
    //echo "New record created successfully";

}
if($_POST['cmdSingupSubmit']){
    $sql = "insert into shop.users (username,password,email) values ('".$_POST['username']."', '".md5($_POST['password'])."', '".$_POST['email']."') ";
    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        echo "New User created successfully. Last inserted ID is: " . $last_id;
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
