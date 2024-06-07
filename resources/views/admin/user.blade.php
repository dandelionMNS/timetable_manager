<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Users
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full">
                    <thead>
                        <td class="w-min">No.</td>
                        <td class="w-min">ID</td>
                        <td class="w-min text-nowrap">Matrix No</td>
                        <td class="w-full">Name</td>
                        <td></td>
                    </thead>
                    <tbody>
                        <div class="hidden">
                            <?= $counter=1 ?>
                        </div>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <?= $counter++ ?>
                                </td>
                                <td>{{$user->id}}</td>
                                <td>{{$user->matric_no}}</td>
                                <td>{{$user->name}}</td>
                                <td style="padding: 15px 30px">
                                    <a class="btn">
                                        Update
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>