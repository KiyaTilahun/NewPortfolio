<?php

namespace App\Http\Controllers;

use App\Models\Forms\Contact;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    //

    public function reply(Contact $contact)
    {

        $gmailAddress = $contact->email;
    
        $mailtoLink = "mailto:{$gmailAddress}";

        return redirect()->away($mailtoLink);

    }
}
