<x-app-layout>
    <style>
        td form [type=text],
        td input[type=text] {
            min-width: 100px;
            border: none !important;
        }

        .add-btn {
            border: 2px #818cf8 solid;
            border-radius: 15px;
            padding: 5px 10px;
            color: #818cf8;
            transition: 300ms ease-in-out;
        }

        .add-btn:hover {
            cursor: pointer;
            background: #818cf8;
            color: white;
        }

        #newBatch {
            flex-wrap: wrap;

            input {
                min-width: 100px;
            }
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Timetable for Scheduled Class
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col items-center">
                <div class="timetable"></div>
            </div>
        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col items-center">

                <table class="w-11/12">
                    <tbody>
                        <div class="hidden">
                            <?= $counter=1 ?>
                        </div>
                        <tr>
                            <td class="text-center">No.</td>
                            <td class="text-center">Course</td>
                            <td class="text-center">Subject</td>
                            <td class="text-center">Location</td>
                            <td class="text-center">Instructor</td>
                            <td class="text-center">Day</td>
                            <td class="text-center">Time</td>

                        </tr>
                        @foreach ($schedules as $schedule)
                            <tr>
                                <td class="w-min text-center">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="text-nowrap text-center">{{$schedule->course->code}} -
                                    S{{$schedule->course->semester}}</td>
                                <td class="text-center">{{$schedule->subject->code}}</td>
                                <td class="text-center">{{$schedule->location->name}}</td>
                                <td class="text-nowrap text-center">{{$schedule->instructor->name}}</td>
                                <td class="text-center">{{$schedule->day->name}}</td>
                                <td class="text-nowrap text-center">{{$schedule->start}} - {{$schedule->end}}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>



            </div>
        </div>
    </div>
</x-app-layout>