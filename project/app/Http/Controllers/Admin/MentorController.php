<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mentor;
use DataTables;

class MentorController extends Controller
{
    public function verifications($slug)
    {
        return view('admin.mentor.index');
    }

    public function dataTables($status)
    {
        if ($status == 'pending') {
            $datas = Mentor::where('status', 'pending')->get();
        } else {
            $datas = Mentor::get();
        }

        return DataTables::of($datas)
//            ->addColumn('name', function (Mentor $data) {
//                $name = isset($data->name) ? $data->name : __('Removed');
//                return $name;
//            })
            ->addColumn('status', function (Mentor $data) {
                $class = $data->status == 'pending' ? '' : ($data->status == 'approved' ? 'drop-success' : 'drop-danger');
                $s = $data->status == 'approved' ? 'selected' : '';
                $ns = $data->status == 'rejected' ? 'selected' : '';
                return '<div class="action-list"><select class="process select vendor-droplinks ' . $class . '">' .
                    '<option value="' . route('admin-mentor-status', ['user_id' => $data->user_id, 'status' => 'pending']) . '" ' . $s . '>' . __("Pending") . '</option>' .
                    '<option value="' . route('admin-mentor-status', ['user_id' => $data->user_id, 'status' => 'approved']) . '" ' . $s . '>' . __("Verified") . '</option>' .
                    '<option value="' . route('admin-mentor-status', ['user_id' => $data->user_id, 'status' => 'rejected']) . '" ' . $ns . '>' . __("Declined") . '</option></select></div>';
            })
            ->addColumn('action', function (Mentor $data) {
                return '<div class="action-list">
                                            <a href="javascript:;" class="set-gallery" data-toggle="modal" data-target="#setgallery">
                                                <input type="hidden" value="' . $data->id . '">
                                                <i class="fas fa-paperclip"></i> ' . __('View Attachments') .
                    '</a>
                                            <a href="javascript:;" data-href="' . route('admin-mentor-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete">
                                            <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>';
            })
            ->rawColumns(['status', 'action'])
            ->toJson();
    }

    public function status($user_id, $status)
    {
        $mentor = Mentor::where('user_id', $user_id)->firstOrFail();
        $mentor->status = $status;
        $mentor->update();

        $msg[0] = __('Status Updated Successfully.');
        return response()->json($msg);
    }

    public function show()
    {
        $data[0] = 0;
        $id = $_GET['id'];
        $mentor = Mentor::findOrFail($id);
        $documents = json_decode($mentor->documents);
        if (count($documents)) {
            $data[0] = 1;
            $data[1] = $documents;
//            $data[2] = $prod1->text;
            $data[3] = '' . route('admin-mentor-status', ['user_id' => $mentor->user_id, 'status' => 'approved']) . '';
            $data[4] = '' . route('admin-mentor-status', ['user_id' => $mentor->user_id, 'status' => 'rejected']) . '';
        }
        return response()->json($data);
    }

    public function destroy($id)
    {
        $data = Mentor::findOrFail($id);
        $data->delete();

        $msg = __('Data Deleted Successfully.');
        return response()->json($msg);
    }
}
