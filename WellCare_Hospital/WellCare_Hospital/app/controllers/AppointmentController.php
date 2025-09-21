<?php
require_once __DIR__ . '/../services/AppointmentService.php';
require_once __DIR__ . '/../middlewares/ValidationMiddleware.php';

// use App\Middlewares\ValidationMiddleware;
class AppointmentController {
    private $service;

    public function __construct($db) {
        $this->service = new AppointmentService($db);
    }
    
    // 📌 Book a new appointment (POST)
    public function bookAppointment() {

        $input = file_get_contents("php://input");
        $data = json_decode($input, true)?? [];
        if (!is_array($data) || empty($data)) {
            $data = $_POST; // fallback only if JSON body is empty
        }
        if (!is_array($data)) $data = [];

        $errors = ValidationMiddleware::validate($data);
        if (!empty($errors)) {
            http_response_code(400);
            echo json_encode(["success" => false, "errors" => $errors]);
            return;
        }
        
        try {
            $appointment = $this->service->createAppointment($data);
            http_response_code(201);
            echo json_encode(["success" => true, "appointment" => $appointment]);
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode(["success" => false, "message" => $e->getMessage()]);
        }
    }

    // 📌 Get all appointments (GET)
    public function getAllAppointments() {
        try {
            $appointments = $this->service->getAppointments();

            // Convert DB date (Y-m-d) -> response (d-m-Y)
            foreach ($appointments as &$appointment) {
                if (!empty($appointment['date'])) {
                    $date = DateTime::createFromFormat('Y-m-d', $appointment['date']);
                    if ($date) {
                        $appointment['date'] = $date->format('d-m-Y');
                    }
                }
            }

            echo json_encode([
                "success"      => true,
                "appointments" => $appointments
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                "success" => false,
                "message" => $e->getMessage()
            ]);
        }
    }


    // 📌 Edit appointment (PUT)
    public function editAppointment() {
        // ---- Read PUT body ----
        $input = json_decode(file_get_contents("php://input"), true);

        // Get id (from query param or body)
        $id = $_GET['id'] ?? $input['id'] ?? null;

        if (!$id) {
            http_response_code(400);
            echo json_encode(["success" => false, "message" => "Appointment ID is required"]);
            return;
        }

        // Validate request data
        $validation = ValidationMiddleware::validateAppointment($input);
        if (!$validation['status']) {
            http_response_code(400);
            echo json_encode(["success" => false, "errors" => $validation['errors']]);
            return;
        }

        try {
            $updated = $this->service->updateAppointment($id, $input);
            if (!$updated) {
                http_response_code(404);
                echo json_encode(["success" => false, "message" => "Appointment not found"]);
                return;
            }
            echo json_encode(["success" => true, "appointment" => $updated]);
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode(["success" => false, "message" => $e->getMessage()]);
        }
    }

    // 📌 Delete appointment (DELETE)
    // DELETE Appointment API
   public function deleteAppointment() {
        // Read JSON body
        $input = json_decode(file_get_contents("php://input"), true) ?? [];
    
        // Check GET, POST fallback, then JSON body
        $id = $_GET['id'] ?? $_POST['id'] ?? $input['id'] ?? null;

        if (!$id) {
            http_response_code(400);
            echo json_encode(["success" => false, "message" => "Appointment ID is required"]);
            return;
        }

        try {
            $deleted = $this->service->deleteAppointment($id);
            if ($deleted) {
                echo json_encode(["success" => true, "message" => "Appointment deleted successfully"]);
            } else {
                http_response_code(404);
                echo json_encode(["success" => false, "message" => "Appointment not found"]);
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(["success" => false, "message" => $e->getMessage()]);
        }
    }
}
