<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotation;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMail;

class QuotationController extends Controller
{
    public function index()
    {
        return view('quotations.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'service' => 'required',
            'project_requirements' => 'required',
            'budget_range' => 'required',
            'timeframe' => 'required',
        ]);

        $estimatedCost = $this->calculateCost($request);

        $quotation = Quotation::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'service' => $request->service,
            'project_requirements' => $request->project_requirements,
            'budget_range' => $request->budget_range,
            'timeframe' => $request->timeframe,
            'additional_options' => $request->additional_options,
            'estimated_cost' => $estimatedCost,
        ]);


            $name = $request->name;
            $email = $request->email;
            $phone = $request->phone;
            $service = $request->service;
            $subject = "Quotation Notify Mail";
        Mail::to($email)->send(new NotifyMail( $name, $email, $phone, $service, $estimatedCost, $subject));


        // Returning a JSON response after sending the email
        return response()->json(['message' => 'Quotation submitted successfully!', 'quotation' => $quotation]);
    }


    private function calculateCost(Request $request)
    {
        // Basic cost calculation logic
        $baseCost = 1000;
        $serviceMultiplier = 1.2;
        $additionalCost = 0;

        if ($request->additional_options) {
            $additionalCost = 500;
        }

        return ($baseCost * $serviceMultiplier) + $additionalCost;
    }
}
