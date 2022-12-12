<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Twilio\Rest\Client;

class Usecontroller extends Controller
{
    //
    public function create(Request $request)
    {

        $createUser = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'Type' => $request->Type,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tag_id'=>$request->tag_id,
            'location_id'=>$request->location_id



        ]);
        if ($createUser) {
            $sweet = array('title' => 'User Created successfully', 'message' => 'Your User is Created');
            return redirect()->back()->with('sweet', $sweet);
        }
    }
    public function show()
    {
        if(Auth::user()->type == 'Admin')
        {
            $users = User::Where('Type', '!=', 'Admin')->get();
        }
        else
        {
            $users = User::Where('Type', '!=', 'Admin')->where('Type','!=','gatePerson')->get();
            
        }
       
        return view('admin.showusers', compact('users'));
    }

    public function showEdit($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.edit', compact('user'));
    }

    public function updateuser(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        if (empty($request->password)) {
            $password = $request->password2;
        } else {
            $password = $request->password;
        }
        $update = User::where('id', $id)->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'Type' => $request->Type,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($password),
            'tag_id'=>$request->tag_id

        ]);
        if ($update) {
            $sweet = array('title' => 'User Upated successfully', 'message' => 'Your User is Update');
            return redirect()->back()->with('sweet', $sweet);
        }
    }

    public function delete($id)
    {
    
        $user=User::where('id',$id)->delete();
        if($user)
        {
            $sweet = array('title' => 'User Delete successfully', 'message' => 'Your User is Deleted');
            return redirect()->back()->with('sweet', $sweet);
        }
    }
    
    public function showmessage($id,Request $request)
    {
        $user=User::where('id',$id)->first();

        return view('admin.messages', compact('user'));
    }
    private function sendMessage($message, $recipients)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients, 
                ['from' => $twilio_number, 'body' => $message] );
    }
    
    public function messages(Request $request)
    {
        $phone="+".$request->phone;
        $this->sendMessage($request->message, $phone);
        $sweet = array('title' => 'Message Sent successfully', 'message' => 'Message is Sent');
        return redirect()->back()->with('sweet', $sweet);
    }
}