<x-layout>
    <x-slot:heading>
        Edit Candidate
    </x-slot:heading>

    <div class="max-w-xl mx-auto py-6 bg-[url({{'images/voting-system.png'}})] bg-cover bg-center bg-no-repeat min-h-screen">
        {{-- <form action="{{ route('candidates.update', $candidate->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label class="block mb-2 text-lg">Position</label>
            <input type="text" name="position" value="{{ $candidate->position }}" required class="w-full mb-4 p-4 border rounded">

            <label class="block mb-2 text-lg">Name</label>
            <input type="text" name="name" value="{{ $candidate->name }}" required class="w-full mb-4 p-4 border rounded">

            <label class="block mb-2 text-lg">Change Symbol (optional)</label>
            <input type="file" name="symbol" class="w-full mb-4 p-2 border rounded">

            <button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded text-lg">Update</button>
        </form> --}}


        <form action="{{ route('candidates.update', $candidate->id) }}"" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div>
                <label for="price" class="block text-2xl font-medium text-white">Position</label>
                <div class="mt-3">
                  <div class="flex items-center rounded-md  pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                    <input type="text" name="position" id="position" value="{{ $candidate->position }}" class="block min-w-0 grow py-3 pr-3 pl-1 text-md text-base text-white placeholder:text-white focus:outline-none sm:text-md" placeholder="General Secretary" required>

                  </div>
                </div>
              </div>
            <div class="mt-4">
                <label for="price" class="block text-2xl  font-medium text-white">Name</label>
                <div class="mt-2">
                  <div class="flex items-center rounded-md  pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                    <input type="text" name="name" id="name" value="{{ $candidate->name }}" class="block min-w-0 grow py-3 pr-3 pl-1 text-md text-base text-white placeholder:text-white focus:outline-none sm:text-md" placeholder="Abudl Kussus" required>

                  </div>
                </div>
              </div>


              <div class="flex justify-center mt-4">
                <button  class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xl rounded">
                    Update
                </button>
            </div>
        </form>

    </div>
</x-layout>
