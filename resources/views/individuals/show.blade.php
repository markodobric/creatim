@extends('layout')

@section('content')
    <div class="ml-4 text-lg leading-7 font-semibold">
        ID: {{ $individual->id }}
    </div>
    <div class="ml-4 text-lg leading-7 font-semibold">
        Name: {{ $individual->full_name }}
    </div>
    <div class="ml-4 text-lg leading-7 font-semibold">
        Email: {{ $individual->email }}
    </div>
    <div class="ml-4 text-lg leading-7 font-semibold">
        Phone Number: {{ $individual->phone_number }}
    </div>
    <div class="ml-4 text-lg leading-7 font-semibold">
        <a href="{{ route('individuals.index') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Back</a>
    </div>
@endsection
