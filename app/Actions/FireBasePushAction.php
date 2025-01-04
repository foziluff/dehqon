<?php

namespace App\Actions;

use Kreait\Firebase\Messaging;
use Kreait\Firebase\Factory;

class FireBasePushAction
{
    protected $messaging;

    public function __construct()
    {
        $this->messaging = (new Factory)
            ->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS')))
            ->createMessaging();
    }

    public function handle($title, $body, $token = null, $topic = null)
    {
        if (($token && $topic) || (!$token && !$topic)) return false;

        if ($token) {
            $message = Messaging\CloudMessage::withTarget('token', $token)
                ->withNotification(Messaging\Notification::create($title, $body));
        }
        if ($topic) {
            $message = Messaging\CloudMessage::withTarget('topic', $topic)
                ->withNotification(Messaging\Notification::create($title, $body));
        }

        return $this->messaging->send($message);
    }
}
