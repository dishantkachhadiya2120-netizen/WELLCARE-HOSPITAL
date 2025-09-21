  <!-- <header class="text-white body-font bg-gradient-to-r from-purple-600 to-pink-600 shadow-md">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      
      <a href="index.php?page=home" class="flex title-font font-bold items-center text-white mb-4 md:mb-0">
        <svg xmlns="http://www.w3.org/2000/svg" 
            fill="none" viewBox="0 0 24 24" 
            stroke="currentColor" 
            class="w-10 h-10 text-white p-2 bg-pink-500 rounded-full">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M12 4v16m8-8H4" />
        </svg>
        <span class="ml-3 text-2xl">WellCare Hospital</span>
      </a>

      <nav id="mainNav" class="md:ml-auto flex flex-wrap items-center text-lg justify-center">
    <a href="index.php?page=home" class="mr-6 hover:text-gray-200">Home</a>
    <a href="index.php?page=about" class="mr-6 hover:text-gray-200">About Us</a>
    <a href="index.php?page=contact" class="mr-6 hover:text-gray-200">Contact</a>

      <php if (!isset($_SESSION['user_type'])): ?>
        <a href="index.php?page=login" class="mr-6 hover:text-gray-200">Login</a>
        <a href="index.php?page=register" class="hover:text-gray-200">Register</a>
      <php else: ?>
        <php if ($_SESSION['user_type'] === 'patient'): ?>
          <a href="index.php?page=appointment" class="mr-6 hover:text-gray-200">Book Appointment</a>
        <php elseif ($_SESSION['user_type'] === 'doctor'): ?>
          <a href="index.php?page=doctor_dashboard" class="mr-6 hover:text-gray-200">Dashboard</a>
        <php elseif ($_SESSION['user_type'] === 'admin'): ?>
          <a href="index.php?page=admin_dashboard" class="mr-6 hover:text-gray-200">Dashboard</a>
        <php endif; ?>
        <a href="logout.php" class="hover:text-gray-200">Logout</a>
        <php endif; ?>
    </nav>

    </div>
  </header> -->

<!-- Navbar -->
<header class="text-white body-font bg-gradient-to-r from-purple-600 to-pink-600 shadow-md">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    
    <!-- Logo -->
    <a href="index.php?page=home" class="flex title-font font-bold items-center text-white mb-4 md:mb-0">
      <svg xmlns="http://www.w3.org/2000/svg" 
           fill="none" viewBox="0 0 24 24" 
           stroke="currentColor" 
           class="w-10 h-10 text-white p-2 bg-pink-500 rounded-full">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M12 4v16m8-8H4" />
      </svg>
      <span class="ml-3 text-2xl">WellCare Hospital</span>
    </a>

    <!-- Links -->
    <nav id="mainNav" class="md:ml-auto flex flex-wrap items-center text-lg justify-center">
      <!-- Dynamic links -->
      <span id="guestLinks">
        <!-- <a href="index.php?page=login" class="mr-6 hover:text-gray-200">Login</a> -->
         <a href="index.php?page=home" class="mr-6 hover:text-gray-200">Home</a>
         <a href="index.php?page=about" class="mr-6 hover:text-gray-200">About Us</a>
         <a href="index.php?page=contact" class="mr-6 hover:text-gray-200">Contact</a>
         <a href="index.php?page=register" class="hover:text-gray-200">Register</a>
      </span>

      <span id="patientLinks" class="hidden">
        <a href="index.php?page=patient_dashboard" class="mr-6 hover:text-gray-200">Patient dashboard</a>
        <a href="index.php?page=patient_myappointments" class="mr-6 hover:text-gray-200">My Appointment</a>
        <a href="index.php?page=patient_book_appointment" class="mr-6 hover:text-gray-200">Book Appointment</a>
        <a href="index.php?page=patient_profile" class="mr-6 hover:text-gray-200">Profile</a>
        <a href="#" id="logoutBtn" class="hover:text-gray-200">Logout</a>
      </span>

      <span id="doctorLinks" class="hidden">
        <a href="index.php?page=doctor" class="mr-6 hover:text-gray-200">Dashboard</a>
        <a href="#" id="logoutBtn" class="hover:text-gray-200">Logout</a>
      </span>

      <span id="adminLinks" class="hidden">
        <a href="index.php?page=admin" class="mr-6 hover:text-gray-200">Dashboard</a>
        <a href="#" id="logoutBtn" class="hover:text-gray-200">Logout</a>
      </span>
    </nav>
  </div>
</header>

