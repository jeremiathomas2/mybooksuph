<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IntegrationController extends Controller
{
    public function payments()
    {
        return view('pages.integrations.payments');
    }

    public function sms()
    {
        return view('pages.integrations.sms');
    }
}
