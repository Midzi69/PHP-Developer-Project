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
    @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        <a href="{{ url('/favorites') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Favorites</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                    @endauth
                </div>
            @endif
    <h1>Fund Data</h1>
    <form action="/auth" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="(Name,Category ID, SubCategory ID, ISIN, WKN etc...)" value="{{ request()->input('search')}}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
    <div class="mb-3">
        <form action="{{ route('auth.exportPDF') }}" method="GET">
        <button class="btn btn-primary">Export to PDF</button>
        </form>

        <form action="{{ route('auth.exportXML') }}" method="GET">
        <button class="btn btn-danger">Export to XML</button>
        </form>

        <form action="{{ route('auth.exportExcel') }}" method="GET">
        <button class="btn btn-success">Export to XLSX</button>
        </form>

        <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-secondary">Logout</button>
    </form>
        
        
    </div>


    <table class="table">
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
                <td>
                @if(!Auth::check() || !Auth::user()->favoriteFunds->contains($fund))
                <form action="{{ route('funds.addToFavorites', ['fund' => $fund->id]) }}" method="POST"> @csrf<button type="submit" class="btn btn-primary">Add to Favorites</button>
                </form>

                @else
                    <span>Fund already in favorites</span>
                @endif
                </td>
            </tr>
        @endforeach
    </table>

    {{$funds->links()}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>