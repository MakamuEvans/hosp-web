<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Model\RadiologyDiagnosis;
use App\Model\RadiologyTest;
use App\User;
use Illuminate\Http\Request;

class RadiologyDiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        RadiologyDiagnosis::create($request->all());
        return response()->json(['status'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\RadiologyDiagnosis  $radiologyDiagnosis
     * @return \Illuminate\Http\Response
     */
    public function show(RadiologyDiagnosis $radiologyDiagnosis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\RadiologyDiagnosis  $radiologyDiagnosis
     * @return \Illuminate\Http\Response
     */
    public function edit(RadiologyDiagnosis $radiologyDiagnosis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\RadiologyDiagnosis  $radiologyDiagnosis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RadiologyDiagnosis $radiologyDiagnosis)
    {
        $data = RadiologyDiagnosis::where('id', $request->id)->update(['remarks'=>$request->remarks]);
        return response()->json(['status'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\RadiologyDiagnosis  $radiologyDiagnosis
     * @return \Illuminate\Http\Response
     */
    public function destroy(RadiologyDiagnosis $radiologyDiagnosis)
    {
        //
    }

    public function init(){
        $tests = RadiologyTest::all();
        $technicians = User::where('user_type', Constants::RADIOLOGY_TECHNICIAN)->get();
        return response()->json(['status'=>true, 'data'=>['tests'=>$tests, 'technicians'=>$technicians]]);
    }
}
