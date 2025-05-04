<x-layout>
    <x-slot:heading>
        Thank You!
    </x-slot:heading>


    {{-- <div class="relative h-screen  flex items-center justify-center">
        <!-- Ballot box -->
        <div class="w-80 h-40 bg-white relative z-10"></div>

        <!-- Ballot paper (animated drop) -->
        <div class="w-20 h-24 bg-white text-2xl font-bold text-black text-center py-5 absolute top-0 animate-drop">  Vote..</div>

        <style>
          @keyframes drop {
            0% { top: -100px; opacity: 0; }
            50% { opacity: 1; }
            100% { top: 50%; opacity: 1; }
          }

          .animate-drop {
            animation: drop 2s ease-in-out forwards;
          }
        </style>



      </div> --}}

    {{-- <div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-blue-600 to-indigo-800 text-white">
        <div class="bg-white text-gray-800 rounded-2xl shadow-xl p-10 max-w-xl text-center">
            <h1 class="text-4xl font-bold mb-4">🎉 Thank You for Voting!</h1>
            <p class="text-lg mb-6">Your vote has been successfully submitted. We appreciate your participation and support in the election process.</p>






            <a href="/" class="inline-block mt-4 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition">
                Back to Home
            </a>
        </div>
    </div> --}}

    <div class=" flex flex-col justify-center items-center  text-white">
        <div class=" text-white p-10 max-w-xl text-center">
            <img src="{{ asset('images/votedone.gif') }}" alt="Thank You" class="w-48 mx-auto mb-6">
            <h1 class="text-4xl font-bold mb-4 text-white">🎉 Thank You for Voting!</h1>
            <p class="text-lg mb-6">Your vote has been successfully submitted.</p>
            <a href="/" class="inline-block mt-4 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition">
                Back to Home
            </a>
        </div>
    </div>
</x-layout>
