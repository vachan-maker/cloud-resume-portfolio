<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::query()
            ->orderByDesc('is_featured')
            ->latest()
            ->get();
        $featuredProjects = Project::query()->where('is_featured',true)->get();

        return view('index', [
            'projects' => $projects,
            'featuredProjects' => $featuredProjects
        ]);
    }
}
