<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Http\Request;


class DeliveryService
{
    public function countDeliveryPriceForAllCompanies(Request $request)
    {
        //Array with all calculations for each company.
        $arr = [];

        //Emulating companies without db
        $russianDeliveryCompany = new Company();
        $russianDeliveryCompany->coefficient = 100;
        $russianDeliveryCompany->minimalSlowPrice = 150;
        $russianDeliveryCompany->companyName = 'Russian Delivery';

        $hornsAndHoovesCompany = new Company();
        $hornsAndHoovesCompany->coefficient = 150;
        $hornsAndHoovesCompany->minimalSlowPrice = 200;
        $hornsAndHoovesCompany->companyName = 'Horns And Hooves';

        $x = new Company();
        $x->coefficient = 300;
        $x->minimalSlowPrice = 300;
        $x->companyName = 'Posil&Ka';

        $companies = [$russianDeliveryCompany, $hornsAndHoovesCompany, $x];

        $res = [];

        switch ($request->option) {
            case 'fast':
                foreach ($companies as $cp) {
                    $res[$cp->companyName] = [
                        'price' => $cp->coefficient * $request->weight,
                        'date' => date('Y-m-d', strtotime(date('Y-m-d') . '+ 2 days')),
                        'error' => '200',
                    ];
                }
            break;
            case 'slow':
                foreach ($companies as $cp) {
                    $res[$cp->companyName] = [
                        'price' => $cp->coefficient * $request->weight + $cp->minimalSlowPrice,
                        'date' => date('Y-m-d', strtotime(date('Y-m-d') . '+ 10 days')),
                        'error' => '200',
                    ];
                }
            break;
        }

        return $res;
    }
}
