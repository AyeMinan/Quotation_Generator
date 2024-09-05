<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMail;


class EmailController extends Controller
{
    public function sendNotifyMail(Request $request){
        // $name = $request->name;
        $email = 'miaye667@gmail.com';
        // $phone = $request->phone;
        // $service = $request->service;
        $subject = "Quotation Notify Mail";

        // $name, $email, $phone , $service, $estimatedCost,
        Mail::to($email)->send(new NotifyMail($subject));
    }
}
