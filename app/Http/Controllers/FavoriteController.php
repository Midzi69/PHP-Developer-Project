<?php 
namespace App\Http\Controllers;
use Auth;
use App\Models\Fund;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\FavoriteFundsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FundExport; 
class FavoriteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $favoriteFunds = $user->favoriteFunds()->paginate(10);
        return view('index', compact('favoriteFunds'));
    }

    public function exportToExcel()
    {
        return Excel::download(new FavoriteFundsExport, 'favorite-funds.xlsx');
    }

    public function exportToPDF()
    {
        $user = auth()->user();
        $favoriteFunds = $user->favoriteFunds()->get();

        $pdf = PDF::loadView('favorite-funds', compact('favoriteFunds'));
        return $pdf->download('favorite-funds.pdf');
    }

    public function exportToXML()
    {
        $user = auth()->user();
        $favoriteFunds = $user->favoriteFunds()->get();

        $xml = new \SimpleXMLElement('<Funds></Funds>');
        foreach ($favoriteFunds as $fund) {
            $fundElement = $xml->addChild('Fund');
            $fundElement->addChild('ID', $fund->id);
            $fundElement->addChild('Name', $fund->name);
            $fundElement->addChild('ISIN', $fund->isin);
            $fundElement->addChild('WKN', $fund->wkn);
        }

        $headers = [
            'Content-Type' => 'text/xml',
            'Content-Disposition' => 'attachment; filename="favorite-funds.xml"',
        ];

        return response($xml->asXML(), 200, $headers);
    }

    public function exportFundToExcel($fundId)
    {
        $fund = Fund::findOrFail($fundId);
        $export = new FundExport([$fund]); 
        return Excel::download($export, 'fund_' . $fund->id . '.xlsx');
    }

    public function exportFundToPDF($fundId)
    {
        $fund = Fund::findOrFail($fundId);
        $pdf = PDF::loadView('fund', compact('fund')); 
        return $pdf->download('fund_' . $fund->id . '.pdf');
    }

    public function exportFundToXML($fundId)
    {
        $fund = Fund::findOrFail($fundId);

        $xml = new \SimpleXMLElement('<Fund></Fund>');
        $xml->addChild('ID', $fund->id);
        $xml->addChild('Name', $fund->name);
        $xml->addChild('ISIN', $fund->isin);
        $xml->addChild('WKN', $fund->wkn);

        $headers = [
            'Content-Type' => 'text/xml',
            'Content-Disposition' => 'attachment; filename="fund_' . $fund->id . '.xml"',
        ];

        return response($xml->asXML(), 200, $headers);
    }


}
