<?php

namespace App\Repositories;

use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function all()
    {
        return Project::all();
    }

    public function find(int $id)
    {
        return Project::findOrFail($id);
    }

    public function create(array $project)
    {
        return Project::create($project);
    }

    public function update(array $data, int $id): bool
    {
        $project = $this->find($id);
        return $project->update($data);
    }

    public function delete(int $id)
    {
        $project = Project::findOrFail($id);
        return $project->delete();
    }
}
