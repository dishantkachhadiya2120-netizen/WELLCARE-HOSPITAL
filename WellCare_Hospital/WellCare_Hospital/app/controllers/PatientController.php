<?php
require_once __DIR__ . '/../services/PatientService.php';
require_once __DIR__ . '/../middlewares/ValidationMiddleware.php';
header('Content-Type: application/json');

class PatientController {
    private $service;

    public function __construct($db) {
        $this->service = new PatientService($db);
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // =======================
    // Patient Registration
    // =======================
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['status' => false, 'message' => 'Invalid request method']);
            return;
        }

        try {
            // Accept JSON or form-data
            $input = file_get_contents("php://input");
            $data = json_decode($input, true) ?? [];
            if (!is_array($data) || empty($data)) {
                $data = $_POST; // fallback only if JSON body is empty
            }
            if (!is_array($data)) $data = [];

            // Validate input
            $validation = ValidationMiddleware::validateRegistration($data);
            if (!$validation['status']) {
                echo json_encode(['status' => false, 'errors' => $validation['errors']]);
                return;
            }

            // Check if email exists
            if ($this->service->isEmailExists($data['email'])) {
                echo $data['email'];
                echo json_encode(['status' => false, 'message' => 'Email already registered.']);
                return;
            }

            // Hash password
            $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);

            // Create patient object
            $patient = new Patient([
                'full_name' => trim($data['full_name']),
                'email'     => trim($data['email']),
                'phone'     => $data['phone'],
                'dob'       => $data['dob'],
                'age'       => intval($data['age']),
                'gender'    => $data['gender'],
                'password'  => $hashedPassword
            ]);

            $result = $this->service->register($patient);
            
            $token = bin2hex(random_bytes(16));

            $_SESSION['token']   = $token;
            $_SESSION['user_type'] = "patient";

            echo json_encode([
                'status'  => $result['status'] === 'success',
                'message' => $result['status'] === 'success' ? 'Registration successful.' : $result['message'],
                'user'    => [
                    'full_name' => $patient->full_name,
                    'user_type' => 'patient',
                ],
                'token'  => $token
            ]);

        } catch (Exception $e) {
            echo json_encode(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    // =======================
    // Login
    // =======================
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['status' => false, 'message' => 'Invalid request method']);
            return;
        }

        try {
            $input = file_get_contents("php://input");
            $data = json_decode($input, true);

            if (!is_array($data)) $data = $_POST;
            
            $data = is_array($data) ? $data : [];

            // Validate
            $validation = ValidationMiddleware::validateLogin($data);
            
            if (!$validation['status']) {
                echo json_encode([
                    'status' => false,
                    'errors' => $validation['errors']
                ]);
                return;
            }

            $email    = $data['email'] ?? '';
            $password = $data['password'] ?? '';
            $userType = $data['user_type'] ?? 'patient';

            // Authenticate user
            $user = $this->service->login($email, $password);
            if (!$user) {
                echo json_encode([
                    'status' => false,
                    'message' => 'Invalid email or password.'
                ]);
                return;
            }

            // Store session
            $token = bin2hex(random_bytes(16));

            $_SESSION['token']   = $token;
            $_SESSION['user_type'] = $userType;
            
            echo json_encode([
                'status'  => true,
                'message' => 'Login successful.',
                'user'    => [
                    'id'        => $user['id'],
                    'full_name' => $user['full_name'] ?? '',
                    'email'     => $user['email'],
                    'user_type' => $userType
                ],
                'token'   => $token
            ]);

        } catch (Exception $e) {
            echo json_encode(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function getProfile() {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            echo json_encode(['status' => false, 'message' => 'Invalid request method']);
            return;
        }

        try {
            if (!isset($_SESSION['user_id'])) {
                echo json_encode(['status' => false, 'message' => 'User not logged in.']);
                return;
            }

            $userId = $_SESSION['user_id'];
            $profile = $this->service->getProfile($userId);

            if (!$profile) {
                echo json_encode(['status' => false, 'message' => 'Profile not found.']);
                return;
            }

            echo json_encode([
                'status' => true,
                'user'   => $profile
            ]);

        } catch (Exception $e) {
            echo json_encode(['status' => false, 'message' => $e->getMessage()]);
        }
    }

        // =======================
    // Update Profile
    // =======================
    public function updateProfile() {
        if ($_SERVER['REQUEST_METHOD'] !== 'PUT' && $_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['status' => false, 'message' => 'Invalid request method']);
            return;
        }

        try {
            if (!isset($_SESSION['user_id'])) {
                echo json_encode(['status' => false, 'message' => 'User not logged in.']);
                return;
            }

            $userId = $_SESSION['user_id'];

            // Get request body (JSON or form-data)
            $input = file_get_contents("php://input");
            $data = json_decode($input, true) ?? $_POST;
            if (!is_array($data)) $data = [];

            // Simple validation
            $errors = ValidationMiddleware::validateProfileUpdate($data);
            if (!$errors['status']) {
                echo json_encode(['status' => false, 'errors' => $errors['errors']]);
                return;
            }

            // Update using service
            $result = $this->service->updateProfile($userId, $data);

            echo json_encode($result);

        } catch (Exception $e) {
            echo json_encode(['status' => false, 'message' => $e->getMessage()]);
        }
    }

}