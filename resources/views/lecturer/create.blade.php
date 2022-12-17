<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a new Lecturer') }}
        </h2>
    </x-slot>


    <div class="p-5 mt-3">

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
            <form method="POST" action="{{ route('lecturer.store') }}">
                @csrf
                <div class="form-group mb-6">
                    <input type="text"
                        class="form-control block
                  w-full
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="first_name" name="first_name" placeholder="First Name">
                </div>
                <div class="form-group mb-6">
                    <input type="text"
                        class="form-control block
                  w-full
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="last_name" name="last_name" placeholder="Last Name">
                </div>
                <div class="form-group mb-6">
                    <input type="email"
                        class="form-control block
                  w-full
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="email" name="email" placeholder="Email address">
                </div>
                <div class="form-group mb-6">
                    <input type="text"
                        class="form-control block
                  w-full
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="phone_number" name="phone_number" placeholder="Phone number">
                </div>

                <div class="flex justify-center">
                    <div class="grid grid-cols-3 gap-4 max-w-xl ">
                        <a class="
                w-full
                px-7
                py-2.5
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

                        <button type="reset"
                            class="
                w-full
                px-6
                py-2.5
                bg-yellow-500
                text-white
                font-medium
                text-xs
                leading-tight
                uppercase
                rounded
                shadow-md
                hover:bg-yellow-700 hover:shadow-lg
                focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0
                active:bg-yellow-800 active:shadow-lg
                transition
                duration-150
                ease-in-out">Reset</button>
                        <button type="submit"
                            class="
                    w-full
                    px-6
                    py-2.5
                    bg-green-600
                    text-white
                    font-medium
                    text-xs
                    leading-tight
                    uppercase
                    rounded
                    shadow-md
                    hover:bg-green-700 hover:shadow-lg
                    focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0
                    active:bg-green-800 active:shadow-lg
                    transition
                    duration-150
                    ease-in-out">Create</button>


                    </div>


                </div>

            </form>
        </div>


    </div>

</x-app-layout>
