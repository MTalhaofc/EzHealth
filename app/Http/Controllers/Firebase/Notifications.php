<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;

class Notifications extends Controller
{
    protected $tables = ['admins', 'hometesting', 'reports', 'tests', 'users'];

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    // Retrieve unread notifications from Firebase
    public function notifications()
    {
        $notifications = [];

        // Loop through each table to fetch notifications
        foreach ($this->tables as $table) {
            $tableData = $this->database->getReference($table)->getValue();

            if ($tableData) {
                foreach ($tableData as $key => $data) {
                    if (!isset($data['read']) || $data['read'] === false) {
                        $notifications[] = [
                            'table' => ucfirst($table),
                            'message' => "Change detected in {$table} data",
                            'timestamp' => $data['updated_at'] ?? now(),
                            'id' => $key,
                        ];
                    }
                }
            }
        }

        return view('firebase.layouts.notifications', compact('notifications'));
    }

    // Mark notifications as read in Firebase
    public function markNotificationsAsRead()
    {
        foreach ($this->tables as $table) {
            $tableData = $this->database->getReference($table)->getValue();

            if ($tableData) {
                foreach ($tableData as $key => $data) {
                    // Set 'read' status to true in Firebase
                    $this->database->getReference("{$table}/{$key}/read")->set(true);
                }
            }
        }

        return response()->json(['status' => 'Notifications marked as read']);
    }
}
