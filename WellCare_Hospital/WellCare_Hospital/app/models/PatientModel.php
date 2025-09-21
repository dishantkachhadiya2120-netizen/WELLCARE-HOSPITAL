<?php
class Patient {
    public ?int $id;
    public ?string $full_name;
    public ?string $email;
    public ?string $phone;
    public ?string $dob;
    public ?int $age;
    public ?string $gender;
    public ?string $password;
    
    public function __construct(array $data = []) {
        $this->id        = $data['id'] ?? null;
        $this->full_name = $data['full_name'] ?? null;
        $this->email     = $data['email'] ?? null;
        $this->phone     = $data['phone'] ?? null;
        $this->dob       = $data['dob'] ?? null;
        $this->age       = isset($data['age']) ? (int)$data['age'] : null;
        $this->gender    = $data['gender'] ?? null;
        $this->password  = $data['password'] ?? null;
    }
}
