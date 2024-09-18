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
    public function addusers(Request $request)
    {
        
        $validatedData = $request->validate([
            'username' => 'required',
            'useremail' => 'required|email',
            'usercnic' => 'required',
        ]);
    
        
        \Log::info('Validated Data:', $validatedData);
    
        $usersRef = $this->database->getReference($this->usertable);
    
        $users = $usersRef->getValue();
        $lastUserId = 0;
    
        if ($users) {
            foreach ($users as $user) {
                if (isset($user['userid']) && $user['userid'] > $lastUserId) {
                    $lastUserId = $user['userid'];
                }
            }
        }
    
        $newUserId = $lastUserId + 1;
    
        $postData = [
            'userid' => $newUserId,
            'username' => $validatedData['username'],
            'useremail' => $validatedData['useremail'],
            'usercninc'=> $validatedData['usercnic'],

        ];
    
    
        try {
            $postRef = $usersRef->push($postData);
    
            if ($postRef) {
                return redirect()->route('viewallreports')->with('status', 'User Added Successfully');
            } else {
                return redirect()->route('viewallreports')->with('status', 'User Not Added Successfully');
            }
        } catch (\Exception $e) {
            
    
            return redirect()->route('viewallreports')->with('status', 'An error occurred: ' . $e->getMessage());
        }
    }

}
