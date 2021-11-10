<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
use App\Exports\GuestExport;
// use App\Controllers\GuestPrint;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Guest;
use App\Ruang;
use App\Lantai;
use App\Lokasi;
use Carbon\Carbon;
use PDF;
use App\Traits\AuditLogsTrait;
use Browser;


//use DateTime;
use File;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use AuditLogsTrait;
    public function index(Request $request)
    {   
            $search = $request->get('search');
            $search1 = $request->get('search1');
            $search2 = $request->get('search2');
            $searchAll = $request->get('searchAll');
          
            $guests = DB::table('guests');


            
            // $guests= Guest::with('lokasi')->get();

            // $guests= Guest::with('lokasi');

        $guests = Guest::leftJoin('lokasis', 'lokasis.id', 'guests.lokasi_id')->leftJoin('statuses', 'statuses.id', 'guests.id_status')->leftJoin('ruangs', 'ruangs.id_ruang', 'guests.ruangan_id')
        ->leftJoin('lantais', 'lantais.id_lantai', 'guests.lantai_id')
            ->select(
                'guests.*',
                'lokasis.lokasi as lokasi',
                'ruangs.name_ruang as ruang',
                'lantais.name_lantai as lantai',
                'statuses.status as status' 
                
            );       


            
        // $guests = Guest::leftJoin('statuses', 'statuses.id', 'guests.id_status')
        // ->select(
        //     'guests.*',
        //     'statuses.status as status'
        // );  




            if($search1){
                $guests=$guests->whereDate('datein','>=',$search1);
            }
            
            if($search2){
                $guests=$guests->whereDate('datein','<=',$search2);
            }

            
            if($search){
                $guests=$guests->where('lokasi_id','like','%'.$search.'%');
            }
            
            if($searchAll){
                $guests=$guests->where('company','like','%'.$searchAll.'%');
            }

           
            $guests = $guests->withTrashed()->orderBy('id','desc')->paginate(10);
            $guests=$guests->appends($request->all());

            if($request->has('guestexport')){

                $name_file = 'Guest_'.date('Y-m-d H:i:s').'.xlsx';
                 return Excel::download(new GuestExport($search1,$search2, $search, $searchAll), $name_file);
            }

            if ($request->has('guestprint')){
                $guests = Guest::withTrashed()->leftJoin('lokasis', 'lokasis.id', 'guests.lokasi_id')->leftJoin('ruangs', 'ruangs.id_ruang', 'guests.ruangan_id')->leftJoin('lantais', 'lantais.id_lantai', 'guests.lantai_id')
            ->select(
                'guests.*',
                'lokasis.lokasi as lokasi',
                'ruangs.name_ruang as ruang',
                'lantais.name_lantai as lantai',
            );      
                $search = $request->get('search');
                $search1 = $request->get('search1');
                $search2 = $request->get('search2');
              
             
    
                if($search1){
                    $guests=$guests->whereDate('datein','>=',$search1);
                }
                
                if($search2){
                    $guests=$guests->whereDate('datein','<=',$search2);
                }
    
                
                if($search){
                    $guests=$guests->where('lokasi_id','like','%'.$search.'%');
                }

                if($searchAll){
                    $guests=$guests->where('company','like','%'.$searchAll.'%');
                }
    
               
                $guests = $guests->get();
                //Audit Log
                $username= auth()->user()->email; 
                $ipAddress=$_SERVER['REMOTE_ADDR'];
                $location='0';
                $access_from=Browser::browserName();
                $activity='Mencetak Guest';

                //dd($location);
                $this->auditLogs($username,$ipAddress,$location,$access_from,$activity);
                return view('layout.cetakguest', compact('guests'));
            }
                
         

            // if ($request->has('guestprint'))
            // {

            // //     $pdf = PDF::loadView('layouts.index', compact('guests'));   
            // // return $pdf->stream();

            //     // select PDF
            //     $PDFReport = $guests;
            //     $pdf = PDF::loadView('layouts.index', ['layouts.index' => $PDFReport])->setPaper('a4', 'landscape');
            //     return $pdf->download(new GuestPrint($search1,$search2, $search),'PDF-report.pdf');
            // } 

            // if ($request->has('guestprint'))
            // {
            //     // select PDF
            //     $PDFReport = DB::select("SELECT * FROM guests WHERE datein BETWEEN '$search1' AND '$search2'");
            //     $pdf = PDF::loadView('layouts.index', ['PDFReport' => $PDFReport])->setPaper('a4', 'landscape');
            //     return $pdf->download('PDF-report.pdf');
            // } 
            // $guests = Guest::leftJoin('lokasis', 'lokasis.id', 'guests.lokasi_id')
            // ->select(
            //     'guests.*',
            //     'lokasis.lokasi as lokasi'
            // )
            // ->paginate(10);            

            return view('layout.index', compact('guests'));
            // return view('layouts.index', ['guests' => $guests]);
    }
      

    // public function cetakguest($search1,$search2){
       
    //     $cetakguest = DB::table('guests')->whereDate('datein','>=', $search1)->whereDate('datein','<=', $search2)->get();
    //     return view('layouts.cetakguest', compact('cetakguest'));
    // }


    // public function print(Request $request){
    //     $search = $request->get('search');
    //     $search1 = $request->get('search1');
    //     $search2 = $request->get('search2');
      
    //     $cetakguest = DB::table('guests');

    //     if($search1){
    //         $cetakguest=$cetakguest->whereDate('datein','>=',$search1);
    //     }
        
    //     if($search2){
    //         $cetakguest=$cetakguest->whereDate('datein','<=',$search2);
    //     }

        
    //     if($search){
    //         $cetakguest=$cetakguest->where('lokasi','like','%'.$search.'%');
    //     }

    //    dd($search1,$search2);
    //     $cetakguest = $cetakguest->get();
    //     return view('layouts.cetakguest', compact('cetakguest'));
    // }



    // public function search(Request $request){

    //     if( $search1 = $request->get('search1') &&  $search2 = $request->get('search2') && $search = $request->get('search') ){
    //             $search = $request->get('search');
    //             $search1 = $request->get('search1');
    //             $search2 = $request->get('search2');
    //             $guests = DB::table('guests')->whereDate('datein','>=', $search1)->whereDate('datein','<=', $search2)->where('lokasi', 'like', '%'.$search.'%')->paginate();           
          
    //             $guests->appends(array(
    //             $search = $request->get('search'),
    //             $search1 = $request->get('search1'),
    //             $search2 = $request->get('search2'),
    //         ));
            
            
    //         }    
    //         elseif($search1 = $request->get('search1') &&  $search2 = $request->get('search2')){
                    
    //             $search1 = $request->get('search1');
    //             $search2 = $request->get('search2');
    //             $guests = DB::table('guests')->whereDate('datein','>=', $search1)->whereDate('datein','<=', $search2)->paginate();
    //         }
    //         elseif( $search = $request->get('search') ){
    //             $guests = DB::table('guests')->where('lokasi', 'like', '%'.$search.'%')->paginate();
                  
    //      }
    //       elseif( $search1 = $request->get('search1')){
                    
    //             $guests = DB::table('guests')->whereDate('datein','>=',$search1)->paginate();
    //                 }
       
    //         else{
    //             // $guests = DB::table('guests')->all()->paginate();
    //             // $guests = DB::table('guests')->paginate(); 
    //         }
    //         return view('layouts.index',['guests'=>$guests]);
            
    //         }


