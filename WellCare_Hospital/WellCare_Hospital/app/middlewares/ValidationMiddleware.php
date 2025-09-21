<?php
// namespace App\Middlewares;

class ValidationMiddleware {

    // ==========================
    // Registration Validation
    // ==========================
    public static function validateRegistration(array $data): array {
        $errors = [];

        $full_name        = trim($data['full_name'] ?? '');
        $email            = trim($data['email'] ?? '');
        $phone            = trim($data['phone'] ?? '');
        $dob              = trim($data['dob'] ?? '');
        $age              = trim($data['age'] ?? '');
        $gender           = strtolower(trim($data['gender'] ?? ''));
        $password         = trim($data['password'] ?? '');
        $confirm_password = trim($data['confirm_password'] ?? '');

        if (empty($full_name)) $errors[] = "Full name is required.";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "A valid email is required.";
        if (!preg_match('/^[0-9]{10}$/', $phone)) $errors[] = "Phone number must be 10 digits.";
        if (empty($dob)) $errors[] = "Date of birth is required.";
        if (!is_numeric($age) || $age <= 0) $errors[] = "Valid age is required.";
        if (!in_array($gender, ['male', 'female', 'other'])) $errors[] = "Gender must be Male, Female or Other.";
        if (strlen($password) < 6) $errors[] = "Password must be at least 6 characters.";
        if ($password !== $confirm_password) $errors[] = "Passwords do not match.";

        return [
            'status' => empty($errors),
            'errors' => $errors
        ];
    }

    // ==========================
    // Login Validation
    // ==========================
    public static function validateLogin(array $data = []): array {
        $errors = [];

        $email    = trim($data['email'] ?? '');
        $password = trim($data['password'] ?? '');
        $userType = trim($data['user_type'] ?? '');

        if (empty($email)) {
            $errors['email'] = "Email is required.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Please enter a valid email.";
        }

        if (empty($password)) {
            $errors['password'] = "Password is required.";
        }

        if (empty($userType)) {
            $errors['user_type'] = "User type is required.";
        }

        return [
            'status' => empty($errors),
            'errors' => $errors
        ];
    }

    public static function validate($data) {
        $errors = [];

        // Doctor validation
        if (!isset($data['doctor']) || trim($data['doctor']) === '') {
            $errors['doctor'] = "Doctor is required";
        }

        // Date validation
        if (!isset($data['date']) || trim($data['date']) === '') {
            $errors['date'] = "Date is required";
        } elseif (!self::isValidDate($data['date'])) {
            $errors['date'] = "Invalid date format (expected YYYY-MM-DD)";
        }

        // Time validation
        if (!isset($data['time']) || trim($data['time']) === '') {
            $errors['time'] = "Time is required";
        } elseif (!self::isValidTime($data['time'])) {
            $errors['time'] = "Invalid time format (expected HH:MM:SS)";
        }

        return $errors;
    }

    private static function isValidDate($date) {
        $d = \DateTime::createFromFormat("d-m-Y", $date);
        return $d && $d->format("d-m-Y") === $date;
    }


    private static function isValidTime($time) {
        $t = DateTime::createFromFormat("H:i:s", $time);
        return $t && $t->format("H:i:s") === $time;
    }

        // ==========================
    // Profile Update Validation
    // ==========================
    public static function validateProfileUpdate(array $data): array {
        $errors = [];

        $full_name = trim($data['full_name'] ?? '');
        $email     = trim($data['email'] ?? '');
        $phone     = trim($data['phone'] ?? '');
        $dob       = trim($data['dob'] ?? '');
        $age       = trim($data['age'] ?? '');
        $gender    = strtolower(trim($data['gender'] ?? ''));

        if (empty($full_name)) $errors[] = "Full name is required.";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "A valid email is required.";
        if (!preg_match('/^[0-9]{10}$/', $phone)) $errors[] = "Phone number must be 10 digits.";
        if (empty($dob)) $errors[] = "Date of birth is required.";
        if (!is_numeric($age) || $age <= 0) $errors[] = "Valid age is required.";
        if (!in_array($gender, ['male', 'female', 'other'])) $errors[] = "Gender must be Male, Female or Other.";

        return [
            'status' => empty($errors),
            'errors' => $errors
        ];
    }

    public static function validateAppointment(array $data): array {
        $errors = [];

        // Doctor validation
        if (!isset($data['doctor']) || trim($data['doctor']) === '') {
            $errors['doctor'] = "Doctor is required.";
        }

        // Date validation (dd-mm-yyyy)
        if (!isset($data['date']) || trim($data['date']) === '') {
            $errors['date'] = "Date is required.";
        } elseif (!self::isValidDate($data['date'])) {
            $errors['date'] = "Invalid date format (expected DD-MM-YYYY).";
        }

        // Time validation (HH:MM:SS)
        if (!isset($data['time']) || trim($data['time']) === '') {
            $errors['time'] = "Time is required.";
        } elseif (!self::isValidTime($data['time'])) {
            $errors['time'] = "Invalid time format (expected HH:MM:SS).";
        }

        return [
            'status' => empty($errors),
            'errors' => $errors
        ];
    }

}
?>