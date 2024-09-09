<x-layout>
    <div class="container mx-auto px-4 py-8 ">
        <h1 class="text-3xl font-semibold mb-6 text-center">Review Your Quotation</h1>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

            <!-- Display the user data -->
            <table class="w-full table-auto border-collapse border border-gray-300 text-left">
               <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Phone</th>
                    <th class="border border-gray-300 px-4 py-2">Service</th>
                    @if($quotation['service'] == 'web_design')
                    <th class="border border-gray-300 px-4 py-2">Number of Pages</th>
                    @endif
                    @if($quotation['service'] == 'seo')
                       <th class="border border-gray-300 px-4 py-2">Target Market</th>
                       <th class="border border-gray-300 px-4 py-2">Keywords</th>
                    @endif
                    @if($quotation['service'] == 'digital_marketing')
                    <th class="border border-gray-300 px-4 py-2">Ad Budget</th>
                    @endif
                    <th class="border border-gray-300 px-4 py-2">Estimated Cost</th>
                </tr>
               </thead>
               <tbody>
                <tr class="bg-white hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2">{{ $quotation['name'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $quotation['email'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $quotation['phone'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ ucfirst(str_replace('_', ' ', $quotation['service'])) }}</td>
                    @if ($quotation['service'] == 'web_design')
                    <td class="border border-gray-300 px-4 py-2">{{ $quotation['number_of_pages'] ?? '' }}</td>
                    @endif
                    @if ($quotation['service'] == 'seo')
                    <td class="border border-gray-300 px-4 py-2">{{ $quotation['target_market'] }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $quotation['keywords'] }}</td>
                    @endif
                    @if ($quotation['service'] == 'digital_marketing')
                    <td class="border border-gray-300 px-4 py-2">${{ number_format($quotation['ad_budget'], 2) }}</td>
                    @endif
                    <td class="border border-gray-300 px-4 py-2">${{ number_format($quotation['estimated_cost'], 2) }}</td>
                </tr>
               </tbody>
            </table>
            <div class="flex justify-center gap-x-3">
            <a href="javascript:history.back()"> <button class=" bg-green-500 text-white font-semibold py-2 px-4 rounded mt-4">Back</button>
            </a>
            <!-- Confirm and Send Quote Button -->
            <form action="/send-quote" method="POST">
                @csrf
                    <button type="submit" class=" bg-green-500 text-white font-semibold py-2 px-4 rounded mt-4">Confirm and Send Quote</button>
            </form>
        </div>
        </div>
    </div>
</x-layout>
