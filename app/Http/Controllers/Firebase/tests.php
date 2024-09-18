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





    $validatedData = $request->validate([
        'test_name' => 'required|string',
        'test_price' => 'required|numeric',
        'test_requirements' => 'required',
        'test_availabilty' => 'required',
        
    ]);

    // Prepare data to be inserted into Firebase
    $postData = [
        'test_name' => $validatedData['test_name'],
        'test_price' => $validatedData['test_price'],
        'test_requirements' => $validatedData['test_requirements'],
        'test_availabilty' => $validatedData['test_availabilty'],

    ];

    // Insert data into Firebase
    try {
        $postRef = $this->database->getReference($this->teststable)->push($postData);

        if ($postRef) {
            return redirect('viewalltests')->with('status', 'Test Added Successfully');
        } else {
            return redirect('viewalltests')->with('status', 'Test Not Added Successfully');
        }
    } catch (\Exception $e) {
        // Handle any exceptions that occur during the Firebase operation
        return redirect('viewalltests')->with('status', 'An error occurred: ' . $e->getMessage());
    }

    return view('firebase.usertests.viewalltests');

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

    public function edit_test(){

        return view('firebase.usertests.edittest');

    }
//put method
    public function update_test(){
        
    }
    
    //delete method
    public function delete_test(){
        
    }
}
