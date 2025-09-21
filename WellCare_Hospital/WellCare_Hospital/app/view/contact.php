<!-- <php $title = "Contact Us - WellCare Hospital"; include __DIR__."/layout/header.php"; ?> -->

<!-- <section class="py-16 bg-gradient-to-r from-purple-600 to-pink-600 text-white text-center">
  <h2 class="text-4xl font-bold mb-4">Contact Us</h2>
  <p class="text-lg">We are here to help. Get in touch with us today!</p>
</section>

<section class="py-12 bg-gray-50">
  <div class="container mx-auto max-w-2xl bg-white shadow-lg rounded-lg p-8">
    <form action="#" method="POST" class="space-y-6">
      <div>
        <label class="block text-gray-700 mb-2">Full Name</label>
        <input type="text" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-pink-500" required>
      </div>
      <div>
        <label class="block text-gray-700 mb-2">Email</label>
        <input type="email" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-pink-500" required>
      </div>
      <div>
        <label class="block text-gray-700 mb-2">Message</label>
        <textarea rows="5" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-pink-500" required></textarea>
      </div>
      <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white py-3 rounded-lg font-semibold hover:opacity-90">Send Message</button>
    </form>
  </div>
</section> -->

<!-- <php include __DIR__."/layout/footer.php"; ?> -->
<!-- Contact Us Page -->
<section class="text-gray-700 body-font relative">
  <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
    
    <!-- Left: Google Map or Image -->
    <div class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
      <iframe class="absolute inset-0" 
              style="filter: opacity(0.7); border:0;" 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d224345.84520425847!2d77.0688993!3d28.527582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce2a2f5b4e2e9%3A0xddd2d7b0a3d1c73!2sNew%20Delhi!5e0!3m2!1sen!2sin!4v1698654321994" 
              width="100%" height="100%" frameborder="0" allowfullscreen="" loading="lazy">
      </iframe>
      <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
        <div class="lg:w-1/2 px-6">
          <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">ADDRESS</h2>
          <p class="mt-1">123 Health Street, New Delhi, India</p>
        </div>
        <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
          <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">EMAIL</h2>
          <a href="mailto:support@wellcare.com" class="text-purple-600 leading-relaxed">support@wellcare.com</a>
          <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">PHONE</h2>
          <p class="leading-relaxed">+91 98765 43210</p>
        </div>
      </div>
    </div>

    <!-- Right: Contact Form -->
    <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0 rounded-lg shadow-lg p-8">
      <h2 class="text-gray-900 text-2xl mb-4 font-bold">Get in Touch</h2>
      <p class="leading-relaxed mb-5 text-gray-600">
        Have questions or need help? Send us a message and we’ll get back to you shortly.
      </p>
      <form action="send_message.php" method="POST">
        <div class="relative mb-4">
          <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
          <input type="text" id="name" name="name" 
                 class="w-full bg-gray-100 rounded border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
        </div>
        <div class="relative mb-4">
          <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
          <input type="email" id="email" name="email" 
                 class="w-full bg-gray-100 rounded border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
        </div>
        <div class="relative mb-4">
          <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
          <textarea id="message" name="message" 
                    class="w-full bg-gray-100 rounded border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 h-32 text-base outline-none text-gray-700 py-2 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" required></textarea>
        </div>
        <button type="submit" 
                class="text-white bg-purple-600 border-0 py-2 px-6 focus:outline-none hover:bg-purple-700 rounded-lg text-lg">
          Send Message
        </button>
      </form>
    </div>
  </div>
</section>

