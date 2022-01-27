<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreGuestRequest as StoreRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Guest;
use App\Lokasi;
use App\Lantai;
use App\Ruang;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Facades\Input;
use DB;

class GuestController extends Controller
{
    // Buku Tamu home
    public function index () {
        $guests = Guest::latest()->paginate(6);
        return view('guests.index',compact('guests'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create() {
        $lokasi = Lokasi::all();
        return view('guests.create', compact('lokasi'));
    }

    public function lokasi(){
        $lokasi = Lokasi::all();
        return view('guests.create', compact('lokasi'));
    }

    public function lantai(){
        $id_lokasi = input::get('id');
        $lantai = Lantai::where('id_lokasi', '=', $id_lokasi)->get();
        return response()->json($lantai);
    }

    public function ruangan(){
        $id_lantai = input::get('id_lantai');
        $ruangan = Ruang::where('lantais', '=', $id_lantai)->get();
        return response()->json($ruangan);
    }

    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function myformAjax($id)
    {
        $cities = DB::table("lantais")
                    ->where("lokasis",$id)
                    ->lists("name_lantai","id");
        return json_encode($cities);
    }


    public function success() {
        return view('guests.success');
    }

    public function rating() {
        return view('guests.rating');
    }

    public function chooseuser() {
        return view('guests.chooseUser');
    }

    public function getGuest() {
        return view('guests.searchGuest');
    }

    public function guestsId() {
        $lokasis = Lokasi::all();
        return view('guests.guestsId', compact('lokasis'));
    }

    public function oldguests(){
        return view('guests.guestsId');
    }


    public function lokasis()
    {

        $lokasis = Lokasi::all();
        
         return view('guests.create',compact('lokasis'));
       
    }

    //create
    public function checkout(Guest $guest) {

        $guests = Guest::latest()->paginate(6);
        return view('guests.checkout',compact('guests'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

   
    //store
    public function store(StoreRequest $request) {
        // dd($request->all());
        $this->validate($request,[
            'guestsid' => 'required',
            'name' => 'required',
            'email' => 'required',
            'company' => 'required',
            'activity' => 'required',
            // 'noRack' => 'required',
            // 'noLoker' => 'required',
            'foto' => 'required',
            'telephone' => 'required|numeric|min:9',
            'foto' => 'required',
            'access' => 'required'
         ]);
        $requestData = $request->all();
 
            if(!empty($_POST['foto'])){
                  $encoded_data = $_POST['foto'];
                    $binary_data = base64_decode( $encoded_data );
 
                    // save to server (beware of permissions // set ke 775 atau 777)
                    $namafoto = uniqid().".png";
                    //$result = file_put_contents( 'uploads/'.$namafoto, $binary_data );
                    Storage::disk('public')->put('photos'.'/'.$namafoto, $binary_data);
                    //if (!$result) die("Could not save image!  Check file permissions.");
                }
                $datein = Carbon::now()->format('Y-m-d H:i:s');
                $id_status = 1;
            $guest = new Guest;
            $guest->datein = $datein;
            $guest->guestsid = $request->input('guestsid');
            $guest->name = $request->input('name');
            $guest->telephone = $request->input('telephone');
            $guest->company = $request->input('company');
            $guest->email = $request->input('email');
            $guest->activity = $request->input('activity');
            $guest->noLoker = $request->input('noLoker');
            $guest->lokasi_id = $request->input('lokasi_id');
            $guest->lantai_id = $request->input('lantai_id');
            $guest->ruangan_id = $request->input('ruangan_id');
            $guest->noRack = $request->input('noRack');
            $guest->access = $request->input('access');
            $guest->remarks = $request->input('remarks');
            $guest->id_status = $id_status;
            $guest->foto = $namafoto;
            // 'datein' => $datein,
            // 'lokasi' => $request->input('lokasi'),
            // 'guestsid' => $request->input('guestsid'),
            // 'name' => $request->input('name'),
            // 'telephone' => $request->input('telephone'),
            // 'company' => $request->input('company'),
            // 'email' => $request->input('email'),
            // 'activity' => $request->input('activity'),
            // 'noRack' => $request->input('noRack'),
            // 'noLoker' => $request->input('noLoker'),
            // 'lokasi_id' => $request->input('lokasi_id'),
            // 'remarks' => $request->input('remarks'),
            // 'id_status' => $id_status,
            // 'foto' => $namafoto
            // dd($guest);
            $guest->save();
            // Session::flash('success', 'Data berhasil ditambahkan'); 
            return view('guests.success');

    }

    //show
    public function show(Guest $guest) {

        return view('guests.show',compact('guest'));
    }

    //edit
    public function edit(Guest $guest) {

        return view('guests.edit',compact('guest'));
    }

    //update
    public function update(StoreRequest $request) {

         $this->validate($request,[
            'guestsid' => 'required',
            'name' => 'required',
            'email' => 'required',
            'company' => 'required',
            'activity' => 'required',
            'noRack' => 'required',
            'noLoker' => 'required',
            'telephone' => 'required|numeric|min:9'
         ]);
        $requestData = $request->all();
 
            if(!empty($_POST['foto'])){
                  $encoded_data = $_POST['foto'];
                    $binary_data = base64_decode( $encoded_data );
 
                    // save to server (beware of permissions // set ke 775 atau 777)
                    $namafoto = uniqid().".png";
                    //$result = file_put_contents( 'uploads/'.$namafoto, $binary_data );
                    Storage::disk('public')->put('photos'.'/'.$namafoto, $binary_data);
                    //if (!$result) die("Could not save image!  Check file permissions.");
                }
                $datein = Carbon::now()->format('Y-m-d H:i:s');
                $id_status = 1;
            $guest = new Guest;
            $guest->datein = $datein;
            $guest->guestsid = $request->input('guestsid');
            $guest->name = $request->input('name');
            $guest->telephone = $request->input('telephone');
            $guest->company = $request->input('company');
            $guest->email = $request->input('email');
            $guest->activity = $request->input('activity');
            $guest->noRack = $request->input('noRack');
            $guest->noLoker = $request->input('noLoker');
            $guest->lokasi_id = $request->input('lokasi_id');
            $guest->remarks = $request->input('remarks');
            $guest->id_status = $id_status;
            $guest->foto = $namafoto;
            // 'datein' => $datein,
            // 'lokasi' => $request->input('lokasi'),
            // 'guestsid' => $request->input('guestsid'),
            // 'name' => $request->input('name'),
            // 'telephone' => $request->input('telephone'),
            // 'company' => $request->input('company'),
            // 'email' => $request->input('email'),
            // 'activity' => $request->input('activity'),
            // 'noRack' => $request->input('noRack'),
            // 'noLoker' => $request->input('noLoker'),
            // 'lokasi_id' => $request->input('lokasi_id'),
            // 'remarks' => $request->input('remarks'),
            // 'id_status' => $id_status,
            // 'foto' => $namafoto
            $guest->save();
            // Session::flash('success', 'Data berhasil ditambahkan'); 
            return view('guests.success');
    }

    //destroy
    public function destroy(Request $request, $id) {
        $requestData = $request->all();
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
                'service_quality' =>$request->input('service_quality'),
                'infrastructure_quality' =>$request->input('infrastructure_quality'),
                'clean_quality' =>$request->input('clean_quality'),
                'visitdatacenterint' =>$request->input('visitdatacenterint'),
            ];
           
            try {
                $param->update($guest);
                $param->delete($guest);
                // return redirect('/')->with('message','Guest Berhasil Di Check Out');
                return view('guests.success_checkout');
            }
            catch (\Exception $e) { 
                return redirect('/')->with('gagal','Guest Gagal Di Check Out');
            }
        // $guest->delete();
        // Session::flash('warning', 'Data berhasil dihapus'); 
        // return redirect()->route('guests.index');

    }

    //update entry

    public function search (Request $request) {
        $q = $request->input( 'q' );
        if($q != ""){
        $guests = Guest::where( 'telephone', 'LIKE', '%' . $q . '%')->whereIn( 'id_status', [1])->paginate (1);
        // ->orWhere ( 'dari', 'LIKE', '%' . $q . '%' )
        if (count ( $guests ) > 0) {
	        Session::flash('info', 'Some of the guests you might be looking for!'); 
	        return view('guests.searchresult',compact('guests'))
	            ->with('i', (request()->input('page', 1) - 1) * 1);
        } else {
        $guests = 0;
        return view('guests.searchNotFound');
        // Session::flash('warning', 'Tidak ada tamu yang anda cari !'); 
        // return view ( 'guests.searchresult' )->with(compact('guests'));
    	}
    }
}
public function searchGuest (Request $request) {
    $q = $request->input( 'q' );
    if($q != ""){
    $guests = Guest::onlyTrashed()
                    ->where( 'telephone', 'LIKE', '%' . $q . '%')
                    ->whereIn( 'id_status', [2])
                    // ->orWhere(   'id_status', '!=', [1])
                    ->paginate(1);
    // ->orWhere ( 'dari', 'LIKE', '%' . $q . '%' )
    if (count ( $guests ) > 0) {
        $lokasi = Lokasi::all();
        Session::flash('info', 'Some of the guests you might be looking for!'); 
        return view('guests.guestsId',compact('guests', 'lokasi'))
            ->with('i', (request()->input('page', 1) - 1) * 1);
    }else {
    $guests = 0;
    return view('guests.searchGuestsNotFound');
    // Session::flash('warning', 'Tidak ada tamu yang anda cari !'); 
    // return view ( 'guests.searchresult' )->with(compact('guests'));
    }
}
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

}
