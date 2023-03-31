<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\{Models\User,
    Models\Message,
    Models\Notification,
    Models\Conversation,
    Classes\GeniusMailer,
    Models\AdminUserMessage,
    Models\AdminUserConversation,
    Traits\PHPCustomMail};
use Illuminate\Http\Request;

class MessageController extends UserBaseController
{
    use PHPCustomMail;

   public function messages()
    {
        $user = $this->user;

//        $convs = Message::where('recieved_user','=',$user->id)->get();
        $convs = Message::with('sentUser')->where('recieved_user','=',$user->id)->get();

//        $convs = Conversation::where('sent_user','=',$user->id)->orWhere('recieved_user','=',$user->id)->get();

//        $convs = Conversation::where('sent_user','!=',$user->id)->where('recieved_user', $user->id)
//            ->whereHas('sent', function($q) {
//                return $q->where('is_vendor', 2);
//            })->get();
//dd($convs);
        return view('user.message.index',compact('user','convs'));
    }

    public function message($id)
    {
            $user = $this->user;
            $conv = Conversation::findOrfail($id);
            $conv=$conv->load('recieved');


            return view('user.message.create',compact('user','conv'));
    }

    public function messagedelete(Request $request)
    {
        $id =  $request->id;
        $conv = Conversation::findOrfail($id);
        if($conv->messages->count() > 0)
            {
                foreach ($conv->messages as $key) {
                    $key->delete();
                }
            }
            $conv->delete();

        return response()->json([
            'success' => true,
            'message' => 'Record Deleted Successfully.'
        ]);
    }

    public function msgload($id)
    {
            $conv = Conversation::findOrfail($id);
            return view('load.usermsg',compact('conv'));
    }


    public function usercontact(Request $request)
    {


        $data = 1;
        $user = User::findOrFail($request->user_id);
        $vendor = User::where('email',$request->email)->first();

//dd($vendor_id);
//        $subject = $request->subject;
//        if(empty($vendor))
//        {
//            $data = 0;
//            return response()->json($data);
//        }

        //Send email to admin
        $subject = $request->subject;
        $name = $request->name;
        $message=$request->message;
//        $from = \DB::table('pagesettings')->first()->contact_email;
//        $msg = "Name: ".$name."<br>"."Message: ".$request->message;


        $view = view('frontend.mail2.vendor_sent_to_user_message_email', compact('message','name'))->render();

        $data = [
            'to' => \DB::table('pagesettings')->first()->contact_email,
            'from' => Auth::user()->email,
            'subject' => $request->subject,
//            'body' => $msg,
            'body' => $view,
        ];

        $mailer = new GeniusMailer();
        $mailer->sendCustomMail($data);

        $conv = Conversation::where('sent_user', $user->id)->where('subject', $subject)->first();
        if(isset($conv)){
            $msg = new Message();
            $msg->conversation_id = $conv->id;
            $msg->message = $request->message;
            $msg->sent_user = $user->id;

            $msg->save();
            return response()->json($data);
        }
        else{
            $message = new Conversation();
            $message->subject = $subject;
            $message->sent_user= $request->user_id;
            $message->recieved_user = $vendor->id;
//            $message->recieved_user = \DB::table('pagesettings')->first()->id;
            $message->message = $request->message;
            $message->save();

            $msg = new Message();
            $msg->conversation_id = $message->id;
            $msg->message = $request->message;
            $msg->sent_user = $request->user_id;
            $msg->recieved_user = $vendor->id;
            $msg->save();
            return response()->json($data);
        }
    }

    public function postmessage(Request $request)
    {
        $msg = new Message();
//        $input = $request->all();
//
//        $msg->fill($input)->save();

        $msg->conversation_id=$request->conversation_id;
        $msg->recieved_user=$request->sent_user;
        $msg->sent_user=$request->recieved_user;
        $msg->message=$request->message;
        $msg->save();


        //--- Redirect Section
        $msg = __('Message Sent!');
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    public function adminmessages()
    {
            $user = $this->user;
            $convs = AdminUserConversation::where('type','=','Ticket')->where('user_id','=',$user->id)->get();
            return view('user.ticket.index',compact('convs'));
    }

    public function adminDiscordmessages()
    {
            $user = $this->user;
            $convs = AdminUserConversation::where('type','=','Dispute')->where('user_id','=',$user->id)->get();
            return view('user.dispute.index',compact('convs'));
    }

    public function messageload($id)
    {
            $conv = AdminUserConversation::findOrfail($id);
            return view('load.usermessage',compact('conv'));
    }

    public function adminmessage($id)
    {
            $conv = AdminUserConversation::findOrfail($id);
            return view('user.ticket.create',compact('conv'));
    }

    public function adminmessagedelete($id)
    {
            $conv = AdminUserConversation::findOrfail($id);
            if($conv->messages->count() > 0)
            {
                foreach ($conv->messages as $key) {
                    $key->delete();
                }
            }
            $conv->delete();
            return redirect()->back()->with('success',__('Message Deleted Successfully'));
    }

    public function adminpostmessage(Request $request)
    {
        $msg = new AdminUserMessage();
        $input = $request->all();
        $msg->fill($input)->save();
        $notification = new Notification;
        $notification->conversation_id = $msg->conversation->id;
        $notification->save();
        //--- Redirect Section
        $msg = __('Message Sent!');
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    public function adminusercontact(Request $request)
    {

        $user = $this->user;
        $gs = $this->gs;
        $subject = $request->subject;
        $to = \DB::table('pagesettings')->first()->contact_email;
        $from = $user->email;
        $msg = "Email: ".$from."\nMessage: ".$request->message;

            $data = [
            'to' => $to,
            'subject' => $subject,
            'body' => $msg,
        ];

        $mailer = new GeniusMailer();
        $mailer->sendCustomMail($data);

        if($request->type == 'Ticket'){
            $conv = AdminUserConversation::whereType('Ticket')->whereUserId($user->id)->whereSubject($subject)->first();
        }
        else{
            $conv = AdminUserConversation::whereType('Dispute')->whereUserId($user->id)->whereSubject($subject)->first();
        }

        if(isset($conv)){
            $msg = new AdminUserMessage();
            $msg->conversation_id = $conv->id;
            $msg->message = $request->message;
            $msg->user_id = $user->id;
            $msg->save();
            return response()->json(__('Message Sent!'));
        }
        else{
            $message = new AdminUserConversation();
            $message->subject = $subject;
            $message->user_id= $user->id;
            $message->message = $request->message;
            $message->order_number = $request->order;
            $message->type = $request->type;
            $message->save();
            $notification = new Notification;
            $notification->conversation_id = $message->id;
            $notification->save();
            $msg = new AdminUserMessage();
            $msg->conversation_id = $message->id;
            $msg->message = $request->message;
            $msg->user_id = $user->id;
//            $msg->recieved_user = $request->vendor_id;
            $msg->save();
            return response()->json(__('Message Sent!'));

        }
    }
}