private function _validation(Request $request){
            $validation = $request->validate([
                'name' => 'required',
                'lokasi_id'=>'required',
                // 'telephone' => 'required|regex:[\+62 ((\d{3}([ -]\d{3,})([- ]\d{4,})?)|(\d+)))|(\(\d+\) \d+)|\d{3}( \d+)+|(\d+[ -]\d+)|\d+]',
               'telephone' => 'required',
                'company'=>'required',
              
                'remarks'=>'required',

            ],
        [
                'name.required' => 'Harus Diisi',
                'lokasi_id.required'=>'Harus Diisi',
                'telephone.required'=>'Harus Diisi',
                'company.required'=>'Harus Diisi',
                'remarks.required'=>'Harus Diisi',
               
        ]);
        }

    // public function guestexport(Request $request)
    // {
    //     $search1=$request->search1;
    //     $search2 = $request->search2;


    //      return Excel::download(new GuestExport($search1,$search2), 'excelname.xlsx');
    //     // $name_file = 'Guest_'.date('Y-m-d').'.xlsx';
    //     // return Excel::download(new GuestExport, $name_file);
    // }

    // public function guestexport() 
    // {
    //     return Excel::download(new GuestExport, 'guest.xlsx');
    // }
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $lokasis = Lokasi::all();
        
         return view('layouts.create-guest',compact('lokasis'));
       
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_validation($request);
        // dd($request->all());
        if($request->hasFile('foto')){
        $foto = $request->foto->getClientOriginalName() . '_' . time()
                                 . '.' . $request->foto->extension();
          $request->foto->move(public_path('image'), $foto);
         } else {
                $foto = null;
              }

            //   $datein = $request->get('datein');
            // // dd($datein);
             
            // $date = $request->get('datein');
            // $timestamp = strtotime($date);
            // $datein = date('Y-m-d H:i:s',$timestamp );
            //  $datein =  \Carbon\Carbon::parse($request->datein)->format('d/m/Y H:i:s');
          $datein = Carbon::now()->format('Y-m-d H:i:s');
          $id_status = 1;
        $guests = new Guest([
            'datein' => $datein,
            // 'datein' => $datein,
            // 'lokasi' => $request->input('lokasi'),
            'guestsid' => $request->input('guestsid'),
            'name' => $request->input('name'),
            'telephone' => $request->input('telephone'),
            'company' => $request->input('company'),
            'email' => $request->input('email'),
            'activity' => $request->input('activity'),
            'noRack' => $request->input('noRack'),
            'noLoker' => $request->input('noLoker'),
            'lokasi_id' => $request->input('lokasi_id'),
            'remarks' => $request->input('remarks'),
            'foto' => $foto,
            'id_status'=>$id_status

        ]);
        $guests->save();
      
        return redirect('/')->with('message','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $guest = Guest::find($id);
        $guest = Guest::leftJoin('lokasis', 'lokasis.id', 'guests.lokasi_id')
            ->select(
                'guests.*',
                'lokasis.lokasi as lokasi'
            )->find($id);      
        return view('layout.showguest', compact('guest'));
    }


    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guest = Guest::find($id);
        $lokasis = Lokasi::all();
        return view('layouts.edit-guest', compact('guest','lokasis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
             $this->_validation($request);
            $param = Guest::findorfail($id);
            //  $idate=$param->datein;
            //  $start=Carbon::parse($idate);

            // $dateout = Carbon::now()->format('Y-m-d H:i:s');
           
            // $odate=$param->datein;
            // $end=Carbon::parse($request->dateout);
            // $date_diff=$start->diff($end)->format('%d'.' Hari'.' %H'.' Jam'.' %i'.' Menit'.' %s'.' Detik');
           
            // $id_status = 2;

            $foto = $request->id;   
            $bannerData = Guest::find($foto);
            if ($request->hasFile('foto')){
                $image_path = public_path(('/image/').$bannerData->foto);
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                

                $bannerImage = $request->file('foto');
                $imgName = $bannerImage->getClientOriginalName();
                $destinationPath = public_path('/image/');
                $bannerImage->move($destinationPath, $imgName);
                
              } else {
                $imgName = $bannerData->foto;
              }
              $bannerData->foto = $imgName;
              $bannerData->save();

            
            $guest = [
            
                // 'dateout' => $dateout,
                'lokasi_id' => $request['lokasi_id'],
                'name' => $request['name'],
                'telephone' => $request['telephone'],
                'company' => $request['company'],
                'email' => $request['email'],
                'activity' => $request['activity'],
                'noRack' => $request['noRack'],
                'noLoker' => $request['noLoker'],
                // 'durasi' => $date_diff,
                'remarks' => $request['remarks'],
                // 'id_status'=>$id_status,
               
            ];
           
                
            
         


            // dd($start,$end,$date_diff);

            // $file_photo = $request->hasfile('foto');

        
            // if($file_photo) {

            //     $filename = $file_photo->getClientOriginalName();
              
            //     $guest['foto'] = $filename; // Update field photo
            //     $proses = $file_photo->move('image/', $filename);
            // }
            
           
            try {
            
             
                $param->update($guest);
                return redirect('/')->with('message','Data Berhasil Diupdate');
            }
            catch (\Exception $e) { 
                return redirect('/')->with('gagal','Data Gagal Diupdate');
            }

            // $request->foto->move(public_path().'/image',$awal);
            // $ubah->update($guest);
            
            //  return redirect('/')->with('message','Data Berhasil Diupdate');
    }




    public function cek($id)
    {
        $guest = Guest::find($id);
        
        return view('layout.admin-co-guest', compact('guest'));
    }





    public function cekout(Request $request, $id)
    {
    
            $param = Guest::findorfail($id);
             $idate=$param->datein;
             $start=Carbon::parse($idate);

            $dateout = Carbon::now()->format('Y-m-d H:i:s');
           
            $odate=$param->datein;
            $end=Carbon::parse($request->dateout);
            $date_diff=$start->diff($end)->format('%d'.' Hari'.' %H'.' Jam'.' %i'.' Menit'.' %s'.' Detik');
           
            $id_status = 2;

            
            $guest = [
            
                'dateout' => $dateout,
                'durasi' => $date_diff,
                'id_status'=>$id_status,
               
            ];
           
            try {
            
             
                $param->update($guest);
                return redirect('/')->with('message','Guest Berhasil Di Check Out');
            }
            catch (\Exception $e) { 
                return redirect('/')->with('gagal','Guest Gagal Di Check Out');
            }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guest = Guest::findorfail($id);
        $foto= public_path('/image/').$guest->foto;
        if (file_exists($foto)){
            @unlink($foto);
        }
        $guest->delete();

        return redirect('/')->with('hapus','Data Berhasil Dihapus');
    }
}
