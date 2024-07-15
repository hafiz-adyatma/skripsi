<!DOCTYPE html>
<html>

<head>
    <title>Customer Support Request</title>
    <style>
        .container {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .header {
            background-image: url('https://www.bakpiamutiarajogja.com/wp-content/uploads/2017/02/kampung-warna.jpg');
            background-size: cover;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .content {
            margin: 20px 0;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Customer Support Request</h2>
        </div>
        <div class="content">
            <p><strong>Name:</strong> {{ $details['name'] }}</p>
            <p><strong>Email:</strong> {{ $details['email'] }}</p>
            <p><strong>Message:</strong></p>
            <p>{{ $details['message'] }}</p>
        </div>
        <div class="footer">
            <p>Thank you for reaching out to us. We will get back to you as soon as possible.</p>
        </div>
    </div>
</body>

</html>