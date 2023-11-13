<?php

namespace App\Listeners;

use App\Models\Buku;
use App\Models\PeminjamanDetail;
use App\Events\PeminjamanUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PeminjamanUpdatedListener
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
    public function handle(PeminjamanUpdated $event): void
    {
        $peminjaman = $event->peminjaman;
        $bukuId = $event->bukuId;

        foreach ($bukuId as $bookId) {
            $bukuSudahAda = PeminjamanDetail::where('peminjaman_id', $peminjaman->id)
                ->where('buku_id', $bookId)
                ->exists();
            if (!$bukuSudahAda) {
                $peminjamanDetail = new PeminjamanDetail();
                $peminjamanDetail->peminjaman_id = $peminjaman->id;
                $peminjamanDetail->buku_id = $bookId;
                $peminjamanDetail->jumlah = 1;
                $peminjamanDetail->save();

                $buku = Buku::find($bookId);
                $buku->jumlah_stok -= 1;
                $buku->save();
            }
        }
    }
}
