<?php

namespace App\Http\Controllers\Dash;

use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateShiftRequest;
use App\Services\BranchesService;
use App\Services\DoctorsService;
use App\Services\ShiftsService;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    private $shiftsService;
    private $branchesService;
    private $doctorsService;
    public function __construct()
    {
        $this->shiftsService = new ShiftsService();
        $this->branchesService = new BranchesService();
        $this->doctorsService = new DoctorsService();
    }

    public function index()
    {
        $shifts = $this->shiftsService->pagination();
        return view('dash.shifts.index', compact('shifts'));
    }

    public function add()
    {
        $daysOfWeek = array_keys(Constants::DAYS_OF_WEEK);
        $shiftTypes = Constants::SHIFT_TYPES;
        $branches = $this->branchesService->getAll();
        $doctors = $this->doctorsService->getAll();
        return view('dash.shifts.add', compact('daysOfWeek', 'shiftTypes', 'branches', 'doctors'));
    }

    public function create(CreateShiftRequest $request)
    {
        $this->shiftsService->create($request);
        return redirect(route('shifts.all'));
    }

    public function edit($id)
    {
        $daysOfWeek = array_keys(Constants::DAYS_OF_WEEK);
        $shiftTypes = Constants::SHIFT_TYPES;
        $branches = $this->branchesService->getAll();
        $doctors = $this->doctorsService->getAll();
        $shift = $this->shiftsService->find($id);
        return view('dash.shifts.edit', compact('shiftTypes', 'daysOfWeek', 'shift', 'doctors', 'branches'));
    }

    public function update($id, CreateShiftRequest $request)
    {
        $this->shiftsService->update($id, $request);
        return redirect(route('shifts.all'));
    }
    public function filter(Request $request)
    {
        $shifts = $this->shiftsService->filter($request);
        return view("dash.shifts.index", compact('shifts'));
    }

    public function delete($id)
    {
        $this->shiftsService->delete($id);
        return redirect(route('shifts.all'));
    }

}
