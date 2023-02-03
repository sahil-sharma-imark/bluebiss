<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
use Redirect;

class DisputeController extends Controller
{
    public function all_dispute(){
        $all_disputes = DB::table('bluebis_dispute')->get();
        return view('admin.dispute.all-dispute', compact('all_disputes'));
    } 

    public function delete($id){
        $delete = DB::table('bluebis_dispute')->where('id', $id)->delete();
        return Redirect('all-disputes')->with('delete', 'Disputes deleted successfully');
    }
}
