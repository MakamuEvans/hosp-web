<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Model\CheckIn;
use App\Model\Client;
use App\Model\DoctorDiagnosis;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    public function appointments(){
        $data = CheckIn::with(['client','doctor_diagnosis.doctor', 'lab_diagnosis.technician', 'lab_diagnosis.test', 'radiology_diagnosis.technician', 'radiology_diagnosis.test', 'medication.drug'])->latest()->get();
        return response()->json($data);
    }

    public function clients(){
        $data = Client::latest()->get();
        return response()->json($data);
    }

    public function doctors(){
        $data = User::where('user_type', Constants::DOCTOR)->get();
        return response()->json($data);
    }

    public function checkIn(Request $request){
        Log::info($request->all());
        Log::info($request->all()[0]);
        $data = json_decode($request->all()[0], true);
        //Log::error($data['weight']);
        $check_in = new CheckIn([
            'client_id'=>$data['client'],
            'receptionist_id'=>$data['receptionist_id'],
            'weight'=>$data['weight'],
            'temperature'=>$data['temperature'],
        ]);
        if ($check_in->save()){
            DoctorDiagnosis::create([
                'doctor_id'=>$data['doctor'],
                'check_in_id'=>$check_in->id
            ]);
        }
        return response()->json($check_in);
    }
}
