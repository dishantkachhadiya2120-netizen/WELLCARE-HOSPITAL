<!-- <php $title = "Home - WellCare Hospital"; include __DIR__."/layout/header.php"; ?> -->

<!-- <section class="text-center py-16 bg-gradient-to-r from-purple-500 to-pink-600 text-white">
  <h2 class="text-4xl font-bold mb-4">Your Health is Our Priority</h2>
  <p class="text-lg mb-6">Book appointments with trusted doctors easily</p>
  <a href="/public/index.php?page=appointment" class="bg-white text-pink-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200">Get Started</a>
</section>

<section class="py-12 bg-gray-50">
  <div class="container mx-auto text-center">
    <h3 class="text-3xl font-bold mb-6">Meet Our Doctors</h3>
    <div class="grid md:grid-cols-3 gap-6">
      <div class="bg-white shadow-lg rounded-lg p-6">
        <img src="/public/images/doc1.jpg" class="mx-auto rounded-full mb-4 w-32 h-32" />
        <h4 class="text-xl font-semibold">Dr. John Doe</h4>
        <p class="text-gray-600">Cardiologist</p>
      </div>
      <div class="bg-white shadow-lg rounded-lg p-6">
        <img src="/public/images/doc2.jpg" class="mx-auto rounded-full mb-4 w-32 h-32" />
        <h4 class="text-xl font-semibold">Dr. Sarah Lee</h4>
        <p class="text-gray-600">Pediatrician</p>
      </div>
      <div class="bg-white shadow-lg rounded-lg p-6">
        <img src="/public/images/doc3.jpg" class="mx-auto rounded-full mb-4 w-32 h-32" />
        <h4 class="text-xl font-semibold">Dr. Amit Patel</h4>
        <p class="text-gray-600">Neurologist</p>
      </div>
    </div>
  </div>
</section> -->

<!-- <php include __DIR__."/layout/footer.php"; ?> -->
<!-- <section class="text-center py-20 text-white">
  <h2 class="text-4xl font-bold mb-4">Welcome to WellCare Hospital</h2>
  <p class="text-lg mb-6">Your health is our top priority. Book appointments with our expert doctors easily.</p>
  <a href="index.php?page=appointment" class="bg-white text-purple-600 font-semibold px-6 py-3 rounded-lg shadow hover:bg-gray-200">
    Book an Appointment
  </a>
</section> -->
<!-- <section class="text-center">
  <h2 class="text-4xl font-bold text-purple-700 mb-4">Welcome to WellCare Hospital</h2>
  <p class="text-lg text-gray-700 mb-8">Your health is our top priority. Book appointments with our expert doctors easily.</p>
  <a href="index.php?page=appointment" class="px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg shadow-lg hover:opacity-90">
    Book Appointment
  </a>
</section> -->
<!-- Hero Section -->
<!--  Hero Section -->
<section class="text-white body-font">
  <div class="container mx-auto flex flex-col md:flex-row items-center px-6 md:px-12 lg:px-20 py-16 md:py-24">
    
    <!-- Left Side (Text) -->
    <div class="lg:flex-grow md:w-1/2 md:pr-12 flex flex-col md:items-start md:text-left mb-10 md:mb-0 items-center text-center">
      <h1 class="title-font text-3xl sm:text-4xl md:text-5xl mb-4 font-bold text-white">
        Welcome to WellCare Hospital
      </h1>
      <p class="mb-6 leading-relaxed text-base sm:text-lg">
        Your health is our top priority. Book appointments with our expert doctors easily and securely.
      </p>
      <div class="flex justify-center md:justify-start flex-wrap gap-4">
        <a href="index.php?page=register" 
           class="inline-flex text-white bg-purple-700 border-0 py-2 px-6 focus:outline-none hover:bg-purple-800 rounded-lg text-base sm:text-lg">
          Get Started
        </a>
        <a href="index.php?page=about" 
           class="inline-flex text-purple-700 bg-white border-0 py-2 px-6 focus:outline-none hover:bg-gray-100 rounded-lg text-base sm:text-lg">
          Learn More
        </a>
      </div>
    </div>

    <!-- Right Side (Login Form) -->
    <div class="lg:max-w-md lg:w-full md:w-1/2 w-full sm:w-4/5">
      <?php include __DIR__ . '/login.php'; ?>
    </div>
  </div>
</section>

<!-- Features Section -->
<section class="text-white body-font">
  <div class="container px-6 md:px-12 lg:px-20 py-16 md:py-24 mx-auto">
    <div class="flex flex-wrap -m-4 text-center">
      <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
        <div class="border-2 border-white/30 px-4 py-6 rounded-lg">
          <h2 class="title-font font-medium text-2xl sm:text-3xl text-white">24/7</h2>
          <p class="leading-relaxed">Emergency Care</p>
        </div>
      </div>
      <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
        <div class="border-2 border-white/30 px-4 py-6 rounded-lg">
          <h2 class="title-font font-medium text-2xl sm:text-3xl text-white">100+</h2>
          <p class="leading-relaxed">Expert Doctors</p>
        </div>
      </div>
      <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
        <div class="border-2 border-white/30 px-4 py-6 rounded-lg">
          <h2 class="title-font font-medium text-2xl sm:text-3xl text-white">1M+</h2>
          <p class="leading-relaxed">Patients Treated</p>
        </div>
      </div>
    </div>
  </div>
</section>

