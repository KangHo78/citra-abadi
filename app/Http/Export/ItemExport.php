<?php

namespace App\Exports;

use App\Models\ItemDetail;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ItemExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
    * @return Collection
    */
    public function collection()
    {
        $item_detail = ItemDetail::all();

        $exportData = $item_detail->map(function ($id) {

            return [
                'SKU' => $brand->nama_brand,
                'Daftar Tipe' => implode(", ", $Tipe),
            ];
        });

        return $exportData;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        $arr = [];

        if(auth()->user()->can('brand-column-nama')) {
            array_push($arr, 'Nama Brand');
        }
        if(auth()->user()->can('brand-column-daftar_tipe')) {
            array_push($arr, 'Daftar Tipe');
        }

        return $arr;
    }

    public function map($brand): array
    {
        $arr = [];

        if(auth()->user()->can('brand-column-nama')) {
            array_push($arr, $brand['Nama Brand']);
        }
        if(auth()->user()->can('brand-column-daftar_tipe')) {
            array_push($arr, $brand['Daftar Tipe']);
        }

        return $arr;
    }
}
