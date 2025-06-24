<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Contract\Database;
use Illuminate\Routing\Router;
use Kreait\Firebase\Contract\Storage;


class Reports extends Controller
{
    //
    public function __construct(Storage $storage,Database $database)
    {
        $this->storage = $storage;
        $this->database = $database;
        $this->usertable = 'users';
        $this->onlinetable = 'onlinereports';

        $this->reportstable = 'reports';
    }
    public function viewallreports(){

        $users = $this->database->getReference($this->usertable)->getValue();
        $totalusers = $this->database->getReference($this->usertable)->getSnapshot()->numChildren();
    
    
        return view('firebase.reports.viewallreports',compact('users','totalusers') );

    }

   


    public function view_reports($id)
    {
        $key = $id;
    
        // Fetch the user data from Firebase using the provided ID
        $userData = $this->database->getReference($this->usertable)->getChild($key)->getValue();
    
        // Initialize an array to store matched reports
        $matchedReports = [];
    
        if ($userData) {
            // Extract the user's CNIC and trim it to avoid extra spaces
            $userCnic = trim($userData['user_cnic']);
    
            // Fetch all reports from Firebase
            $allReports = $this->database->getReference($this->reportstable)->getValue();
    
            if ($allReports) {
                // Loop through all reports to find matches by CNIC
                foreach ($allReports as $reportKey => $report) {
                    if (isset($report['user_report_cnic'])) {
                        $reportCnic = trim($report['user_report_cnic']); // Trim to avoid spaces
    
                        // Check if the user's CNIC matches the report's CNIC
                        if (strcasecmp($reportCnic, $userCnic) === 0) { // Case-insensitive comparison
                            $matchedReports[$reportKey] = $report;
                        }
                    }
                }
            }
    
            // Debug: Log the count of matched reports
            \Log::info('Matched Reports Count: ' . count($matchedReports));
    
            // Pass the matched reports to the view
            return view('firebase.reports.viewuserreport', compact('matchedReports', 'key', 'userData'));
        } else {
            // If the user data is not found, redirect to a fallback page with a status message
            return redirect()->route('viewallusers_reports')->with('status', 'User ID not found');
        }
    }
    
    
//will be used to redirect to add reports page
public function  add_reports($id){
$key = $id;
$addreportdata =  $this->database->getReference($this->usertable)->getchild($key)->getvalue();
if($addreportdata){
    return view('firebase.reports.addreport' , compact('addreportdata','key'));
    }
    else{
        return redirect('viewuserreport')->with('status','User Id not found');
    }}
//used for post method uploading reports



public function upload_reports(Request $request, $id)
{
    // Fetch user data based on the provided id (key)
    $key = $id;
    $addreportdata = $this->database->getReference($this->usertable)->getChild($key)->getValue();

    if (!$addreportdata) {
        return redirect()->route('viewuserreport')->with('status', 'User Id not found');
    }

    // Validate the request data
    $validatedData = $request->validate([
        'user_report_patient_name' => 'required|string|max:255',           // Patient Name
        'user_report_cnic' => 'required|string|size:13',                   // CNIC (13 digits)
        'user_report_parent_cnic' => 'required|string|size:13',            // Parent CNIC (13 digits)
        'user_report_date' => 'required',                // Test Date (dd/mm/yyyy)
        'user_report_time' => 'required|date_format:H:i',                  // Test Time (HH:MM)
        'report_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',    // Report Image
        'user_report_price' => 'required|numeric|min:1',                   // Report Price
        'user_report_test_id' => 'required|numeric|min:1',                 // Test ID
    ]);

    // Convert the test date from d/m/Y to Y-m-d for storing in Firebase
   
    // Process the report image and upload it to Firebase Storage
    $imagePath = '';
    if ($request->hasFile('report_image')) {
        $image = $request->file('report_image');
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $firebaseStoragePath = 'Reports/' . $imageName;

        try {
            // Upload the image to Firebase Storage
            $uploadedFile = fopen($image->getRealPath(), 'r');
            $this->storage->getBucket()->upload($uploadedFile, [
                'name' => $firebaseStoragePath
            ]);

            // Get the download URL for the uploaded image
            $imageReference = $this->storage->getBucket()->object($firebaseStoragePath);
            $imageURL = $imageReference->signedUrl(new \DateTime('1 year')); // Generate a signed URL valid for 1 year

            $imagePath = $imageURL; // Store the image URL
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error uploading image to Firebase Storage: ' . $e->getMessage());
            return redirect()->back()->with('status', 'Error uploading image to Firebase Storage');
        }
    }

    // Prepare the report data with the image URL
    $reportData = [
        'user_report_cnic' => $validatedData['user_report_cnic'],
        'user_report_date' => $validatedData['user_report_date'],       // Save date in Y-m-d format
        'user_report_name' => $validatedData['user_report_name'] ?? 'Mri', // Defaulting to 'Mri'
        'user_report_parent_cnic' => $validatedData['user_report_parent_cnic'],
        'user_report_patient_name' => $validatedData['user_report_patient_name'],
        'user_report_price' => $validatedData['user_report_price'],
        'user_report_test_id' => $validatedData['user_report_test_id'],
        'user_report_time' => $validatedData['user_report_time'],
        'user_report_url' => $imagePath,  // The URL of the uploaded image
    ];

    // Use Firebase's push() to create an auto-generated key for the report
    $newReportRef = $this->database->getReference($this->reportstable)->push();

    // Save the report data under the auto-generated key
    try {
        $newReportRef->set($reportData);
    } catch (\Exception $e) {
        // Log the error
        \Log::error('Error saving report data to Firebase Realtime Database: ' . $e->getMessage());
        return redirect()->back()->with('status', 'Error saving report data to Firebase Realtime Database');
    }

    // Redirect back with a success message
    return redirect()->route('view_reports', ['id' => $id])
        ->with('status', 'Report uploaded successfully!');
}

public function view_complete_report($reportKey)
{
    // Fetch report details by the reportKey
    $reportData = $this->database->getReference($this->reportstable)->getChild($reportKey)->getValue();

    // Check if the report exists
    if ($reportData) {
        return view('firebase.reports.complete_report', compact('reportData','reportKey'));
    } else {
        return redirect()->route('view_reports', ['id' => $userKey])
                         ->with('status', 'Report not found.');
    }
}
public function editReport(Request $request, $reportKey)
{
    // Handle GET request to show the edit form
    if ($request->isMethod('get')) {
        // Fetch the report data
        $reportData = $this->database->getReference($this->reportstable)->getChild($reportKey)->getValue();

        // Check if the report exists
        if (!$reportData) {
            return redirect()->route('view_reports')
                             ->with('status', 'Report not found.');
        }

        // Show the edit form
        return view('firebase.reports.edit_report', compact('reportData', 'reportKey'));
    }

    // Handle POST request to update the report
    if ($request->isMethod('post')) {
        $validatedData = $request->validate([
            'user_report_patient_name' => 'required|string|max:255',
            'user_report_cnic' => 'required|string|size:13',
            'user_report_parent_cnic' => 'required|string|size:13',
            'user_report_date' => 'required',
            'user_report_time' => 'required',
            'user_report_price' => 'required|numeric|min:1',
            'user_report_name' => 'required|string|max:255',
        ]);

        // Update report data
        $updatedReportData = [
            'user_report_patient_name' => $validatedData['user_report_patient_name'],
            'user_report_cnic' => $validatedData['user_report_cnic'],
            'user_report_parent_cnic' => $validatedData['user_report_parent_cnic'],
            'user_report_date' => $validatedData['user_report_date'],
            'user_report_time' => $validatedData['user_report_time'],
            'user_report_price' => $validatedData['user_report_price'],
            'user_report_name' => $validatedData['user_report_name'],
        ];

        // Save the updated data back to Firebase
        try {
            $this->database->getReference($this->reportstable)->getChild($reportKey)->update($updatedReportData);
            return redirect()->route('view_complete_report', ['reportKey' => $reportKey])
                             ->with('status', 'Report updated successfully!');
        } catch (\Exception $e) {
            \Log::error('Error updating report: ' . $e->getMessage());
            return redirect()->back()->with('status', 'Error updating the report.');
        }
    }
}

public function deleteReport($reportKey)
{
    // Assuming you are using Firebase to store reports
    $report = $this->database->getReference($this->reportstable)->getChild($reportKey);

    // Check if the report exists
    if ($report->getValue()) {
        // Perform the deletion
        $report->remove();
        
        
        return redirect()->route('viewallreports')->with('status', 'Report deleted successfully.');
    } else {
       
        return redirect()->route('viewallreports')->with('status', 'Report not found.');
    }
}
public function searchUsers(Request $request)
{
    $query = $request->input('query');
    $allUsers = $this->database->getReference($this->usertable)->getValue(); 

   
    $filteredUsers = array_filter($allUsers, function ($user) use ($query) {
        return str_contains(strtolower($user['user_name']), strtolower($query));
    });

    return view('firebase.reports.viewallreports', ['users' => $filteredUsers]);
}


}