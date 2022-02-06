<?php


namespace App\Services;


use App\Models\Common\File;
use App\Repositories\SpecialitiesRepo;
use Illuminate\Support\Facades\Storage;

class SpecialitiesService
{
    /**
     * @var SpecialitiesRepo
     */
    private $specialitiesRepo;

    public function __construct()
    {
        $this->specialitiesRepo = new SpecialitiesRepo();
    }


    public function getAll()
    {
        return $this->specialitiesRepo->all();
    }

    public function pagination($num = 10)
    {
        return $this->specialitiesRepo->pagination($num);
    }

    public function create($request)
    {
        $data = $request->validated();
        $speciality = $this->specialitiesRepo->create($data);
        $file  = Storage::disk('public')->putFileAs("speciality/", $request->file('photo'), time().".".$request->file('photo')->getClientOriginalName());
        $speciality->photo()->create([
            'model'=>"speciality",
            "path" => $file,
            "url" => asset("storage/$file")
        ]);

        return $speciality;
    }

    public function find($id)
    {
        return $this->specialitiesRepo->find($id);
    }

    public function update($id, $request)
    {
        $data = $request->validated();
        $speciality = $this->specialitiesRepo->update($id, $data);
        $file  = Storage::disk('public')->putFileAs("speciality/", $request->file('photo'), time().".".$request->file('photo')->getClientOriginalName());
        $speciality->photo()->update([
            'model'=>"speciality",
            "path" => $file,
            "url" => asset("storage/$file")
        ]);
        return $speciality;
    }

    public function delete($id)
    {
        return $this->specialitiesRepo->delete($id);
    }
}
