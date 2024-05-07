<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Termwind\Components\Dd;

class AttendanceController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    // public function clockIn(Request $request)
    // {
    //     $userId = $request->user()->id;
    //     $now = Carbon::now();

    //     // Check if there's already an active attendance for the user
    //     $activeAttendance = Attendance::where('user_id', $userId)
    //         ->whereNull('clock_out')
    //         ->first();

    //     if ($activeAttendance) {
    //         return redirect()->back()
    //             ->withSuccess('You have already clocked in.');
    //     }

    //     // Create new attendance record
    //     $attendance = new Attendance;
    //     $attendance->user_id = $userId;
    //     $attendance->clock_in = $now;
    //     $attendance->save();

    //     return redirect()->back()
    //         ->withSuccess('You have clocked in at ' . $now->format('h:i:s A'));
    // }



    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $attendances = Attendance::with('user')->orderByDesc('created_at')->paginate(10);
        $users = User::all();

        return view('attendances.index', compact('attendances', 'users'));
    }




    public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required',
    ]);



    $userId = $request->user_id;
    $clockedin = Attendance::where('user_id', $userId)
    ->where('clock_in', '>', Carbon::today())
    ->whereNotNull('clock_in')
    ->orderBy('created_at', 'desc')->first();




    // is clocked out?
    if ($clockedin) {
        return redirect()->back()
            ->withSuccess('You have already clocked in today.');
    }


     $user = User::findOrFail($request->user_id);

    // Check if the user is authorized to mark attendance
    // if ($user->usertype_id < 1 || $user->usertype_id > 4) {
    //     return redirect()->back()->withErrors(['message' => 'You are not authorized to mark attendance for this user.']);
    // }

    $now = now();
    $shift_start = $now->copy()->setTime(8, 0, 0);

    $attendance = new Attendance;
    $attendance->user_id = $request->user_id;
    $attendance->clock_in = $now;
    if ($now > $shift_start) {
        $attendance->status = 'late';
    } else {
        $attendance->status = 'early';
    }
    $attendance->save();

    return redirect()->route('attendances.index')
                     ->withSuccess('Attendance marked successfully.');
}




    public function clockOut(Request $request)
    {
        // $userId = $request->user()->id;
        $userId = $request->user_id;
        // dd($userId);
        $now = Carbon::now();

        // Check if there's an active attendance for the user
        $activeAttendance = Attendance::where('user_id', $userId)
         ->where('clock_in', '>', Carbon::today())
             ->whereNull('clock_out')
            -> orderBy('created_at', 'desc')
            ->first();


            $clockedout = Attendance::where('user_id', $userId)
            ->where('clock_in', '>', Carbon::today())
            ->whereNotNull('clock_out')
            ->first();



            // is clocked out?
            if ($clockedout) {
                return redirect()->back()
                    ->withSuccess('You have already clocked out today.');
            }

            // dd($activeAttendance);



        if (!$activeAttendance) {
            return redirect()->back()
                ->withSuccess( 'You have not clocked in yet.');
        }

        // Update attendance record with clock out time
        $activeAttendance->clock_out = $now;
        $activeAttendance->save();

        return redirect()->back()
            ->withSuccess('You have clocked out at ' . $now->format('h:i:s A'));
    }



}
