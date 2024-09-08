<!DOCTYPE html>
<html>
<head>
    <title>Your Requested Quote</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        .container {
            width: 80%;
            margin: auto;
        }
        .header, .footer {
            background-color: #f8f8f8;
            text-align: center;
            padding: 10px 0;
        }
        .header img {
            max-width: 150px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        .cta-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .cta-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="your-logo-url.png" alt="Content Nation Logo">
        </div>

        <h1>Thank You for Requesting a Quote!</h1>
        <p>Here are the details of your requested quote:</p>

        <table>
            <tr>
                <th>Client Information</th>
                <td><strong>Name:</strong> {{ $quotation['name'] }}<br>
                    <strong>Email:</strong> {{ $quotation['email'] }}<br>
                    <strong>Phone:</strong> {{ $quotation['phone'] }}</td>
            </tr>
            <tr>
                <th>Service Details</th>
                <td><strong>Service:</strong> {{ ucfirst(str_replace('_', ' ', $quotation['service'])) }}</td>
            </tr>
            @if($quotation['service'] == 'web_design')
            <tr>
                <td colspan="2"><strong>Number of Pages:</strong> {{ $quotation['number_of_pages'] }}</td>
            </tr>
            @endif
            @if($quotation['service'] == 'seo')
            <tr>
                <td colspan="2"><strong>Target Market:</strong> {{ $quotation['target_market'] }}<br>
                    <strong>Keywords:</strong> {{ $quotation['keywords'] }}</td>
            </tr>
            @endif
            @if($quotation['service'] == 'digital_marketing')
            <tr>
                <td colspan="2"><strong>Ad Budget:</strong> ${{ number_format($quotation['ad_budget'], 2) }}</td>
            </tr>
            @endif
            <tr>
                <th>Estimated Cost</th>
                <td><strong>$ {{ number_format($quotation['estimated_cost'], 2) }}</strong></td>
            </tr>
        </table>

        <a href="your-cta-link.com" class="cta-button">Get Started Today</a>

        <p>Please feel free to reach out to us if you have any questions or need further information.</p>

        <p>Best regards,</p>
        <p>Content Nation</p>

        <div class="footer">
            <p>© 2024 Content Nation | <a href="privacy-policy-url.com">Privacy Policy</a> | <a href="contact-url.com">Contact Us</a></p>
        </div>
    </div>
</body>
</html>
