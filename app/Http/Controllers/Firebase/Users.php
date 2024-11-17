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
        'user_cnic_img_url' => 'required' // Assuming it's just a URL
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
        'user_cnic_img_url' => $validatedData['user_cnic_img_url'] // If using URL, ensure it’s correct
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

    $allusers = $this->database->getReference($this->usertable)->getValue();

    return view('firebase.users.viewallusers',compact('allusers'));
}

public function view_user($id){
$key =$id;
    $user = $this->database->getReference($this->usertable . '/' . $id)->getValue();


return view('firebase.users.viewuser',compact('user','key'));
}



Public function edit_user($id){

    $key =$id;
    $user = $this->database->getReference($this->usertable . '/' . $id)->getValue();


return view('firebase.users.edituser',compact('user','key'));
}



public function update_user($id, Request $request){



  
    // Validate the request
    $validated = $request->validate([
        'user_name' => 'required|string|max:255',
        'user_phone' => 'required|string|max:15',
        'user_email' => 'required|email',   
       
    ]);

    // Update the user data
    $this->database->getReference($this->usertable . '/' . $id)->update([
        'user_name' => $request->input('user_name'),
        'user_phone' => $request->input('user_phone'),
        'user_email' => $request->input('user_email'),
      
    ]);

    // Redirect to the user details page with a success message
    return redirect()->route('view_user', $id)->with('success', 'User details updated successfully!');
}

public function pending_users()
{
    $pendinguser = $this->database->getReference($this->usertable)->getValue();

    $pendingsusers = [];  // This will hold the filtered users
    if ($pendinguser) {
        foreach ($pendinguser as $key => $user) {
            if ($user['user_account_status'] === 'P') {  // Filter for "Pending" users
                $pendingsusers[$key] = $user;  // Add user to the pendingsusers array
            }
        }
    }

    return view('firebase.users.pendinguser', compact('pendingsusers'));
}



public function pending_user($id){
    $key = $id;
    $user = $this->database->getReference($this->usertable . '/' . $id)->getValue();

    return view('firebase.users.userpending',compact('key','user','id'));
}
public function update_user_status(Request $request, $id)
{
    
    $status = $request->input('status'); // Get status from the form (T for Accepted, R for Rejected)

    if (!in_array($status, ['T', 'R'])) {
        return redirect()->route('pending_users')->with('error', 'Invalid status.');
    }

    // Update the user's status in Firebase
    $this->database->getReference($this->usertable . '/' . $id)
        ->update(['user_account_status' => $status]);

    return redirect()->route('pending_users')->with('success', 'User status updated successfully.');
}
}
