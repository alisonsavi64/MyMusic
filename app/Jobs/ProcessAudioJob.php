<?php

namespace App\Jobs;

use App\Models\Audio;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessAudioJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Audio $audio)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->audio->update(['status' => 'processing', 'progress' => 10]);

        $originalPath = storage_path('app/public/' . $this->audio->original_path);
        $convertedFileName = 'converted_' . $this->audio->id . '.mp3';
        $convertedPath = 'audios/converted' . $convertedFileName;
        $fullConvertedPath = storage_path('app/public/' . $convertedPath);

        $ffmpeg = \FFMpeg\FFMpeg::create();
        $audio = $ffmpeg->open($originalPath);

        $audio->save(new \FFMpeg\Format\Audio\Mp3(), $fullConvertedPath);

        $this->audio->update([
            'converted_path' => $convertedPath,
            'status' => 'done',
            'progress' => 100
        ]);
    }
}
