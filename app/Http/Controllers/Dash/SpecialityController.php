<?php


namespace App\Http\Controllers\Dash;


use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSpecialityRequest;
use App\Models\Speciality;
use App\Services\SpecialitiesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpecialityController extends Controller
{
    /**
     * @var SpecialitiesService
     */
    private $specialitiesService;

    public function __construct()
    {
        $this->specialitiesService = new SpecialitiesService();
    }

    public function getAll()
    {
        $specialities = $this->specialitiesService->pagination();
        return view('dash.specialities.index',compact('specialities'));
    }
    public  function add()
    {
        return view('dash.specialities.add');
    }

    public function create(CreateSpecialityRequest $request)
    {
        $this->specialitiesService->create($request);

        return redirect(route('specialities.all'));
    }

    public  function edit($id)
    {
        $speciality = $this->specialitiesService->find($id);
        return view('dash.specialities.edit', compact('id', 'speciality'));
    }

    public function update($id, CreateSpecialityRequest $request)
    {
        $this->specialitiesService->update($id, $request);
        return redirect(route('specialities.all'));
    }

    public  function delete($id)
    {
        $this->specialitiesService->delete($id);
        return redirect(route('specialities.all'));
    }
}
