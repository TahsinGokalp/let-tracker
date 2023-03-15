<?php

namespace App\Jobs;

use App\Models\Project;
use App\Services\Api\HandleExceptionService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Illuminate\Contracts\Queue\ShouldBeEncrypted;

class ProcessException implements ShouldQueue, ShouldBeEncrypted
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public Project $project;

    public array $data;

    public Carbon $date;

    public function __construct(array $data, Project $project, Carbon $date, protected HandleExceptionService $handleExceptionService)
    {
        $this->data = $data;
        $this->project = $project;
        $this->date = $date;
    }

    public function handle(): void
    {
        $this->handleExceptionService->handle($this->data, $this->project, $this->date);
    }
}