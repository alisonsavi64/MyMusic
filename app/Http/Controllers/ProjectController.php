<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Interfaces\ProjectRepositoryInterface;

class ProjectController extends Controller
{

    public function __construct(protected ProjectRepositoryInterface $projectRepository) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = $this->projectRepository->all();
        return response()->json($projects,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $project = $this->projectRepository->create($request->all());
        return response()->json($project, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = $this->projectRepository->find($id);
        return response()->json($project, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, string $id)
    {
        $updatedProject = $this->projectRepository->update($request->all(), $id);
        return response()->json($updatedProject, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->projectRepository->delete($id);
        if(!$deleted) return response()->json(["message" => "Project $id can't be deleted"], 500);
        return response()->json(null, 200);
    }
}
