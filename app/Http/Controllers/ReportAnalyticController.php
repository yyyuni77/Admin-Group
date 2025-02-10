<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportAnalyticController extends Controller
{
    public function index()
    {
        return view('report-analytic'); // Return the view for the User Management page
    }
}
