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
            $schedule ='Session '. implode(', ', json_decode($user->schedule_id));
            $data[] = [
                "Name" => $user->fname.' '.$user->lname,
                "Email" => $user->email,
                "Mobilenumber" => $user->phonenumber,
                "Occupation" => $user->occupation,
                "Organization" => $user->organization,
                "Schedule" => $schedule
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