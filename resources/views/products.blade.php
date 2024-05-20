<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Products</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  
</head>

<body>

  <div class="min-h-screen flex flex-col justify-center items-center ">
    <h1 class="text-left">{{ $title }}</h1>
    <div class="overflow-x-auto">
      <!-- Open the modal using ID.showModal() method -->
      <button class="btn" onclick="create_modal.showModal()">Add products</button>

      <table class="table border">
        <thead>
          <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Manufacturer</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
          <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->manufacturer }}</td>
            <td>
              <button 
                class="btn btn-primary" 
                id="open_delete_modal"
                data-id="{{ $product->id }}" 
                data-name="{{ $product->name }}"
              >
                Delete
              </button>
              <button 
                class="btn btn-secondary" 
                id="open_update_modal" 
                data-id="{{ $product->id }}" 
                data-name="{{ $product->name }}"
                data-price="{{ $product->price}}"
                data-description="{{ $product->description }}"
                data-quantity="{{ $product->quantity }}"
                data-manufacturer="{{ $product->manufacturer }}"

              >Update
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>

  </div>

  {{-- Modal Create --}}
  <dialog id="create_modal" class="modal">
    <div class="modal-box">
      <h3 class="font-bold text-lg">Create new product</h3>
      <form action="/products" method="POST" class="flex flex-col gap-2">
        @csrf
        @method('POST')
        <label for="name">Name</label>
        <input id="name" name="name" type="text" placeholder="Product name"
          class="input input-bordered w-full max-w-xs" />

        <label for="name">Description</label>
        <input type="text" id="description" name="description" placeholder=""
          class="input input-bordered w-full max-w-xs" />

        <label for="price">Price</label>
        <input type="number" id="price" name="price" placeholder="" class="input input-bordered w-full max-w-xs" />

        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" name="quantity" placeholder=""
          class="input input-bordered w-full max-w-xs" />

        <label for="manufacturer">Manufacturer</label>
        <input type="text" id="manufacturer" name="manufacturer" placeholder="Product name"
          class="input input-bordered w-full max-w-xs" />

        {{-- Category --}}
        <input type="number" id="category" name="category_id" placeholder="Product name"
          class="inp ut input-bordered w-full max-w-xs" value="3" hidden />

        <div class="flex justify-end gap-5">
          <button class="btn" type="button" onclick="modal_create.close()">Close
          </button>
          <button class="btn" type="submit">Submit</button>

        </div>
      </form>

    </div>
  </dialog>

  {{-- Modal Update --}}
  <dialog id="update_modal" class="modal">
    <div class="modal-box">
      <h3 class="font-bold text-lg">Update product</h3>
      <form id="form_update" method="POST" class="flex flex-col gap-2">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input 
          id="update_name" 
          name="name" 
          type="text" 
          placeholder="Product name"
          class="input input-bordered w-full max-w-xs"
        />

        <label for="name">Description</label>
        <input 
          type="text" 
          id="update_description" 
          name="description" 
          placeholder=""
          class="input input-bordered w-full max-w-xs" 
        />

        <label for="price">Price</label>
        <input 
          type="number" 
          id="update_price" 
          name="price" 
          placeholder="" 
          class="input input-bordered w-full max-w-xs" 
        />

        <label for="quantity">Quantity</label>
        <input 
          type="number" 
          id="update_quantity" 
          name="quantity" 
          placeholder=""
          class="input input-bordered w-full max-w-xs" 
        />

        <label for="manufacturer">Manufacturer</label>
        <input 
          type="text" 
          id="update_manufacturer" 
          name="manufacturer" 
          placeholder="Product name"
          class="input input-bordered w-full max-w-xs" 
        />

        {{-- Category Input --}}
        <input 
        type="number" id="category" name="category_id" placeholder="Product name"
          class="inp ut input-bordered w-full max-w-xs" value="3" hidden />

        <div class="flex justify-end gap-5">
          <button 
            class="btn" 
            type="button" 
            onclick="update_modal.close()"
          >
          Close
          </button>

          <button 
            class="btn" 
            type="submit">
          Submit
          </button>

        </div>
      </form>

    </div>
  </dialog>

  {{-- Modal Delete --}}
  <dialog id="delete_modal" class="modal">
    <div class="modal-box">
      <h3 class="font-bold text-lg">Delete Product</h3>
      <form id="form_delete" method="POST" action="/products/{{ $product->id }}">
        @csrf
        @method('DELETE')
        <p>Are you sure want to delete <span id="delete_name"></span>?</p>

        <button class="btn btn-secondary" type="submit">
          Delete
        </button>
        <button class="btn btn-primary" type="button" onclick="delete_modal.close()">Close
        </button>
      </form>


    </div>
  </dialog>


  <script type="module">
    $("button#open_update_modal").click(function(){
      let id =  $(this).data('id')
      let name =  $(this).data('name')
      let price =  $(this).data('price')
      let description =  $(this).data('description')
      let quantity =  $(this).data('quantity')
      let manufacturer =  $(this).data('manufacturer')

      console.log(id)

      $('#update_name').val(name)
      $('#update_price').val(price)
      $('#update_description').val(description)
      $('#update_quantity').val(quantity)
      $('#update_manufacturer').val(manufacturer)

      $('#form_update').attr('action', '/products/' + id);

      $('#update_modal').trigger('showModal');
    });

    $("button#open_delete_modal").click(function(){
      let id = $(this).data('id')
      let name = $(this).data('name')

      $('span#delete_name').text(name);

      $('#form_delete').attr('action', '/products/' + id);

      $('#delete_modal').trigger('showModal');
    })
  </script>
</body>

</html>