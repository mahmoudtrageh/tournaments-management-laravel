<?php

namespace App\Notifications;

use App\Team;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RegisterTeam extends Notification
{
    use Queueable;
    public $teams;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Team $teams)
    {
        $this->teams = $teams;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    public function toDatabase($notifiable)
    {
       
            

        return [
            'name' => $this->teams->name,
            'message' => 'تم تسجيل فريق جديد',
            'id' => $this->teams->id,
            'created_at' => $this->teams->created_at,


        ];
    

    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'teams'=> $this->teams->name
        ];

    }

    public function toBroadcast($notifiable)
    {
        return [
            'teams'=>$this->teams->name
        ];
    }

    public function broadcastOn(){
        return 'register-team';
    }

}
