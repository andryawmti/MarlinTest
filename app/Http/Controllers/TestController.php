<?php

namespace App\Http\Controllers;

use App\Classes\FirstTest;
use App\Classes\RajaOngkir;

class TestController extends Controller
{
    public function __construct()
    {
    }

    public function showFirstTest()
    {
        return view('first_test');
    }

    public function firstTest()
    {   $length = request('length');
        return view('first_test', ['result' => FirstTest::loopGame($length)]);
    }

    public function showSecondTest()
    {
        $origin = '501'; /*Yogyakarta*/
        $destination = '114'; /*Bali*/
        $weight = '2000'; /*2 kg*/
        $courier = 'jne';

        $rajaOngkir = new RajaOngkir();
        $deliveryCost = $rajaOngkir->calculateCost($origin, $destination, $weight, $courier);
        return view('second_test', ['delivery_cost' => $deliveryCost]);
    }
}
