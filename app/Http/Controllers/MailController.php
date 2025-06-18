<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Http; 
use Illuminate\Support\Facades\Log;

class MailController extends Controller
{
//             public function submit(Request $request)
// {
//     $request->validate([
//         'firstname' => 'required|string|max:255',
//         'lastname' => 'required|string|max:255',
//         'emailaddress' => 'required|email|max:255',
//         'phone' => 'required|string|max:20',
//         'message' => 'required|string|max:2000',
//           'g-recaptcha-response' => 'required'
//     ]);

//     $recaptchaResponse = $request->input('g-recaptcha-response');
//     $recaptchaSecret = config('services.recaptcha.secret');

//     $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
//         'secret' => $recaptchaSecret,
//         'response' => $recaptchaResponse,
//         'remoteip' => $request->ip()
//     ]);

//     if ($response->failed()) {
//         \Log::error('reCAPTCHA API failed', ['response' => $response->body()]);
//         return back()->withInput()->with('recaptcha_error', 'Could not verify reCAPTCHA.');
//     }

//     $data = $response->json();
//     \Log::info('reCAPTCHA Response', $data);

//     if (empty($data['success']) || !$data['success']) {
//         return back()->withInput()->with('recaptcha_error', 'reCAPTCHA verification failed. Please click the checkbox.');
//     }

//     try {
//         Mail::to('shadilmusthafa009@gmail.com')->send(new ContactMail(
//             $request->firstname,
//             $request->lastname,
//             $request->emailaddress,
//             $request->phone,
//             $request->message
//         ));

//         return back()->with('success', 'Your message has been sent successfully!');
//     } catch (\Exception $e) {
//         return back()->withInput()->with('error', 'Mail error: ' . $e->getMessage());
//     }
// }


public function submit(Request $request)
{
    // 1. Validate form inputs
    $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'emailaddress' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'message' => 'required|string|max:2000',
        'g-recaptcha-response' => 'required'
    ]);

    // 2. reCAPTCHA verification with Google
    $recaptchaResponse = $request->input('g-recaptcha-response');
    $recaptchaSecret = config('services.recaptcha.secret');

    $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
        'secret'   => $recaptchaSecret,
        'response' => $recaptchaResponse,
        'remoteip' => $request->ip(),
    ]);

    $data = $response->json();

    // 3. If reCAPTCHA failed
    if (empty($data['success']) || !$data['success']) {
        return back()->withInput()->with('recaptcha_error', 'reCAPTCHA verification failed. Please click the checkbox.');
    }

    // 4. If reCAPTCHA passed → send mail
    try {
        Mail::to('shadilmusthafa009@gmail.com')->send(new ContactMail(
            $request->firstname,
            $request->lastname,
            $request->emailaddress,
            $request->phone,
            $request->message
        ));

        return back()->with('success', 'Your message has been sent successfully!');
    } catch (\Exception $e) {
        return back()->withInput()->with('error', 'Mail error: ' . $e->getMessage());
    }
}
}
