<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project; 
class ProjectController extends Controller

{
   
    public function index()
    {
        $projects = Project::all();  
        return view('projects.index', compact('projects'));
    }

   
    public function create()
    {
        return view('projects.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([  
            'name' => 'required',  
            'description' => 'required',  
            'status' => 'required',  
            'responsible' => 'required',  
            'start_date' => 'required|date',  
            'end_date' => 'required|date|after_or_equal:start_date',  
        ]);  
        Project::create($request->all());  
        return redirect()->route('projects.index')->with('success', 'Projekt je uspešno kreiran.');
    }

    
    
    public function show(string $id)  
    {  
        $project = Project::findOrFail($id); // Preuzimamo projekat  
        return view('projects.show', compact('project')); // Vraćanje pogleda  
    }    


    
    public function edit(string $id)
    {
        $project = Project::findOrFail($id); // Preuzimamo projekat  
        return view('projects.edit', compact('project'));  
    }

    
    public function update(Request $request, string $id)  
{  
    $project = Project::findOrFail($id); // Preuzimamo projekat  
    $request->validate([  
        'name' => 'required',  
        'description' => 'required',  
        'status' => 'required',  
        'responsible' => 'required',  
        'start_date' => 'required|date',  
        'end_date' => 'required|date|after_or_equal:start_date' // Ispravka  
    ]);  
    $project->update($request->all());  
    return redirect()->route('projects.index')->with('success', 'Projekt je uspešno ažuriran.');  
}

    public function destroy(string $id)
    {    $project = Project::findOrFail($id);
        $project->delete();  
        return redirect()->route('projects.index')->with('success', 'Projekt je uspešno obrisan.');  

    }
}