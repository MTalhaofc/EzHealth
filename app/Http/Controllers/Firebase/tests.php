<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Contract\Database;
use Illuminate\Routing\Router;

class tests extends Controller
{
    //
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->teststable = 'tests';
        
    }

    public function viewalltests(){

        $tests = $this->database->getReference($this->teststable)->getValue();
        $totaltests = $this->database->getReference($this->teststable)->getSnapshot()->numChildren();



        return view('firebase.usertests.viewalltests',compact('tests','totaltests')) ;
    }
    public function add_test(){



        return view('firebase.usertests.addtests');

    
    }

    //Post method
public function upload_test(Request $request){
    $request->validate([
        'test_name' => 'required|string|max:255',
        'test_price' => 'required|numeric',
        'test_requirements' => 'required|string|max:255',
        'test_availabilty' => 'required|string|max:255',
    ]);
    $testData = [
        'test_name' => $request->input('test_name'),
        'test_price' => $request->input('test_price'),
        'test_requirements' => $request->input('test_requirements'),
        'test_availabilty' => $request->input('test_availabilty'),
    ];
   $testuploaded = $this->database->getReference($this->teststable)->push($testData);
if($testuploaded){
    return redirect()->route('viewalltests')->with('status','Test Successfully added!');
}
else{
    return redirect()->route('viewalltests')->with('status','Failed to add Test!');

}

}
    


    public function view_test($id){
        
        $key = $id;
        $vieweachtest = $this->database->getReference($this->teststable)->getChild($key)->getValue();

        if($vieweachtest){
            return view('firebase.usertests.viewtest' , compact('vieweachtest','key'));
            }
            else{
                return redirect('viewalltests')->with('status','Test Id not found');
            }



    }

    public function edit_test($id){

        $testData = $this->database->getReference($this->teststable . '/' . $id)->getValue();

        // Check if the test data exists
        if ($testData) {
            return view('firebase.usertests.edittest', compact('testData', 'id'));
        } else {
            return redirect()->route('viewalltests')->with('status', 'Test not found.');
        }

    }
//put method
public function update_test(Request $request, $id)
{
    // Validate the request data
    $validatedData = $request->validate([
        'test_name' => 'required|string',
        'test_price' => 'required|numeric',
        'test_requirements' => 'required|string',
        'test_availabilty' => 'required|string',
    ]);

    // Prepare data for updating in Firebase
    $updateData = [
        'test_name' => $validatedData['test_name'],
        'test_price' => $validatedData['test_price'],
        'test_requirements' => $validatedData['test_requirements'],
        'test_availabilty' => $validatedData['test_availabilty'],
    ];

    // Update data in Firebase
    try {
        // Update the test in Firebase
        $this->database->getReference($this->teststable . '/' . $id)->update($updateData);
        
        // Redirect back to the view page for this specific test ID
        return redirect()->route('view_test', ['id' => $id])->with('status', 'Test updated successfully.');
    } catch (\Exception $e) {
        // Redirect back to the view page for this specific test ID, showing the error
        return redirect()->route('view_test', ['id' => $id])->with('status', 'An error occurred: ' . $e->getMessage());
    }
}
    
    //delete method
    public function delete_test($id)
    {
        try {
            // Delete the test from Firebase
            $this->database->getReference($this->teststable . '/' . $id)->remove();
    
            // Redirect back with a success message
            return redirect()->route('viewalltests')->with('status', 'Test deleted successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions and redirect with an error message
            return redirect()->route('viewalltests')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }
    
}
