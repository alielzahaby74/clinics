<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBranchRequest;
use App\Services\BranchesService;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    private $branchesService;

    public function __construct()
    {
        $this->branchesService = new BranchesService();
    }

    public function getAll()
    {
        $branches = $this->branchesService->pagination();
        return view('dash.branches.index', compact('branches'));
    }

    public function add()
    {
        return view('dash.branches.add');
    }

    public function create(CreateBranchRequest $request)
    {
        $this->branchesService->create($request->validated());

        return redirect(route('branches.all'));
    }

    public function edit($id)
    {
        $branch = $this->branchesService->find($id);
        return view('dash.branches.edit', compact('id', 'branch'));
    }
    public function update($id, CreateBranchRequest $request)
    {
        $this->branchesService->update($id, $request);

        return redirect(route('branches.all'));
    }

    public function delete($id)
    {
        $this->branchesService->delete($id);
        return redirect(route('branches.all'));
    }
}
