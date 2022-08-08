<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Notifications\TestEnrollMent;
use App\Models\User;
use Illuminate\Support\Facades\Notification;

class TestEnrollMentController extends Controller
{
    public function sendTestNotification()
    {
        $user = User::first();
        $enrollmentData = [
            'body' => 'You are received a new test notification',
            'enrolmentText' => 'You Are Allowed to enroll',
            'url' => url('https://www.maakview.com/'),
            'thankyou' => 'you have 14 days to enroll'

        ];

        //$user->notify(new TestEnrollMent($enrollmentData));
        Notification::send($user, new TestEnrollMent($enrollmentData));
        dd('sent');


    }

    public function welcome()
    {
        return 'ok';
    }

    public function view_notification()
    {
        return view('notification');
    }

    public function markasread($id,$user_id)
    {
        if($id && $user_id)
        {
            $user = User::where('id', $user_id)->first();
            $user->notifications->where('id', $id)->markAsRead();
            return back();
        }
        
    }
}
