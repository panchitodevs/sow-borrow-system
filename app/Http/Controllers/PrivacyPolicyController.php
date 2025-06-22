<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class PrivacyPolicyController extends Controller
{
    public function index()
    {
        return view('auth.privacy');
    }


    public function download()
    {
        $pdf = Pdf::loadView('auth.privacy');
        return $pdf->download('privacy-policy.pdf');
    }
}



