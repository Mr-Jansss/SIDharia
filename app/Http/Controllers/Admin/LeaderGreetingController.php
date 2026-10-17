<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeaderGreeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LeaderGreetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $greetings = LeaderGreeting::latest()->paginate(10);
        return view('admin.leader-greetings.index', compact('greetings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.leader-greetings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'leader_name' => 'required|string|max:255',
            'leader_position' => 'required|string|max:255',
            'greeting_text' => 'required|string',
            'leader_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('leader_photo')) {
            $validated['leader_photo'] = $request->file('leader_photo')->store('leader-greetings', 'public');
        }

        // Jika sambutan ini diaktifkan, non-aktifkan yang lain
        if ($request->is_active) {
            LeaderGreeting::where('is_active', true)->update(['is_active' => false]);
        }

        LeaderGreeting::create($validated);

        return redirect()->route('admin.leader-greetings.index')
            ->with('success', 'Sambutan pemimpin berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LeaderGreeting $leaderGreeting)
    {
        return view('admin.leader-greetings.show', compact('leaderGreeting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeaderGreeting $leaderGreeting)
    {
        return view('admin.leader-greetings.edit', compact('leaderGreeting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LeaderGreeting $leaderGreeting)
    {
        $validated = $request->validate([
            'leader_name' => 'required|string|max:255',
            'leader_position' => 'required|string|max:255',
            'greeting_text' => 'required|string',
            'leader_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('leader_photo')) {
            // Hapus foto lama jika ada
            if ($leaderGreeting->leader_photo) {
                Storage::disk('public')->delete($leaderGreeting->leader_photo);
            }
            $validated['leader_photo'] = $request->file('leader_photo')->store('leader-greetings', 'public');
        }

        // Jika sambutan ini diaktifkan, non-aktifkan yang lain
        if ($request->is_active) {
            LeaderGreeting::where('id', '!=', $leaderGreeting->id)
                ->where('is_active', true)
                ->update(['is_active' => false]);
        }

        $leaderGreeting->update($validated);

        return redirect()->route('admin.leader-greetings.index')
            ->with('success', 'Sambutan pemimpin berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeaderGreeting $leaderGreeting)
    {
        // Hapus foto jika ada
        if ($leaderGreeting->leader_photo) {
            Storage::disk('public')->delete($leaderGreeting->leader_photo);
        }

        $leaderGreeting->delete();

        return redirect()->route('admin.leader-greetings.index')
            ->with('success', 'Sambutan pemimpin berhasil dihapus.');
    }
}
