<section class="p-10">
  <h2 class="text-3xl font-bold text-white mb-8 text-center">Admin Dashboard</h2>

  <!-- Quick Stats -->
  <div class="grid md:grid-cols-3 gap-6 mb-10">
    <div class="bg-white p-6 rounded-xl shadow-lg text-center">
      <h3 class="text-xl font-bold text-purple-700">Doctors</h3>
      <p class="text-4xl font-bold text-gray-800 mt-2">12</p>
      <a href="index.php?page=manage_doctors" class="mt-4 inline-block px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg shadow hover:opacity-90">Manage</a>
    </div>
    <div class="bg-white p-6 rounded-xl shadow-lg text-center">
      <h3 class="text-xl font-bold text-purple-700">Patients</h3>
      <p class="text-4xl font-bold text-gray-800 mt-2">85</p>
      <a href="index.php?page=manage_patients" class="mt-4 inline-block px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg shadow hover:opacity-90">View</a>
    </div>
    <div class="bg-white p-6 rounded-xl shadow-lg text-center">
      <h3 class="text-xl font-bold text-purple-700">Appointments</h3>
      <p class="text-4xl font-bold text-gray-800 mt-2">34</p>
      <a href="index.php?page=appointments" class="mt-4 inline-block px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg shadow hover:opacity-90">Check</a>
    </div>
  </div>

  <!-- Doctors Table -->
  <div class="bg-white p-6 rounded-xl shadow-lg">
    <h3 class="text-2xl font-bold text-purple-700 mb-4">Doctors List</h3>
    <table class="w-full border-collapse">
      <thead>
        <tr class="bg-purple-100 text-purple-700">
          <th class="p-3 text-left">Name</th>
          <th class="p-3 text-left">Speciality</th>
          <th class="p-3 text-left">Status</th>
          <th class="p-3 text-left">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-t">
          <td class="p-3">Dr. John Smith</td>
          <td class="p-3">Cardiology</td>
          <td class="p-3"><span class="px-3 py-1 rounded-full bg-green-100 text-green-700">Active</span></td>
          <td class="p-3 space-x-2">
            <button class="px-3 py-1 bg-yellow-500 text-white rounded hover:opacity-90">Block</button>
            <button class="px-3 py-1 bg-red-500 text-white rounded hover:opacity-90">Delete</button>
          </td>
        </tr>
        <tr class="border-t">
          <td class="p-3">Dr. Sarah Lee</td>
          <td class="p-3">Neurology</td>
          <td class="p-3"><span class="px-3 py-1 rounded-full bg-red-100 text-red-700">Blocked</span></td>
          <td class="p-3 space-x-2">
            <button class="px-3 py-1 bg-green-500 text-white rounded hover:opacity-90">Unblock</button>
            <button class="px-3 py-1 bg-red-500 text-white rounded hover:opacity-90">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</section>
