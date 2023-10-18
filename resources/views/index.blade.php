<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <h1>My Favorite Funds</h1>

    <form action="{{ route('export.favoriteFunds') }}">
    <button class="btn btn-success">Excel</button>
    </form>

    <form action="{{ route('export.favoriteFundsPDF') }}">
    <button class="btn btn-primary">PDF</button>
    </form>

    <form action="{{ route('export.favoriteFundsXML') }}">
    <button class="btn btn-danger">XML</button>
    </form>
   

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>ISIN</th>
                <th>WKN</th>
            </tr>
        </thead>
        <tbody>
            @forelse($favoriteFunds as $fund)
            <tr>
                <td>{{ $fund->id }}</td>
                <td>{{ $fund->name }}</td>
                <td>{{ $fund->isin }}</td>
                <td>{{ $fund->wkn }}</td>
                <td>
                    <a href="{{ route('export.fundExcel', ['fundId' => $fund->id]) }}" class="btn btn-success">Excel</a>
                </td>
                <td>
                    <a href="{{ route('export.fundPDF', ['fundId' => $fund->id]) }}" class="btn btn-primary">PDF</a>
                </td>
                <td>
                    <a href="{{ route('export.fundXML', ['fundId' => $fund->id]) }}" class="btn btn-danger">XML</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">No favorite funds found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $favoriteFunds->links() }}


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>