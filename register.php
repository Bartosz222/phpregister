<?php
include('conn.php');

$data = new database;
$message = '';
if(isset($_POST['register'])){
    $field = array(
        'email' => $_POST['email'],
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'cpassword' => $_POST['cpassword'],

        );
        if($data->required_vailidation($field))
        {
            if($data->can_register('users_table', $field))
            {
                header("location: index.php");
            }else{
                $message =  $data->error;
            }
        }
        else{
            $message =  $data->error;
        }

}

?>
<body>
       
<div id="container">

<center><h1>REGISTER</h1></center>
<?php
if(isset($message))
{
    echo "<label class='text-danger'>$message</label>";

}
?><center>
<div id="first">
<form method="post">
<label>E-Mail</label>
<input type="text" name="email" class="form-control" />
<br />
<label>Username</label>
<input type="text" name="username" class="form-control" />
<br />
<label>Password</label>
<input type="text" name="password" class="form-control" />
<br />
<label>Confirm Password</label>
<input type="text" name="cpassword" class="form-control" />
<br />
</div>
    <div id="submit">
        <input type="checkbox" id="check"> I accept the <a href="#terms">Terms of Policy</a> & <a href="#privacy">Privacy Policy</a>
    </div>
   
<button type="submit" class="button" name="register"  >SIGN UP </button>
    </div>
    </center>
</body>