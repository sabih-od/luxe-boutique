<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Datatables;

class CommentController extends AdminBaseController
{

    //*** JSON Request
    public function datatables()
    {
        $datas = Comment::latest('id')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->addColumn('product', function (Comment $data) {
                $name = mb_strlen(strip_tags($data->product->name), 'utf-8') > 50 ? mb_substr(strip_tags($data->product->name), 0, 50, 'utf-8') . '...' : strip_tags($data->product->name);
                $product = $name;
                return $product;
            })
            ->addColumn('commenter', function (Comment $data) {
                $name = $data->user->name;
                return $name;
            })
            ->addColumn('text', function (Comment $data) {
                $text = mb_strlen(strip_tags($data->text), 'utf-8') > 250 ? mb_substr(strip_tags($data->text), 0, 250, 'utf-8') . '...' : strip_tags($data->text);
                return $text;
            })
            ->addColumn('action', function (Comment $data) {
                return '<div class="action-list"><a data-href="' . route('admin-comment-show', $data->id) . '" class="view details-width" data-toggle="modal" data-target="#modal1"> <i class="fas fa-eye"></i>' . __('Details') . '</a><a href="javascript:;" data-href="' . route('admin-comment-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['product', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index()
    {
        return view('admin.comment.index');
    }

    //*** GET Request
    public function show($id)
    {
        $data = Comment::findOrFail($id);
        $name = mb_strlen(strip_tags($data->product->name), 'utf-8') > 50 ? mb_substr(strip_tags($data->product->name), 0, 50, 'utf-8') . '...' : strip_tags
        ($data->product->name);
        return view('admin.comment.show', compact('data', 'name'));
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        if ($comment->replies->count() > 0) {
            foreach ($comment->replies as $reply) {
                $reply->delete();
            }
        }
        $comment->delete();
        //--- Redirect Section
        $msg = __('Data Deleted Successfully.');
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
