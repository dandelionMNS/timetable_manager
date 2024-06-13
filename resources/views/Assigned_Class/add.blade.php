<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Assigning Class for: {{$course->code}} Semester {{$course->semester}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex flex-col items-center p-5 shadow-sm sm:rounded-lg">

                <form class="user-form w-full lg:w-1/2 flex flex-col p-5 gap-5" method="POST"
                    action="{{ route('ac.add',['c_id'=>$course->id])}}">
                    @csrf
                    @method('POST')

                    <div>
                        <label for="subject">
                            Subject:
                        </label>
                        <select id="subject" name="subject_id">
                            @foreach ($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->code}} - {{$subject->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="instructor_id">
                            Instructor:
                        </label>
                        <select id="instructor" name="instructor_id">
                            @foreach ($instructors as $instructor)
                                <option value="{{$instructor->id}}">{{$instructor->matric_no}} - {{$instructor->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="location">
                            Location:
                        </label>
                        <select id="location" name="location_id">
                            @foreach ($locations as $location)
                                <option value="{{$location->id}}">{{$location->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div>
                        <label for="day">
                        Day:
                        </label>
                        <select id="day_id" name="day_id">
                            @foreach ($days as $day)
                                <option value="{{$day->id}}">{{$day->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div2 class="flex gap-5">
                        <div>
                            <label for="time_start">Start Time:</label>
                            <input type="time" id="time_start" name="time_start" required>
                        </div>

                        <div>
                            <label for="time_end">End Time:</label>
                            <input type="time" id="time_end" name="time_end">
                        </div>
                    </div2>

                    <input type="hidden" name="course_id" value="{{$course->id}}" required>

                    <div>

                        <div class="flex w-full gap-2" style="flex-direction: row">
                            <input type="submit" value="Assign Class">
                        </div>

                    </div>
                </form>


            </div>
        </div>
    </div>
</x-app-layout>