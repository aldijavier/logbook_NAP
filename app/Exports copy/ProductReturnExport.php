<?php

namespace App\Exports;
use App\Product_Return;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class ProductReturnExport implements FromCollection, WithHeadings
{
    protected $date_start;
    protected $date_finish;
    function __construct($date_start,$date_finish,$type) {
        $this->date_start = $date_start;
        $this->date_finish = $date_finish;
    }

    public function collection()
    {
        $query=DB::table('product_return')
        ->whereBetween(DB::raw("(STR_TO_DATE(tanggal_kembali,'%Y-%m-%d'))"), [$this->date_start, $this->date_finish])
        ->select('product_return.id',
        'nomor_form',
        'jenis_kategori',
        'nama_kategori',
        'products.nama',
        'tanggal_kembali',
        'lokasi_kembali',
        'lokasi_pemasangan',
        'departements.nama_departement',
        'departement_pic',
        'spk',
        'pform',
        'product_return.qty',
        'serial_number',
        'kondisibarang',
        'rusakondisi',
        'reusekondisi',
        'image',
        'pic',
        DB::raw('(CASE 
            WHEN jenis_kategori = "1" THEN "Asset" 
            WHEN jenis_kategori = "2" THEN "Consumable"
            ELSE "Unassign" 
            END) AS jenis_kategori'))
        ->leftJoin('products','product_return.product_id','=','products.id')
        ->leftJoin('departements','product_return.departement','=','departements.id')
        ->orderBy('product_return.id','desc')
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
            'Tanggal Kembali', 
            'Lokasi Kembali', 
            'Lokasi Pemasangan',
            'Departement',  
            'Departement PIC', 
            'SPK', 
            'Project Form',
            'Quantity',
            'Serial Number',
            'Kondisi Barang',
            'Kondisi Barang Rusak',
            'Kondisi Barang Re-Use',
            'Image',
            'PIC',
        ];
    }
}
