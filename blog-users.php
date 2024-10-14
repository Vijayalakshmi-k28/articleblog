<?php
require_once('.../includes/config.php');

if (!$user->is_logged_in()){ header ('Location: login.php');
if(isset($_GET['deluser'])){
    if($_GET['deluser'] !='1'){
        $stmt = $db->prepare('DELETE FROM ');
    }
    }
}    