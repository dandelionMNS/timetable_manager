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
                        <td class="w-min">User Type</td>
                        <td class="w-min text-nowrap">Matrix No</td>
                        <td class="w-full">Name</td>
                        <td></td>
                    </thead>
                    <tbody>
                        <div class="hidden">
                            <?= $counter=1 ?>
                        </div>
                        @foreach ($users as $user)
                            @if ($user->user_type != 'admin')
                                <tr>
                                    <td>
                                        <?= $counter++ ?>
                                    </td>
                                    <td>{{$user->user_type}}</td>
                                    <td>{{$user->matric_no}}</td>
                                    <td>{{$user->name}}</td>
                                    <td style="padding: 15px 30px">
                                        <a href="{{route('user.details', ['id' => $user->id])}}" class="btn">
                                            Update
                                        </a>
                                    </td>

                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>