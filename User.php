<?php
class User {
    private $conn;
    private $table_name = 'users'; 

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($username, $email, $password) {
        try {
            $query = "INSERT INTO {$this->table_name} (username, email, password) VALUES (:username, :email, :password)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage(); 
            return false;
        }
    }

    public function login($email, $password) {
        $query = "SELECT id, username, email, password FROM {$this->table_name} WHERE email = :email";
    
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['username'] = $row['username']; 
                return true;
            }
        }
        return false;
    }    
}
?>
