<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        // VALIDATION in StoreProjectRequest


        $form_data = $request->validated();

        $new_project = new Project();

        $new_project->name = $form_data['name'];
        $new_project->link = $form_data['link'];
        $new_project->date_of_creation = $form_data['date_of_creation'];        
        $new_project->is_public = $request->input('type');        
        $new_project->contributors = $form_data['contributors'];
        $new_project->contributors_name = $form_data['contributors_name'];
        $new_project->description = $form_data['description'];
        $new_project->slug = Str::slug($new_project->name);

        //dd($new_project);

        $new_project->save();

        return to_route("admin.projects.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view("admin.projects..edit", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //VALIDATION in UpdateProjectRequest

        
        $form_data = $request->validated();

        $project->fill($form_data);
        $project->slug = Str::slug($project->name);

        $project->save();

        return to_route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return to_route('admin.projects.index');
    }
}
