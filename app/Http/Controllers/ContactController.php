<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function addItem(Request $request)
    {
        $input= $request->except('_token');
        $result=Contact::addItem($input);
        if($result){
            return redirect()->back();
        }
    }
}
