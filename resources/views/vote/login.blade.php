<x-layout>
    <x-slot:heading>Voter Login</x-slot:heading>

    @if (session('success'))
        <div class="text-green-600">{{ session('success') }}</div>
    @endif


    <div class="py-12">
        <div class="flex w-6/12 flex-col gap-6 border-4 border-white rounded-2xl m-auto mt-8 mb-20">
            <!-- Add Voter Form -->
            <div class=" p-6">
                <h3 class="text-4xl text-center font-bold mb-4 text-white">Login</h3>

                @if (session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-2 rounded-md mb-4">
                    {{ session('success') }}
                </div>
               @endif
                <form form action="/send-otp" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="voter-id" class="block text-2xl font-medium text-white">Voter ID</label>
                        <div class="mt-3">
                          <div class="flex items-center rounded-md  pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                            <input type="text" name="voter_id" id="voter_id" class="block min-w-0 grow py-3 pr-3 pl-1 text-md text-base text-white placeholder:text-white focus:outline-none sm:text-md" placeholder="0001" required>

                          </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="Mobile" class="block text-2xl font-medium text-white"">Mobile Number</label>
                        <div class="mt-3">
                          <div class="flex items-center rounded-md  pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                            <input  type="number" name="mobile" id="mobile"  class="block min-w-0 grow py-3 pr-3 pl-1 text-md text-base text-white placeholder:text-white focus:outline-none sm:text-md" placeholder="01600000000" required>

                          </div>
                        </div>
                      </div>

                    <div class="flex justify-center mt-4">
                        <a href="/otp-verification">

                        <button  type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xl rounded">
                            Send OTP
                        </button>

                    </a>
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


        </div>
    </div>



</x-layout>
