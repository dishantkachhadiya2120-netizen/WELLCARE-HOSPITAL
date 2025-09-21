<?php
require_once __DIR__ . '/../services/DoctorService.php';
require_once __DIR__ . '/../middlewares/ValidationMiddleware.php';
class DoctorController {
    private $service;

    public function __construct($db) {
        $this->service = new DoctorService($db);
    }

    // Login API
    public function doctor_login() {
        $input = file_get_contents("php://input");
        $data = json_decode($input, true);

        if (!is_array($data)) $data = $_POST;
        $data = is_array($data) ? $data : [];
        
        $validation = ValidationMiddleware::validateLogin($data);
            
            if (!$validation['status']) {
                echo json_encode([
                    'status' => false,
                    'errors' => $validation['errors']
                ]);
                return;
            }

        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;

        if (!$email || !$password) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'message' => 'Email and password are required'
            ]);
            return;
        }

        $doctor = $this->service->login($email, $password);
        if (!$doctor) {
            http_response_code(401);
            echo json_encode([
                'success' => false,
                'message' => 'Invalid credentials'
            ]);
            return;
        }

        // Optional: generate a token for session
        $token = bin2hex(random_bytes(16));

        echo json_encode([
            'success' => true,
            'doctor' => [
                'id' => $doctor['id'],
                'name' => $doctor['name'],
                'email' => $doctor['email']
            ],
            'token' => $token
        ]);
    }
}
