<?php

namespace App\Listeners;

use App\Events\OrderStatusUpdated;
use App\Notifications\LaundryStatusUpdated;

class SendLaundryNotification
{
    public function handle(OrderStatusUpdated $event): void
    {
        $pesanan = $event->pesanan->loadMissing('user');

        if ($pesanan->user) {
            $pesanan->user->notify(new LaundryStatusUpdated(
                $pesanan,
                $event->statusLama,
                $event->statusBaru,
                $event->keterangan,
            ));
        }
    }
}
