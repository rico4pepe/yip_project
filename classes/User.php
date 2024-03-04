<?php
require_once 'Dbconnect.php';
//require_once (__DIR__ . '/../utilities/Sanitize.php');
class User extends Dbconnect {
    private $tableName;
    private $password;
    private $email;
    private $name;
    private $re_password;


    public function __construct($tableName) {
        parent::__construct();
        $this->tableName = $tableName;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    

    public function register() {
        
        $conn = $this->getConnection();
        try{


            if ($this->checkEmailExists($this->email)) {
                // Email already exists, return false
                return false;
            }
            
             // Hash the password
            $passwordHash = password_hash($this->password, PASSWORD_DEFAULT);

            // Prepare SQL statement
            $stmt = $conn->prepare("INSERT INTO {$this->tableName} (name, email, password) VALUES (:nm, :em, :pa)");
            // Bind parameters and execute the statement
            $stmt->bindParam(':nm', $this->name);
            $stmt->bindParam(':em', $this->email);
            $stmt->bindParam(':pa', $passwordHash); // Assuming password is hashed before insertion
            $stmt->execute();

             // Check if the query was successful
            if ($stmt->rowCount() > 0) {
                return true; // Registration successful
            } else {
                return false; // Failed to insert user data
            }
        }catch(Exception $e){
            return false;
        }

        // Check if the password and reset password match
               
    }

    public function checkEmailExists($email) {
        try {
            $conn = $this->getConnection();
            $stmt = $conn->prepare("SELECT COUNT(*) FROM {$this->tableName} WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            
            return ($count > 0);
        } catch (Exception $e) {
            // Handle exceptions as per your application's requirements
            return false;
        }
    }
    
}