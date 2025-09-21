<!-- <section class="text-white body-font bg-gradient-to-r from-purple-600 to-pink-600 min-h-screen">
  <div class="container mx-auto px-5 py-16">
    <h1 class="text-4xl font-bold mb-6">Welcome, <?php echo $_SESSION['user_name']; ?> 👋</h1>
    <p class="mb-10 text-lg">Here’s your patient dashboard overview.</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <a href="index.php?page=appointment" class="p-6 bg-white/20 rounded-xl shadow hover:bg-white/30">
        <h2 class="text-2xl font-bold">Book Appointment</h2>
        <p class="mt-2">Schedule your next appointment easily.</p>
      </a>
      <a href="index.php?page=myappointments" class="p-6 bg-white/20 rounded-xl shadow hover:bg-white/30">
        <h2 class="text-2xl font-bold">My Appointments</h2>
        <p class="mt-2">View and manage all your appointments.</p>
      </a>
      <a href="index.php?page=profile" class="p-6 bg-white/20 rounded-xl shadow hover:bg-white/30">
        <h2 class="text-2xl font-bold">My Profile</h2>
        <p class="mt-2">Update your personal details securely.</p>
      </a>
    </div>
  </div>
</section> -->
<section class="text-white body-font min-h-screen">
  <div class="container mx-auto px-5 py-16 text-center">
    <h1 class="text-4xl font-bold mb-6">Welcome, John Doe</h1>
    <p class="mb-10 text-lg">Here’s your patient dashboard overview.</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <a href="index.php?page=patient_book_appointment" class="p-6 bg-white/20 rounded-xl shadow hover:bg-white/30">
        <h2 class="text-2xl font-bold">Book Appointment</h2>
        <p class="mt-2">Schedule your next appointment easily.</p>
        <p class="mt-2 text-sm">Next available slot: 20 Aug 2025, 10:00 AM</p>
      </a>
      <a href="index.php?page=patient_myappointments" class="p-6 bg-white/20 rounded-xl shadow hover:bg-white/30">
        <h2 class="text-2xl font-bold">My Appointments</h2>
        <p class="mt-2">View and manage all your appointments.</p>
        <ul class="mt-2 text-sm list-disc list-inside">
          <li>Dr. Smith - 18 Aug 2025, 2:00 PM</li>
          <li>Dr. Allen - 22 Aug 2025, 11:00 AM</li>
        </ul>
      </a>
      <a href="index.php?page=patient_profile" class="p-6 bg-white/20 rounded-xl shadow hover:bg-white/30">
        <h2 class="text-2xl font-bold">My Profile</h2>
        <p class="mt-2">Update your personal details securely.</p>
        <p class="mt-2 text-sm">Email: john.doe@example.com</p>
        <p class="mt-1 text-sm">Phone: +1 234 567 890</p>
      </a>
    </div>
  </div>
</section>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="/WellCare_Hospital_2/WellCare_Hospital/public/js/Patient.js"></script>