<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Projects') }}
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


        {{-- TABLE --}}


        <div class="w-full mb-12 xl:mb-0 px-4 mx-auto mt-5">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">

                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                      <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-base text-blueGray-700">Projects</h3>
                      </div>
                      <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                        <a
                        class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        href="{{route('project.create')}}">New project</a>
                    </div>
                    </div>
                  </div>



                <div class="block w-full overflow-x-auto">
                    <table class="items-center bg-transparent w-full border-collapse ">
                        <thead class="border-b bg-gray-800">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                    #
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                    Project title
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                    Student
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                    Supervisor
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                    Examiner 1
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                    Examiner 2
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                    Status
                                </th>
                                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                    Actions
                                </th>
                            </tr>
                        </thead class="border-b">
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($projects as $project)
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $i++ }}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $project->title }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        @foreach ($students as $student)
                                            @if ($student->id === $project->student_id)
                                                {{ $student->first_name }} {{ $student->last_name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    @foreach ($project->lecturers as $lecturer)
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $lecturer->first_name }} {{ $lecturer->last_name }}
                                        </td>
                                    @endforeach
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $project->status }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('project.show', $project->id) }}"
                                            class="w-full
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
                                        ease-in-out"">Show</a>
                                        <a href="{{ route('project.edit', $project->id) }}"
                                            class="w-full
                                        px-6
                                        py-2.5
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
                                        ease-in-out"">Edit</a>
                                        <form class="inline-block" action="{{route('project.destroy',$project->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Are you sure you wbuttonnt to delete this project?')"
                                            class="w-full
                                        px-6
                                        py-2.5
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
                                    </td>
                                </tr class="bg-white border-b">
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

</x-app-layout>
