<?php
class database{
    public $conn;
    public $error;
    public function __construct(){
        try{
            $this->conn = new PDO("mysql:host=localhost;dbname=users", "root", "");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        catch(PDOException $e) {
            echo 'Something went wrong' .$e->getMessage();
        }
    }
    public function required_vailidation($field)
    {
        $count= 0;
        foreach($field as $k => $v){
            if(empty($v)){
                $count++;
                $this->error .= "<p>". $k . "is required</p>";
            }

        }
        if($count==0){
            return true;
        }
    }
    public function can_login($table_name,$fields){
        $login = $fields['username'];
        $password = $fields['password'];
          $stmt= $this->conn->prepare("SELECT * from $table_name WHERE Username= :Username AND Password = :Password");
          $stmt->bindParam(':Username',$login,PDO::PARAM_STR);
          $stmt->bindParam(':Password',$password,PDO::PARAM_STR);
          $stmt->execute();
          if($stmt->rowCount()<=0){
              $this->error='Wrong username or password';
          }
          else{
              return true;

          }
    }
    public function can_register($table_name,$fields){
        $login = $fields['username'];
        $password = $fields['password'];
        $email = $fields['email'];
        $cpassword = $fields['cpassword'];
        
          $stmt= $this->conn->prepare("INSERT into $table_name (Username, Password,Email) values (:Username, :Password, :Email) ");
          $stmt->bindParam(':Username',$login,PDO::PARAM_STR);
          $stmt->bindParam(':Password',$password,PDO::PARAM_STR);
          $stmt->bindParam(':Email',$email,PDO::PARAM_STR);
          if($password !== $cpassword)
          {
            $this->error='Passwords are not the same';
          }else{
            $stmt->execute();
            header("location: index.php");
          }
         
       
}
}