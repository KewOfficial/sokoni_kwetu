<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ShippingController extends Controller
{
    public function showShippingOptions()
    {
        return view('user.shipping.show_options');
    }

    public function showShippingCosts()
    {
        return view('user.shipping.show_costs');
    }

    public function showDeliveryTimeframes()
    {
        return view('user.shipping.show_timeframes');
    }
}