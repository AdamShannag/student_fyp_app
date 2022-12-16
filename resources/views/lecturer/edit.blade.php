<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Lecturer') }}
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
            <form method="POST" action="{{ route('lecturer.update', $lecturer->id) }}">
                @method('PUT')
                @csrf
                <div class="grid grid-cols-2 gap-4 ">

                    <div class="form-group mb-4">
                        <label class="text-gray-700">First Name</label>
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
                            id="first_name" name="first_name" placeholder="First Name"
                            value="{{ $lecturer->first_name }}">
                    </div>

                    <div class="form-group mb-4">
                        <label class="text-gray-700">Last Name</label>
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
                            id="last_name" name="last_name" placeholder="Last Name" value="{{ $lecturer->last_name }}">
                    </div>

                </div>

                <div class="form-group mb-4">
                    <label class="text-gray-700">Email</label>
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
                        id="email" name="email" placeholder="Email" value="{{ $lecturer->email }}">
                </div>

                <div class="form-group mb-4">
                    <label class="text-gray-700">Phone Number</label>
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
                        id="phone_number" name="phone_number" placeholder="Phone Number"
                        value="{{ $lecturer->phone_number }}">
                </div>


                <div class="flex justify-center">
                    <div class="grid grid-cols-2 gap-4 max-w-xl ">
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
                    ease-in-out">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
