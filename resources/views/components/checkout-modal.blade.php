<div id="checkoutModal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-10 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl flex justify-center max-h-full">
        <!-- Modal content -->
        <div class="relative px-[30px] py-[30px] bg-white rounded-[20px] shadow dark:bg-gray-700 w-[450px] h-[620px]">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4  rounded-t dark:border-gray-600">
                <h3 class="absolute left-6 top-5 text-base font-semibold text-[#2D68F8] leading-[24px] dark:text-white">
                    Pembayaran
                </h3>
                <button type="button"
                    class="absolute top-4 right-4 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="checkoutModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div id="checkoutModalContent">
                <div class="grid grid-cols-5 gap-3">
                    <div class="col-span-2 rounded-lg flex justify-between px-[20px] py-[12px] bg-[#2D68F8] text-white">
                        <div class=" flex flex-col gap-1">
                            <h1 class="font-normal text-xs leading-[18px] text-white">Bank Name</h1>
                            <span class="text-base leading-6 font-semibold">BCA</span>
                        </div>
                        <img src="{{ asset('/svg/bank.svg') }}" alt="Bank">
                    </div>
                    <div class="col-span-3 bg-[#F6F7F9] rounded-lg px-[20px] py-[12px] flex justify-between ">
                        <div class=" flex flex-col gap-1">
                            <h1 class="font-normal text-xs leading-[18px] text-[#A0A0A0]">Account Name</h1>
                            <span class="text-base leading-6 font-semibold">Aji k</span>
                        </div>
                        <img src="{{ asset('/svg/account-name.svg') }}" alt="Name">
                    </div>
                    <div class="col-span-5 bg-[#F6F7F9] rounded-lg px-[20px] py-[12px] flex justify-between ">
                        <div class=" flex flex-col gap-1">
                            <h1 class="font-normal text-xs leading-[18px] text-[#A0A0A0]">Account Number</h1>
                            <span class="text-base leading-6 font-semibold">1202 2093 0223 0</span>
                        </div>
                        <img src="{{ asset('/svg/account-number.svg') }}" alt="Account number">
                    </div>
                    <div class="col-span-5 bg-[#F6F7F9] rounded-lg px-[20px] py-[12px] flex justify-between ">
                        <div class=" flex flex-col gap-1">
                            <h1 class="font-normal text-xs leading-[18px] text-[#A0A0A0]">Total Pembayaran</h1>
                            <span class="text-base leading-6 font-semibold">Rp {{ number_format($total) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex flex-col mt-[27px] gap-4">
                <h1 class="text-[#131313] font-semibold text-[20px] leading-[30px]">Konfirmasi Pembayaran</h1>
                <form action="{{ route('process.checkout') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="flex flex-col gap-3 pb-[50px]">
                        <div class="px-[22px] py-[10px] bg-[#2D68F8] bg-opacity-10 rounded-lg">
                            <p class="text-xs text-[#2D68F8] leading-[18px] font-normal">Silakan unggah bukti
                                pembayaran,
                                kami akan mengonfirmasikannya sesegera mungkin</p>
                        </div>
                        <div class="flex gap-3 ">
                            <div
                                class="flex items-center justify-center w-[291px] h-12 border-2 border-dashed border-gray-300 rounded-md cursor-pointer">
                                <input type="file" name="proof" class="absolute h-[50px] opacity-0 cursor-pointer"
                                    onchange="previewImage(event)" />
                                <span class="text-gray-400">Choose File</span>
                            </div>
                            <div class="bg-[#F6F7F9] w-[86px] h-[48px] flex justify-center items-center rounded-lg">
                                <img src="{{ asset('/svg/upload-right-image.svg') }}" id="proof-preview"
                                    alt="Pratinjau Bukti Pembayaran"
                                    class="max-w-[86px] max-h-[48px] object-center">
                            </div>
                        </div>
                    </div>
                    @foreach ($cartItems as $item)
                        <input type="hidden" name="cart_items[]" value="{{ $item->id }}">
                    @endforeach

                    <input type="hidden" name="address" value="{{ $address }}">
                    <button data-modal-hide="checkoutModal" type="submit"
                    class="w-full z-50 bg-[#2D68F8] rounded-[100px] px-[18px] py-3.5 bg text-white text-base tracking-wide font-medium leading-6">Pesan
                    Sekarang
                </button>
            </form>
            </div>

        </div>
    </div>
</div>

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

