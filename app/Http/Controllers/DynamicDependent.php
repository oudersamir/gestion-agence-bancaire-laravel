<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DynamicDependent extends Controller
{
function index()
    {
     $client_list = DB::table('clients')
          ->join('comptes','comptes.client_id_client','=','clients.id_client')

          ->orderBy('id_client', 'desc');
         ->get();


     return view('Operations.Virement')->with('client_list', $client_list);
    }




function fetch(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = DB::table('comptes')
       ->where($select, $value)
       ->groupBy($dependent)
       ->get();
     $output = '<option value="">Select '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
     }
     echo $output;
    }
}
