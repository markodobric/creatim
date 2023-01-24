@extends('layout')

@section('content')
    <div class="ml-4 text-lg leading-7 font-semibold">
        <a href="{{ route('individuals.create') }}" class="underline text-gray-900 dark:text-white">Create Individual</a>
        <br>
        <br>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
            </tr>
            @foreach($individuals as $individual)
                <tr>
                    <td>{{ $individual->id }}</td>
                    <td>{{ $individual->full_name }}</td>
                    <td>{{ $individual->email }}</td>
                    <td>{{ $individual->phone_number }}</td>
                    <td>
                        <a href="{{ route('individuals.show', $individual->id) }}" class="underline text-gray-700 dark:text-white">Show</a>
                        <a href="{{ route('individuals.edit', $individual->id) }}" class="underline text-gray-700 dark:text-white">Edit</a>
                        <a href="{{ route('individuals.delete', $individual->id) }}" class="underline text-gray-700 dark:text-white">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
