<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Fund;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class AuthTableController extends Controller
{

    public function addToFavorites($fundId)
    {
        $user = Auth::user();
        $fund = Fund::find($fundId);

        if ($user && $fund) {
            $user->favoriteFunds()->attach($fundId);
            return redirect()->back()->with('success', 'Fund added to favorites.');
        }

        return redirect()->back()->with('error', 'Failed to add fund to favorites.');
    }

    public function removeFromFavorites($fundId)
    {
        $user = Auth::user();
        $fund = Fund::find($fundId);

        if ($user && $fund) {
            $user->favoriteFunds()->detach($fundId);
            return redirect()->back()->with('success', 'Fund removed from favorites.');
        }

        return redirect()->back()->with('error', 'Failed to remove fund from favorites.');
    }
    public function show(Request $request){
        $query = Fund::latest();
        if($request->has('search') && !empty($request->input('search'))){
            $query->where('name', 'like', "%" .$request->input('search') . '%')
            ->orWhere('isin', 'like', "%" .$request->input('search') . '%')
            ->orWhere('wkn', 'like', "%" .$request->input('search') . '%')
            ->orWhere('fund_category_id', 'like', "%" .$request->input('search') . '%')
            ->orWhere('fund_sub_category_id', 'like', "%" .$request->input('search') . '%');
        }

        $funds = $query->paginate(30);

        return view('auth', compact('funds')); 
    }

    public function exportPDF(){
        $query = Fund::latest();
        $funds = $query->paginate(30);
        $pdf = PDF::loadView('auth', compact('funds'));
        return $pdf->download('fund-data.pdf');
    }

   

    public function exportXML()
{
    $funds = Fund::all(); // Fetch your funds data here

    $xml = new \SimpleXMLElement('<Funds></Funds>');
    foreach ($funds as $fund) {
        $fundElement = $xml->addChild('Fund');
        $fundElement->addChild('ID', $fund->id);
        $fundElement->addChild('Name', $fund->name);
        $fundElement->addChild('Category', $fund->category->name);
        $fundElement->addChild('Subcategory', $fund->subcategory->name);
        $fundElement->addChild('ISIN', $fund->isin);
        $fundElement->addChild('WKN', $fund->wkn);
    }

    $headers = [
        'Content-Type' => 'text/xml',
        'Content-Disposition' => 'attachment; filename="funds.xml"',
    ];

    return response($xml->asXML(), 200, $headers);
}
}
