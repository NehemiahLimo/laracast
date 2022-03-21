<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    //cont
    public function contacts(){
        $contacts = Contact::all();
        return response()->json(
            [
                'contacts'=>$contacts,
                'message' =>'Contacts',
                'code'=>200

            ]);
    }

    public function saveContact(Request $request){
        $contact = new Contact();
        $contact->name= $request->name;
        $contact->email= $request->email;
        $contact->designation= $request->designation;
        $contact->contact_no= $request->contact_no;
        $contact->save();

        return response()->json([
            'message'=>'Contact Created successfully',
            'code'=>200
        ]);
    }

    public function getContact($id){
        $contact = Contact::find($id);
        return response()->json($contact);
    }

    public function deleteContact($id){
        $contact = Contact::find($id);
        if($contact){
            $contact->delete();

            return response()->json([
                'message'=>'Deleted Successfully',
                'code '=>200 

            ]);
        }else{
            return response()->json([
                'message'=>"Contact with ID:$id not found" 
            ]);
        }
    }

    public function updateContact($id, Request $request){
        $contact = Contact::where('id', $id)->first();
        
        $contact->name= $request->name;
        $contact->email= $request->email;
        $contact->designation= $request->designation;
        $contact->contact_no= $request->contact_no;
        $contact->update();

        return response()->json([
            'message'=>'Contact Updated',
            'code'=>200
        ]);

    }
}
