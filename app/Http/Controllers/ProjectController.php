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

        return view('index', [
            'projects' => $projects,
        ]);
    }
}
