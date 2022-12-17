<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Project') }}
        </h2>
    </x-slot>
    <div class="p-5 mt-3">
        @if (session('error'))
            <div class="bg-gray-50 rounded-lg py-5 px-6 mb-4 text-base text-gray-500 mb-3" role="alert">
                {{ session('error') }}</div>
        @endif
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
            <form method="POST" action="{{ route('project.update', $project->id) }}">
                @method('PUT')
                @csrf
                <div class="grid grid-cols-2 gap-4 ">

                    <div class="form-group mb-4">
                        <label class="text-gray-700">Title</label>
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
                            id="title" name="title" placeholder="Title" value="{{ $project->title }}">
                    </div>
                    <div class="form-group mb-4">
                        <label class="text-gray-700">Student</label>
                        <input type="hidden" name="student_id" value={{ $current_student->id }}
                            @if ($level <= 2) disabled @endif>
                        <select @if ($level > 2) disabled @endif name="student_id"
                            class="form-select appearance-none
                        block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding bg-no-repeat
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            aria-label="Default select example">
                            <option value="{{ $current_student->id }}" selected>{{ $current_student->first_name }}
                                {{ $current_student->last_name }}</option>
                            @foreach ($available_students as $student)
                                <option value="{{ $student->id }}">{{ $student->first_name }}
                                    {{ $student->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 ">
                    <div class="form-group mb-4">
                        <div class="datepicker relative form-floating mb-3 ">
                            <label class="text-gray-700">Start date</label>
                            <input type="date" name="start_date"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                value="{{ $project->start_date }}" />
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="datepicker relative form-floating mb-3">
                            <label class="text-gray-700">End date</label>
                            <input type="date" name="end_date"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                value="{{ $project->end_date }}" />
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 ">
                    <div class="form-group mb-4">
                        <label class="text-gray-700">Status</label>
                        <select name="status"
                            class="form-select appearance-none
                        block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding bg-no-repeat
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            aria-label="Default select example">
                            <option selected value="{{ $project->status }}">{{ $project->status }}</option>
                            <option value="On track">On track</option>
                            <option value="Delayed">Delayed</option>
                            <option value="Extended">Extended</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label class="text-gray-700">Progress</label>
                        <select name="progress"
                            class="form-select appearance-none
                        block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding bg-no-repeat
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            aria-label="Default select example">
                            <option selected value="{{ $project->progress }}">{{ $project->progress }}</option>
                            <option value="Milestone 1">Milestone 1</option>
                            <option value="Milestone 2">Milestone 2</option>
                            <option value="Final Report">Final Report</option>
                        </select>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="text-gray-700">Supervisor</label>
                    <input type="hidden" name="supervisor_id" value={{ $project->lecturers[0]->id }}
                        @if ($level <= 2) disabled @endif>
                    <select @if ($level > 2) disabled @endif name="supervisor_id"
                        class="form-select appearance-none
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding bg-no-repeat
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        aria-label="Default select example">
                        <option selected value="{{ $project->lecturers[0]->id }}">
                            {{ $project->lecturers[0]->first_name }} {{ $project->lecturers[0]->last_name }}</option>
                        @foreach ($lecturers as $lecturer)
                            <option value="{{ $lecturer->id }}">{{ $lecturer->first_name }}
                                {{ $lecturer->last_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label class="text-gray-700">Examiner 1</label>
                    <input type="hidden" name="examiner_1_id" value={{ $project->lecturers[1]->id }}
                        @if ($level <= 2) disabled @endif>
                    <select @if ($level > 2) disabled @endif name="examiner_1_id"
                        class="form-select appearance-none
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding bg-no-repeat
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        aria-label="Default select example">
                        <option selected value="{{ $project->lecturers[1]->id }}">
                            {{ $project->lecturers[1]->first_name }} {{ $project->lecturers[1]->last_name }}</option>
                        @foreach ($lecturers as $lecturer)
                            <option value="{{ $lecturer->id }}">{{ $lecturer->first_name }}
                                {{ $lecturer->last_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label class="text-gray-700">Examiner 2</label>
                    <input type="hidden" name="examiner_2_id" value={{ $project->lecturers[2]->id }}
                        @if ($level <= 2) disabled @endif>
                    <select @if ($level > 2) disabled @endif name="examiner_2_id"
                        class="form-select appearance-none
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding bg-no-repeat
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        aria-label="Default select example">
                        <option selected value="{{ $project->lecturers[2]->id }}">
                            {{ $project->lecturers[2]->first_name }} {{ $project->lecturers[2]->last_name }}</option>
                        @foreach ($lecturers as $lecturer)
                            <option value="{{ $lecturer->id }}">{{ $lecturer->first_name }}
                                {{ $lecturer->last_name }}</option>
                        @endforeach
                    </select>
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
                            href="{{ route('project.index') }}">Back</a>

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
