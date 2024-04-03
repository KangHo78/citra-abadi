<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\User;
use App\Models\EnquiryDetail;
use App\Models\Item;
use App\Models\ItemDetail;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{

    private string $path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'admin.transaction.sales.';
    }

    function like($text)
    {
        return '%' . $text . '%';
    }

    function index(Request $request)
    {
        $data = Enquiry::get();
        // if($request->date_start) {
        //     $data = $data->where('created_at', '>=', $request->date_start);
        // }
        // if($request->date_end) {
        //     $data = $data->where('created_at', '<=', $request->date_start);
        // }
        // if($request->code) {
        //     $data = $data->where('code', 'like', self::like($request->code));
        // }
        // if($request->customer) {
        //     $data = $data->whereHas('customer', function($query) use ($request)
        //     {
        //         $query->where('name', 'like', self::like($request->customer));

        //     });
        // }
        // $data->get();
        return view($this->path . '/index', compact('data'));
    }
    function show(Request $request)
    {
        $data = Enquiry::where('id', $request->id);
        return view($this->path . '/show', compact('data'));
    }
    function getLastGeneratedCode()
    {
        // Di sini, Anda akan mengambil kode terakhir dari database
        // sebagai contoh, kita hanya mengembalikan kode statis untuk simulasi
        // Anda perlu menggantinya dengan logika yang sesuai dengan aplikasi Anda

        // Misalnya, kode terakhir disimpan dalam tabel 'codes'
        $lastCode = Enquiry::orderBy('id', 'desc')->value('code');

        return $lastCode;
    }
    function create(Request $request)
    {
        $currentDate = date('Ymd');

        // Mendapatkan angka terakhir dari kode sebelumnya (jika ada)
        $lastCode = $this->getLastGeneratedCode(); // Fungsi ini perlu diimplementasikan untuk mengambil kode terakhir dari database atau sumber lainnya
        $lastNumber = $lastCode ? (int)substr($lastCode, -5) : 0;

        // Lakukan increment pada angka terakhir
        $newNumber = $lastNumber + 1;

        // Format angka baru menjadi panjang tetap (5 digit dengan angka 0 di depan jika perlu)
        $formattedNumber = str_pad($newNumber, 5, '0', STR_PAD_LEFT);

        // Gabungkan bagian-bagian tersebut menjadi satu string
        $newCode = 'ENQ' . $currentDate . $formattedNumber;

        $data = ['code' => $newCode, 'customer' => User::get(), 'item' => Item::get(), 'itemDetail' => ItemDetail::get()];

        return view($this->path . '/create', compact('data'));
    }

    function store(Request $req)
    {
        // dd($req->all());
        // return $req->all();
        $parent = Enquiry::create([
            'code' => $req->code,
            'date' => date("Y-m-d", strtotime($req->date)),
            'desc' => $req->desc,
            'status' => $req->status,
            'customer_id' => $req->customer_id,
            'price' => str_replace(",", "", $req->price),
            'discount' => str_replace(",", "", $req->discount_value),
            // 'discount_type'=>$req->discount_type,
            'grand_total' => str_replace(",", "", $req->total_price),
        ]);


        for ($i = 0; $i < count($req->dt); $i++) {
            EnquiryDetail::create([
                'enquiry_id' => $parent->id,
                'item_id' => ItemDetail::where('id', $req->item_detail_id[$i])->first()->item_id,
                'item_detail_id' => $req->item_detail_id[$i],
                'item_price' => str_replace(",", "", $req->price_dt[$i]),
                'item_quantity' => str_replace(",", "", $req->qty_dt[$i]),
                'description' => $req->description_dt[$i],
            ]);
        }

        return redirect()->route('transaction.sales.index');
        // return view($this->path . '/index', compact('data'));
    }
    function edit($id)
    {
        // $data = ;
        $data = ['data' => Enquiry::with('enquiry_detail', 'enquiry_detail.item', 'enquiry_detail.item_detail')->where('id', $id)->first(), 'customer' => User::get(), 'item' => Item::get(), 'itemDetail' => ItemDetail::get()];
        return view($this->path . '/edit', compact('data'));
    }
    function update(Request $req)
    {

        // return $req->all();
        $parent = Enquiry::where('id',$req->id)->update([
            'date' => date("Y-m-d", strtotime($req->date)),
            'desc' => $req->desc ?? '-',
            'status' => $req->status,
            'customer_id' => $req->customer_id,
            'price' => str_replace(",", "", $req->price),
            'discount' => str_replace(",", "", $req->discount_value),
            'grand_total' => str_replace(",", "", $req->total_price),
        ]);


        EnquiryDetail::where('enquiry_id',$req->id)->whereNotIn('id',$req->dt)->delete();

        for ($i = 0; $i < count($req->dt); $i++) {
            if ($req->dt[$i] != 0) {
                EnquiryDetail::where('id',$req->dt[$i])->update([
                    // 'enquiry_id' => $parent->id,
                    'item_id' => ItemDetail::where('id', $req->item_detail_id[$i])->first()->item_id,
                    'item_detail_id' => $req->item_detail_id[$i],
                    'item_price' => str_replace(",", "", $req->price_dt[$i]),
                    'item_quantity' => str_replace(",", "", $req->qty_dt[$i]),
                    'description' => $req->description_dt[$i],
                ]);
            }else{
                EnquiryDetail::create([
                    'enquiry_id' => $req->id,
                    'item_id' => ItemDetail::where('id', $req->item_detail_id[$i])->first()->item_id,
                    'item_detail_id' => $req->item_detail_id[$i],
                    'item_price' => str_replace(",", "", $req->price_dt[$i]),
                    'item_quantity' => str_replace(",", "", $req->qty_dt[$i]),
                    'description' => $req->description_dt[$i],
                ]);
            }

            
        }

        return redirect()->route('transaction.sales.index');
        return view($this->path . '/index', compact('data'));
    }
    function print($id)
    {
        $data = Enquiry::with('enquiry_detail')->where('id', $id)->first();
        // return $data;
        return view($this->path . '/print', compact('data'));
    }
    function email(Request $request)
    { //TODO:
        $data = Enquiry::where('id', $request->id);
        return view($this->path . '/print', compact('data'));
    }
    function destroy(Request $request)
    {
        Enquiry::find($request->id)->delete();
        $data = Enquiry::all();
        return view($this->path . '/show', compact('data'));
    }
    function getDataItemDetail(Request $request)
    {

        // return ItemDetail::with('item')->get();


        $searchTerm = $request->input('q'); // Ambil input pencarian dari request
        // return $searchTerm;
        $data = ItemDetail::where('sku', 'like', '%' . $searchTerm . '%')
            // ->orWhere('sku', 'like', '%' . $searchTerm . '%')
            ->orWhereHas('item', function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%');
            })
            ->get();
        // return $data;
        $formattedData = [];

        foreach ($data as $item) {
            $formattedData[] = [
                'id' => $item->id,
                'text' => $item->item->name . ' (' . $item->sku . ')',
                'price' => number_format($item->price, 0, '.', ','),
            ];
        }

        return response()->json($formattedData);
    }
}
