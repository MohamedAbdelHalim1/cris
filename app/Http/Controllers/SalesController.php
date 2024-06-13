<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'age' => 'nullable|integer|min:0',
        ]);

        // Store the data in the sales table
        Sale::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'phone' => $request->phone,
            'age' => $request->age,
        ]);

        // Redirect to the home page with a success message
        return redirect('/')->with('success', 'Data saved successfully!');
    }

    public function my_sales(){
        $sales = Sale::where('user_id',Auth::id())->get();
        return view('sales',compact('sales'));
    }

    public function edit($id){
        $sale = Sale::findOrFail($id);
        return view('edit',compact('sale','id'));
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
        return redirect()->back()->with('success','Updated!');
    }

    public function destroy($id){
        $sale = Sale::findOrFail($id);
        $sale->delete();
        return redirect()->back()->with('success','Deleted!');
    }
}
