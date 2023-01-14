<?php

namespace App\Exports;

use App\Models\RekapAbsen;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RekapAbsenExport implements FromArray, WithHeadings, ShouldAutoSize
{
    private $tanggal;

    public function __construct($tanggal)
    {
        $this->tanggal = $tanggal;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return RekapAbsen::export($this->tanggal);
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
