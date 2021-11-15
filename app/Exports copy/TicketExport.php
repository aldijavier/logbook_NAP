<?php

namespace App\Exports;
use App\Product_Masuk;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class TicketExport implements FromCollection, WithHeadings
{
    protected $date_start;
    protected $date_finish;
    function __construct($date_start,$date_finish,$type) {
        $this->date_start = $date_start;
        $this->date_finish = $date_finish;
    }

    public function collection()
    {
        $query=DB::table('product_masuk')
        ->whereBetween(DB::raw("(STR_TO_DATE(tanggaL_terima,'%Y-%m-%d'))"), [$this->date_start, $this->date_finish])
        ->select('product_masuk.id',
        'nomor_form',
        'nomor_asset',
        'pic',
        'jenis_kategori',
        'products.nama',
        'tanggal_terima',
        'lokasi_terima',
        'po',
        'do',
        'product_masuk.qty',
        'serial_number',
        'spesifikasi',
        'remarks',
        DB::raw('(CASE 
            WHEN jenis_kategori = "1" THEN "Asset" 
            WHEN jenis_kategori = "2" THEN "Consumable"
            ELSE "Unassign" 
            END) AS jenis_kategori'))
        ->leftJoin('products','product_masuk.product_id','=','products.id')
        ->orderBy('product_masuk.id','desc')
        ->get();
        //dd($query);
        //dd($query);
        return $query;
    }

    public function headings(): array
    {   return [
            'No. Form', 
            'No. Asset',  
            'PIC', 
            'Jenis Kategori',  
            'Nama Kategori', 
            'Nama Barang', 
            'Tanggal Terima', 
            'Lokasi Terima',
            'PO',  
            'DO', 
            'Qty', 
            'Serial Number',
            'Spesifikasi',
            'Remarks',
        ];
    }
}
