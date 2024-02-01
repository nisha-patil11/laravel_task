<!-- resources/views/clients/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Client List</h1>

    <a href="{{ route('client.create') }}" class="btn btn-success">Add Client</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>City</th>
                <th>Notes</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->address }}</td>
                    <td>{{ $client->city }}</td>
                    <td>{{ $client->notes }}</td>
                    <td>
                        <a href="{{ route('client.edit', $client->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('client.destroy', $client->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" >Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
