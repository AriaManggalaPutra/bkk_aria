<?php

namespace App\Exports;

use App\Models\Lamaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LamaranExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected int $lowonganId;

    /**
     * Initialize the export class with the Lowongan ID.
     *
     * @param int $lowonganId
     */
    public function __construct(int $lowonganId)
    {
        $this->lowonganId = $lowonganId;
    }

    /**
     * Fetch the data to be exported.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection(): \Illuminate\Support\Collection
    {
        return Lamaran::where('id_lowongan', $this->lowonganId)->get();
    }

    /**
     * Define the headings for the Excel export.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Nama Pelamar',
            'Email',
            'Telepon',
            'CV',
            'Status',
            'Tanggal Lamaran',
        ];
    }
}
