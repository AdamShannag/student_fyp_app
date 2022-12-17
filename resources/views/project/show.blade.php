<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View project') }}
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
        <?php $level = Auth::user()->userLevel; ?>
        <div class="block p-6 rounded-lg shadow-lg bg-white ">
            <h5 class="text-gray-900 text-xl leading-tight font-medium mb-4">{{ $project->title }}</h5>
            <hr>
            <p class="text-gray-700 text-base mb-4 mt-4">
                <strong>Project start date: </strong>
                @if ($project->start_date)
                    {{ $project->start_date }}
                @else
                    Not set
                @endif
            </p>
            <p class="text-gray-700 text-base mb-4">
                <strong>Project end date: </strong>
                @if ($project->end_date)
                    {{ $project->end_date }}
                @else
                    Not set
                @endif
            </p>
            <p class="text-gray-700 text-base mb-4">
                <strong>Project duration: </strong>
                @if ($project->duration)
                    {{ $project->duration }} months
                @else
                    Not set
                @endif
            </p>
            <p class="text-gray-700 text-base mb-4">
                <strong>Project progress: </strong> {{ $project->progress }}
            </p>
            <p class="text-gray-700 text-base mb-4">
                <strong>Project status:</strong> {{ $project->status }}
            </p>
            <p class="text-gray-700 text-base mb-4">
                <strong>Student: </strong> {{ $student->first_name }} {{ $student->last_name }}
            </p>
            <?php $supervisor = $project
                ->lecturers()
                ->where('job', 'supervisor')
                ->get()[0]; ?>
            <p class="text-gray-700 text-base mb-4">
                <strong>Supervisor:</strong> {{ $supervisor->first_name }} {{ $supervisor->last_name }}
            </p>
            <?php $examiners = $project
                ->lecturers()
                ->where('job', 'examiner')
                ->get(); ?>
                <?php $i=1;?>
            @foreach ($examiners as $lecturer)
                <p class="text-gray-700 text-base mb-4">
                    <strong>Examiner {{ $i++ }}: </strong> {{ $lecturer->first_name }}
                    {{ $lecturer->last_name }}
                </p>
            @endforeach

            <div class="flex justify-center">
                <div class="grid grid-cols-auto @if ($level < 3) grid-cols-3 @endif  gap-4 max-w-xl ">
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
                        href="{{ route('project.index') }}">Back</a>
                        @if (Auth::user()->email === $supervisor->email || $level<3)

                    <a href="{{ route('project.edit', $project->id) }}"
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
                @endif
                    @if ($level < 3)
                        <form class="inline-block" action="{{ route('project.destroy', $project->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this project?')"
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
                    @endif


                </div>
            </div>
</x-app-layout>
