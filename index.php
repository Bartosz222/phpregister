<?php
include('conn.php');
session_start();
$data = new database;
$message = '';
if(isset($_POST['login']))
{
$field = array(
    
    'username' => $_POST['username1'],
    'password' => $_POST['password1'],
    
);
if($data->required_vailidation($field))
{

    if($data->can_login('users_table', $field)){
    $_SESSION['username'] = $_POST['username1'];
    header("location: crud/index.php");
    }
}
else{
    $message= $data->error;

}

}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formularz</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
</head>
<body>
    
<div id="container">

<center><h1>LOGIN</h1></center>
<?php
if(isset($message))
{
    echo "<label class='text-danger'>$message</label>";

}
?><center>
<div id="first">
<form method="post">

<label>Username</label>
<input type="text" name="username1" class="form-control" />
<br />
<label>Password</label>
<input type="text" name="password1" class="form-control" />
<br />

</div>
    <div id="submit">
        <input type="checkbox" id="check"> I accept the <a href="#terms">Terms of Policy</a> & <a href="#privacy">Privacy Policy</a>
    </div>
   
<button type="submit" class="button" name="login"  >SIGN IN </button>
    </div>
    </center>
</body>
</html>