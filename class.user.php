<?php 
class User{
    private $db;
    public function __construct($db){
        $this->db = $db;
}
public function is_logged_in(){
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        return true;
    }
}
public function create_hash($value){
    return $hash = crypt($value, '$2a$12.substr(str_replace('+','.',base64_encode(sha1(microtime(true),true))),0,22)');
}
private function verify_hash($password ,$hash){
    return $hash == crypt($password, $hash);
}
private function get_user_hash($userName){
    try{
        $stmt = $this->db->prepare('SELECT password FROM article_users WHERE userName = :userName ');
        $stmt->execute(array('userName'=> $userName));
        $row = $stmt->fetch();
        return $row['password'];

    } catch(PDOException $e){
        echo '<p class="error">' .$e->getMessage() .'</p>';
    }
}
public function login($userName, $password){
    $hashed = $this->get_user_hash($userName);
    if($this->verify_hash($password,$hashed) == 1){
        $SESSION['loggedin'] = true;
        return true;
    }
}
public function logout(){
    session_destroy();
}
}