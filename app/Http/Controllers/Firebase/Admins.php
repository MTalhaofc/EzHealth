<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Contract\Database;
use Illuminate\Routing\Router;



class Admins extends Controller
{

    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->admintable = 'admins';
        
    }

public function addadmin(){
    $numbers = $this->database->getReference($this->admintable)->getValue();
    $totalnumbers = $this->database->getReference($this->admintable)->getSnapshot()->numChildren();

    return view('firebase.admin.newadmin' );
    
}

public function newadmin(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'admin_role' => 'required|string',
        'admin_email' => 'required|email',
        'admin_password' => 'required|min:8'
    ]);

    // Prepare data to be inserted into Firebase
    $postData = [
        'admin_role' => $validatedData['admin_role'],
        'admin_email' => $validatedData['admin_email'],
        'admin_password' => bcrypt($validatedData['admin_password']), // Encrypt password before saving
    ];

    // Insert data into Firebase
    try {
        $postRef = $this->database->getReference($this->admintable)->push($postData);

        if ($postRef) {
            return redirect('dashboard')->with('status', 'Admin Added Successfully');
        } else {
            return redirect('dashboard')->with('status', 'Admin Not Added Successfully');
        }
    } catch (\Exception $e) {
        // Handle any exceptions that occur during the Firebase operation
        return redirect('dashboard')->with('status', 'An error occurred: ' . $e->getMessage());
    }
}



public function viewadmin(){

    $admins = $this->database->getReference($this->admintable)->getValue();
    $totaladmins = $this->database->getReference($this->admintable)->getSnapshot()->numChildren();


    return view('firebase.admin.viewadmin',compact('admins','totaladmins') );

}

public function editadmin($id){
    $key = $id;
$editadmindata = $this->database->getReference($this->admintable)->getChild($key)->getValue();
if($editadmindata){
return view('firebase.admin.editadmin' , compact('editadmindata','key'));
}
else{
    return redirect('view_admins')->with('status','admin Id not found');
}

}
public function updateadmin(Request $request,$id){

    $key = $id;
    $validatedadminData = $request->validate([
        'admin_role' => 'required|string',
        'admin_email' => 'required|email',
        'admin_password' => 'min:8'
    ]);

    $updatedadmin = [
        'admin_role' => $validatedadminData['admin_role'],
        'admin_email' => $validatedadminData['admin_email'],
        'admin_password' => bcrypt($validatedadminData['admin_password']), // Encrypt password before saving
    ];


    $checkupdatedadmin =  $this->database->getReference($this->admintable.'/'.$key)->update($updatedadmin);
if($checkupdatedadmin){
    return redirect('view_admins')->with('status','Updated data');

}
else{
    return redirect('view_admins')->with('status','not updated');

}
}
public function deleteadmin($id){
    $key = $id;
    $checkdel=  $this->database->getReference($this->admintable.'/'.$key)->remove();
    if($checkdel){
       return redirect('view_admins')->with('status','deleted Admin');
   
   }
   else{
       return redirect('view_admins')->with('status','data not founded');
   
   }
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
