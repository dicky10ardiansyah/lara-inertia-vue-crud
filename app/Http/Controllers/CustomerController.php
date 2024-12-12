<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    // fungsi untuk menampilkan data
    public function index()
    {
        return inertia::render('index', [
            'customers' => Customer::all()->map(function ($customer) {
                return [
                    'id' => $customer->id,
                    'name' => $customer->name
                ];
            })
        ]);
    }

    // fungsi untuk menampilkan form
    public function create()
    {
        return inertia::render('create');
    }

    // fungsi untuk menyimpan data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'phone' => 'required',
        ]);

        Customer::create($validated);

        return Redirect::route('customers.index')->with('message', 'Data berhasil disimpan');
    }

    // fungsi untuk menampilkan form edit
    public function edit(Customer $customer)
    {
        return inertia::render('edit', [
            'customer' => $customer
        ]);
    }

    // fungsi untuk menyimpan data edit
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'required',
        ]);

        $customer->update($validated);

        return Redirect::route('customers.index')->with('message', 'Data berhasil diubah');
    }

    // fungsi untuk menghapus data
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return Redirect::route('customers.index')->with('message', 'Data berhasil dihapus');
    }
}
