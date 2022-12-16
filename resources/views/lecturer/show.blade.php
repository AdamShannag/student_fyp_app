<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View lecturer') }}
        </h2>
    </x-slot>

    <div class="p-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="bg-gray-50 rounded-lg py-5 px-6 mb-4 text-base text-gray-500 mb-3" role="alert">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="block p-6 rounded-lg shadow-lg bg-white ">
            <h5 class="text-gray-900 text-xl leading-tight font-medium mb-4">{{ $lecturer->first_name }} {{ $lecturer->last_name }}</h5>
            <hr>
            <p class="text-gray-700 text-base mb-4 mt-4">
                <strong>Email: </strong> {{ $lecturer->email }}
            </p>
            <p class="text-gray-700 text-base mb-4">
                <strong>Phone number: </strong> {{ $lecturer->phone_number }}
            </p>
            <div class="flex justify-center">
                <div class="grid grid-cols-3 gap-4 max-w-xl ">
                    <a class="
            w-full
            px-7
            py-3
            bg-gray-600
            text-white
            font-medium
            text-xs
            leading-tight
            uppercase
            rounded
            shadow-md
            hover:bg-gray-700 hover:shadow-lg
            focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0
            active:bg-gray-800 active:shadow-lg
            transition
            duration-150
            ease-in-out"
                        href="{{ route('lecturer.index') }}">Back</a>
                    <a  href="{{ route('lecturer.edit', $lecturer->id) }}"
                        class="
                w-full
                px-8
                py-3
                bg-blue-600
                text-white
                font-medium
                text-xs
                leading-tight
                uppercase
                rounded
                shadow-md
                hover:bg-blue-700 hover:shadow-lg
                focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                active:bg-blue-800 active:shadow-lg
                transition
                duration-150
                ease-in-out">Edit</a>
                <form class="inline-block" action="{{route('lecturer.destroy',$lecturer->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                <button type="submit"
                    onclick="return confirm('Are you sure you want to delete this lecturer?')"
                    class="w-full
                px-6
                py-3
                bg-red-600
                text-white
                font-medium
                text-xs
                leading-tight
                uppercase
                rounded
                shadow-md
                hover:bg-red-700 hover:shadow-lg
                focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0
                active:bg-red-800 active:shadow-lg
                transition
                duration-150
                ease-in-out"">Delete</button>
                </form>
                </div>
            </div>
</x-app-layout>
