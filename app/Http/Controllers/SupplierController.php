<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = DB::table('suppliers')->get();
        return view('admin.supplier', ['suppliers' => $supplier]);
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contact' => 'required'
        ]);
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->contact = $request->contact;
        // dd($category);
        $supplier->save();
        return back()->with('message', 'Supplier Added Successfully!');
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required',
            'contact' => 'required'
        ]);
        $supplier->name = $request->name;
        $supplier->contact = $request->contact;
        // dd($category);
        $supplier->save();
        return back()->with('message', 'Supplier Updated Successfully!');
    }

    public function delete(Supplier $supplier)
    {
        $supplier->delete();
        return back()->with('message', 'Supplier Deleted Successfully!');
    }
}
