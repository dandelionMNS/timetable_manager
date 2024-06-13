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

        #newCourse {
            flex-wrap: wrap;

            input {
                min-width: 100px;
            }
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Assigned Class for {{$course->id}} Semester {{$course->semester}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col items-center">
                <div class="w-full p-10 flex justify-center flex-wrap">

                    <a href="{{route('ac.addPage', ['c_id' => $course->id])}}" class="btn "> Assgining new class</a>
                </div>
                <table class="w-11/12">
                    <tbody>
                        <div class="hidden">
                            <?= $counter=1 ?>
                        </div>
                        <tr>
                            <td>No.</td>
                            <td>Subject</td>
                            <td>Instructor</td>
                            <td>Location</td>
                        </tr>
                        @foreach ($assigned_classes as $assigned_class)
                            <tr>
                                <td class="w-min">
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{$assigned_class->subject->name}}
                                </td>

                                <td class="w-full">
                                    {{$assigned_class->instructor->name}}
                                </td>

                                <td class="gap-3 flex">
                                </td>

                                <td>
                                    <form class="w-fit" method="POST"
                                        action="{{ route('ac.testDelete', ['id' => $assigned_class->id, 'c_id' => $course->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn dlt" type="submit" value="Remove">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>