<?php

namespace App\Notifications;

use App\Models\Pesanan;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LaundryStatusUpdated extends Notification
{
    use Queueable;

    public function __construct(
        public Pesanan $pesanan,
        public ?string $statusLama,
        public string $statusBaru,
        public ?string $keterangan = null,
    ) {
        //
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Status laundry diperbarui')
            ->greeting('Halo '.$notifiable->name)
            ->line('Status pesanan laundry Anda sudah diperbarui.')
            ->line('Status baru: '.$this->statusBaru)
            ->line('Keterangan: '.($this->keterangan ?: 'Tidak ada keterangan tambahan.'))
            ->line('Terima kasih sudah menggunakan Ping Laundry.');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'pesanan_id' => $this->pesanan->id,
            'status_lama' => $this->statusLama,
            'status_baru' => $this->statusBaru,
            'keterangan' => $this->keterangan,
        ];
    }
}
