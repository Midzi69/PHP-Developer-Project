<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fund Information</title>
    <style>
        /* Add your CSS styles for the PDF here */
    </style>
</head>
<body>
    <h1>Fund Information</h1>

    <p><strong>ID:</strong> {{ $fund->id }}</p>
    <p><strong>Name:</strong> {{ $fund->name }}</p>
    <p><strong>ISIN:</strong> {{ $fund->isin }}</p>
    <p><strong>WKN:</strong> {{ $fund->wkn }}</p>
</body>
</html>
