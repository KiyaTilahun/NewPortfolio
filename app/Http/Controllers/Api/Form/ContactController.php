<?php

namespace App\Http\Controllers\Api\Form;

use App\Http\Controllers\Controller;
use App\Http\Requests\Form\ContactRequest;
use App\Models\Forms\Contact;
use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ContactController extends Controller
{
    //
     /**
     * Send New Message
     * 
     * */
    public function store(ContactRequest $request){
        $validatedData = array_merge([
            'first_name' => null,
            'last_name' => null,
            'email' => null,
            'phone_number' => null,
            'subject' => null,
            'message' => null,
        ], $request->only(['first_name', 'last_name', 'email', 'phone_number', 'subject', 'message']));
        
        $message = Contact::create($validatedData);

        $adminUsers = User::whereHas('roles', function ($query) {
            $query->where('name', 'Super Admin');
        })
        ->orWhereHas('permissions', function ($query) {
            $query->where('name', 'get notification');
        })
        ->get();

        foreach ($adminUsers as $admin) {
            
            $admin->notify(
                Notification::make()
                    ->title('There is a new Message')->icon('heroicon-o-envelope')->iconColor('danger')->body(Str::words($message->message, 7, '...'))
                    ->toDatabase(),
            );
        }
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Contact form submitted successfully.',
        // ], 201);

        return response()->json(['success' => 'Hello '.$message->first_name.' your Message has been sent successfully!']);
        // return back()->with('success', 'Message sent successfully!');

    }
}
