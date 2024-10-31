<?php

namespace App\Http\Controllers\Api\Form;

use App\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Form\SubscriberRequest;
use App\Models\Forms\Subscriber;
use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    use ApiResponse;
    


    /**
     * Store  New Subscribers
     * 
     * 
     * @bodyParam email string required The email of the user. Example: aft@gmail.com
     */
    public function store(SubscriberRequest $request)
    {
        $subscriber = Subscriber::create(
            ['email' => $request->email],

        );

        $adminUsers = User::role('Super Admin')->get();

        foreach ($adminUsers as $admin) {
            
           
                Notification::make()
                    ->title('New Email Subscribtion')->icon('heroicon-o-at-symbol')->iconColor('success')->body('Email'.$subscriber->email)
                    ->sendToDatabase($admin);
        
        }
        return response()->json(["message" => "You have successfuly subscribed"], 201);

        //
    }
}
