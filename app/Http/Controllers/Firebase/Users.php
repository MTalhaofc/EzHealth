<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Contract\Database;
use Illuminate\Routing\Router;

class Users extends Controller
{
    
    public function __construct(Database $database)
    {
        $this->database = $database;
        
        $this->usertable = 'users';
        $this->reportstable = 'reports';
    }

public function add_user(){
    return view('firebase.users.adduser');
}




public function upload_user(Request $request)
{
    $validatedData = $request->validate([
        'user_name' => 'required',
        'user_email' => 'required|email',
        'user_cnic' => 'required',
        'user_phone' => 'required|numeric',
        'user_account_status' => 'required',
        'user_password' => 'required',
        'user_cnic_image_url' => 'required' // Assuming it's just a URL
    ]);

    // Reference to Firebase database
    $usersRef = $this->database->getReference($this->usertable);

    // Prepare user data
    $userdata = [
        'user_name' => $validatedData['user_name'],
        'user_email' => $validatedData['user_email'],
        'user_cnic' => $validatedData['user_cnic'],
        'user_phone' => $validatedData['user_phone'],
        'user_account_status' => $validatedData['user_account_status'],
        'user_password' => bcrypt($validatedData['user_password']),
        'user_cnic_image_url' => $validatedData['user_cnic_image_url'] // If using URL, ensure it’s correct
    ];

    try {
        // Push data to Firebase
        $usersRef->push($userdata);
        return redirect()->route('viewallusers')->with('status', 'User Added Successfully');
    } catch (\Exception $e) {
        \Log::error("Firebase Error: " . $e->getMessage()); // Log error for debugging
        return redirect()->route('viewallusers')->with('status', 'An error occurred: ' . $e->getMessage());
    }
}



public function viewallusers(){
    return view('firebase.users.viewallusers');
}



}
