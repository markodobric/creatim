@extends('layout')

@section('content')
    <div class="ml-4 text-lg leading-7 font-semibold">
        <form method="POST" action="{{ route('individuals.store') }}">
            @csrf
            <div class="sm:col-span-3">
                <label for="title" class="">
                    Full Name
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                    <input name="full_name" value="{{ old('full_name') }}" class="flex-1 form-input block w-full min-w-0 rounded-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                @error('full_name')
                <p class="mt-2 text-sm text-red-500">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="sm:col-span-3">
                <label for="title" class="">
                    Email
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                    <input name="email" value="{{ old('email') }}" class="flex-1 form-input block w-full min-w-0 rounded-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                @error('email')
                <p class="mt-2 text-sm text-red-500">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="sm:col-span-3">
                <label for="title" class="">
                    Phone Number
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                    <input name="phone_number" value="{{ old('phone_number') }}" class="flex-1 form-input block w-full min-w-0 rounded-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                @error('phone_number')
                <p class="mt-2 text-sm text-red-500">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mt-8 pt-5">
                <div class="flex justify-end">
                    <span class="inline-flex rounded-md shadow-sm mr-px">
                        <a href="{{ route('individuals.index') }}" class="py-1 px-4 border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                            Cancel
                        </a>
                    </span>
                    <span class="ml-3 inline-flex rounded-md shadow-sm">
                        <button type="submit" class="">
                            Save
                        </button>
                    </span>
                </div>
            </div>
        </form>
    </div>
@endsection
