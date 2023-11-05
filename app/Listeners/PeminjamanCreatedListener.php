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

        $buku = Buku::whereIn('id', $bukuId)
            ->where('jumlah_stok', '>', 0)->get();
        foreach ($buku as $book) {
            $book->jumlah_stok -= 1;
            $book->save();

            $peminjamanDetail = new PeminjamanDetail;
            $peminjamanDetail->peminjaman_id = $peminjaman->id;
            $peminjamanDetail->buku_id = $book->id;
            $peminjamanDetail->jumlah = 1;
            $peminjamanDetail->save();
        }
    }
}
