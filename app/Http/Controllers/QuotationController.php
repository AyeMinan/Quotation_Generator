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

    public function submitForm(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'service' => 'required|string',
            'number_of_pages' => 'nullable|integer',
            'target_market' => 'nullable|string|max:255',
            'keywords' => 'nullable|string',
            'ad_budget' => 'nullable|numeric',
        ]);

        // Calculate estimated cost (same logic as before)
        $baseCost = 1000;
        $serviceCost = 0;
        $additionalCost = 0;

        switch ($request->service) {
            case 'web_design':
                $numberOfPages = $request->input('number_of_pages', 1);
                $serviceCost = 500 * $numberOfPages;
                break;

            case 'seo':
                $keywords = $request->input('keywords');
                $serviceCost = 300;
                if ($keywords) {
                    $keywordCount = count(explode(',', $keywords));
                    $serviceCost += $keywordCount * 100;
                }
                break;

            case 'digital_marketing':
                $adBudget = $request->input('ad_budget', 0);
                $serviceCost = 200;
                if ($adBudget > 0) {
                    $additionalCost = $adBudget * 0.1;
                }
                break;

            default:
                $serviceCost = 0;
                break;
        }

        // Calculate the estimated cost
        $estimatedCost = $baseCost + $serviceCost + $additionalCost;

        // Create a new quotation record
        $quotation = Quotation::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'service' => $request->service,
            'number_of_pages' => $request->number_of_pages,
            'target_market' => $request->target_market,
            'keywords' => $request->keywords,
            'ad_budget' => $request->ad_budget,
            'estimated_cost' => $estimatedCost,
        ]);

        $request->session()->put('quotation', [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'service' => $request->service,
            'number_of_pages' => $request->number_of_pages,
            'target_market' => $request->target_market,
            'keywords' => $request->keywords,
            'ad_budget' => $request->ad_budget,
            'estimated_cost' => $estimatedCost,
        ]);


        // Return success response
        // return response()->json([
        //     'message' => 'Quotation successfully created.',
        //     'estimated_cost' => $estimatedCost,
        // ]);
        return redirect('/review');
    }

    public function review(Request $request)
    {
        // Retrieve the quotation data from the session
        $quotation = $request->session()->get('quotation');

        // Check if the data is present
        if (!$quotation) {
            return redirect('/')->with('error', 'No quotation data found. Please try again.');
        }

        // Return the review view with the data
        return view('review', compact('quotation'));
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



    public function calculateQuotation(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'service' => 'required',
        ]);

        // Initialize base cost for calculation
        $baseCost = 1000;
        $serviceCost = 0;
        $additionalCost = 0;

        // Calculate cost based on selected service
        switch ($request->service) {
            case 'web_design':
                $numberOfPages = $request->input('number_of_pages', 1);
                $serviceCost = 500 * $numberOfPages; // Cost per page
                break;

            case 'seo':
                $keywords = $request->input('keywords');
                $serviceCost = 300; // Base cost for SEO service
                if ($keywords) {
                    $keywordCount = count(explode(',', $keywords)); // Count number of keywords
                    $serviceCost += $keywordCount * 100; // Additional cost per keyword
                }
                break;

            case 'digital_marketing':
                $adBudget = $request->input('ad_budget', 0);
                $serviceCost = 200; // Base cost for digital marketing
                if ($adBudget > 0) {
                    $additionalCost = $adBudget * 0.1; // 10% of the ad budget as additional cost
                }
                break;

            default:
                $serviceCost = 0; // If no valid service is selected, cost is 0
                break;
        }

        // Calculate the estimated cost
        $estimatedCost = $baseCost + $serviceCost + $additionalCost;

        // Return the calculated cost as a JSON response
        return response()->json([
            'estimated_cost' => $estimatedCost
        ]);
    }

    public function sendQuote(Request $request)
    {
        // Retrieve the quotation data from the session
        $quotation = $request->session()->get('quotation');

        // Send the email
        try {
            Mail::to($quotation['email'])->queue(new NotifyMail($quotation));

            // Clear the session data after sending the email
            $request->session()->forget('quotation');

            return redirect('/')->with('success', 'Quote has been sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send email. Please try again later.');
        }
    }

    public function service(){
        return view('service');
    }
    public function form(){
        return view('form');
    }

    public function websiteDevelopmentFrom(){
        return view('webForm');
    }
    public function digitalMarketing(){
        return view('digitalMarketingForm');
    }
    public function seo(){
        return view('seoForm');
    }


}
