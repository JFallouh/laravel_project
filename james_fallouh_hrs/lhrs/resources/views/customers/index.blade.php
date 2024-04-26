<!-- resources/views/customers/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Customers</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        {{ $customers->links() }}
    </div>
@endsection
