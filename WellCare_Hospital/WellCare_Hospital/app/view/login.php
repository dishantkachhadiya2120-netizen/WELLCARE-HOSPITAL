<!-- app/view/login.php -->
<section class="flex items-center justify-center min-h-[90vh]">
  <div class="relative w-full max-w-md">
    <!-- Card -->
    <div class="backdrop-blur-lg bg-white/80 p-10 rounded-2xl shadow-2xl border border-white/20">
      <h2 class="text-3xl font-bold text-center mb-6 text-purple-700">Login</h2>

      <form id="loginForm" class="space-y-5 text-black">
        <!-- User Type -->
        <div>
          <label for="user_type" class="block mb-2 font-semibold text-gray-700">Login As</label>
          <select name="user_type" id="user_type" required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:outline-none bg-white">
            <option value="" disabled selected>-- Select User Type --</option>
            <option id="#user_type" value="doctor">Doctor</option>
            <option id="#user_type" value="patient">Patient</option>
          </select>
        </div>

        <!-- Email -->
        <div>
          <label for="email" class="block mb-2 font-semibold text-gray-700">Email</label>
          <input type="email" id="email" name="email" required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:outline-none bg-white">
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block mb-2 font-semibold text-gray-700">Password</label>
          <input type="password" id="password" name="password" required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:outline-none bg-white">
        </div>

        <!-- Submit Button -->
        <button type="submit"
          class="w-full py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold rounded-lg shadow-md hover:shadow-lg hover:opacity-90 transition">
          Login
        </button>
      </form>

      <!-- Registration Option -->
      <p class="mt-6 text-center text-gray-700">
        Don’t have an account? 
        <a href="index.php?page=register" class="text-purple-600 font-semibold hover:underline">
          Register here
        </a>
      </p>
    </div>
  </div>
</section>

