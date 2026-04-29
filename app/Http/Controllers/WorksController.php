<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Skills;
use App\Models\Works;
use Illuminate\Http\Request;

class WorksController extends Controller
{
    public function index()
    {
        $works = Works::with(['skill', 'company'])
            ->latest()
            ->paginate(10);

        return view('Home.Company.Works.index', compact('works'));
    }

    public function create()
    {
        $skills = Skills::orderBy('skill_name')->get();
        $companies = Company::orderBy('company_name')->get();

        return view('Home.Company.Works.create', compact('skills', 'companies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_work' => ['required', 'string', 'max:255'],
            'description_work' => ['required', 'string', 'max:255'],
            'skill_id' => ['required', 'exists:skills,id'],
            'companies_id' => ['required', 'exists:companies,id'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'type_work' => ['required', 'integer'],
            'duration' => ['required', 'integer', 'min:1'],
            'payment' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'string', 'max:100'],
        ]);

        Works::create($validated);

        return redirect()
            ->route('works.index')
            ->with('success', 'Trabalho criado com sucesso.');
    }

    public function show(Works $work)
    {
        $work->load(['skill', 'company']);

        return view('Home.Company.Works.show', compact('work'));
    }

    public function edit(Works $work)
    {
        $skills = Skills::orderBy('skill_name')->get();
        $companies = Company::orderBy('company_name')->get();

        return view('Home.Company.Works.edit', compact('work', 'skills', 'companies'));
    }

    public function update(Request $request, Works $work)
    {
        $validated = $request->validate([
            'name_work' => ['required', 'string', 'max:255'],
            'description_work' => ['required', 'string', 'max:255'],
            'skill_id' => ['required', 'exists:skills,id'],
            'companies_id' => ['required', 'exists:companies,id'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'type_work' => ['required', 'integer'],
            'duration' => ['required', 'integer', 'min:1'],
            'payment' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'string', 'max:100'],
        ]);

        $work->update($validated);

        return redirect()
            ->route('works.index')
            ->with('success', 'Trabalho atualizado com sucesso.');
    }

    public function destroy(Works $work)
    {
        $work->delete();

        return redirect()
            ->route('works.index')
            ->with('success', 'Trabalho removido com sucesso.');
    }
}
