  <div class="container mx-auto px-5 py-16">
  <h1 class="text-4xl font-bold mb-6 text-center text-white">My Profile</h1>

  <form class="bg-white/20 p-8 rounded-xl shadow-md max-w-lg mx-auto" onsubmit="saveProfile(event)">
    <div class="mb-4">
      <label class="block text-white font-medium mb-2">Full Name</label>
      <input type="text" id="full_name" class="profile-input w-full p-3 rounded bg-gray-200 text-black" readonly>
    </div>

    <div class="mb-4">
      <label class="block text-white font-medium mb-2">Email</label>
      <input type="email" id="email" class="profile-input w-full p-3 rounded bg-gray-200 text-black" readonly>
    </div>

    <div class="mb-4">
      <label class="block text-white font-medium mb-2">Phone</label>
      <input type="text" id="phone" class="profile-input w-full p-3 rounded bg-gray-200 text-black" readonly>
    </div>

    <div class="mb-4">
      <label class="block text-white font-medium mb-2">Date of Birth</label>
      <input type="date" id="dob" class="profile-input w-full p-3 rounded bg-gray-200 text-black" readonly>
    </div>

    <div class="mb-4">
      <label class="block text-white font-medium mb-2">Age</label>
      <input type="number" id="age" class="profile-input w-full p-3 rounded bg-gray-200 text-black" readonly>
    </div>

    <div class="mb-4">
      <label class="block text-white font-medium mb-2">Gender</label>
      <select id="gender" class="profile-input w-full p-3 rounded bg-gray-200 text-black">
        <option value="">Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>
    </div>

    <!-- Default: Edit button -->
    <button type="button" id="editBtn"
            class="w-full bg-pink-500 text-white py-3 rounded-lg hover:bg-pink-600"
            onclick="toggleEditMode(true)">
      Edit Profile
    </button>

    <!-- Action buttons: Save + Cancel -->
    <div id="actionBtns" class="hidden flex gap-4">
      <button type="submit"
              class="w-1/2 bg-green-500 text-white py-3 rounded-lg hover:bg-green-600">
        Save Changes
      </button>
      <button type="button" onclick="cancelEdit(event)"
              class="w-1/2 bg-gray-500 text-white py-3 rounded-lg hover:bg-gray-600">
        Cancel
      </button>
    </div>
  </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/WellCare_Hospital_2/WellCare_Hospital/public/js/Patient.js"></script>

