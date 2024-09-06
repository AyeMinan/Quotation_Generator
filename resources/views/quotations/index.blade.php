<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotation Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto max-w-4xl mt-10">
    <h1 class="text-4xl font-bold mb-6 text-center">Get a Free Quotation - Content Nation</h1>

    <form id="quotationForm"  class="bg-white p-6 rounded-lg shadow-lg">
        @csrf

        <div class="mb-4">
            <label for="service" class="block text-sm font-medium text-gray-700">Select Service</label>
            <select id="service" name="service" class="mt-1 py-3 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                <option value="">Choose a service</option>
                <option value="web-development">Web Development</option>
                <option value="design">Design</option>
                <option value="consulting">Consulting</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="project_requirements" class="block text-sm font-medium text-gray-700">Project Requirements</label>
            <textarea id="project_requirements" name="project_requirements" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required></textarea>
        </div>

        <div class="mb-4">
            <label for="budget_range" class="block text-sm font-medium text-gray-700">Budget Range</label>
            <select id="budget_range" name="budget_range" class="mt-1 py-3 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                <option value="">Select a budget range</option>
                <option value="1000-5000">$1,000 - $5,000</option>
                <option value="5000-10000">$5,000 - $10,000</option>
                <option value="10000-20000">$10,000 - $20,000</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="timeframe" class="block text-sm font-medium text-gray-700">Expected Timeframe</label>
            <input type="date" id="timeframe" name="timeframe" class="mt-1 py-3 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
        </div>

        <div class="mb-4">
            <label for="additional_options" class="block text-sm mb-3 font-medium text-gray-700">Additional Options</label>
            <input type="checkbox" id="priority_service" name="additional_options" value="priority_service" class="mr-2 leading-tight">
            <span>Priority Service</span>
        </div>

        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" name="name" class="mt-1 block w-full py-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
        </div>

        <div class="mb-6">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" class="mt-1 block w-full py-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
        </div>

        <div class="mb-6">
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
            <input type="tel" id="phone" name="phone" class="mt-1 block w-full py-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
        </div>

        <div id="quotationSummary" class="mb-6">
            <h3 class="text-lg font-medium">Estimated Cost: $<span id="estimatedCost">0.00</span></h3>
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md shadow-md hover:bg-indigo-700">Get My Quote</button>
    </form>

    <div id="confirmationMessage" class="hidden mt-6 bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3" role="alert">
        <p>Thank you! Your quotation will be sent to your email shortly.</p>
    </div>
</div>

<script>
    document.getElementById('quotationForm').addEventListener('submit', async function(event) {
        event.preventDefault();
        const formData = new FormData(this);

        const response = await fetch('/quotation', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        });

        const result = await response.json();
        if (response.ok) {
            document.getElementById('confirmationMessage').classList.remove('hidden');
            this.reset();
        } else {
            alert('An error occurred while submitting the form.');
        }
    });
</script>

</body>
</html>
