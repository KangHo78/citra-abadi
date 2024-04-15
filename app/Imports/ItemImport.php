<?php

namespace App\Imports;

use App\Exceptions\CustomArrayException;
// use App\Models\KategoriHasKolomKategori;
// use App\Models\Kolom_Kategori;
// use App\Models\Kategori;
// use App\Models\ItemDetail;
use App\Models\Item;
use App\Models\Brand;
use App\Models\Category;

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

class ItemImport implements ToCollection, WithStartRow, WithBatchInserts, WithEvents, WithHeadingRow
{
    use Importable;
    protected $totalRows, $uniqueItem = [], $uniqueSKU = [], $rowNum = 1, $errorMsg = [];

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
                    'Item Name.not_in' => 'Ada Nama Item yang duplikat.',
                    'SKU.not_in' => 'Ada SKU yang duplikat.'
                ]
            );

            if (($row['Item Name'] ?? null) && !in_array($row['Item Name'], $this->uniqueItem)) {
                $this->uniqueItem[] = $row['Item Name'];
            }

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
            $brand_id = Brand::where('name', $row['Brand'])->first()->id;
            $category_id = Category::where('name', $row['Category'])->first()->id;
            // $brand_check = Item::where('brand_id', $brand_id)->first();
            // $category_check = Item::where('category_id', $category_id)->first();
            $sku_check = Item::where('sku', $row['SKU'])->first();
            if(!empty($sku_check)) {
                Item::where('sku', $row['SKU'])->update([
                    'name' => $row['Item Name'],
                    'sku' => $row['SKU'],
                    'description' => $row['Description'],
                    'brand_id' => $brand_id,
                    'category_id' => $category_id
                ]);
            } else if(!empty($category_check)) {
                Item::where('sku', $row['SKU'])->update([
                    'name' => $row['Item Name'],
                    'sku' => $row['SKU'],
                    'description' => $row['Description'],
                    'brand_id' => $brand_id,
                    'category_id' => $category_id
                ]);
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
            'Brand' => ['required', 'exists:brands,name'],
            'Category' => ['required', 'exists:categories,name'],
        ];

        // if(auth()->user()->can('kategori-create-column-kolom_kategori')) {
        //     $rulesArr['Nama Kolom Kategori'] = [new UniqueInArray];
        // }

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

