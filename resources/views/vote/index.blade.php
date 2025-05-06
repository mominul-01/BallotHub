<x-layout>
    <x-slot:heading>Voting </x-slot:heading>

    <div class="container mx-auto py-10">
    <h1 class="text-4xl text-white font-bold text-center mb-6">Cast Your Vote</h1>

 <div>

    @if (session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-2 rounded-md text-center mb-4">
        {{ session('success') }}
    </div>
    @endif

    <form action="/cast-vote" method="POST">
        @csrf
        @foreach ($candidates as $position => $groupedCandidates)
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4 text-white">{{ $position }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
                @foreach ($groupedCandidates as $candidate)
                    <label class="cursor-pointer block rounded-md bg-[radial-gradient(#ffffff33_1px,#0f172a_1px)] bg-[size:20px_20px] shadow p-5 border-2 hover:border-blue-600 transition
                        @if(old("selected.$position") == $candidate->id) border-blue-600 @else border-transparent @endif">
                        <div class="flex justify-center mb-3">
                            @if ($candidate->symbol)
                                <img class="h-20 w-20 object-contain rounded-md" src="{{ asset('storage/' . $candidate->symbol) }}" alt="Symbol">
                            @else
                                <div class="h-20 w-20 bg-gray-300 flex items-center justify-center text-gray-700">N/A</div>
                            @endif
                        </div>
                        <h1 class="text-2xl text-white font-semibold text-center">{{ $candidate->name }}</h1>

                        <div class="text-center mt-2 ">
                            <input type="radio" name="selected[{{ $position }}]" value="{{ $candidate->id }}" class="w-5 h-5 form-radio p-4  checked:black checked:border-transparent focus:outline-none transition duration-200">
                        </div>
                    </label>
                @endforeach
            </div>
        </div>
    @endforeach
        <div class="text-center mt-6">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-xl font-bold py-2 px-6 rounded">
                Submit Vote
            </button>
        </div>
    </form>
 </div>


</div>

</x-layout>
