<?php

namespace App\Exports;

use App\Models\RekapAbsen;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RekapAbsenExport implements FromArray, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return RekapAbsen::export();
    }
    public function headings(): array{
        return [
            'No',
            'Nama',
            'Status',
            'Keterangan',
            'Tanggal'
        ];
    }
}
