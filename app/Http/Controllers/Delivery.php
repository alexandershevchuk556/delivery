<?php

namespace App\Http\Controllers;

use App\Services\DeliveryService;
use Illuminate\Http\Request;

class Delivery extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'from' => 'required|string',
            'to' => 'required|string',
            'weight' => 'required',
            'option' => 'required'
        ]);

        $results = (new DeliveryService)->countDeliveryPriceForAllCompanies($request);

        return view('home', compact('results'));
    }
}
