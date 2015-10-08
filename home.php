<?php
/**
 * Created by PhpStorm.
 * User: MRazz-DesktopUS
 * Date: 07-10-2015
 * Time: 01:55
 */
echo "Welcome to the home page!";
include_once('config.php');
$sql = "select * from shop.sessions where session_id= '".$_GET['session_id']."'";
$result = $conn->query($sql);
$sessionData = $result->fetch_assoc();
var_dump($sessionData);
if( strtotime($sessionData['exptime']) > strtotime("now")) {
    $sql = "select username, email, priv  from shop.users where username = '" . $sessionData['username'] . "'";
    $result = $conn->query($sql);
    $userData = $result->fetch_assoc();
    var_dump($userData);

}
else{
    header( "refresh:5;url=login.php?status=Session Expired. Please Re-Login" );
    echo "Your session has Expired. Please <a href='login.php?status=Session Expired. Please Re-Login'>Login</a> again. Automatic redirection in 5 secs..";
}
if($userData['priv'] < 1)
{
    echo "You have admin access and ";
}
if($userData['priv'] < 2)
{
    echo "You have Regular User Access";
    echo "<a href='AddItem.php'>Add a New Item</a>";
}