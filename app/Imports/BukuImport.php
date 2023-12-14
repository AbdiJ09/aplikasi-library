<?php

namespace App\Imports;

use App\Models\Buku;
use App\Models\Kategory;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToCollection;

class BukuImport implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // dd($row[8]);
            $kategory = Kategory::where("nama_kategory", $row[7])->first();
            Buku::create([
                "kode_buku" => $row[0],
                "judul" => $row[1],
                "pengarang" => $row[2],
                "penerbit" => $row[3],
                "tahun_terbit" => $row[4],
                "isbn" => $row[5],
                "jumlah_stok" => $row[6],
                "kategory_id" => $kategory->id,
                "gambar" => $this->storeImage($row[8]),
                'slug' => Str::slug($row[1]),
            ]);
        }
    }
    private function storeImage($photo)
    {
        $content = file_get_contents($photo);
        $fileName = basename($photo);

        Storage::disk('public')->put('buku/' . $fileName, $content);
        return $fileName;
    }
}
