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
            List of Batches
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col items-center">
                <div class="w-full p-10 flex justify-center flex-wrap">

                    <form id="newBatch" class="flex gap-3" method="POST" action="{{ route('batch.add')}}">
                        @csrf
                        <input style="border: 2px solid #818cf8 !important" type="text" name="intake"
                            placeholder="Intake: 2023/Q1" required>
                        <input style="border: 2px solid #818cf8 !important" type="text" name="semester"
                            placeholder="Semester: 1" required>
                        <input type="submit" value="Add Batch" class=" add-btn flex justify-center items-center">
                    </form>
                </div>
                <table class="w-11/12">
                    <tbody>
                        <div class="hidden">
                            <?= $counter=1 ?>
                        </div>
                        <tr>
                            <td>No.</td>
                            <td>Intake</td>
                            <td colspan="2">Semester</td>
                        </tr>
                        @foreach ($batches as $batch)
                            <tr>
                                <td class="w-min">
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <form class="flex w-full gap-3" method="POST"
                                        action="{{ route('batch.update', $batch->id)}}">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="intake" value="{{$batch->intake}}" required>
                                </td>

                                <td class="w-full">
                                    <input type="text" name="semester" value="{{$batch->semester}}">
                                </td>

                                <td class="gap-3 flex">
                                    <input type="submit" value="Update">
                                    </form>

                                    <form class="w-fit" method="POST"
                                        action="{{ route('batch.delete', ['id' => $batch->id]) }}">

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