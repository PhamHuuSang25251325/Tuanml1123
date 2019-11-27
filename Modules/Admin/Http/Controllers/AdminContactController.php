<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestContact;
use App\Models\Contact;

class AdminContactController extends Controller
{
    
    public function index(Request $request)
    {
        $keyword=$request->keyword;
        $listItem=Contact::list($keyword);
        $viewData=[
            'list'=>$listItem
        ];
        return view('admin::contact.list',$viewData);
    }

    public function action($action,$id){
        Contact::action($action,$id);
        return redirect()->back();
    }
    
}
