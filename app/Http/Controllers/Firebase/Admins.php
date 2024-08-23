<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Contract\Database;



class Admins extends Controller
{

    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'users';
    }


    public function adminprofile()
    {
        $numbers = $this->database->getReference($this->tablename)->getValue();

    return view('firebase.admin.profile', compact('numbers'));
    }
public function addnumber(){

    $numbers = $this->database->getReference($this->tablename)->getValue();

    return view('firebase.admin.addnumber' , compact('numbers'));
}
public function store(Request $request){


    $postData = [
'fname' => $request -> firstname,
'lname' => $request -> lastname,
'number' => $request -> number,
'email' => $request -> email,


    ];
    $postRef = $this->database->getReference($this->tablename)->push($postData);
if($postRef){
     return redirect('addnumber')->with('status','Contact Added Successfully');
}
else{
    return redirect('addnumber')->with('status','Contact  Not Added Successfully');

}

}
}
