<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAudioRequest;
use App\Jobs\ProcessAudioJob;
use App\Models\Audio;
use Exception;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAudioRequest $request)
    {
        try{
            $audiosIds = [];

            foreach($request->input('audios') as $audioFile){
                $path = $audioFile->store('audios/original', 'public');

                $audio = Audio::create([
                    'original_path' => $path,
                    'status' => 'queued',
                    'progress' => 0,
                    'converted_path' => null
                ]);

                ProcessAudioJob::dispatch($audio);

                $audiosIds[] = $audio->id;
            }

            return response()->json(['audios_ids' => $audiosIds]);
        } catch (Exception $e){
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
