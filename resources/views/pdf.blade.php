<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funds Report</title>
    <style>
        /* Add your styles for the PDF here */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Fund Data</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Subcategory</th>
            <th>ISIN</th>
            <th>WKN</th>
        </tr>
        @foreach($funds as $fund)
            <tr>
                <td>{{ $fund->id }}</td>
                <td>{{ $fund->name }}</td>
                <td>{{ $fund->category->name }}</td>
                <td>{{ $fund->subcategory->name }}</td>
                <td>{{ $fund->isin }}</td>
                <td>{{ $fund->wkn }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
