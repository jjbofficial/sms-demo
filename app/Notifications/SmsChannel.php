<?php
 
namespace App\Notifications;
 
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class SmsChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {        
        $notificationData = $notification->toSms($notifiable);

        Http::withHeaders([
            'api-key' => config('arkesel.apiKey'),
        ])->post(
            config('arkesel.apiUrl') . '/v2/sms/send',
            array_merge($notificationData, [
                'recipients' => [
                    $notifiable->phone
                ],
                'sender' => config('arkesel.sender'),
                'sandbox' => config('arkesel.sandbox')
            ])
        );
    }
}