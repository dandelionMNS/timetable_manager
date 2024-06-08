<x-app-layout>
    <style>
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

        [type=text] {
            border: none !important;
            padding: 0 10px !important;
            width: 100%;
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List of Classrooms
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full">
                    <thead>
                        <td class="w-min">No.</td>
                        <td class="w-full">Name</td>

                    </thead>
                    <tbody>
                        <div class="hidden">
                            <?= $counter=1 ?>
                        </div>
                        <tr>
                            <td></td>
                            <td class="flex justify-center">
                                <form class="flex gap-3" method="POST" action="{{ route('classroom.add')}}">
                                    @csrf
                                    <input style="border: 2px solid #818cf8 !important" type="text" name="name">
                                    <input type="submit" value="Add Classroom"
                                        class=" add-btn flex justify-center items-center">
                                </form>

                            </td>

                        </tr>
                        @foreach ($classrooms as $classroom)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td class="flex gap-3">

                                    <form class="flex w-full gap-3" method="POST" action="{{ route('classroom.update', $classroom->id)}}">
                                        @csrf
                                        @method('PUT')

                                        <input type="text" id="name" name="name" value="{{ $classroom->name }}" required>
                                        <input type="submit" value="Update">
                                    </form>

                                    <form class="w-fit" method="POST"
                                        action="{{ route('classroom.delete', ['id' => $classroom->id]) }}">

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