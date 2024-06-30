@extends('layouts.app') @section('content')

<div class="grid grid-cols-2 py-10 gap-10">
    <div class="flex justify-center items-center flex-col">
        <div>
            <h1 class="text-[32px] font-bold mb-6">Checkout Product</h1>
            <div class="w-full">
                <img
                    src="https://via.placeholder.com/300x200"
                    alt="Kahf Product"
                    class="rounded-lg shadow-md"
                />
            </div>
            <div class="flex flex-col gap-5 mt-6">
                <h2 class="text-xl font-semibold">
                    Kahf: Gentle exfoliating face scrub
                </h2>
                <div
                    class="w-fit bg-gray-200 text-gray-700 text-xs font-medium px-2.5 py-0.5 rounded"
                >
                    Skincare
                </div>
                <div class="flex justify-between gap-2 mt-4 items-center">
                    <div class="flex gap-2">
                        <img
                            src="{{ asset('/svg/logo.svg') }}"
                            width="30px"
                            height="30px"
                            alt=""
                        />
                        <div>
                            <h3 class="text-lg font-semibold text-[#A0A0A0]">
                                Apotik Cahaya
                            </h3>
                            <h3 class="text-lg font-semibold text-[#A0A0A0]">
                                Garden
                            </h3>
                        </div>
                    </div>
                    <p class="text-[30px] font-bold text-purple-600">
                        Rp 25,000
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-50 shadow-lg p-6 rounded-lg flex flex-col gap-3">
        <div class="grid grid-cols-2 gap-3">
            <div class="rounded-lg p-3 bg-slate-100 flex gap-3 flex-col">
                <p class="block text-[#A0A0A0] text-sm">Bank Name</p>
                <p class="block text-gray-700 text-base font-bold">BCA</p>
            </div>
            <div class="rounded-lg p-3 bg-slate-100 flex gap-3 flex-col">
                <p class="block text-[#A0A0A0] text-sm">Account Name</p>
                <p class="block text-gray-700 text-base font-bold">Aji K</p>
            </div>
        </div>
        <div class="rounded-lg p-3 bg-slate-100 flex gap-3 flex-col">
            <p class="block text-[#A0A0A0] text-sm">Account Number</p>
            <p class="block text-gray-700 text-base font-bold">
                1203 1029 3012 9
            </p>
        </div>

        <div class="mt-10 rounded-lg bg-[#2D68F80D] px-6 py-3">
            <p class="block text-[#2D68F8] text-xs" for="payment_receipt">
                Silakan Unggah Bukti Pembayaran, Kami Akan Mengonfirmasikannya
                Sesegera Mungkin
            </p>
        </div>

        <div class="flex justify-between gap-2">
            <div
                class="flex items-center justify-center w-full h-12 border-2 border-dashed border-gray-300 rounded-md cursor-pointer"
            >
                <input
                    type="file"
                    class="absolute h-full opacity-0 cursor-pointer"
                    onchange="previewImage(event)"
                />
                <span class="text-gray-400">Choose File</span>
            </div>
            <div
                class="flex items-center justify-center w-12 h-12 bg-gray-100 border-2 border-gray-300 rounded-md cursor-pointer"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 text-gray-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 4v16h16V4H4zm4 8v-2h8v2H8zm0 4v-2h6v2H8z"
                    />
                </svg>
                <img
                    id="proof-preview"
                    src=""
                    alt="Pratinjau Bukti Pembayaran"
                    style="
                        display: none;
                        margin-top: 10px;
                        max-width: 200px;
                        min-width: 200px;
                    "
                />
            </div>
        </div>

        <button
            class="w-full px-4 py-2 font-bold text-white bg-primary rounded-md hover:bg-primary hover:opacity-50 focus:outline-none focus:ring-2 focus:ring-primary"
            type="submit"
        >
            Checkout Now
        </button>
    </div>
</div>
@endsection

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById("proof-preview");
            output.src = reader.result;
            output.style.display = "block";
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
