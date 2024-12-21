<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
</head>
<body>
    <h1>Contact Form Submission</h1>
    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    @if($whatsapp)
        <p><strong>WhatsApp:</strong> {{ $whatsapp }}</p>
    @endif
    <p><strong>Message:</strong> {{ $message }}</p>
</body>
</html>
