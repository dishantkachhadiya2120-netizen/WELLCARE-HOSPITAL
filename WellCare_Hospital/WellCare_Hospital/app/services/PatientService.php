<?php
require_once __DIR__ . '/../models/PatientModel.php';

class PatientService {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    // ✅ Check if email already exists
    public function isEmailExists($email) {
        $stmt = $this->conn->prepare("SELECT id FROM patients WHERE email = :email LIMIT 1");
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result !== false; // returns true if email exists
    }

    // ✅ Register patient (without user_type)
    public function register(Patient $patient) {
        try {
            $stmt = $this->conn->prepare("
                INSERT INTO patients (full_name, email, phone, dob, age, gender, password) 
                VALUES (:full_name, :email, :phone, :dob, :age, :gender, :password)
            ");

            $stmt->bindParam(":full_name", $patient->full_name);
            $stmt->bindParam(":email", $patient->email);
            $stmt->bindParam(":phone", $patient->phone);
            $stmt->bindParam(":dob", $patient->dob);
            $stmt->bindParam(":age", $patient->age);
            $stmt->bindParam(":gender", $patient->gender);
            $stmt->bindParam(":password", $patient->password); // ensure password is hashed before calling

            $stmt->execute();

            return ["status" => "success", "message" => "Patient registered successfully"];
        } catch (PDOException $e) {
            return ["status" => "error", "message" => $e->getMessage()];
        }
    }

    // ✅ Login patient
    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM patients WHERE email = :email");
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            unset($user['password']); // remove sensitive info
            return $user;
        }

        return false; // invalid credentials
    }
    // ✅ Get patient profile by ID
    public function getProfile($id) {
        $stmt = $this->conn->prepare("SELECT id, full_name, email, phone, dob, age, gender FROM patients WHERE id = :id LIMIT 1");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ?: false;
    }

        // ✅ Update patient profile
    public function updateProfile($id, array $data) {
        try {
            $stmt = $this->conn->prepare("
                UPDATE patients 
                SET full_name = :full_name, 
                    email = :email, 
                    phone = :phone, 
                    dob = :dob, 
                    age = :age, 
                    gender = :gender
                    WHERE id = :id
            ");

            $stmt->bindValue(":full_name", $data['full_name'], PDO::PARAM_STR);
            $stmt->bindValue(":email", $data['email'], PDO::PARAM_STR);
            $stmt->bindValue(":phone", $data['phone'], PDO::PARAM_STR);
            $stmt->bindValue(":dob", $data['dob'], PDO::PARAM_STR);
            $stmt->bindValue(":age", $data['age'], PDO::PARAM_INT);
            $stmt->bindValue(":gender", $data['gender'], PDO::PARAM_STR);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            return ["status" => true, "message" => "Profile updated successfully."];
        } catch (PDOException $e) {
            return ["status" => false, "message" => $e->getMessage()];
        }
    }

}
?>