@extends('layouts.app')
@section('content')



<section class="py-[71px] ">
	<h1 class="font-semibold text-[32px] leading-[48px] mb-[37px]">Keranjang</h1>
	<div class="grid grid-cols-12 gap-[14px]">
		<div class="col-span-8">
			<div class="px-8 py-6 rounded-2xl border border-[#7D8BA5]">
				@if (count($cartItems) > 0)
				@foreach ($cartItems as $item)
				<div class="flex h-[102px] justify-between items-center">
					<div class="flex items-center">
						<input type="checkbox" name="selected_items[]" value="{{ $item->id }}" class="itemCheckbox rounded-md me-3"
							checked>
						<img src="{{ Storage::url('product_images/'. $item->product->image) }}" alt="{{ $item->product->name }}"
							class="w-[163px] h-[102px] rounded-[10px] object-cover">
						<div class="flex flex-col items-start gap-3 h-full ms-[31px]">
							<h1 class="font-medium text-base leading-6">{{ $item->product->name }}</h1>
							@if ($item->product->stock == 0)
							<span
								class="px-4 py-[5px] font-medium bg-[#FF0000] rounded-lg text-center text-[#FFFFFF] leading-[14.4px] text-xs">
								Stok Habis
							</span>
							@elseif ($item->product->stock < 10) <span
								class="px-4 py-[5px] font-medium bg-[#FFCC00] rounded-lg text-center text-[#FF0000] leading-[14.4px] text-xs">
								Stok Hampir Habis
								</span>
								@else
								<span
									class="px-4 py-[5px] font-medium bg-[#22DC8E] rounded-lg text-center text-[#007830] leading-[14.4px] text-xs">
									Tersedia
								</span>
								@endif
								<form action="{{ route('removeItem.cart', ['id' => $item->id ]) }}" method="POST">
									@csrf
									@method('DELETE')
									<input type="hidden" name="item_id" value="{{ $item->id }}">
									<button type="submit" class="text-xs leading-[18px] text-[#9790C2] hover:underline">Remove
										Item</button>
								</form>
						</div>
					</div>
					<div class="flex flex-col gap-4">
						<h1 class="font-semibold leading-[19px] " data-product-id="{{ $item->product->id }}">
							Rp. {{ number_format($item->product->price, 0, ',', '.') }}
						</h1>
						<div class="flex">
							<form action="{{ route('update.cart', ['id' => $item->id]) }}" method="POST">
								@csrf
								@method('PUT')
								<button data-product-id="{{ $item->product->id }}" data-cart-item-id="{{ $item->id }}"
									data-stock="{{ $item->product->stock }}"
									class="decrementBtn w-6 h-6 bg-[#EFF0F2] rounded-[4px] text-[#79777D] disabled:cursor-not-allowed disabled:opacity-45">
									-
								</button>
								<input data-product-id="{{ $item->product->id }}" data-cart-item-id="{{ $item->id }}"
									data-stock="{{ $item->product->stock }}" value="{{ $item->quantity }}" type="text" name="quantity"
									class="quantityInput w-10 h-6 text-center border-none font-semibold bg-transparent" readonly>
								<button data-product-id="{{ $item->product->id }}" data-cart-item-id="{{ $item->id }}"
									data-stock="{{ $item->product->stock }}"
									class="incrementBtn w-6 h-6 bg-[#2D68F8] rounded-[4px] text-[#fff] disabled:cursor-not-allowed disabled:opacity-45">
									+
								</button>
								<input type="submit" id="submitUpdateQuantity" hidden>
							</form>
						</div>
						<p class="text-xs text-gray-500">Stok: <span>{{ $item->product->stock }}</span></p>

					</div>

				</div>

				<hr class="w-full my-[32px] border-t-[1px] border-[#7D8BA5]">
				@endforeach
				@else
				<div class="h-full flex justify-center items-center">
					<h1 class="text-2xl text-gray-600 font-semibold">Keranjang anda kosong.</h1>
				</div>
				@endif


			</div>

		</div>
		<div class="col-span-4">
			<div class="rounded-2xl border border-[#7D8BA5]">
				<div class="px-[22px] py-[16px] gap-[18px]">
					<form action="{{ route('show.checkout') }}" class="flex flex-col gap-[18px]" method="POST">
						@csrf
						@method('POST')
						<div class="flex flex-col">
							<h1 class="font-semibold leading-6">Nama Penerima</h1>
							<div class="flex flex-col gap-4 my-[21px]">
								<label class="font-medium text-sm" for="name">Nama</label>
								<input type="text" name="name" id="name" class="rounded-[10px]" placeholder="Andi Setiawan">
								@error('name')
								<p class="text-red-500 text-sm">{{ $message }}</p>
								@enderror
							</div>
							<div class="flex flex-col gap-4 mb-[21px]">
								<label class="font-medium text-sm" for="address">Alamat</label>
								<input type="text" name="address" id="address" class="rounded-[10px]"
									placeholder="Jl. Merdeka No. 123, Jakarta">
								@error('address')
								<p class="text-red-500 text-sm">{{ $message }}</p>
								@enderror
							</div>
							<div class="flex flex-col gap-4 mb-[18px]">
								<label class="font-medium text-sm" for="number_phone">No Handphone</label>
								<input type="number" name="number_phone" id="number_phone" class="rounded-[10px]"
									placeholder="081234567890">
								@error('number_phone')
								<p class="text-red-500 text-sm">{{ $message }}</p>
								@enderror
							</div>
						</div>

						<div class="flex flex-col">
							<h1 class="font-semibold leading-6 mb-[18px]">Harga Detail</h1>
							<div class="bg-[#E4E6EA] p-[18px] flex flex-col gap-[11px] rounded-2xl">
								<div class="flex justify-between items-center">
									<span class="text-sm font-semibold">Sub total</span>
									<span class="text-sm" id="subtotal"></span>
								</div>
								<div class="flex justify-between items-center">
									<span class="text-sm px-2 py-1 rounded">pajak</span>
									<span class="text-sm">0%</span>
								</div>
								<div class="flex justify-between items-center pt-2 border-t border-gray-300">
									<span class="text-sm font-semibold">total</span>
									<span class="text-sm font-semibold" id="total"></span>
								</div>
							</div>

							<div id="selectedItemsContainer"></div>
							<button id="checkout_button" type="submit"
								class="mt-7 px-[60px] py-[12px] bg-[#2D68F8] text-white rounded-[10px] font-semibold text-sm leading-[21px] disabled:opacity-75 disabled:cursor-not-allowed">
								Pesan Sekarang
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="module">
	$(document).ready(function() {

    @if (session('error'))
      alert("{{ session('error') }}");
    @endif

    $('.itemCheckbox:checked').each(function() {
      var itemId = $(this).val();
      var itemName = $(this).next('label').text();
      var itemElement = '<div>' + itemName + ' <input type="hidden" name="selected_items[]" value="' + itemId + '"></div>';
      $('#selectedItemsContainer').append(itemElement);
    });

    $('.itemCheckbox').change(function() {
      var itemId = $(this).val();
      var itemName = $(this).next('label').text();

      if ($(this).prop('checked')) {
        var itemElement = '<div>' + itemName + ' <input type="hidden" name="selected_items[]" value="' + itemId + '"></div>';
        $('#selectedItemsContainer').append(itemElement);
        checkSelectedItems()
      } else {
        $('#selectedItemsContainer').find('input[value="' + itemId + '"]').parent('div').remove();
        checkSelectedItems()
      }
    });

    function updateButtonState() {
    $('.quantityInput').each(function() {
      var productId = $(this).data('product-id');
      var stock = parseInt($(this).data('stock'));
      var quantity = parseInt($(this).val());

      // Periksa apakah tombol increment perlu dinonaktifkan
      if (quantity >= stock) {
        $('.incrementBtn[data-product-id="' + productId + '"]').prop('disabled', true);
      } else {
        $('.incrementBtn[data-product-id="' + productId + '"]').prop('disabled', false);
      }

      // Periksa apakah tombol decrement perlu dinonaktifkan
      if (quantity <= 1) {
        $('.decrementBtn[data-product-id="' + productId + '"]').prop('disabled', true);
      } else {
        $('.decrementBtn[data-product-id="' + productId + '"]').prop('disabled', false);
      }
      });
    }

    $('.decrementBtn, .incrementBtn').on('click', function() {
      var productId = $(this).data('product-id');
      var cartItemId = $(this).data('cart-item-id');
      var inputField = $('.quantityInput[data-product-id="' + productId + '"]');
      var stock = parseInt(inputField.data('stock'));
      var quantity = parseInt(inputField.val());
      if ($(this).hasClass('incrementBtn')) {
        if (quantity < stock) {
          inputField.val(quantity + 1);
          quantity++;
        }
        } else if ($(this).hasClass('decrementBtn')) {
          if (quantity > 1) {
            inputField.val(quantity - 1);
            quantity--;
          }
        }

        // Hitung total untuk produk tertentu
        var productPrice = parseFloat($('h1[data-product-id="' + productId + '"]').text().replace('Rp. ', '').replace('.', '').replace('.', '').replace('.', ''));
        var total = productPrice * quantity;

        // Tampilkan total untuk produk tertentu
        $('#total-' + productId).text('Rp. ' + formatRupiah(total));

        // Hitung dan tampilkan subtotal
        updateSubtotal();

       // Perbarui status tombol
        updateButtonState();

        $('#submitUpdateQuantity').click();
    });


    function updateSubtotal() {
      var subtotal = 0;

      // Loop untuk setiap produk
      $('.quantityInput').each(function() {
        var productId = $(this).data('product-id');
        var productPrice = parseFloat($('h1[data-product-id="' + productId + '"]').text().replace('Rp. ', '').replace('.', '').replace('.', '').replace('.', ''));
        var quantity = parseInt($(this).val());

        subtotal += productPrice * quantity;
        });


        $('#subtotal').text('Rp. ' + formatRupiah(subtotal));
        $('#total').text('Rp. ' + formatRupiah(subtotal));

        $('#subtotalInput').val(subtotal);
      }

        // Function untuk format angka ke format rupiah
      function formatRupiah(angka) {
        var reverse = angka.toString().split('').reverse().join('');
        var ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return ribuan;
      }

      function checkSelectedItems() {
        if ($('#selectedItemsContainer').children().length === 0) {
          $('#checkout_button').attr('disabled', true);
        } else {
          $('#checkout_button').removeAttr('disabled');
        }
      }

      checkSelectedItems();
      updateSubtotal();
      updateButtonState();

    });
</script>
@endsection
