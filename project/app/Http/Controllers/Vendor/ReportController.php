<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Report;
use Datatables;
use Illuminate\Support\Facades\Auth;

class ReportController extends VendorBaseController
{
    //*** JSON Request
    public function datatables()
    {
        $datas = Report::latest('id')->whereHas('product', function ($q) {
            return $q->where('user_id', Auth::id());
        })->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->addColumn('product', function (Report $data) {

                $name = mb_strlen(strip_tags($data->product->name), 'UTF-8') > 50 ? mb_substr(strip_tags($data->product->name), 0, 50, 'UTF-8') . '...' : strip_tags($data->product->name);
                $product = '<a href="' . route('front.product', $data->product->slug) . '" target="_blank">' . $name . '</a>';
                return $product;

            })
            ->addColumn('reporter', function (Report $data) {

                $name = $data->user->name;
                return $name;

            })
            ->addColumn('title', function (Report $data) {

                $text = mb_strlen(strip_tags($data->title), 'UTF-8') > 250 ? mb_substr(strip_tags($data->title), 0, 250, 'UTF-8') . '...' : strip_tags($data->title);
                return $text;

            })
            ->addColumn('action', function (Report $data) {

                return '<div class="action-list"><a data-href="' . route('vendor-report-show', $data->id) . '" class="view details-width" data-toggle="modal" data-target="#modal1"> <i class="fas fa-eye"></i>' . __('Details') . '</a></div>';

            })
            ->rawColumns(['product', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index()
    {
        return view('vendor.report.index');
    }

    //*** GET Request
    public function show($id)
    {
        $data = Report::findOrFail($id);
        return view('vendor.report.show', compact('data'));
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Report::findOrFail($id);
        $data->delete();
        //--- Redirect Section
        $msg = __('Data Deleted Successfully.');
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
