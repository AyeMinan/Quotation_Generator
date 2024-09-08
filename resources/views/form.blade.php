<!-- resources/views/form-completion.blade.php -->
<x-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold text-center mb-6">Complete Your Quote Request</h1>

        <!-- Client Details Form -->
        <form action="" method="POST" id="quoteForm">
            {{-- {{ route('submitQuote') }} --}}
            @csrf

            <!-- Client Details -->
            <div class="mb-6">
                <label class="block text-gray-700">Name</label>
                <input type="text" name="name" class="form-input mt-1 block w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" class="form-input mt-1 block w-full border border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700">Phone Number</label>
                <input type="tel" name="phone" class="form-input mt-1 block w-full border border-gray-300 rounded p-2" required>
            </div>

            <!-- Dynamic Service-Specific Fields -->
            <div id="dynamicFields" class="space-y-6">
                <!-- Fields will be injected here by JavaScript -->
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">Submit Quote</button>
            </div>
        </form>
    </div>

    <!-- JavaScript to Handle Dynamic Form Changes -->
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            // const selectedServices = @json($selectedServices); // Fetch services passed from the controller

            const dynamicFields = document.getElementById('dynamicFields');

            // Function to create form fields based on selected services
            function createServiceFields(service) {
                let fieldset = document.createElement('fieldset');
                fieldset.classList.add('border', 'p-4', 'rounded', 'mb-4');

                let legend = document.createElement('legend');
                legend.classList.add('text-lg', 'font-bold', 'mb-2');
                legend.textContent = service;
                fieldset.appendChild(legend);

                // Example conditional fields for Web Development
                if (service === 'Web Development') {
                    fieldset.innerHTML += `
                        <label class="block text-gray-700">Number of Pages</label>
                        <input type="number" name="web_pages" class="form-input mt-1 block w-full border border-gray-300 rounded p-2" placeholder="Enter number of pages" min="1">

                        <label class="block text-gray-700 mt-4">Custom Features</label>
                        <textarea name="web_features" class="form-input mt-1 block w-full border border-gray-300 rounded p-2" placeholder="Describe any custom features"></textarea>
                    `;
                }

                // Example conditional fields for SEO
                if (service === 'SEO') {
                    fieldset.innerHTML += `
                        <label class="block text-gray-700">Target Market</label>
                        <input type="text" name="seo_target_market" class="form-input mt-1 block w-full border border-gray-300 rounded p-2" placeholder="Describe your target market">

                        <label class="block text-gray-700 mt-4">Keywords</label>
                        <textarea name="seo_keywords" class="form-input mt-1 block w-full border border-gray-300 rounded p-2" placeholder="Enter target keywords"></textarea>
                    `;
                }

                // Add other conditional fields for different services here

                dynamicFields.appendChild(fieldset);
            }

            // Loop through selected services to create dynamic fields
            selectedServices.forEach(createServiceFields);
        });
    </script> --}}
</x-layout>
