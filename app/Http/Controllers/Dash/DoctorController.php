<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDoctorRequest;
use App\Services\DoctorsService;
use App\Services\SpecialitiesService;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    private $doctorsService;
    private $specialitiesService;

    public function __construct()
    {
        $this->doctorsService = new DoctorsService();
        $this->specialitiesService = new SpecialitiesService();
    }

    public function index()
    {
        $doctors = $this->doctorsService->pagination();
        return view('dash.doctors.index', compact('doctors'));
    }

    public function add()
    {
        $specialities = $this->specialitiesService->getAll();
        return view('dash.doctors.add', compact('specialities'));
    }
    public function create(CreateDoctorRequest $request)
    {
        $this->doctorsService->create($request);
        return redirect(route('doctors.all'));
    }

    public function edit($id)
    {
        $specialities = $this->specialitiesService->getAll();
        $doctor = $this->doctorsService->find($id);
        return view('dash.doctors.edit', compact('id', 'doctor', 'specialities'));
    }

    public function update($id, CreateDoctorRequest $request)
    {
        $this->doctorsService->update($id, $request);
        return redirect(route('doctors.all'));
    }
    public function delete($id)
    {
        $this->doctorsService->delete($id);
        return redirect(route('doctors.all'));
    }

    public function filter(Request $request)
    {
        $doctors = $this->doctorsService->filter($request);
        return view('dash.doctors.index', compact('doctors'));
    }
}
