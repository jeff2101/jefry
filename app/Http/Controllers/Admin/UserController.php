<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Fetch all users from the database
        $users = User::all();
        return view('pages.admin.user.index', compact('users'));
    }

    public function create()
    {
        // Return the create user form
        return view('pages.admin.user.create');
    }

    public function store(Request $request)
    {
        // Validate and store the new user
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'point' => 'nullable|integer',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'point' => $request->point,
        ]);

        return redirect()->route('admin.user')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        // Fetch the user to be edited
        $user = User::findOrFail($id);
        return view('pages.admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the user
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
            'point' => 'nullable|integer',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'point' => $request->point,
        ]);

        return redirect()->route('admin.user')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        // Delete the user
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user')->with('success', 'User deleted successfully.');
    }

    public function show($id)
    {
        // Show the user details
        $user = User::findOrFail($id);
        return view('pages.admin.user.detail', compact('user'));
    }
}
