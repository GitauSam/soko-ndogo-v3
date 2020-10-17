<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationRead extends Component
{

    public function markAsRead($id) 
    {
        auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
    }

    public function render()
    {
        $notifications = auth()->user()->unreadNotifications;

        return view('livewire.notification-read', [
                    'notifications' => $notifications
                ]);
    }
}
