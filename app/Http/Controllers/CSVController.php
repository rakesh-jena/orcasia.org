<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event\Registeration;

class CSVController extends Controller
{
    public function download()
    {
        $headers = [
            "Content-Type" => "text/csv",
            "Content-Disposition" => 'attachment; filename="registerUsers.csv"',
        ];
        $userData = Registeration::all();
        foreach ($userData as $user) {
            if($user->schedule_id == 'day1'){
                $schedule ='Day One';
            }elseif($user->schedule_id == 'day2'){
                $schedule ='Day Two';
            }else{
                $schedule ='Both Day';
            }
            $data[] = [
                "Name" => $user->fname.' '.$user->lname,
                "Email" => $user->email,
                "Mobilenumber" => $user->phonenumber,
                "Occupation" => $user->occupation,
                "Organization" => $user->organization,
                "schdule" => $schedule
                // Add more dynamic fields as needed
            ];
        }
        $callback = function () use ($data) {
            $file = fopen("php://output", "w");

            // Write the CSV header row
            fputcsv($file, array_keys($data[0]));

            foreach ($data as $row) {
                fputcsv($file, $row);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
?>