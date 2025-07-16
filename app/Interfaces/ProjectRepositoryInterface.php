<?php

namespace App\Interfaces;

use App\Models\Project;

interface ProjectRepositoryInterface{
    public function all();
    public function find(int $id);
    public function create(array $project);
    public function update(array $data, int $id);
    public function delete(int $id);

}
