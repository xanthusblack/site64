<?php

echo '
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="users.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<style>
.col-centered{
    float: none;
    margin: 0 auto;
}
</style>
</head>
<body>
<div class=".container-fluid">
    <div class = "row">
        <div class = "col-md-2 .col-centered"></div>
        <div class = "col-md-10 .col-centered">
            <h1>SHOP LOGIN</h1>
        </div>
    </div>
    <form method="POST" action="loginproc.php">
    <div class = "row">
        <div class = "col-md-2">
        </div>
        <div class = "col-md-2">
            <label>Username: </label>
        </div>
        <div class = "col-md-8">
            <input type="text" name="username" size="32"/>
        </div>
    </div>
    <div class = "row">
        <div class = "col-md-2">
        </div>
        <div class = "col-md-2">
            <label>Password: </label>
        </div>
        <div class = "col-md-8">
            <input type="password" name="password" size="32"/>
        </div>
    </div>
    <div class = "row">
        <div class = "col-md-2">
        </div>
        <div class = "col-md-2">
            <label>Re-enter Password: </label>
        </div>
        <div class = "col-md-8">
            <input type="password" name="password" size="32"/>
        </div>
    </div>
    <div class = "row">
        <div class = "col-md-2">
        </div>
        <div class = "col-md-2">
            <label>Email ID: </label>
        </div>
        <div class = "col-md-8">
            <input type="email" name="email" maxlength="256" size="32"/>
        </div>
    </div>
    <div class = "row">
        <div class = "col-md-4">
        </div>
        <div class = "col-md-8">
        <br>
            <input type="submit" name="cmdSingupSubmit" value="Sign Up"/>
        </div>
    </div>
    </form>
</div>
</body>
</html>

';
