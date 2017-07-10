<?php

namespace App\Http\Controllers;

use App\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    public function addPatient(Request $request)
    {
        Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'patient_number' => 'required'
        ])->validate();

        $values = array(
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'patient_number'=>$request->patient_number,
            'sex'=>$request->sex,
            'active'=>$request->active,
            'date_of_birth'=>new Carbon($request->date_of_birth)
        );

        Patient::create($values);

        return 'Patient Added Successfully!';

    }

    public function deletePatient(Request $request)
    {
        Validator::make($request->all(), [
            'id' => 'required  | exists:patients,id',
        ])->validate();

        if (Patient::destroy($request->id)) {
            return 'Patient Deleted';
        }
        return 'Operation failed';


    }

    public function updatePatient(Request $request)
    {

        Validator::make($request->all(), [
            'id' => 'required  | exists:patients,id',
        ])->validate();

        $values = array(
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'patient_number'=>$request->patient_number,
            'sex'=>$request->sex,
            'active'=>$request->active,
            'date_of_birth'=>new Carbon($request->date_of_birth)
        );


        Patient::findOrFail($request->id)
            ->update($values);

        return 'Patient Updated Successfully';


    }

    public function getPatient(Request $request)
    {
        return Patient::get();
    }
}
