<?php

namespace App\Http\Controllers\Admin;

use App\{Models\Conversation, Models\User, Classes\GeniusMailer, Models\AdminUserMessage, Models\AdminUserConversation};
use App\Models\Order;
use Illuminate\Http\Request;
use Auth;
use Datatables;

class MessageController extends AdminBaseController
{
    //*** JSON Request
    public function datatables($type)
    {

         $datas = AdminUserConversation::where('type','=',$type)->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->editColumn('created_at', function(AdminUserConversation $data) {
                                $date = $data->created_at->diffForHumans();
                                return  $date;
                            })
                            ->addColumn('name', function(AdminUserConversation $data) {
                                $name = $data->user->name;
                                return  $name;
                            })
                          ->addColumn('status', function(AdminUserConversation $data) {
                          $type = $data->type;
                         return  $type;
                                 })
                            ->addColumn('action', function(AdminUserConversation $data) {
                                return '<div class="action-list"><a href="' . route('admin-message-show',$data->id) . '"> <i class="fas fa-eye"></i> '.__('Details').'</a><a href="javascript:;" data-href="' . route('admin-message-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                            })
                            ->rawColumns(['action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index(){
        return view('admin.message.index');
    }

    public function dispute(){
        return view('admin.message.dispute');
    }

    public function userMessageDatatable()
    {

        $datas = Conversation::get();

        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->addColumn('subject', function(Conversation $data) {
                $subject = $data->subject;
                return  $subject;
            })
            ->addColumn('action', function(Conversation $data) {
                return '<div class="action-list"><a href="javascript:;" data-href=""class="edit" data-toggle="modal" data-target="#editModal" data-id="'.$data['id'].'"> <i class="fas fa-eye"></i> '.__('Details').'</a><a href="javascript:;" data-href="' . route('admin-user-message-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';

            })

            ->rawColumns(['action'])
            ->toJson();
    }

    public function userMessage()
    {
        return view('admin.message.user-message');
    }

    //*** GET Request
    public function message($id)
    {
        $conv = AdminUserConversation::findOrfail($id);
        return view('admin.message.create',compact('conv'));
    }

    //*** GET Request
    public function messageshow($id)
    {
        $conv = AdminUserConversation::findOrfail($id);
        return view('load.message',compact('conv'));
    }

    //*** GET Request
    public function messagedelete($id)
    {
        $conv = AdminUserConversation::findOrfail($id);
        if($conv->messages->count() > 0)
         {
           foreach ($conv->messages as $key) {
            $key->delete();
            }
         }
          $conv->delete();
        //--- Redirect Section
        $msg = __('Data Deleted Successfully.');
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    public function userMessageDelete($id)
    {
        $conv = Conversation::findOrfail($id);
        $conv->delete();
        //--- Redirect Section
        $msg = __('Data Deleted Successfully.');
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** POST Request
    public function postmessage(Request $request)
    {
        $msg = new AdminUserMessage();
        $input = $request->all();
        $msg->fill($input)->save();
        //--- Redirect Section
        $msg = __('Message Sent!');
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** POST Request
    public function usercontact(Request $request)
    {



        $data = 1;
        $admin = Auth::guard('admin')->user();
        $user = User::where('email','=',$request->to)->first();
        if(empty($user))
        {
            $data = 0;
            return response()->json($data);
        }
        $to = $request->to;
        $subject = $request->subject;
        $from = $admin->email;
        $msg = "Email: ".$from."<br>Message: ".$request->message;

        $view = view('frontend.mail2.user_contact', compact('msg'))->render();

        $datas = [
            'to' => $to,
            'subject' => $subject,
//            'body' => $msg,
            'body' => $view,
        ];
        $mailer = new GeniusMailer();
        $mailer->sendCustomMail($datas);


        if($request->type == 'Ticket'){
            $conv = AdminUserConversation::where('type','=','Ticket')->where('user_id','=',$user->id)->where('subject','=',$subject)->first();
        }
        else{
            $conv = AdminUserConversation::where('type','=','Dispute')->where('user_id','=',$user->id)->where('subject','=',$subject)->first();
        }
        if(isset($conv)){
            $msg = new AdminUserMessage();
            $msg->conversation_id = $conv->id;
            $msg->message = $request->message;
            $msg->save();
            return response()->json($data);
        }
        else{
            $message = new AdminUserConversation();
            $message->subject = $subject;
            $message->user_id= $user->id;
            $message->message = $request->message;
            $message->order_number = $request->order;
            $message->type = $request->type;
            $message->save();
            $msg = new AdminUserMessage();
            $msg->conversation_id = $message->id;
            $msg->message = $request->message;
            $msg->save();
            return response()->json($data);
        }
    }


    public function Messagedetail(Request $request)
    {
        $id=$request->id;
        $data = AdminUserConversation::findOrFail($id);
//        $data->load('order','product');
        return response()->json($data);
    }
}
