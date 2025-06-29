<?php

namespace App\Http\Controllers;

use App\Models\Squad;
use App\Models\User;
use Illuminate\Http\Request;

class SquadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $squads = Squad::with(['coach', 'swimmers'])->get();
        return view('squads.index', compact('squads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $coaches = User::where('role', 'coach')->get();
        return view('squads.create', compact('coaches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:squads,name',
            'coach_id' => 'nullable|exists:users,id',
        ]);

        Squad::create($validated);

        return redirect()->route('squads.index')->with('success', 'Squad created successfully!');    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $squad = Squad::findOrFail($id);
        $coaches = User::where('role', 'coach')->get();

        return view('squads.edit', compact('squad', 'coaches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'coach_id' => 'nullable|exists:users,id',
        ]);

        $squad = Squad::findOrFail($id);
        $squad->update($validated);

        return redirect()->route('squads.index')->with('success', 'Squad updated successfully.');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $squad = Squad::findOrFail($id);
        $squad->delete();

        return redirect()->route('squads.index')->with('success', 'Squad deleted successfully.');
    }

    public function removeSwimmer(Squad $squad, User $user)
    {
        if ($user->squad_id === $squad->id) {
            $user->squad_id = null;
            $user->save();
            return back()->with('success', 'Swimmer removed from squad.');
        }

        return back()->with('error', 'This swimmer does not belong to this squad.');
    }

}
