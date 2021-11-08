<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ruang;
use App\lantai;
use App\Lokasi;

class LokasiController extends Controller
{
    public function index(){
 
        // Fetch departments
        $departmentData['data'] = Lokasi::getDepartment();
    
        // Load index view
        return view('guests.create')->with("departmentData",$departmentData);
      }
    
      // Fetch records
      public function getEmployees($departmentid=0){
    
        // Fetch Employees by Departmentid
        $userData['data'] = Lokasi::getdepartmentEmployee($departmentid);
    
        echo json_encode($userData);
        exit;
      }
}
