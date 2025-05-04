<x-layout>
    <x-slot:heading>Voter otp</x-slot:heading>

    @if (session('success'))
        <div class="text-green-600">{{ session('success') }}</div>
    @endif

    <div class="container">
        <div class=" text-center m-auto pt-20">
            <h1 class="text-4xl font-bold  text-white">OTP Verification</h1>
            <p class="text-xl  text-white mt-5"> Enter your verification code. We will send your number. </p>
        </div>

        <form action="{{ route('vote.verifyOtp') }}" method="POST">
            @csrf


            <div class="flex w-6/12 flex-col p-6 gap-6 border border-white rounded-2xl m-auto mt-8 mb-20">
                <div class="flex gap-2 flex-col ">
                    <label class="text-2xl  my-2 text-white" for="">One time passcode (OTP) </label>
                    <div class="flex gap-7 mt-2 ">
                        <input type="text" name="otp[]" class="w-12 text-2xl h-12 text-center border border-white text-white rounded-lg" value="" maxlength="1">
                        <input type="text" name="otp[]" class="w-12 text-2xl h-12 text-center border border-white text-white rounded-lg" value="" maxlength="1">
                        <input type="text" name="otp[]" class="w-12 text-2xl h-12 text-center border border-white text-white rounded-lg" value="" maxlength="1">
                        <input type="text" name="otp[]" class="w-12 text-2xl h-12 text-center border border-white text-white rounded-lg" value="" maxlength="1">
                        <input type="text" name="otp[]" class="w-12 text-2xl h-12 text-center border border-white text-white rounded-lg" value="" maxlength="1">
                        <input type="text" name="otp[]" class="w-12 text-2xl h-12 text-center border border-white text-white rounded-lg" value="" maxlength="1">
                    </div>
                </div>

                <div class="flex gap-2 justify-between items-center mt-6">
                    <div class="flex  gap-2 items-center">
                        <p class=" text-md text-white">Didn't get it? </p>
                        <button class=" border rounded-lg bg-blue-600 text-white px-2 py-2  ml-5">Resend code</button>
                    </div>

                    <p id="timer" class="text-lg text-white">Time : 2:00</p>

                </div>

                <button class="my-6  rounded-lg bg-blue-600 text-white p-3 text-xl">Verify OTP</button>

                <p class="text-center  text-white ">Is the number correct? <span class="text-bold">Back to change phone.</span></p>

            </div>
        </form>

    </div>


</x-layout>

<script>
    let timeLeft = 120; // 2 minutes in seconds

    const timerElement = document.getElementById("timer");

    const countdown = setInterval(() => {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;

        timerElement.textContent = `Time : ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

        if (timeLeft <= 0) {
            clearInterval(countdown);
            timerElement.textContent = "Time expired!";
        }

        timeLeft--;
    }, 1000);
</script>
