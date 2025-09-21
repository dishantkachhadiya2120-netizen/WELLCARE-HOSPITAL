<?php
require_once __DIR__ . '/../models/DoctorModel.php';

class DoctorService {
    private $conn;
    private $table = "doctors";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Login method
    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM doctors WHERE email = :email");
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            unset($user['password']); // remove sensitive info
            return $user;
        }

        return false; // invalid credentials
    }
}
