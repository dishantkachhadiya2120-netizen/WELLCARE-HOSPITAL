<?php
class Doctor {
    public ?int $id;
    public ?string $name;
    public ?string $email;
    public ?string $password;
    public ?string $created_at;
    public ?string $updated_at;

    public function __construct($id = null, $name = null, $email = null, $password = null) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
    }
}
