<?php
require_once __DIR__ . '/../controllers/PatientController.php';

class PatientRouter {
    private $controller;

    public function __construct($conn) {
        $this->controller = new PatientController($conn);
    }

    public function handle($action) {
        switch ($action) {
            case 'register':
                $this->controller->register();
                break;
            case 'login':
                $this->controller->login();
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