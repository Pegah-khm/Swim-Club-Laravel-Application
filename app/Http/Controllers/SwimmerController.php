<?php

namespace App\Http\Controllers;

use App\Models\Squad;
use App\Models\TrainingPerformance;
use Illuminate\Http\Request;
use App\Models\User;


class SwimmerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $swimmers = User::where('role', 'swimmer')->paginate(8);
        return view('swimmers.index', compact('swimmers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('swimmers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:80|unique:users,username',
            'forename' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'dob' => 'required|date',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:7|max:20',
            'phone' => 'required|string|max:40',
            'address' => 'required|string|max:255',
            'postcode' => 'required|string|max:20',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $validated['role'] = 'swimmer';

        User::create($validated);

        return redirect()->route('swimmers.index')->with('success', 'Swimmer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $swimmer = User::with(['squad.coach', 'trainingPerformances'])
            ->where('role', 'swimmer')
            ->findOrFail($id);

        $performance = TrainingPerformance::where('user_id', $swimmer->id)->get();

        $squad = Squad::find($swimmer->squad_id);
        $coach = $squad ? User::find($squad->coach_id) : null;

        return view('swimmers.show', [
            'heading' => 'Swimmer',
            'swimmer' => $swimmer,
            'performance' => $performance,
            'squad' => $squad,
            'coach' => $coach,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $swimmer = User::findOrFail($id);

        $squad = null;
        if (!is_null($swimmer->squad_id)) {
            $squad = Squad::find($swimmer->squad_id);
        }

        $coach = null;
        if (!is_null($swimmer->squad_id)) {
            $squad = Squad::with('coach')->find($swimmer->squad_id);
            $coach = $squad?->coach;
        }

        $allSquads = Squad::all();

        return view('swimmers.edit', [
            'swimmer' => $swimmer,
            'squad' => $squad,
            'coach' => $coach,
            'allSquads' => $allSquads,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $swimmer = User::findOrFail($id);

        $validated = $request->validate([
            'forename' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'dob' => 'required|date',
            'email' => 'required|email|max:255|unique:users,email,' . $swimmer->id,
            'phone' => 'required|string|max:40',
            'address' => 'required|string|max:255',
            'postcode' => 'required|string|max:20',
            'squad_id' => 'required|exists:squads,id',
        ]);

        $swimmer->update($validated);

        return redirect()->route('swimmers.index')->with('success', 'Swimmer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $swimmer = User::findOrFail($id);
        $swimmer->delete();

        return redirect()->route('swimmers.index')->with('success', 'Swimmer deleted successfully.');
    }
}
