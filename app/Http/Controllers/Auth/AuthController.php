<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Guest;
use App\Ruang;
use App\Lantai;
use App\Lokasi;
use Carbon\Carbon;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\GuestExport;
use Browser;
use App\Traits\AuditLogsTrait;

class AuthController extends Controller
{
    use AuditLogsTrait;
    public function index(Request $request){

        $levelId = Auth::user()->level;
        $userId = Auth::user()->id;
        if ($levelId == 'Super Admin'){
            
        
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
        }
        else if ($levelId == 'Admin') {
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
            
        }
            return view('layout.index', compact('guests'));
            // return view('layouts.index', ['guests' => $guests]);
    }

    public function sso(){
        dd('hai');
    }
    public function login(Request $request, $q){
        $email =base64_decode($q);
        $password='-';

        // $email=$request->email;

        // $password=$request->password;

        $credentials = [

            'email' => $email,

            'password' => $password

        ];
        $cekuser_status=User::where('email',$email)->first();
        // dd('email', $credentials);

        if(Auth::attempt($credentials)){
            //update last login
            $update_lastlogin=User:: where('email',$email)
            ->update([
                'last_login' => now(),
                'login_counter' => $cekuser_status->login_counter+1,
            ]);

            if($update_lastlogin){
            //Audit Log
            $username= auth()->user()->email; 
            $ipAddress=$_SERVER['REMOTE_ADDR'];
            $location='0';
            $access_from=Browser::browserName();
            $activity='User Login';

            //dd($access_from);
            $this->auditLogs($username,$ipAddress,$location,$access_from,$activity);
            return redirect()->action('Auth\AuthController@index');
            }
        }
        // return redirect()->action('Auth\AuthController@login')->with('message','email atau password salah !');
        return redirect('https://stagingsysdev.nap.net.id/sso/signout');
    }

    public function logout(Request $request){
        // Auth::logout();
        //Audit Log
        $username= auth()->user()->email; 
        $ipAddress=$_SERVER['REMOTE_ADDR'];
        $location='0';
        $access_from=Browser::browserName();
        $activity='Logout';

        //dd($access_from);
        $this->auditLogs($username,$ipAddress,$location,$access_from,$activity);
        $email_user=auth()->user()->email;
        return redirect('https://stagingsysdev.nap.net.id/sso/portal/'.$email_user);
        // return redirect()->route('logins');
    }
}
