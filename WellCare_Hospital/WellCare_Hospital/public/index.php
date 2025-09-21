    <?php
    $base_url = "http://localhost/WellCare_Hospital_2/WellCare_Hospital/public";
    $page = $_GET['page'] ?? 'home';

    // --- Routes ---
    $routes = [
        // Public Pages
        "home"        => __DIR__ . "/../app/view/home.php",
        "about"       => __DIR__ . "/../app/view/about.php",
        "contact"     => __DIR__ . "/../app/view/contact.php",
        // "login"       => __DIR__ . "/../app/view/login.php",
        "register"    => __DIR__ . "/../app/view/patients/register.php",

        // Appointment (logged-in patients)
        "appointment" => __DIR__ . "/../app/view/patient/appointment.php",

        // Admin Dashboard
        "admin"       => __DIR__ . "/../app/view/admin/admin_dashboard.php",

        // Doctor Dashboard
        "doctor"      => __DIR__ . "/../app/view/doctors/doctor_dashboard.php",
        "doctors_appointments" => __DIR__ . "/../app/view/doctors/appointments.php",
        "prescriptions"=> __DIR__ . "/../app/view/doctors/prescriptions.php",
        "admitted_patients"    => __DIR__ . "/../app/view/doctors/admittedPatients.php",

        // Patient Pages
        "patient_dashboard"      => __DIR__ . "/../app/view/patients/dashboard.php",
        "patient_book_appointment"    => __DIR__ . "/../app/view/patients/appointment.php",
        "patient_myappointments" => __DIR__ . "/../app/view/patients/myappointments.php",
        "patient_profile"        => __DIR__ . "/../app/view/patients/profile.php",
    ];

    $title = ucfirst($page) . " - WellCare Hospital";
    $view_file = $routes[$page] ?? null;

    // --- Include Database ---
    require_once __DIR__ . '/../app/config/database.php'; // defines $conn

    $database = new Database();
    $conn = $database->getConnection();

    if (!$conn) {
        die("Database connection not available!");
    }

    // --- Handle POST requests ---
    if ($page === 'register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once __DIR__ . '/../app/middlewares/JsonMiddleware.php';
        require_once __DIR__ . '/../app/routes/PatientRouter.php';

        $router = new PatientRouter($conn);
        $router->handle($page);  // pass page as action
        exit;
    }

    if ($page === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once __DIR__ . '/../app/middlewares/JsonMiddleware.php';
        require_once __DIR__ . '/../app/routes/PatientRouter.php'; // ✅ Updated

        $router = new PatientRouter($conn); // ✅ Use PatientRouter
        $router->handle($page); // ✅ Call login method from PatientProfileRouter
        exit;
    }

    if ($page === 'patient-profile' && $_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once __DIR__ . '/../app/middlewares/JsonMiddleware.php';
        require_once __DIR__ . '/../app/routes/PatientRouter.php'; // ✅ Updated

        $router = new PatientRouter($conn); // ✅ Use PatientController
        $router->handle($page); // ✅ Call getProfile method from PatientRouter
        exit;
    }

    if ($page === 'update-profile' && $_SERVER['REQUEST_METHOD'] === 'PUT') {
        require_once __DIR__ . '/../app/middlewares/JsonMiddleware.php';
        require_once __DIR__ . '/../app/routes/PatientRouter.php'; // ✅ Updated

        $router = new PatientRouter($conn); // ✅ Use PatientController
        $router->handle($page); // ✅ Call getProfile method from PatientRouter
        exit;
    }

    if ($page === 'book-appointment' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once __DIR__ . '/../app/middlewares/JsonMiddleware.php';
        require_once __DIR__ . '/../app/routes/AppointmentRouter.php';

        $router = new AppointmentRouter($conn);
        $router->handle($page); // ✅ pass the data explicitly
        exit;
    }

    if ($page === 'get-appointments' && $_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once __DIR__ . '/../app/middlewares/JsonMiddleware.php';
        require_once __DIR__ . '/../app/routes/AppointmentRouter.php'; // ✅ Updated

        $router = new AppointmentRouter($conn); // ✅ Use PatientController
        $router->handle($page); // ✅ Call getProfile method from PatientRouter
        exit;
    }
    
    if ($page === 'edit-appointment' && $_SERVER['REQUEST_METHOD'] === 'PUT') {
        require_once __DIR__ . '/../app/middlewares/JsonMiddleware.php';
        require_once __DIR__ . '/../app/routes/AppointmentRouter.php'; // ✅ Updated

        $router = new AppointmentRouter($conn); // ✅ Use PatientController
        $router->handle($page); // ✅ Call getProfile method from PatientRouter
        exit;
    }

    if ($page === 'delete-appointment' && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
        require_once __DIR__ . '/../app/middlewares/JsonMiddleware.php';
        require_once __DIR__ . '/../app/routes/AppointmentRouter.php'; // ✅ Updated

        $router = new AppointmentRouter($conn); // ✅ Use PatientController
        $router->handle($page); // ✅ Call getProfile method from PatientRouter
        exit;
    }

    if ($page === 'doctor-login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once __DIR__ . '/../app/middlewares/JsonMiddleware.php';
        require_once __DIR__ . '/../app/routes/DoctorRouter.php';

        $router = new DoctorRouter($conn);
        $router->handle($page); // ✅ pass the data explicitly
        exit;
    }
    // --- Include master layout for GET requests ---
    include __DIR__ . "/../app/view/layout/master.php";
