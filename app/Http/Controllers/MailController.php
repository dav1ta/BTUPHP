<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{


    public function create()
    {
        return view('mail/create');
    }

    public function send()
    {

        Mail::raw("My mail", function ($message){
            $message -> to(request('mail'))
                ->subject("Hello");
        });
        return redirect()->back();
    }
}
