<?php

namespace App\Listeners;

use App\Events\ProfileCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateProfileAvatar
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProfileCreated  $event
     * @return void
     */
    public function handle(ProfileCreated $event)
    {
        $event->profile->photo()->create([
            'path' => '/photos/profile/batman.png'
            ]);
    }
}