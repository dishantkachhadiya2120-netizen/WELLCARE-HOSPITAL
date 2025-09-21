<section class="p-10">
  <h2 class="text-3xl font-bold text-white mb-8 text-center" >Doctor Dashboard</h2>

  <!-- Doctor Quick Actions -->
  <div class="grid md:grid-cols-3 gap-6 mb-10">
    <div class="bg-white p-6 rounded-xl shadow-lg text-center">
      <h3 class="text-xl font-bold text-purple-700">Appointments</h3>
      <p class="text-4xl font-bold text-gray-800 mt-2">14</p>
      <a href="index.php?page=doctors_appointments" class="mt-4 inline-block px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg shadow hover:opacity-90">View</a>
    </div>
    <div class="bg-white p-6 rounded-xl shadow-lg text-center">
      <h3 class="text-xl font-bold text-purple-700">Admitted Patients</h3>
      <p class="text-4xl font-bold text-gray-800 mt-2">5</p>
      <a href="index.php?page=admitted_patients" class="mt-4 inline-block px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg shadow hover:opacity-90">Check</a>
    </div>
    <div class="bg-white p-6 rounded-xl shadow-lg text-center">
      <h3 class="text-xl font-bold text-purple-700">Prescriptions</h3>
      <p class="text-4xl font-bold text-gray-800 mt-2">21</p>
      <a href="index.php?page=prescriptions" class="mt-4 inline-block px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg shadow hover:opacity-90">Write</a>
    </div>
  </div>

  <!-- Appointments Table -->
  <div class="bg-white p-6 rounded-xl shadow-lg">
    <h3 class="text-2xl font-bold text-purple-700 mb-4 text-center">Upcoming Appointments</h3>
    <table class="w-full border-collapse">
      <thead>
        <tr class="bg-purple-100 text-purple-700 text-center">
          <th class="p-3 ">Patient</th>
          <th class="p-3 ">Date</th>
          <th class="p-3 ">Time</th>
          <th class="p-3 ">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-t text-center">
          <td class="p-3">Alice Johnson</td>
          <td class="p-3">2025-08-18</td>
          <td class="p-3">10:30 AM</td>
          <td class="p-3 space-x-2">
            <button class="px-3 py-1 bg-green-500 text-white rounded hover:opacity-90">Approve</button>
            <button class="px-3 py-1 bg-yellow-500 text-white rounded hover:opacity-90">Reschedule</button>
            <button class="px-3 py-1 bg-red-500 text-white rounded hover:opacity-90">Cancel</button>
          </td>
        </tr>
        <tr class="border-t text-center">
          <td class="p-3">Michael Brown</td>
          <td class="p-3">2025-08-19</td>
          <td class="p-3">02:00 PM</td>
          <td class="p-3 space-x-2">
            <button class="px-3 py-1 bg-green-500 text-white rounded hover:opacity-90">Approve</button>
            <button class="px-3 py-1 bg-yellow-500 text-white rounded hover:opacity-90">Reschedule</button>
            <button class="px-3 py-1 bg-red-500 text-white rounded hover:opacity-90">Cancel</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</section>
