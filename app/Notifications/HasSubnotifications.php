<?php

namespace App\Notifications;

trait HasSubnotifications
{
    /**
     * Get the entity's notifications.
     */
    public function Subnotifications()
    {
        return $this->morphMany(Subnotification::class, 'notifiable')
            ->orderBy('id', 'desc');
    }

    /**
     * Get the entity's read notifications.
     */
    public function readSubnotifications()
    {
        return $this->Subnotifications()
            ->whereNotNull('read_at');
    }

    /**
     * Get the entity's unread notifications.
     */
    public function unreadSubnotifications()
    {
        return $this->Subnotifications()
            ->whereNull('read_at');
    }
}