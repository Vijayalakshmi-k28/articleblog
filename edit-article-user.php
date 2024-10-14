<title?php 
require_once('../includes/config.php');
if(!$user->is_logged_in()){ header('Location: login.php');}
?>
<?php include("head.php"); ?>
<title>edit article blog </title>
<?php include("header.php"); ?>
<div class ="content">
    <h2>Edit user</h2>

<?php    
if(!isset($error)){

try {

    if(isset($password)){

        $hashedpassword = $user->create_hash($password);

        //update into database
        $stmt = $db->prepare('UPDATE techno_blog_users SET username = :username, password = :password, email = :email WHERE userId = :userId') ;
        $stmt->execute(array(
            ':username' => $username,
            ':password' => $hashedpassword,
            ':email' => $email,
            ':userId' => $userId
        ));


    } else {

        //update database
        $stmt = $db->prepare('UPDATE admin_users SET username = :username, email = :email WHERE userId = :userId') ;
        $stmt->execute(array(
            ':username' => $username,
            ':email' => $email,
            ':userId' => $userId
        ));

    }
    

    //redirect to users page
    header('Location: admin-users.php?action=updated');
    exit;

} catch(PDOException $e) {
    echo $e->getMessage();
}
}
