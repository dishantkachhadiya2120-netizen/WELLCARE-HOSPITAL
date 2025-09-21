<!-- Patient Registration Page -->
<section class="min-h-screen flex items-center justify-center p-10">
  <div class="bg-white/90 backdrop-blur-md p-10 rounded-2xl shadow-lg w-full max-w-lg">
    <h2 class="text-3xl font-bold text-center text-purple-700 mb-6">Patient Registration</h2>
    <form method="POST" id="registerForm" class="space-y-5">
      
      <!-- Full Name & Email -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-gray-700 font-medium mb-2">Full Name <span class="text-red-500">*</span></label>
          <input type="text" name="full_name" required 
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" 
            placeholder="Enter your full name" />
        </div>
        <div>
          <label class="block text-gray-700 font-medium mb-2">Email <span class="text-red-500">*</span></label>
          <input type="email" name="email" required 
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" 
            placeholder="Enter your email" />
        </div>
      </div>

      <!-- Phone & Date of Birth -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-gray-700 font-medium mb-2">Phone <span class="text-red-500">*</span></label>
          <input type="tel" name="phone" required 
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" 
            placeholder="+91 9876543210" />
        </div>
        <div>
          <label class="block text-gray-700 font-medium mb-2">Date of Birth <span class="text-red-500">*</span></label>
          <input type="date" name="dob" required 
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" />
        </div>
      </div>

      <!-- Age & Gender -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-gray-700 font-medium mb-2">Age <span class="text-red-500">*</span></label>
          <input type="number" name="age" min="0" required
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" 
            placeholder="Enter your age" />
        </div>
        <div>
          <label class="block text-gray-700 font-medium mb-2">Gender <span class="text-red-500">*</span></label>
          <select name="gender" required 
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
          </select>
        </div>
      </div>

      <!-- Password & Confirm Password -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-gray-700 font-medium mb-2">Password <span class="text-red-500">*</span></label>
          <input type="password" name="password" required 
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" 
            placeholder="Enter your password" />
        </div>
        <div>
          <label class="block text-gray-700 font-medium mb-2">Confirm Password <span class="text-red-500">*</span></label>
          <input type="password" name="confirm_password" required 
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" 
            placeholder="Re-enter your password" />
        </div>
      </div>

      <!-- Submit Button -->
      <div>
        <button type="submit" 
          class="w-full bg-purple-700 hover:bg-purple-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition">
          Register
        </button>
      </div>

      <!-- Already have an account -->
      <p class="text-center text-gray-600 mt-4">
        Already have an account? 
        <a href="index.php?page=login" class="text-purple-700 font-semibold hover:underline">Login</a>
      </p>
    </form>
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="/WellCare_Hospital_2/WellCare_Hospital/public/js/auth.js"></script> -->
  </div>
</section>
