<?php

namespace App\Http\Controllers;

use App\Model\RadiologyTest;
use Illuminate\Http\Request;

class RadiologyTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RadiologyTest::latest()->get();
        return view('radiology-tests', compact('data'));
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
        RadiologyTest::create($request->all());
        return response()->json(['status'=>true, 'data'=>$request->all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\RadiologyTest  $radiologyTest
     * @return \Illuminate\Http\Response
     */
    public function show(RadiologyTest $radiologyTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\RadiologyTest  $radiologyTest
     * @return \Illuminate\Http\Response
     */
    public function edit(RadiologyTest $radiologyTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\RadiologyTest  $radiologyTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RadiologyTest $radiologyTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\RadiologyTest  $radiologyTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(RadiologyTest $radiologyTest)
    {
        //
    }
}
