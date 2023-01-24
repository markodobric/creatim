@extends('layout')

@section('content')
    <div class="ml-4 text-lg leading-7 font-semibold">
        <a href="{{ route('legal_entities.create') }}" class="underline text-gray-900 dark:text-white">Create Legal Entity</a>
        <br>
        <br>
        <table>
            <tr>
                <th>ID</th>
                <th>Tax Number</th>
                <th>Action</th>
            </tr>
            @foreach($legal_entities as $legal_entity)
                <tr>
                    <td>{{ $legal_entity->id }}</td>
                    <td>{{ $legal_entity->tax_number }}</td>
                    <td>
                        <a href="{{ route('legal_entities.show', $legal_entity->id) }}" class="underline text-gray-700 dark:text-white">Show</a>
                        <a href="{{ route('legal_entities.edit', $legal_entity->id) }}" class="underline text-gray-700 dark:text-white">Edit</a>
                        <a href="{{ route('legal_entities.delete', $legal_entity->id) }}" class="underline text-gray-700 dark:text-white">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
