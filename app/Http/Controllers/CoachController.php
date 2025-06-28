<?php

namespace App\Http\Controllers;

use App\Models\Squad;
use App\Models\User;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coaches = User::with('coachedSquad')->where('role', 'coach')->paginate(8);
        return view('coaches.index', compact('coaches'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allSquads = Squad::all();
        return view('coaches.create');
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
        $validated['role'] = 'coach';

        User::create($validated);

        return redirect()->route('coaches.index')->with('success', 'Coach created successfully.');    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $coach = User::with('coachedSquad')
            ->where('role', 'coach')
            ->findOrFail($id);

        return view('coaches.show', [
            'heading' => 'Coach Profile',
            'coach' => $coach
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coach = User::findOrFail($id);

        $squad = null;
        if (!is_null($coach->squad_id)) {
            $squad = Squad::find($coach->squad_id);
        }

        return view('coaches.edit', [
            'coach' => $coach,
            'squad' => $squad
        ]);    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $coach = User::findOrFail($id);

        $validated = $request->validate([
            'forename' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'dob' => 'required|date',
            'email' => 'required|email|max:255|unique:users,email,' . $coach->id,
            'phone' => 'required|string|max:40',
            'address' => 'required|string|max:255',
            'postcode' => 'required|string|max:20',
        ]);

        $coach->update($validated);

        return redirect()->route('coaches.index')->with('success', 'Coach updated successfully.');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coach = User::findOrFail($id);
        $coach->delete();

        return redirect()->route('coaches.index')->with('success', 'Coach deleted successfully.');
    }
}
