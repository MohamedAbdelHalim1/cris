<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->get(); // Fetch users who are not admins

        return view('dashboard.index', compact('users'));
    }

    public function create()
    {
        return view('dashboard.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'sales', // Assuming default role is 'sales'
        ]);

        return redirect()->route('dashboard')->with('success', 'User created successfully.');
    }
    public function show($id){
        $sales = Sale::where('user_id',$id)->get();
        return view('dashboard.show' , compact('sales'));
    }
    public function edit($id){
        $sale = Sale::findOrFail($id);
        return view('dashboard.edit',compact('sale','id'));
    }
    
    public function update(Request $request , $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'age' => 'nullable|integer|min:0',
        ]);

        $sale = Sale::findOrFail($id);
        $sale->name = $request->name;
        $sale->phone = $request->phone;
        $sale->age = $request->age;
        $sale->save();
        return redirect()->route('dashboard')->with('success','Updated!');
    }

    public function destroy($id){
        $sale = Sale::where('id',$id)->first();
        $sale->delete();
        return redirect()->route('dashboard')->with('success','Deleted!');
    }
}
