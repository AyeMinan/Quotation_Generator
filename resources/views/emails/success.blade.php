<!DOCTYPE html>
<html>
<head>
    <title>Your Requested Quote</title>
</head>
<body>
    <h1>Thank You for Requesting a Quote!</h1>
    <p>Here are the details of your requested quote:</p>

    <p><strong>Name:</strong> {{ $quotation['name'] }}</p>
    <p><strong>Email:</strong> {{ $quotation['email'] }}</p>
    <p><strong>Phone:</strong> {{ $quotation['phone'] }}</p>
    <p><strong>Service:</strong> {{ ucfirst(str_replace('_', ' ', $quotation['service'])) }}</p>
    @if($quotation['service'] == 'web_design')
        <p><strong>Number of Pages:</strong> {{ $quotation['number_of_pages'] }}</p>
    @endif
    @if($quotation['service'] == 'seo')
        <p><strong>Target Market:</strong> {{ $quotation['target_market'] }}</p>
        <p><strong>Keywords:</strong> {{ $quotation['keywords'] }}</p>
    @endif
    @if($quotation['service'] == 'digital_marketing')
        <p><strong>Ad Budget:</strong> ${{ number_format($quotation['ad_budget'], 2) }}</p>
    @endif
    <p><strong>Estimated Cost:</strong> ${{ number_format($quotation['estimated_cost'], 2) }}</p>

    <p>Please feel free to reach out to us if you have any questions or need further information.</p>

    <p>Best regards,</p>
    <p>Your Company Name</p>
</body>
</html>
