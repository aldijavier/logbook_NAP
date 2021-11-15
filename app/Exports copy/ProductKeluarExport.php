<?php

namespace App\Exports;
use App\Product_Keluar;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class ProductKeluarExport implements FromCollection, WithHeadings
{
    protected $date_start;
    protected $date_finish;
    function __construct($date_start,$date_finish,$type) {
        $this->date_start = $date_start;
        $this->date_finish = $date_finish;
    }
    public function collection()
    {
        $query=DB::table('product_keluar')
        ->whereBetween(DB::raw("(STR_TO_DATE(tanggal_keluar,'%Y-%m-%d'))"), [$this->date_start, $this->date_finish])
        ->select('product_keluar.id',
        'nomor_form',
        'jenis_kategori',
        'nama_kategori',
        'products.nama',
        'tanggal_keluar',
        'lokasi_pengambilan',
        'lokasi_pemasangan',
        'departements.nama_departement',
        'departement_pic',
        'spk',
        'pform',
        'product_keluar.qty',
        'serial_number',
        'remarks',
        'pic',
        DB::raw('(CASE 
            WHEN jenis_kategori = "1" THEN "Asset" 
            WHEN jenis_kategori = "2" THEN "Consumable"
            ELSE "Unassign" 
            END) AS jenis_kategori'))
        ->leftJoin('products','product_keluar.product_id','=','products.id')
        ->leftJoin('departements','product_keluar.departement','=','departements.id')
        ->orderBy('product_keluar.id','desc')
        ->get();
        //dd($query);
        //dd($query);
        return $query;
    }

    public function headings(): array
    {   return [
            'ID', 
            'Nomor Form',  
            'Jenis Kategori', 
            'Nama Kategori',  
            'Nama Barang', 
            'Tanggal Keluar', 
            'Lokasi Pengambilan', 
            'Lokasi Pemasangan',
            'Departement',  
            'Departement PIC', 
            'SPK', 
            'Project Form',
            'Quantity',
            'Serial Number',
            'Remarks',
            'PIC',
        ];
    }
}
