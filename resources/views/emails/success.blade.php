<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotation Details</title>
</head>
<body>
    <h2>Quotation Request Details</h2>
    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Phone:</strong> {{ $phone }}</p>
    <p><strong>Service Selected:</strong> {{ $service }}</p>
    <p><strong>Estimated Cost:</strong> ${{ number_format($estimatedCost, 2) }}</p>

    <h3>Additional Information</h3>
    <p>If you have any questions or need further assistance, please feel free to reply to this email.</p>

    <p>Thank you for choosing us!</p>
</body>
</html>
