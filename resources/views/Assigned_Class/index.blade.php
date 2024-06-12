<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Users Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex justify-center  shadow-sm sm:rounded-lg">
                <form class="user-form w-full lg:w-1/2 flex flex-col p-5 gap-5" method="POST"
                    action="{{ route('ac.index')}}">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name">
                            Name:
                        </label>
                        <input type="text" id="name" name="name" value="" required>
                    </div>

           


                    <div>
                        <label for="matric_no">
                            Matric No:
                        </label>
                        <input type="text" id="matric_no" name="matric_no" value="">
                    </div>

                    <div>
                        <label for="email">
                            Email:
                        </label>
                        <input type="email" id="email" name="email" value="" required>
                    </div>

                    <div>
                        <label for="phone_no">
                            Phone No:
                        </label>
                        <input type="text" id="phone_no" name="phone_no" value="">
                    </div>

                    <div>
                        <label for="batch">
                            Batch:
                        </label>
                        <input type="text" id="batch" name="batch" value="">
                    </div>

                    <div>

                        <div class="flex w-full gap-2" style="flex-direction: row">
                            <input type="submit" value="Update">
                        </div>

                </form>

               
            </div>
        </div>
    </div>
</x-app-layout>