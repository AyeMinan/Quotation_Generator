
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css"  rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


</head>

<body>
    <x-navbar></x-navbar>
{{$slot}}
<x-footer></x-footer>
</body>
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
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
</html>
