<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Application</title>
</head>
<body>
    <h1>Hello, {{ $user->name }}!</h1>
    <p>Welcome to Our Application! We are excited to have you on board.</p>
    <p>Here are some resources to get you started:</p>
    <ul>
        <li><a href="{{ url('/dashboard') }}">Your Dashboard</a></li>
        <li><a href="{{ url('/profile') }}">Edit Your Profile</a></li>
    </ul>
    <p>If you have any questions, feel free to contact our support team.</p>
    <p>Thank you for joining us!</p>
</body>
</html>
