
<x-layout>



    <!-- Hero Section -->
    <section class="bg-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-5xl font-bold text-gray-800 mb-6">Welcome to Content Nation</h2>
            <p class="text-lg text-gray-600 mb-6">Your one-stop solution for Web Development, Digital Marketing, and More....</p>
            <a href="/service" class="inline-block bg-indigo-600 text-white font-semibold py-3 px-6 rounded-md shadow-md hover:bg-indigo-700">Get a Free Quote</a>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 text-center mb-10">Our Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Service Card -->
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <img src="https://media.licdn.com/dms/image/D5612AQE-Ofnwxe8_CQ/article-cover_image-shrink_720_1280/0/1703139714332?e=2147483647&v=beta&t=z9YUEaiHQVvIqv5c5mtrrRHAVCE37WwKWFEdul2_1VM" alt="Web Development" class="w-16 mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-4">Web Development</h3>
                    <p class="text-gray-600 mb-4">We build responsive, SEO-friendly websites to help you grow your online presence.</p>
                    <a href="/service" class="text-indigo-600 font-semibold hover:underline">Learn More</a>
                </div>
                <!-- Service Card -->
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <img src="https://www.springboard.com/blog/wp-content/uploads/2022/06/what-is-digital-marketing.png" alt="Digital Marketing" class="w-16 mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-4">Digital Marketing</h3>
                    <p class="text-gray-600 mb-4">Boost your brand visibility with our tailored digital marketing strategies.</p>
                    <a href="/service" class="text-indigo-600 font-semibold hover:underline">Learn More</a>
                </div>
                <!-- Service Card -->
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <img src="https://www.uplers.com/wp-content/uploads/2022/04/01-10.jpg" alt="SEO Services" class="w-16 mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-4">SEO Services</h3>
                    <p class="text-gray-600 mb-4">Improve your website's ranking and attract more organic traffic.</p>
                    <a href="/service" class="text-indigo-600 font-semibold hover:underline">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 text-center mb-10">About Us</h2>
            <p class="text-lg text-gray-600 text-center max-w-2xl mx-auto">Content Nation is dedicated to providing top-quality digital services to help businesses thrive online. With a team of skilled professionals, we offer comprehensive solutions that include web development, digital marketing, and SEO.</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 text-center mb-10">Contact Us</h2>
            <div class="max-w-md mx-auto">
                <form action="/contact" method="post" class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="name" name="name" class="mt-1 block w-full py-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="mt-1 block w-full py-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                        <textarea id="message" name="message" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md shadow-md hover:bg-indigo-700">Send Message</button>
                </form>
            </div>
        </div>
    </section>


</x-layout>

