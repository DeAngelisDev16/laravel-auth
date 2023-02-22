<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create', ["project" => new Project()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|min:5|max:50|unique:projects,title',
                'description' => 'required|min:20',
                'github_reference' => 'required|min:10',




            ],
            [
                'title.required' => 'Nel titolo devi inserire almeno 5 caratteri',
                'title.unique' => 'Il progetto risulta già esistente',
                'description.required' => 'Inserisci una descrizione valida, composta da almeno 20 caratteri',
                'github_reference.required' => 'Inserisci un URL Github valido',


            ]
        );

        $newData = $request->all();
        $newProject = new Project();
        $newProject->slug = Str::slug($newData['title']);
        $newProject->title = $newData['title'];
        $newProject->description = $newData['description'];
        $newProject->github_reference = $newData['github_reference'];
        $newProject->save();
        return redirect()->route('admin.projects.show', $newProject->id);
    }




    /**
     * Display the specified resource.
     *
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate(
            [
                'title' => 'required|min:5|max:50|unique:projects,title',
                'description' => 'required|min:20',
                'github_reference' => 'required|min:10',




            ],
            [
                'title.required' => 'Nel titolo devi inserire almeno 5 caratteri',

                'description.required' => 'Inserisci una descrizione valida, composta da almeno 20 caratteri',
                'github_reference.required' => 'Inserisci un URL Github valido',


            ]
        );

        $newData = $request->all();
        //$project = new Project();
        $project->slug = Str::slug($newData['title']);
        $project->title = $newData['title'];

        $project->description = $newData['description'];
        $project->github_reference = $newData['github_reference'];
        $project->update();
        return redirect()->route('admin.projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {

        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
