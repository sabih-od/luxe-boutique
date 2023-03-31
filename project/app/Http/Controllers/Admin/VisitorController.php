<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserBooking;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class VisitorController extends Controller
{
    public function datatables()
    {
        $datas = UserBooking::all();
//        dd($datas);
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)->toJson(); //--- Returning Json Data To Client Side
    }

    public function visitor()
    {
        return view('admin.visitor.visitor');
    }
}
