<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function destroyMsg($id){
        $msg = Contact::find($id);
        if($msg){
            $msg->delete();
            return redirect()->back();
        }
    }
    public function addMsg(Request $request){

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'object' => $request->object,
            'message' => $request->message,
          ]);

        return redirect()->back();
    }

}
