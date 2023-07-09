<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Graphs;
use App\Models\Article;
use Illuminate\Support\Str;
use App\Models\Event\Schedule;
use App\Models\Event\Registeration;
use Illuminate\Support\Facades\Session;
use App\Mail\EventRegisteration;
use Illuminate\Support\Facades\Mail;

class RegisterationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registerations = Registeration::orderBy('id', 'asc')->get();
        return view('admin.event.registeration.listing', compact('registerations'));
    }

    public function scheduleRegistration(Request $request) {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|max:255',
            'phonenumber' => 'required',
            'occupation' => 'required',
            'organization' => 'required',
            'schedule' => 'required',
        ]);
        
        $request = request()->all();
        if(isset($request['schedule']) && !empty($request['schedule'])){
            $request['schedule_id'] = $request['schedule'];
        }

        $newCreateUser = Registeration::create($request);
        $name= $newCreateUser['fname'].' '.$newCreateUser['lname'];

        // Mail::to('hiteshpawar1193@gmail.com')->send(new EventRegisteration($name));

        // Session::flash('success', 'Registration completed successfully!');
        return redirect('pages/events')
            ->with('success', 'Registration completed successfully!');
    }
    

    public function destroy($id)
    {
        $registerationData = Registeration::where('id',$id);
        $registerationData->delete();

        return redirect('yn-admin/event/registeration')
            ->with('success', 'Registeration deleted successfully');
    }

}
