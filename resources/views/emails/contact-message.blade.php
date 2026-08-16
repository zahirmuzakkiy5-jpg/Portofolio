<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Baru dari Portfolio</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px; color: #333333; line-height: 1.6;">
    <h2 style="color: #2c3e50;">Pesan Baru dari Portfolio</h2>
    <hr style="border: 0; border-top: 1px solid #eeeeee; margin: 20px 0;">
    
    <p><strong>Nama:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $emailPengirim }}</p>
    <p><strong>Pesan:</strong></p>
    <blockquote style="background-color: #f9f9f9; border-left: 4px solid #ccc; margin: 10px 0; padding: 10px 15px;">
        {{ $pesan }}
    </blockquote>
</body>
</html>