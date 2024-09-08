<x-layout>
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <h1 class="text-3xl font-semibold mb-6 text-center">Get a Quote</h1>

        <form id="quotationForm" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <!-- Client Details -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone Number:</label>
                <input type="tel" id="phone" name="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <!-- Service Selection -->
            <div class="mb-4">
                <label for="service" class="block text-gray-700 text-sm font-bold mb-2">Service:</label>
                <select id="service" name="service" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required onchange="updateFormFields()">
                    <option value="web_design" selected>Web Development</option>
                    <option value="seo">SEO</option>
                    <option value="digital_marketing">Digital Marketing</option>
                </select>
            </div>

            <!-- Conditional Fields (Initially Hidden) -->
            <div id="web_design_fields" class="mb-4">
                <div class="mb-4">
                    <label for="number_of_pages" class="block text-gray-700 text-sm font-bold mb-2">Number of Pages:</label>
                    <input type="number" id="number_of_pages" name="number_of_pages" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>

            <div id="seo_fields" class="mb-4 hidden">
                <div class="mb-4">
                    <label for="target_market" class="block text-gray-700 text-sm font-bold mb-2">Target Market:</label>
                    <input type="text" id="target_market" name="target_market" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="keywords" class="block text-gray-700 text-sm font-bold mb-2">Keywords:</label>
                    <textarea id="keywords" name="keywords" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>
            </div>

            <div id="digital_marketing_fields" class="mb-4 hidden">
                <div class="mb-4">
                    <label for="ad_budget" class="block text-gray-700 text-sm font-bold mb-2">Estimated Ad Budget:</label>
                    <input type="number" id="ad_budget" name="ad_budget" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>

            <!-- Button to get a quote -->
            <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="calculateQuotation()">Get Quote</button>
        </form>

        <!-- Quote Summary -->
        <div id="quote_summary" class="mt-8 p-4 bg-green-100 rounded hidden">
            <h2 class="text-xl font-semibold mb-2">Estimated Quote</h2>
            <p id="estimated_cost" class="text-lg mb-4"></p>
           
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="submitForm()">Confirm and Submit</button>
        </div>
    </div>

    <script>
    function updateFormFields() {
        const selectedService = document.getElementById('service').value;
        document.getElementById('web_design_fields').classList.add('hidden');
        document.getElementById('seo_fields').classList.add('hidden');
        document.getElementById('digital_marketing_fields').classList.add('hidden');

        if (selectedService === 'web_design') {
            document.getElementById('web_design_fields').classList.remove('hidden');
        } else if (selectedService === 'seo') {
            document.getElementById('seo_fields').classList.remove('hidden');
        } else if (selectedService === 'digital_marketing') {
            document.getElementById('digital_marketing_fields').classList.remove('hidden');
        }
    }

    function calculateQuotation() {
        const formData = new FormData(document.getElementById('quotationForm'));
        fetch('/calculate-quotation', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('estimated_cost').textContent = `Estimated Cost: $${data.estimated_cost}`;
            document.getElementById('quote_summary').classList.remove('hidden');

            document.getElementById('quote_summary').scrollIntoView({ behavior: 'smooth' });
        })
        .catch(error => console.error('Error:', error));
    }

    function submitForm() {
        // document.getElementById('quotationForm').submit();

        const formData = new FormData(document.getElementById('quotationForm'));
        fetch('/quotation', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if(response.redirected){
                window.location.href = response.url;
            }else{
                return response.json();
            }
        })
        .then(data => {
            document.getElementById('estimated_cost').textContent = `Estimated Cost: $${data.estimated_cost}`;
            document.getElementById('quote_summary').classList.remove('hidden');

        })
        .catch(error => console.error('Error:', error));
    }
    </script>
</x-layout>
