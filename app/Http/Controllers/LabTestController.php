<?php

namespace App\Http\Controllers;

use App\Model\LabTest;
use Illuminate\Http\Request;

class LabTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = LabTest::latest()->get();
        return view('lab-tests', compact('data'));
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
        LabTest::create($request->all());
        return response()->json(['status'=>true, 'data'=>$request->all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\LabTest  $labTest
     * @return \Illuminate\Http\Response
     */
    public function show(LabTest $labTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\LabTest  $labTest
     * @return \Illuminate\Http\Response
     */
    public function edit(LabTest $labTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\LabTest  $labTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LabTest $labTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\LabTest  $labTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(LabTest $labTest)
    {
        //
    }
}
