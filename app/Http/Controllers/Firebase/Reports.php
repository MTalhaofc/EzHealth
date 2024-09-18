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
        $this->reportstable = 'reports';
    }
    public function viewallreports(){

        $users = $this->database->getReference($this->usertable)->getValue();
        $totalusers = $this->database->getReference($this->usertable)->getSnapshot()->numChildren();
    
    
        return view('firebase.reports.viewallreports',compact('users','totalusers') );

    }

    //will be used to view report of each user
   


        public function view_reports($id){

    $key = $id;
$viewreportdata = $this->database->getReference($this->usertable)->getChild($key)->getValue();
if($viewreportdata){
return view('firebase.reports.viewuserreport' , compact('viewreportdata','key'));
}
else{
    return redirect('viewallreports')->with('status','User Id not found');
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
        'patient_name' => 'required|string|max:255',
        'report_id' => 'required|string',
        'report_images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'parent_id' => 'required',
        'test_date' => 'required|date',
        'test_time' => 'required|date_format:H:i',
        'report_image' => 'required'
    ]);

    // Process report images and upload them to Firebase Storage
    $imagePaths = [];
    if ($request->hasFile('report_images')) {
        foreach ($request->file('report_images') as $image) {
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

                $imagePaths[] = $imageURL; // Store the image URL
            } catch (\Exception $e) {
                // Log the error
                \Log::error('Error uploading image to Firebase Storage: ' . $e->getMessage());
                return redirect()->back()->with('status', 'Error uploading image to Firebase Storage');
            }
        }
    }

    // Prepare the report data with the image URLs
    $reportData = [
        'patient_name' => $request->input('patient_name'),
        'report_id' => $request->input('report_id'),
        'parent_id' => $request->input('parent_id'),
        'test_date' => $request->input('test_date'),
        'test_time' => $request->input('test_time'),
        'report_images' => $imagePaths // URLs of uploaded images
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
}