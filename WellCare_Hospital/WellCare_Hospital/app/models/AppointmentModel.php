<?php
class Appointment {
    public ?int $patient_id;
    public ?string $doctor;
    public ?string $date;
    public ?string $time;

    public function __construct(?int $patient_id, ?string $doctor, ?string $date, ?string $time) {
        $this->patient_id = $patient_id;
        $this->doctor     = $doctor;
        $this->date       = $date;
        $this->time       = $time;
    }
}
?>