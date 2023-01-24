@extends('layout')

@section('content')
    <div class="ml-4 text-lg leading-7 font-semibold">
        ID: {{ $legal_entity->id }}
    </div>
    <div class="ml-4 text-lg leading-7 font-semibold">
        Tax Number: {{ $legal_entity->tax_number }}
    </div>
    <div class="ml-4 text-lg leading-7 font-semibold">
        <a href="{{ route('legal_entities.index') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Back</a>
    </div>
@endsection
