<?php

namespace App\Imports;

use App\Exceptions\CustomArrayException;
// use App\Models\KategoriHasKolomKategori;
// use App\Models\Kolom_Kategori;
// use App\Models\Kategori;
use App\Models\ItemDetail;
use App\Models\Item;
use App\Models\Spec;
use App\Models\Material;
use App\Models\Classes;
use App\Models\Conn;
use App\Models\Size;

use App\Rules\UniqueInArray;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Events\ImportFailed;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Illuminate\Support\Facades\Log;

class ItemDetailImport implements ToCollection, WithStartRow, WithBatchInserts, WithEvents, WithHeadingRow
{
    use Importable;
    protected $totalRows, $uniqueSKU = [], $rowNum = 1, $errorMsg = [];

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $this->rowNum++;

            // if ($row['Nama Kolom Kategori']) {
            //     $row['Nama Kolom Kategori'] = explode(', ', $row['Nama Kolom Kategori']);
            // }else{
            //     $row['Nama Kolom Kategori'] = null;
            // }

            $validator = Validator::make(
                $row->toArray(),
                rules: $this->generateRules($row),
                messages: [
                    'SKU.not_in' => 'Ada SKU yang duplikat.'
                ]
            );

            if (($row['SKU'] ?? null) && !in_array($row['SKU'], $this->uniqueSKU)) {
                $this->uniqueSKU[] = $row['SKU'];
            }

            if ($validator->fails()) {
                $this->errorMsg[$this->rowNum] = $validator->errors()->all();
            }
        }

        if (!empty($this->errorMsg)) {
            throw new CustomArrayException($this->errorMsg);
        }

        foreach ($rows as $row) {
            $item_id = Item::where('sku', $row['Master SKU'])->first()->id;
            $spec_id = Spec::where('name', $row['Spec'])->first()->id;
            $material_id = Material::where('name', $row['Material'])->first()->id;
            $class_id = Classes::where('name', $row['Class'])->first()->id;
            $conn_id = Conn::where('name', $row['Conn'])->first()->id;
            $size_id = Size::where('name', $row['Size'])->first()->id;
            $sku_check = ItemDetail::where('sku', $row['SKU'])->first();
            if(empty($sku_check)) {
                $kategori = ItemDetail::create([
                    'item_id' => $item_id,
                    'sku' => $row['SKU'],
                    'spec_id' => $spec_id,
                    'material_id' => $material_id,
                    'class_id' => $class_id,
                    'conn_id' => $conn_id,
                    'size_id' => $size_id,
                    'price' => $row['Price']
                ]);
            } else {
                ItemDetail::where('sku', $row['SKU'])->update([
                    'spec_id' => $spec_id,
                    'material_id' => $material_id,
                    'class_id' => $class_id,
                    'conn_id' => $conn_id,
                    'size_id' => $size_id,
                    'price' => $row['Price']
                ]);
                // $sku_check->save();
            }

            // foreach ($row['Nama Kolom Kategori'] as $kolomKategoriName) {
            //     $kolomKategori = Kolom_Kategori::create([
            //         'nama_kolom_kategori' => $kolomKategoriName
            //     ]);

            //     KategoriHasKolomKategori::create([
            //         'kategori_id' => $kategori->id,
            //         'kolom_kategori_id' => $kolomKategori->id,
            //     ]);
            // }

            // if(auth()->user()->can('kategori-create-column-kolom_kategori')) {
            //     foreach ($row['Nama Kolom Kategori'] as $kolomKategoriName) {
            //         $kolomKategori = Kolom_Kategori::create([
            //             'nama_kolom_kategori' => $kolomKategoriName
            //         ]);

            //         KategoriHasKolomKategori::create([
            //             'kategori_id' => $kategori->id,
            //             'kolom_kategori_id' => $kolomKategori->id,
            //         ]);
            //     }
            // }
        }
    }

    public function generateRules($row){
        $rulesArr = [
            'Master SKU' => ['required', 'exists:items,sku'],
            'Spec' => ['required', 'exists:specs,name'],
            'Material' => ['required', 'exists:materials,name'],
            'Class' => ['required', 'exists:classes,name'],
            'Conn' => ['required', 'exists:conns,name'],
            'Size' => ['required', 'exists:sizes,name']
        ];

        

        return $rulesArr;
    }

    public function registerEvents(): array
    {
        return [
            BeforeImport::class => function (BeforeImport $event) {
                DB::beginTransaction();
                HeadingRowFormatter::default('none');
                $totalRows = $event->getReader()->getTotalRows();
                $firstKey = array_key_first($totalRows);
                if ($totalRows[$firstKey] <= 1) {
                    $data[0] = ['Import Error, no rows detected!'];
                    throw new CustomArrayException($data);
                }
                $this->totalRows = $totalRows[$firstKey] - 1;
            },
            AfterImport::class => function () {
                DB::commit();
            },
            ImportFailed::class => function () {
                DB::rollBack();
            },
        ];
    }

    public function batchSize(): int
    {
        return $this->totalRows;
    }

    public function startRow(): int
    {
        return 2;
    }
}

