<label?php 
require_once('../includes/config.php');
if($user->is_logged_in()){
    header('location:index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <title> Admin Login</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
 <?php 
   if(isset($_POST['submit'])){

$userName=trim($_POST['userName']);
$password=trim($_POST['password']);
if($user->login($userNmae,$password)){

    header('locaion: index.php');
    exit;
}
else
    {
        $message= '<p class="invalid">Invalid username or password<p>';
    }
}
if(isset($message)){
echo $message;
}
?>
<form action="" method="POST" class="form">
<label>Username</label>
<input type="text" name="username" value="'" required/>
<br>
<label>password</label>
<input type="password" name="password" value="'" required/>
<br>
 <label></label><input type="submit" name="submit" value="SignIn"/> 

</body>
</html>

