<?php

namespace App\Exports;

use App\Models\ItemDetail;
use App\Models\Item;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\Log;

class ItemDetailExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ItemDetail::with('item')->with('spec')->with('material')->with('classes')->with('conn')->with('size')->get();
    }

    public function headings(): array {
        return[
            'Master Item Name',
            'Master SKU',
            'SKU',
            'Spec',
            'Material',
            'Class',
            'Conn',
            'Size',
            'Price'
        ];
    }

    public function map($itemDetail): array {
        $relatedData = [];
        if(isset($itemDetail->item)) {
            $relatedData = [
                $itemDetail->item->name,
                $itemDetail->item->sku,
                $itemDetail->sku,
                $itemDetail->spec->name,
                $itemDetail->material->name,
                $itemDetail->classes->name,
                $itemDetail->conn->name,
                $itemDetail->size->name,
                $itemDetail->price
            ];
        }
        return $relatedData;
    }
}

