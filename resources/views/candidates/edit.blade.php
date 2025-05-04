<x-layout>
    <x-slot:heading>
        Edit Candidate
    </x-slot:heading>

    <div class="max-w-xl mx-auto py-6 bg-[url({{'images/voting-system.png'}})] bg-cover bg-center bg-no-repeat min-h-screen">
        <form action="{{ route('candidates.update', $candidate->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label class="block mb-2 text-lg">Position</label>
            <input type="text" name="position" value="{{ $candidate->position }}" required class="w-full mb-4 p-4 border rounded">

            <label class="block mb-2 text-lg">Name</label>
            <input type="text" name="name" value="{{ $candidate->name }}" required class="w-full mb-4 p-4 border rounded">

            <label class="block mb-2 text-lg">Change Symbol (optional)</label>
            <input type="file" name="symbol" class="w-full mb-4 p-2 border rounded">

            <button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded text-lg">Update</button>
        </form>
    </div>
</x-layout>
