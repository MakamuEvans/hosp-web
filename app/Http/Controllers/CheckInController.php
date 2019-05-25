<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Model\CheckIn;
use App\Model\DoctorDiagnosis;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CheckIn::latest()->get();
        return view('check-ins', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new-check-in');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check_in = new CheckIn([
            'client_id'=>$request->client['id'],
            'receptionist_id'=>Auth::id(),
            'weight'=>$request->weight,
            'temperature'=>$request->temperature,
            'remarks'=>$request->remarks
        ]);
        if ($check_in->save()){
            DoctorDiagnosis::create([
                'doctor_id'=>$request->doctor['id'],
                'check_in_id'=>$check_in->id
            ]);
        }
        return response()->json(['status'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\CheckIn  $checkIn
     * @return \Illuminate\Http\Response
     */
    public function show(CheckIn $checkIn)
    {
        return view('view-check-in', compact('checkIn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\CheckIn  $checkIn
     * @return \Illuminate\Http\Response
     */
    public function edit(CheckIn $checkIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\CheckIn  $checkIn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CheckIn $checkIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\CheckIn  $checkIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckIn $checkIn)
    {
        //
    }

    public function initCheckIn(){
        $doctors = User::where('user_type', Constants::DOCTOR)->get();
        return response()->json(['status'=>true, 'data'=>$doctors]);
    }
}
