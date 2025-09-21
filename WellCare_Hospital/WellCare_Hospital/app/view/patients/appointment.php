<!-- <section class="text-white body-font min-h-screen">
  <div class="container mx-auto px-5 py-16">
    <h1 class="text-4xl font-bold mb-6 text-center">Book Appointment</h1>
    
    <form action="appointment_submit.php" method="POST" class="bg-white/80 p-8 rounded-xl shadow-md max-w-lg mx-auto">
      <div class="mb-4">
        <label class="block font-medium mb-2 text-gray-700">Select Doctor</label>
        <select name="doctor" class="w-full p-3 rounded bg-white/90 text-black" required>
          <option value="">-- Choose Doctor --</option>
          <option value="Dr. Smith">Dr. Smith (Cardiologist)</option>
          <option value="Dr. Johnson">Dr. Johnson (Neurologist)</option>
          <option value="Dr. Lee">Dr. Lee (Dermatologist)</option>
        </select>
      </div>
      <div class="mb-4">
        <label class="block font-medium mb-2 text-gray-700">Date</label>
        <input type="date" name="date" class="w-full p-3 rounded bg-white/90 text-black" required>
      </div>
      <div class="mb-4">
        <label class="block font-medium mb-2 text-gray-700" >Time</label>
        <input type="time" name="time" class="w-full p-3 rounded bg-white/90 text-black" required>
      </div>
      <button type="submit" class="w-full bg-pink-500 text-white py-3 rounded-lg hover:bg-pink-600">
        Confirm Appointment
      </button>
    </form>
  </div>
</section> -->
<section class="text-white body-font min-h-screen">
  <div class="container mx-auto px-5 py-16">
    <h1 class="text-4xl font-bold mb-6 text-center">Book Appointment</h1>
    
    <form id="appointmentForm" class="bg-white/80 p-8 rounded-xl shadow-md max-w-lg mx-auto">
      <div class="mb-4">
        <label class="block font-medium mb-2 text-gray-700">Select Doctor</label>
        <select name="doctor" class="w-full p-3 rounded bg-white/90 text-black" required>
          <option value="">-- Choose Doctor --</option>
          <option value="Dr. Smith">Dr. Smith (Cardiologist)</option>
          <option value="Dr. Johnson">Dr. Johnson (Neurologist)</option>
          <option value="Dr. Lee">Dr. Lee (Dermatologist)</option>
        </select>
      </div>
      <div class="mb-4">
        <label class="block font-medium mb-2 text-gray-700">Date</label>
        <input type="date" name="date" class="w-full p-3 rounded bg-white/90 text-black" required>
      </div>
      <div class="mb-4">
        <label class="block font-medium mb-2 text-gray-700">Time</label>
        <input type="time" name="time" class="w-full p-3 rounded bg-white/90 text-black" required>
      </div>
      <button type="submit" class="w-full bg-pink-500 text-white py-3 rounded-lg hover:bg-pink-600">
        Confirm Appointment
      </button>
    </form>

    <div id="appointmentMessage" class="mt-4 text-center text-lg"></div>
  </div>
</section>