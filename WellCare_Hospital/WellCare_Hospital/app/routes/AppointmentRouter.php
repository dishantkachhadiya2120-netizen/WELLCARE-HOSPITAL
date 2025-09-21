<?php
require_once __DIR__ . '/../controllers/AppointmentController.php';

class AppointmentRouter {
    private $controller;

    public function __construct($conn) {
        $this->controller = new AppointmentController($conn);
    }

    public function handle($action) {
        switch ($action) {
            
            case 'book-appointment':
                $this->controller->bookAppointment();
                break;
            case 'edit-appointment':
                $this->controller->editAppointment();
                break;
            case 'delete-appointment':
                $this->controller->deleteAppointment();
                break;
            case 'get-appointments':
                $this->controller->getAllAppointments();
                break;
            default:
                http_response_code(404);
                echo json_encode([
                    'status'  => false, 
                    'message' => 'Endpoint not found '.$action
                ]);
        }
    }
}
?>