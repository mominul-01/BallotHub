<x-layout>
    <x-slot:heading class="bg-gray-800 text-white">
        Dashboard
    </x-slot:heading>


    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="   overflow-hidden border-white  rounded-md border-2 shadow-sm sm:rounded-lg">
                <div class="py-12 space-y-10">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

                        {{-- Navigation Buttons --}}
                        <div class="flex flex-wrap gap-5">
                            <a href="/candidates" class=" rounded-md shadow px-5 py-3 text-white font-bold text-2xl  border-2 hover:border-blue-600 hover:bg-blue-600 hover:text-white transition">
                                Manage Candidates
                            </a>
                            <a href="/voters" class=" rounded-md shadow px-5 py-3 text-white font-bold text-2xl  border-2 hover:border-blue-600 hover:bg-blue-600 hover:text-white transition ">
                                Manage Voters
                            </a>
                        </div>

                        {{-- Vote Statistics --}}
                        <div>
                            <h1 class="text-white text-3xl font-bold mb-4">Vote Statistics</h1>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                                @foreach ($stats as $stat)
                                    <div class="  p-5 rounded-md  bg-[radial-gradient(#ffffff33_1px,#0f172a_1px)] bg-[size:20px_20px] shadow text-center">
                                        <h2 class="text-white text-xl mb-2">{{ $stat['label'] }}</h2>
                                        <p class="text-white text-4xl font-bold">{{ $stat['value'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                         {{-- // Candidates List
                        @foreach ($candidates as $position => $groupedCandidates)
                            <div>
                                <h2 class=" text-2xl text-white font-bold mb-4">{{ $position }}</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
                                    @foreach ($groupedCandidates as $candidate)
                                        <div class="  bg-[radial-gradient(#ffffff33_1px,#0f172a_1px)] bg-[size:20px_20px] rounded-md  p-5">
                                            <div class="flex justify-center mb-3">
                                                @if ($candidate->symbol)
                                                    <img class="h-26 object-contain" src="{{ asset('storage/' . $candidate->symbol) }}" alt="Symbol">
                                                @else
                                                    <div class="h-16 w-16  flex items-center justify-center text-gray-700">N/A</div>
                                                @endif
                                            </div>
                                            <h1 class="text-white  text-2xl font-semibold text-center">{{ $candidate->name }}</h1>
                                            <p class="text-white text-center text-2xl">Total Vote : {{ $candidate->votes }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach --}}
                        {{-- Candidates List --}}
                        @foreach ($candidates as $position => $groupedCandidates)
                            <div class="mb-12">
                                <h2 class="text-2xl text-white font-bold mb-6">{{ $position }}</h2>

                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                                    @foreach ($groupedCandidates as $candidate)
                                        <div class="bg-[radial-gradient(#ffffff33_1px,#0f172a_1px)] bg-[size:20px_20px] rounded-2xl shadow-lg p-5 text-center border border-gray-700 hover:border-blue-600 transition">

                                             <div class="relative">
                                                @if ($candidate->symbol)
                                                    <img src="{{ asset('storage/' . $candidate->symbol) }}" alt="{{ $candidate->name }}" class="w-full h-56 object-cover">
                                                @else
                                                    <div class="w-full h-56 bg-gray-200 flex items-center justify-center text-gray-600 text-lg">N/A</div>
                                                @endif
                                                <span class="absolute top-2 left-2 bg-yellow-400 text-xs font-semibold px-3 py-1 rounded-full">{{$position}}</span>
                                            </div>

                                           <h1 class="text-white  text-2xl font-semibold text-center">{{ $candidate->name }}</h1>
                                            <p class="text-white text-center text-2xl">Total Vote : {{ $candidate->votes }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
