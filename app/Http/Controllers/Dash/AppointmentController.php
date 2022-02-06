<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAppointmentRequest;
use App\Models\Appointment;
use App\Resources\EventResource;
use App\Services\AppointmentsService;
use App\Services\DoctorsService;
use App\Services\ShiftsService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    protected $appointmentService;
    protected $doctorService;
    protected $shiftService;
    public function __construct()
    {
        $this->appointmentService = new AppointmentsService();
        $this->doctorService = new DoctorsService();
        $this->shiftService = new ShiftsService();
    }
    public function index()
    {
        $appointments = $this->appointmentService->pagination();
        return view('dash.appointments.index', compact('appointments'));
    }

    public function getEvents(Request $request)
    {
        $start = Carbon::create($request->start)->format('Y-m-d');
        $end = Carbon::create($request->end)->format('Y-m-d');
        $appointment = Appointment::whereBetween("date", [$start, $end])->get();
        $events = EventResource::collection($appointment);
        return response()->json($events);
    }
    public function add()
    {
        $doctors = $this->doctorService->getAll();
        return view('dash.appointments.add', compact('doctors'));
    }

    public function create(CreateAppointmentRequest $request)
    {
        $this->appointmentService->create($request->validated());

        return redirect(route('appointments.all'));
    }

    public function getDoctorShifts($id)
    {
        $shifts = $this->shiftService->getDoctorShifts($id);
        return response()->json($shifts);
    }

    public function getPatient($national_id)
    {
        $patient = $this->appointmentService->getPatient($national_id);
        return response()->json($patient);
    }

}
