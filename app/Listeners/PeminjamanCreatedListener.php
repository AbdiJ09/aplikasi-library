<?php

namespace App\Listeners;

use App\Events\PeminjamanCreated;
use App\Models\Buku;
use App\Models\PeminjamanDetail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PeminjamanCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PeminjamanCreated $event): void
    {
        $peminjaman = $event->peminjaman;
        $bukuId = $event->bukuId;

        Buku::whereIn('id', $bukuId)
            ->where('jumlah_stok', '>', 0)
            ->each(function ($book) use ($peminjaman) {
                $book->decrement('jumlah_stok');
                $peminjaman->peminjamanDetail()->create([
                    'bukus_id' => $book->id,
                    'jumlah' => 1,
                ]);
            });
    }
}
