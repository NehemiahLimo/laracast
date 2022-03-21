<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class EmployeeController extends Controller
{
    //
    public function fetchEmployees(){
        $data = Contact::all();

        return response()->json(
            [
                'contacts'=>$data,
                'message' =>'Contacts',
                'code'=>200

            ]);
    }
}
