<?php

namespace Pathology\Http\Controllers;

use Illuminate\Http\Request;

use Pathology\Http\Requests\StorePatientRequest;

use Pathology\Repositories\UserRepository;
use Pathology\User;

use Pathology\Http\Controllers\PassCodeGenerator;

class PatientController extends Controller
{

    protected $users;

    /**
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users) {

        $this->users = $users;
    }

    /**
     * Display a listing of all patients.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return $this->users->patients();
        return view('operator.patient.index', [
            'patients' => $this->users->patients()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operator.patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRequest $request)
    {
        $user = new User();
        $passCode = PassCodeGenerator::generatePassCode();
        $user->create(array_merge([
            "pass_code" => $passCode
        ], $request->all()));

        return redirect()->route("operator.patients.create")->with('pass_code', $passCode);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = User::find($id);
        return view('operator.patient.single')->with('patient', $patient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = User::find($id);
        return view('operator.patient.edit')->with('patient', $patient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $patient = User::find($id);
        $patient->name = $request->input('name');
        $patient->gender = $request->input('gender');
        $patient->dob = $request->input('dob');

        if ($patient->save()) {
            $request->session()->flash('success', 'Patient was successful updated!');
            return redirect()->route("operator.patients.edit", ['patient_id' => $id]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = User::find($id);
        if ($patient->delete())
            return redirect()->route("operator.patients.index");
    }
}
