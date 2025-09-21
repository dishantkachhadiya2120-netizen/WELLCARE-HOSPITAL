<?php
require_once __DIR__ . '/../controllers/DoctorController.php';

class DoctorRouter {
    private $controller;

    public function __construct($conn) {
        $this->controller = new DoctorController($conn);
    }

    public function handle($action) {
        switch ($action) {
            case 'doctor-login':
                $this->controller->doctor_login();
                break;
            case 'patient-profile':
                $this->controller->getProfile();
                break;
            case 'update-profile':
                $this->controller->updateProfile();
                break;
            case 'appointments':
                $this->controller->getAppointments();
                break;
            default:
                http_response_code(404);
                echo json_encode([
                    'status'  => false, 
                    'message' => 'Endpoint not found'
                ]);
        }
    }
}
?>