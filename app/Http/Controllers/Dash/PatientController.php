<?php

namespace App\Http\Controllers\Dash;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePatientRequest;
use App\Services\CommonsService;
use App\Services\PatientsService;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    protected $patientService;
    protected $commonsService;

    public function __construct()
    {
        $this->patientService = new PatientsService();
        $this->commonsService = new CommonsService();
    }

    public function index()
    {
        $patients = $this->patientService->getAll();
        return view('dash.patients.index', compact('patients'));
    }

    public function add()
    {
        $countries = $this->commonsService->getCountries();
        $bloodGroups = Constants::BLOOD_GROUPS;
        $rhs = Constants::RHESUS_FACTORS;
        return view('dash.patients.add', compact('countries', 'bloodGroups', 'rhs'));
    }

    public function create(CreatePatientRequest $request)
    {
        $this->patientService->create($request);
        return redirect(route('patients.all'));
    }

    public function delete($id)
    {
        $this->patientService->delete($id);
        return redirect(route('patients.all'));
    }

    public function getCities($id)
    {
        $cities = $this->commonsService->getCities($id);
        return response()->json($cities);
    }
}
