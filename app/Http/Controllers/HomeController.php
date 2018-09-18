<?php
/**
 * Created by PhpStorm.
 * User: creeves
 * Date: 9/15/18
 * Time: 11:59 PM
 */

namespace App\Http\Controllers;


use App\Payment;
use Illuminate\Http\Request;

class HomeController
{
    public function index(Request $request)
    {
        // Save a payment
        Payment::create([
            'name' => 'Payment: ' . time(),
            'price' => rand(250, 900000),
            'recipient' => 'Christopher Reeves',
            'email' => 'ChrisReeves12@yahoo.com'
        ]);

        // Get payment
        $payments = Payment::all();

        return view('home/index', ['payments' => $payments]);
    }
}