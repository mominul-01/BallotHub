<x-layout>
    <x-slot:heading class="bg-gray-800 text-white">
        Voter
    </x-slot:heading>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Add Voter Form -->
            <div class=" overflow-hidden  border-white  rounded-md border-2 shadow-sm sm:rounded-lg p-6">
                <h3 class="text-4xl text-white font-bold mb-4 text-center">Add Voter</h3>

                @if (session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-2 rounded-md mb-4">
                    {{ session('success') }}
                </div>
               @endif
                <form action="/voters" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-4">
                        <label for="price" class="block text-2xl font-medium text-white">Name</label>
                        <div class="mt-2">
                          <div class="flex items-center text-xl rounded-md  pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                            <input type="text" name="name" id="name"class="block min-w-0 grow py-3 pr-3 pl-1 text-xl text-white placeholder:text-white focus:outline-none sm:text-md" placeholder="Abdul" required>

                          </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label for="price" class="block text-2xl font-medium text-white">Voter ID</label>
                        <div class="mt-2">
                          <div class="flex items-center text-xl rounded-md  pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                            <input type="text" name="voter_id" id="voter_id" class="block min-w-0 grow py-3 pr-3 pl-1 text-xl  text-white placeholder:text-white focus:outline-none sm:text-md" placeholder="0001" required>

                          </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label for="price" class="block text-2xl font-medium text-white">Mobile Number</label>
                        <div class="mt-2">
                          <div class="lex items-center text-xl rounded-md  pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                            <input  type="number" name="mobile" id="mobile"  class="block min-w-0 grow py-3 pr-3 pl-1 text-xl  text-white placeholder:text-white focus:outline-none sm:text-md" placeholder="01600000000" required>

                          </div>
                        </div>
                      </div>

                    <div class="flex justify-center mt-4">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 text-2xl px-4 rounded">
                            Save Voter
                        </button>
                    </div>
                </form>
                @if ($errors->any())
                <div class="text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                 @endif

            </div>

            <!-- Voter  List -->
            <div class="  bg-[radial-gradient(#ffffff33_1px,#0f172a_1px)] bg-[size:20px_20px] overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl text-white font-bold mb-4">Voter Info</h3>

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-white text-lg ">
                            <th class="border-b p-2">Name</th>
                            <th class="border-b p-2">Voter-ID</th>
                            <th class="border-b p-2">Mobile</th>
                            <th class="border-b p-2">Actions</th>
                        </tr>
                    </thead>
                     <tbody>

                        @foreach ($voters as $voter)
                            <tr class="text-white text-lg ">
                                <td class="border-b p-2">{{ $voter->name }}</td>
                                <td class="border-b p-2">{{ $voter->voter_id }}</td>
                                <td class="border-b p-2">{{ $voter->mobile }}</td>
                                <td class="border-b p-2">
                                    <form action="/voters/{{ $voter->id }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
            </div>
        </div>
    </div>
</x-layout>
