<x-layout>
    <x-slot:heading>
        Candidates
    </x-slot:heading>


    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Add Candidate Form -->
            <div class=" overflow-hidden border-white  rounded-md border-2 shadow-sm sm:rounded-lg p-6">
                <h3 class="text-4xl font-bold mb-4 text-white text-center">Add Candidate</h3>

                @if (session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-2 rounded-md mb-4">
                    {{ session('success') }}
                </div>
               @endif
                <form action="/candidates" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="price" class="block text-2xl font-medium text-white">Position</label>
                        <div class="mt-3">
                          <div class="flex items-center rounded-md  pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                            <input type="text" name="position" id="position" class="block min-w-0 grow py-3 pr-3 pl-1 text-md text-base text-white placeholder:text-white focus:outline-none sm:text-md" placeholder="General Secretary" required>

                          </div>
                        </div>
                      </div>
                    <div class="mt-4">
                        <label for="price" class="block text-2xl  font-medium text-white">Name</label>
                        <div class="mt-2">
                          <div class="flex items-center rounded-md  pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                            <input type="text" name="name" id="name" class="block min-w-0 grow py-3 pr-3 pl-1 text-md text-base text-white placeholder:text-white focus:outline-none sm:text-md" placeholder="Abudl Kussus" required>

                          </div>
                        </div>
                      </div>
                    <div class="mt-4">
                        <label for="price" class="block text-xl font-medium text-white">Candidate Symbol</label>
                        <div class="mt-2">
                          <div class="flex w-2/6 items-center rounded-md  pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                            <input  type="file" name="symbol" id="symbol" class="block min-w-0 grow py-3 pr-3 pl-1 text-md text-base text-white placeholder:text-white focus:outline-none sm:text-md"  required>

                          </div>
                        </div>
                      </div>





                    <div class="flex justify-center mt-4">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xl rounded">
                            Save Candidate
                        </button>
                    </div>
                </form>
            </div>

            <!-- Candidate List -->
            <div class=" overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-xl font-bold mb-4 text-white">Candidate Info</h3>

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-white text-lg ">
                            <th class="border-b p-2">Position</th>
                            <th class="border-b p-2">Name</th>
                            <th class="border-b p-2">Symbol</th>
                            <th class="border-b p-2">Actions</th>
                        </tr>
                    </thead>
                     <tbody>

                        @foreach ($candidates as $position => $groupedCandidates)
                            @foreach ($groupedCandidates as $candidate)
                                <tr class="text-white text-md">
                                    <td class="border-b p-2 text-lg">{{ $candidate->position }}</td>
                                    <td class="border-b p-2 text-lg">{{ $candidate->name }}</td>
                                    <td class="border-b p-2 text-lg">
                                        <img class="w-1/2 h-16 object-contain" src="{{ asset('storage/' . $candidate->symbol) }}" alt="Symbol">

                                    </td>
                                    <td class="border-b p-2">
                                        <a href="{{ route('candidates.edit', $candidate->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                        <form action="{{ route('candidates.destroy', $candidate->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 ml-2 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
            </div>
        </div>
    </div>
</x-layout>
