<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('client.index', compact('clients'));
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients',
            'address' => 'required',
            'city' => 'required',
            'notes' => 'nullable',
        ]);

        Client::create($request->all());

        return redirect()->route('client.index')->with('success', 'Client created successfully');
    }

    public function edit(Client $client)
    {
        return view('client.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'address' => 'required',
            'city' => 'required',
            'notes' => 'nullable',
        ]);

        $client->update($request->all());

        return redirect()->route('client.index')->with('success', 'Client updated successfully');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('client.index')->with('success', 'Client deleted successfully');
    }

}
