<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Model\LabDiagnosis;
use App\Model\LabTest;
use App\User;
use Illuminate\Http\Request;

class LabDiagnosisController extends Controller
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
        LabDiagnosis::create($request->all());
        return response()->json(['status'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\LabDiagnosis  $labDiagnosis
     * @return \Illuminate\Http\Response
     */
    public function show(LabDiagnosis $labDiagnosis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\LabDiagnosis  $labDiagnosis
     * @return \Illuminate\Http\Response
     */
    public function edit(LabDiagnosis $labDiagnosis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\LabDiagnosis  $labDiagnosis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LabDiagnosis $labDiagnosis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\LabDiagnosis  $labDiagnosis
     * @return \Illuminate\Http\Response
     */
    public function destroy(LabDiagnosis $labDiagnosis)
    {
        //
    }

    public function init(){
        $tests = LabTest::all();
        $technicians = User::where('user_type', Constants::LAB_TECHNICIAN)->get();
        return response()->json(['status'=>true, 'data'=>['tests'=>$tests, 'technicians'=>$technicians]]);
    }
}
