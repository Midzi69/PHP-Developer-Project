<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;
use App\Http\Controllers\AuthTableController;
use App\Http\Controllers\FavoriteController;
use App\Models\Fund;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\FundsExport;
use Maatwebsite\Excel\Facades\Excel;



Route::get("/welcome", function () {
    return view("welcome");
});

Route::get('/',[TableController::class,'show']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/auth'); 
    })->name('dashboard');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/auth/pdf-export', [AuthTableController::class, 'exportPDF'])->name('auth.exportPDF');
    Route::get('/xml-export', [AuthTableController::class, 'exportXML'])->name('auth.exportXML');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/auth',[AuthTableController::class,'show']);
    Route::get('/export-favorite-funds', [FavoriteController::class, 'exportToExcel'])->name('export.favoriteFunds');
    Route::get('/export-favorite-funds-pdf', [FavoriteController::class, 'exportToPDF'])->name('export.favoriteFundsPDF');
    Route::get('/export-favorite-funds-xml', [FavoriteController::class, 'exportToXML'])->name('export.favoriteFundsXML');
    Route::post('/auth/{fund}/add-to-favorites', [AuthTableController::class, 'addToFavorites'])->name('funds.addToFavorites');
    Route::get('/favorites', [FavoriteController::class,'index'])->name('favorites.index');
    Route::get('/excel-export', function () {
        return Excel::download(new FundsExport, 'funds.xlsx');
    })->name('auth.exportExcel');
    Route::get('/export-fund/{fundId}', [FavoriteController::class, 'exportFundToExcel'])->name('export.fundExcel');
    Route::get('/export-fund-pdf/{fundId}', [FavoriteController::class, 'exportFundToPDF'])->name('export.fundPDF');
    Route::get('/export-fund-xml/{fundId}', [FavoriteController::class, 'exportFundToXML'])->name('export.fundXML');


    Route::post('/logout', [Auth\AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

   

});



require __DIR__.'/auth.php';
