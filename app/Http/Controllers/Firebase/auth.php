<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Contract\Database;
use Illuminate\Support\Facades\Hash;


class auth extends Controller
{
    //
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->admintable = 'admins';
    }

public function loginpage(){
    
    return view('firebase.auth.login');
}

public function loginadmin(Request $request) {
    // Validate Data
    $request->validate([
        'admin_email' => 'required|email',
        'admin_password' => 'required'
    ]);

    // Reference to the Admin table in Firebase
    $adminRef = $this->database->getReference($this->admintable);

    // Fetch all admins
    $admins = $adminRef->getValue();

    // Check credentials
    if ($admins) {
        foreach ($admins as $key => $admin) {
            // Check if the email matches
            if ($admin['admin_email'] === $request->admin_email) {
                // Verify the password using Hash check
                if (Hash::check($request->admin_password, $admin['admin_password'])) {
                    // Login successful, redirect to the dashboard page
                    return redirect('dashboard')->with('status', 'Login successful');
                }
            }
        }
    }

    // Login failed, redirect back with an error message
    return redirect('login')->withErrors('Login details are not correct');
}



public function dashboard(){
    return view('firebase.layouts.dashboard');
}
}
