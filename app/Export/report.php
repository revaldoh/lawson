<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Logika untuk mengambil data yang ingin diekspor
        // dan mengembalikannya sebagai koleksi (collection)
    }

    public function headings(): array
    {
        // Array yang berisi judul kolom pada file ekspor
        // Misalnya: return ['Kolom 1', 'Kolom 2', 'Kolom 3'];
    }
}
