<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Contract\Database;
use Illuminate\Routing\Router;
use Kreait\Firebase\Contract\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class OnlineReport extends Controller
{
    

    public function __construct(Storage $storage,Database $database)
    {
        $this->database = $database;
        $this->usertable = 'users';
        
        $this->userlogin ='userlogin';
        $this->storage = $storage;
        $this->reportstable = 'reports';
        
    }

public function loginuser(){

    return view('firebase.onlinereports.loginuser');
}


public function online_reports(){

    $users = $this->database->getReference($this->usertable)->getValue();

    return view('firebase.admin_onlinereport.viewuserlist',compact('users'));
}


public function login_user(Request $request)
{
    // Validate user inputs
    $request->validate([
        'user_login' => 'required|string|max:255', // CNIC or User ID
        'user_password' => 'required|string|min:8', // Password
    ]);

    // Reference to the 'userlogin' table in Firebase
    $userRef = $this->database->getReference('userlogin');

    // Fetch all user login records
    $users = $userRef->getValue();

    // Check credentials
    if ($users) {
        foreach ($users as $key => $user) {
            // Check if the user_login_id matches
            if (isset($user['user_login_id']) && $user['user_login_id'] === $request->user_login) {
                // Verify the password using Hash check
                if (Hash::check($request->user_password, $user['user_password'])) {
                    // Login successful, store user data in session
                    session([
                        'userKey' => $key,
                        'user_login_id' => $user['user_login_id'], // Store login ID
                        'logged_in' => true // Custom flag to indicate login
                    ]);

                    // Redirect to the online_view_report route with the userKey
                    return redirect()->route('online_view_report', ['userkey' => $key])
                        ->with('status', 'Login successful!');
                } else {
                    // Password does not match
                    return back()->withErrors(['user_password' => 'The provided password is incorrect.']);
                }
            }
        }
    }

    // User ID not found or other login failure
    return back()->withErrors(['user_login' => 'These credentials do not match our records.']);
}








// public function online_view_report(){
//     return view('firebase.onlinereports.viewreports');

// }


public function generateLogin($userKey)
{
    // Retrieve the user from the database using the userKey
    $user = $this->database->getReference('users/' . $userKey)->getValue();

    // Check if the user exists
    if ($user) {
        // Use user CNIC as user ID
        $userId = $user['user_cnic']; // CNIC as the user ID

        // Reference to the 'userlogin' table
        $userLoginRef = $this->database->getReference($this->userlogin);

        // Fetch all records from 'userlogin'
        $userLogins = $userLoginRef->getValue();

        // Check if a record with the same user_login_id exists
        if ($userLogins) {
            foreach ($userLogins as $key => $record) {
                if (isset($record['user_login_id']) && $record['user_login_id'] === $userId) {
                    // Delete the existing record
                    $userLoginRef->getChild($key)->remove();
                }
            }
        }

        // Generate an 8-digit random password
        $password = mt_rand(10000000, 99999999); // Generate 8-digit number as password

        // Create an array of login details to push
        $loginDetails = [
            'user_login_id' => $userId,
            'user_password' => bcrypt($password) // Encrypt the password before saving
        ];

        // Push the generated login credentials to the 'userlogin' node in Firebase
        $userLoginRef->push($loginDetails);

        // Return the view to display the CNIC and password
        return view('firebase.admin_onlinereport.id_pass', compact('userId', 'password'));
    } else {
        return redirect()->route('viewallusers')->with('status', 'User not found!');
    }
}

public function online_view_report(Request $request)
{
    // Fetch the logged-in user's ID from the session
    $userLoginId = session('user_login_id');

    // Check if the user is logged in
    if (!$userLoginId) {
        return redirect()->route('login')->withErrors('Please log in to view your reports.');
    }

    // Fetch all reports from Firebase
    $reports = $this->database->getReference($this->reportstable)->getValue();

    // Debug: Check if reports were fetched successfully
    if (!$reports) {
        return view('firebase.onlinereports.viewreports', ['matchedReports' => []])
            ->withErrors('No reports found in the database.');
    }

    // Filter reports matching the user_login_id (user_report_cnic)
    $matchedReports = [];
    foreach ($reports as $key => $report) {
        // Ensure 'user_report_cnic' exists in the report before comparing
        if (isset($report['user_report_cnic']) && $report['user_report_cnic'] === $userLoginId) {
            // Add the report_key to the matched reports array
            $report['report_key'] = $key; // Store the report key
            $matchedReports[] = $report;
        }
    }

    // Debug: Check matched reports
    if (empty($matchedReports)) {
        return view('firebase.onlinereports.viewreports', compact('matchedReports'))
            ->withErrors('No matching reports found for the user.');
    }

    // Return the view with the matched reports and their keys
    return view('firebase.onlinereports.viewreports', compact('matchedReports'));
}





public function view_report(){


}

public function logoutuser(Request $request)
{
    // Clear session data
    session()->flush();

    // Redirect to the login page with a success message
    return redirect('loginuser')->with('status', 'Logged out successfully!');
}

public function showReportDetails($reportKey)
{
    // Fetch the report from Firebase using the report_key
    $report = $this->database->getReference($this->reportstable . '/' . $reportKey)->getValue();

    // Check if the report exists
    if (!$report) {
        return redirect()->route('online_view_report')->withErrors('Report not found.');
    }

    // Return the report details view
    return view('firebase.onlinereports.viewcompletereport', compact('report'));
}

}
