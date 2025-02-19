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

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
    <script>

        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth'
            });
            calendar.render();
        });

    </script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Timetable for Scheduled Class
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col items-center ">
                <div class="timetable">
                    <table>
                        <thead>
                            <tr>                                
                                @foreach ($timeslots as $slot)
                                    <th>{{ $slot->time }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= 7; $i++)
                                                <tr>
                                                    <td>{{ $days[$i - 1]->name }}</td>
                                                    @for ($j = 1; $j <= count($timeslots); $j++)
                                                                            @php
                                                                                $found = false;
                                                                            @endphp
                                                                            @foreach ($schedules as $schedule)
                                                                                            @if ($schedule->day_id == $i && $schedule->start_id == $j)
                                                                                                            @php
                                                                                                                $found = true;
                                                                                                                // Adjust colspan to span only to the slot before end_id
                                                                                                                $colspan = $schedule->end_id - $schedule->start_id;
                                                                                                            @endphp
                                                                                                            <td colspan="{{ $colspan }}">
                                                                                                                {{ $schedule->subject->name }} <br><strong>{{ $schedule->instructor->name }}</strong>
                                                                                                            </td>
                                                                                                            @for ($k = 1; $k < $colspan; $k++)
                                                                                                                @php                    $j++; @endphp
                                                                                                            @endfor
                                                                                            @endif
                                                                            @endforeach
                                                                            @if (!$found)
                                                                                <td></td>
                                                                            @endif
                                                    @endfor
                                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>


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
                                <td class="text-nowrap text-center">{{$schedule->start->time}} - {{$schedule->end->time}}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>