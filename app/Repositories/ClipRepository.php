<?php

namespace App\Repositories;

use App\Interfaces\ClipRepositoryInterface;
use App\Models\Clip;

class ClipRepository implements ClipRepositoryInterface
{
    public function all()
    {
        return Clip::all();
    }

    public function find(int $id)
    {
        return Clip::findOrFail($id);
    }

    public function create(array $clip)
    {
        return Clip::create($clip);
    }

    public function update(array $data, int $id): bool
    {
        $clip = $this->find($id);
        return $clip->update($data);
    }

    public function delete(int $id)
    {
        $clip = Clip::findOrFail($id);
        return $clip->delete();
    }
}
