<section class="text-white body-font min-h-screen">
  <div class="container mx-auto px-5 py-16">
    <h1 class="text-4xl font-bold mb-6 text-center">My Appointments</h1>
    
    <div class="bg-white/20 rounded-xl shadow-md p-6">
      <table id="appointmentsTable" class="w-full text-center">
        <thead>
          <tr>
            <th class="py-3 px-4">Doctor</th>
            <th class="py-3 px-4">Date</th>
            <th class="py-3 px-4">Time</th>
            <th class="py-3 px-4">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="4" class="py-3 px-4 text-gray-300">
              Loading appointments...
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>
<!-- Edit Appointment Modal -->
<div id="editAppointmentModal" class="hidden fixed inset-0 flex items-center justify-center bg-black/50 z-50">
    <div class="bg-white text-black p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-bold mb-4">Edit Appointment</h2>

        <form id="editAppointmentForm">
            <input type="hidden" id="edit_appointment_id" name="appointment_id">

            <div class="mb-4">
                <label class="block mb-1 font-medium">Doctor</label>
                <input
                    type="text"
                    id="edit_doctor"
                    name="doctor"
                    class="w-full p-2 border rounded"
                    required
                />
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Date</label>
                <input
                    type="date"
                    id="edit_date"
                    name="date"
                    class="w-full p-2 border rounded"
                    required
                />
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Time</label>
                <input
                    type="time"
                    id="edit_time"
                    name="time"
                    class="w-full p-2 border rounded"
                    required
                />
            </div>

            <div class="flex justify-between">
                <button type="button" id="cancelEdit" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">
                    Cancel
                </button>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

