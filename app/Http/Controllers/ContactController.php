<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Notifications\ContactUsNotification;
use App\Notifications\ContactUsToAdminNotification;
use App\Notifications\UserHasRegisteredNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
        Contact::query()->create($request->except('_token'));

        if (env('APP_ENV') == 'production') {
            Notification::route('mail', $request->email)->notify(new ContactUsNotification());
            Notification::route('mail', 'nonleagueguys@gmail.com')->notify(new ContactUsToAdminNotification($request->name,$request->email,$request->subject,$request->message));
        }


        return redirect()->back()->with('success', 'Your Message has been sent');
    }
}
