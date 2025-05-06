<x-layout>

    <x-slot:heading>
        Home Page
    </x-slot:heading>

    <div class=" mx-auto my-auto text-white flex flex-col justify-center items-center p-8">
        <div class="text-center max-w-2xl">
            <h1 class="text-5xl font-bold mb-6">Welcome to Our Online Voting Platform</h1>
            <p class="text-lg mb-8">
                Participate in the democratic process by casting your vote securely and easily. Your voice matters, and every vote counts!
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('vote.login') }}" class="bg-white text-2xl text-orange-400 px-6 py-3 rounded-lg font-semibold shadow hover:bg-gray-100 transition">
                    Vote Now
                </a>

            </div>
        </div>

        <div class="mt-12">
            <img src="/images/votedone.gif" alt="Voting Illustration" class="w-full max-w-md mx-auto rounded-lg shadow-xl">
        </div>
    </div>
</x-layout>
