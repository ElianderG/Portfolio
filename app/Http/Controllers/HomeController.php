<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Http\Resources\SkillResource;
use App\Models\Project;
use App\Models\Skill;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('Home', [
            'skills' => SkillResource::collection(
                Skill::query()->orderBy('sort_order')->orderBy('id')->get(),
            )->resolve(),
            'projects' => ProjectResource::collection(
                Project::query()->orderBy('sort_order')->orderBy('id')->get(),
            )->resolve(),
        ]);
    }
}
