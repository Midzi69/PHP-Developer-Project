<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorite Funds</title>
    <style>
        /* Add your CSS styles for the PDF here */
    </style>
</head>
<body>
    <h1>My Favorite Funds</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>ISIN</th>
                <th>WKN</th>
            </tr>
        </thead>
        <tbody>
            @foreach($favoriteFunds as $fund)
                <tr>
                    <td>{{ $fund->id }}</td>
                    <td>{{ $fund->name }}</td>
                    <td>{{ $fund->isin }}</td>
                    <td>{{ $fund->wkn }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
