<?php
require_once __DIR__ . '/../models/AppointmentModel.php';


class AppointmentService {
    private $conn;
    private $table = "appointments";

    public function __construct($db) {
        $this->conn = $db;
    }

    // ✅ Create Appointment
    public function createAppointment($data) {
    // Convert dd-mm-yyyy → yyyy-mm-dd before saving
        $date = $data['date'] ?? null;
        if ($date) {
            $dateObj = DateTime::createFromFormat("d-m-Y", $date);
            if ($dateObj) {
                $date = $dateObj->format("Y-m-d"); // ✅ Store format
            } else {
                throw new Exception("Invalid date format. Expected dd-mm-yyyy");
            }
            }

            $appointment = new Appointment(
                isset($data['patient_id']) ? (int)$data['patient_id'] : null,
                $data['doctor'] ?? null,
                $date, // stored in yyyy-mm-dd
                $data['time'] ?? null
            );

            $query = "INSERT INTO " . $this->table . " (doctor, date, time) VALUES (:doctor, :date, :time)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":doctor", $appointment->doctor);
            $stmt->bindParam(":date", $appointment->date);
            $stmt->bindParam(":time", $appointment->time);

            if ($stmt->execute()) {
                $appointment->id = $this->conn->lastInsertId();

                // Convert back to dd-mm-yyyy for API response
                $appointment->date = date("d-m-Y", strtotime($appointment->date));

                return $appointment;
            }

        return false;
    }


    // ✅ Get All Appointments
    public function getAppointments() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // ✅ Get Appointment by ID
    public function getAppointmentById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $appointment = new Appointment(
                isset($row['patient_id']) ? (int)$row['patient_id'] : null, // <-- Correct first param
                $row['doctor'] ?? null,
                $row['date'] ?? null,
                $row['time'] ?? null
            );
            $appointment->id = $row['id'];
            $appointment->created_at = $row['created_at'];
            $appointment->updated_at = $row['updated_at'];
        
            return $appointment;
        }
        return null;
    }


    // ✅ Update Appointment
    public function updateAppointment($id, $updateData) {
        $query = "UPDATE " . $this->table . " 
                SET doctor = :doctor, date = :date, time = :time, updated_at = NOW() 
                WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":doctor", $updateData['doctor']);
        $stmt->bindParam(":date", $updateData['date']); // Should be YYYY-MM-DD
        $stmt->bindParam(":time", $updateData['time']); // HH:MM:SS
        $stmt->bindParam(":id", $id);

        if ($stmt->execute()) {
            return $this->getAppointmentById($id);
        }
        return false;
    }


    // ✅ Delete Appointment
    public function deleteAppointment($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

}
