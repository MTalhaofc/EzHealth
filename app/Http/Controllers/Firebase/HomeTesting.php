<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Contract\Database;
use Illuminate\Routing\Router;
use Kreait\Firebase\Contract\Storage;



class HomeTesting extends Controller
{
    //
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->usertable = 'users';
        $this->hometesttable = 'appointments';
        
    }


public function viewallusers_appointments(){

    $users = $this->database->getReference($this->usertable)->getValue();
    $totalusers = $this->database->getReference($this->usertable)->getSnapshot()->numChildren();



    return view("firebase.hometesting.viewuserhometest" ,compact('users','totalusers')) ;
}




public function add_appointment($id)
{
    // Store the id as the key
    $key = $id;
    
    // Fetch the data from Firebase based on the key
    $addappointmentdata = $this->database->getReference($this->usertable)->getChild($key)->getValue();
    $userdata = $this->database->getReference($this->usertable)->getChild($key)->getValue();
    // Check if data is retrieved successfully
    if ($addappointmentdata) {
        // Pass data and key to the view
        $username = $userdata['user_name'];
        $usernumber = $userdata['user_phone'];
        $usercnic = $userdata['user_cnic'];
        return view('firebase.hometesting.addhometest', compact('addappointmentdata', 'key','username','usernumber','usercnic'));
    } else {
        // Redirect if user ID is not found
        return redirect('viewallusers_appointments')->with('status', 'User ID not found');
    }
}

public function upload_hometest(Request $request, $id)
{
    // Log the incoming request data for debugging
    \Log::info('Form submitted', $request->all());

    // Validate the form data
    $request->validate([
        'user_name_appointment' => 'required|string|max:255',
        'user_number_appointment' => 'required|string|max:20',
        'user_address_appointment' => 'required|string|max:255',
        'user_cnic_appointment' => 'required|string|max:20',
        'user_date_appointment' => 'required|date',
        'user_status_appointment' => 'required|string|max:1',
        'user_test_appointment' => 'required|string|max:255',
        'user_time_appointment' => 'required',
    ]);

    // Generate a unique key for the appointment using random numbers
    $userKeyAppointment = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 8);

    // Prepare the data for uploading
    $appointmentData = [
        'user_name_appointment' => $request->user_name_appointment,
        'user_number_appointment' => $request->user_number_appointment,
        'user_address_appointment' => $request->user_address_appointment,
        'user_cnic_appointment' => $request->user_cnic_appointment,
        'user_date_appointment' => $request->user_date_appointment,
        'user_status_appointment' => $request->user_status_appointment,
        'user_test_appointment' => $request->user_test_appointment,
        'user_time_appointment' => $request->user_time_appointment,
        'user_key_appointment' => $userKeyAppointment, // Add unique key
    ];

    try {
        // Log the appointment data before pushing
        \Log::info('Uploading appointment data: ', $appointmentData);

        // Push the data to Firebase under the 'hometesting' table
        $this->database->getReference($this->hometesttable)->push($appointmentData);

        // Redirect to the view with success message
        return redirect()->route('viewusers_appointments', ['id' => $id])->with('status', 'Appointment added successfully');
    } catch (\Exception $e) {
        // Log the error (optional)
        \Log::error('Error adding appointment: ' . $e->getMessage());

        // Redirect back with error message
        return redirect()->route('viewusers_appointments', ['id' => $id])->with('error', 'Error adding appointment: ' . $e->getMessage());
    }
}



public function viewallappointments()
{
    // Retrieve all appointments from Firebase
    $appointments = $this->database->getReference($this->hometesttable)->getValue();

    // Filter only appointments with user_status_appointment = 'P'
    $pendingAppointments = [];
    if ($appointments) {
        foreach ($appointments as $key => $appointment) {
            if ($appointment['user_status_appointment'] === 'P') {
                $pendingAppointments[$key] = $appointment;
            }
        }
    }
    

    // Pass only pending appointments to the view
    return view("firebase.hometesting.viewallhometest", compact('pendingAppointments'));
}



public function viewcompleteappointmests(){
    $Appointments = $this->database->getReference($this->hometesttable)->getValue();
    if($Appointments){
        return view("firebase.hometesting.viewcompletehometest" , compact('Appointments'));
    
    }
}



public function viewusers_appointments($id) {
    $key = $id;

    // Fetch all appointments from Firebase
    $appointments = $this->database->getReference($this->hometesttable)->getValue();

    // Initialize an array to hold matched appointments
    $matchedAppointments = [];

    // Fetch the user data from Firebase based on the given key
    $userappontmentdata = $this->database->getReference($this->usertable)->getChild($key)->getValue();
    $userdata = $this->database->getReference($this->usertable)->getChild($key)->getValue();

    // Check if the user data exists
    if ($userappontmentdata) {
        // Extract username and user CNIC
        $username = $userdata['user_name'];
        $userCnic = trim($userdata['user_cnic']);  // Trim any extra spaces

        // Debug: Log or dump the user CNIC
        \Log::info('User CNIC: ' . $userCnic);

        // Loop through the appointments to find matching user_cnic_appointment
        if ($appointments) {
            foreach ($appointments as $appointmentKey => $appointment) {
                if (isset($appointment['user_cnic_appointment'])) {
                    $appointmentCnic = trim($appointment['user_cnic_appointment']);  // Trim appointment CNIC as well

                    // Debug: Log or dump the appointment CNIC for each appointment
                    \Log::info('Appointment CNIC: ' . $appointmentCnic);

                    // If user's CNIC matches the appointment's CNIC, add to matchedAppointments
                    if (strcasecmp($appointmentCnic, $userCnic) === 0) {  // Case-insensitive comparison
                        $matchedAppointments[$appointmentKey] = $appointment;
                    }
                }
            }
        }

        // Debug: Check if any matched appointments are found
        \Log::info('Matched Appointments Count: ' . count($matchedAppointments));

        // Pass data to the view
        return view('firebase.hometesting.userappointment', compact('userappontmentdata', 'matchedAppointments', 'key', 'username'));
    } else {
        // Redirect if user ID is not found
        return redirect('viewallusers_appointments')->with('status', 'User ID not found');
    }
}

public function updateAppointmentStatus(Request $request)
{
    // Retrieve the 'status' array from the request
    $statusData = $request->input('status');

    // Loop through the status data and update each matching appointment
    foreach ($statusData as $userKey => $status) {
        // Reference to the hometesting table in Firebase
        $appointmentsRef = $this->database->getReference($this->hometesttable);

        // Fetch all appointments to find the matching one by user_key_appointment
        $appointments = $appointmentsRef->getValue();

        // Loop through each appointment and check if user_key_appointment matches
        foreach ($appointments as $key => $appointment) {
            if ($appointment['user_key_appointment'] == $userKey) {
                // Found the matching appointment, update the status
                $appointmentRef = $appointmentsRef->getChild($key);
                $appointmentRef->update([
                    'user_status_appointment' => $status
                ]);
                break; // Exit the loop once the matching appointment is found and updated
            }
        }
    }

    // Redirect back or return a response indicating the update was successful
    return back()->with('success', 'Appointment status updated successfully!');
}




}
