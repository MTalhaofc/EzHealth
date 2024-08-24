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
    $totalnumbers = $this->database->getReference($this->tablename)->getSnapshot()->numChildren();

    return view('firebase.admin.addnumber' , compact('numbers','totalnumbers'));
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
public function edit($id){

$key = $id;
$editdata = $this->database->getReference($this->tablename)->getChild($key)->getValue();
if($editdata){
return view('firebase.admin.edit' , compact('editdata','key'));
}
else{
    return redirect('addnumber')->with('status','Contact Id not found');
}

}
public function update(Request $request,$id)  {
    
    $key = $id;
    $updateddata = [
        'fname' => $request -> firstname,
        'lname' => $request -> lastname,
        'number' => $request -> number,
        'email' => $request -> email,
        
        
            ];
    $checkupdate =  $this->database->getReference($this->tablename.'/'.$key)->update($updateddata);
if($checkupdate){
    return redirect('addnumber')->with('status','Updated data');

}
else{
    return redirect('addnumber')->with('status','not updated');

}
}
public function delete($id){

    $key = $id;
     $checkdel=  $this->database->getReference($this->tablename.'/'.$key)->remove();
     if($checkdel){
        return redirect('addnumber')->with('status','deleted data');
    
    }
    else{
        return redirect('addnumber')->with('status','data not founded');
    
    }
}
}
