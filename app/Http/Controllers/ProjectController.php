<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Inertia\Inertia;
use Inertia\Response;

class ProjectController extends Controller
{
    public function show(Project $project): Response
    {
        return Inertia::render('Projects/Show', [
            'project' => ProjectResource::make($project)->resolve(),
        ]);
    }
}
