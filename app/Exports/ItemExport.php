<?php

namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ItemExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Item::with('brand')->with('category')->get();
    }

    public function headings(): array {
        return[
            'Item Name',
            'SKU',
            'Description',
            'Brand',
            'Category',
        ];
    }

    public function map($item): array {
        $relatedData = [];

        if(isset($item)) {
            $relatedData = [
                $item->name,
                $item->sku,
                $item->description,
                $item->brand->name,
                $item->category->name,
            ];
        }
        return $relatedData;
    }
}
