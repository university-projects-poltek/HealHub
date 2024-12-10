@extends('layouts.dashboard')
@section('content')
  <div class="flex flex-col">

    <div class="overflow-x-auto">

      <div class="flex justify-between mb-4">
        <h1 class="font-semibold text-[#6E58ED] text-[32px] leading-[48px]">My Products</h1>
        <button
          data-modal-target="create_modal"
          data-modal-toggle="create_modal"
          class="block text-white m-1 bg-[#4346D0] rounded-[21px] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
          type="button">
          Add products
        </button>
      </div>

      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">
                No
              </th>
              <th scope="col" class="px-6 py-3">
                Category
              </th>
              <th scope="col" class="px-6 py-3">
                Name
              </th>
              <th scope="col" class="px-6 py-3">
                Description
              </th>
              <th scope="col" class="px-6 py-3">
                Price
              </th>
              <th scope="col" class="px-6 py-3">
                Stock
              </th>
              <th scope="col" class="px-6 py-3">
                Manufacturer
              </th>
              <th scope="col" class="px-6 py-3">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $index => $product)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $product->id }}
              </th>
              <td class="px-6 py-4">
                {{ $product->category->name }}
              </td>
              <td class="px-6 py-4">
                {{ $product->name }}
              </td>
              <td class="px-6 py-4">
                {{ $product->description }}
              </td>
              <td class="px-6 py-4">
                Rp. {{ number_format($product->price) }}
              </td>
              <td class="px-6 py-4">
                {{ $product->stock }}
              </td>
              <td class="px-6 py-4">
                {{ $product->manufacturer }}
              </td>
              <td class="px-6 py-4 text-center">
                <button
                  id="open_delete_modal"
                  class="font-medium text-red-600 dark:text-red-500 hover:underline"
                  data-modal-target="delete_modal"
                  data-modal-toggle="delete_modal"
                  data-id="{{ $product->id }}"
                  data-name="{{ $product->name }}">
                  Delete
                </button>
                <button
                  id="open_update_modal"
                  class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                  data-modal-target="update_modal"
                  data-modal-toggle="update_modal"
                  data-id="{{ $product->id }}"
                  data-name="{{ $product->name }}"
                  data-price="{{ $product->price}}"
                  data-image="{{ $product->image }}"
                  data-description="{{ $product->description }}"
                  data-stock="{{ $product->stock }}"
                  data-manufacturer="{{ $product->manufacturer }}"
                >
                  Update
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  {{-- Modal Create --}}
  <div id="create_modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            Create Product
          </h3>
          <button type="button"
            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-hide="create_modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-4 md:p-5">
          <form id="form_create" action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('POST')
            <div>
              <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Name
              </label>
              <input
                id="name"
                name="name"
                type="text"
                placeholder="Product name"
                value="{{ old('name') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
              />
              @if ($errors->has('name'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('category_id') }}</p>
              @endif
            </div>


            <div>
              <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
              <select id="category" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected vlaue="">Choose a category</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>

                @endforeach
              </select>
              @if ($errors->has('category_id'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('category_id') }}</p>
              @endif
            </div>

            <div>
              <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Description
              </label>
              <input
                type="text"
                id="description"
                name="description"
                placeholder=""
                value="{{ old('description') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
              />
              @if ($errors->has('description'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('category_id') }}</p>
              @endif
            </div>

            <div>
              <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Price
              </label>
              <input
                type="number"
                id="price"
                name="price"
                placeholder=""
                value="{{ old('price') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
              />
              @if ($errors->has('price'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('price') }}</p>
              @endif
            </div>



            <div>
              <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Image
              </label>
              <input
                type="file"
                id="image"
                name="image"
                placeholder=""
                value="{{ old('image') }}"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
              />
              @if ($errors->has('image'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('image') }}</p>
              @endif
            </div>


            <div>
              <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Stock
              </label>
              <input
                type="number"
                id="stock"
                name="stock"
                placeholder=""
                value="{{ old('stock') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
              />
              @if ($errors->has('stock'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('stock') }}</p>
              @endif
            </div>

            <div>
              <label for="manufacturer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Manufacturer
              </label>
              <input
                type="text"
                id="manufacturer"
                name="manufacturer"
                placeholder=""
                value="{{ old('manufacturer') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
              />
              @if ($errors->has('manufacturer'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('manufacturer') }}</p>
              @endif
            </div>


            <button type="submit"
              class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              Submit
            </button>


          </form>
        </div>
      </div>
    </div>
  </div>


  {{-- Modal Update --}}
  <div id="update_modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            Update Product
          </h3>
          <button type="button"
            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-hide="update_modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-4 md:p-5">
          <form id="form_update" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input
              id="update_name"
              name="name"
              type="text"
              placeholder="Product name"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
            />

            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <input
              type="text"
              id="update_description"
              name="description"
              placeholder=""
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
            />

            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
            <input
              type="number"
              id="update_price"
              name="price"
              placeholder=""
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
            />

            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
            <input
              type="number"
              id="update_stock"
              name="stock"
              placeholder=""
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
            />

            <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
              <p id="image_value"></p>
              <p id="no_file_message">Tidak ada file yang diunggah</p>

            <input
              type="file"
              id="update_image"
              name="image"
              placeholder=""
              class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            />

            <label for="manufacturer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Manufacturer</label>
            <input
              type="text"
              id="update_manufacturer"
              name="manufacturer"
              placeholder="Product name"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
            />

            {{-- Category Input --}}
            <input
            type="number" id="category" name="category_id" placeholder="Product name"
              class="input input-bordered w-full max-w-xs" value="3" hidden />

            <button type="submit"
              class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              Submit
            </button>


          </form>
        </div>
      </div>
    </div>
  </div>

  {{-- Modal Delete --}}
  <div id="delete_modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete_modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <form id="form_delete" method="POST" >
              @csrf
              @method('DELETE')
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                <button data-modal-hide="delete_modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Yes, I'm sure
                </button>
                <button data-modal-hide="delete_modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
            </div>
          </form>
        </div>
    </div>
</div>

  <script type="module">
    $(document).ready(function () {

      @if (session('error'))
        alert("{{ session('error') }}");
      @endif

      @if (session('success'))
        alert("{{ session('success') }}");
      @endif

      $("button#open_update_modal").click(function(){
        let id =  $(this).data('id')
        let name =  $(this).data('name')
        let price =  $(this).data('price')
        let description =  $(this).data('description')
        let image = $(this).data('image')
        let stock =  $(this).data('stock')
        let manufacturer =  $(this).data('manufacturer')

        $('#image_value').text(image)
        if (!image) {
          $('#no_file_message').show();
        } else {
          $('#no_file_message').hide();
        }

        $('#update_name').val(name)
        $('#update_price').val(price)
        $('#update_description').val(description)
        $('#update_stock').val(stock)
        $('#update_manufacturer').val(manufacturer)

        $('#form_update').attr('action', '/dashboard/products/' + id);

        $('#update_modal').trigger('showModal');
      });

      $("button#open_delete_modal").click(function(){
        let id = $(this).data('id')
        let name = $(this).data('name')

        $('span#delete_name').text(name);

        $('#form_delete').attr('action', '/dashboard/products/' + id);

        $('#delete_modal').trigger('showModal');
      })
    })
  </script>
@endsection
