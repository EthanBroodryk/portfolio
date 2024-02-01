<?php
namespace  App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendWelcomeEmail(Request $request)

        {
      
       
       
            $userContactNumber =  $request->userContactNumber;
            $userEmail = $request->userEmail;
            $body = $request->emailBody;
            Mail::to('broodrykethan349@gmail.com')->send(new WelcomeMail($userEmail,$userContactNumber,$body));
            return "Email sent successfully!";
        }
}