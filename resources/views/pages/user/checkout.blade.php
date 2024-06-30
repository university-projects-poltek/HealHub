@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Checkout</h2>
  <form action="{{ route('process.checkout') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <table class="table">
      <thead>
        <tr>
          <th>Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cartItems as $item)
        <tr>
          <td>{{ $item->product->name }}</td>
          <td>Rp{{ number_format($item->product->price, 0, ',', '.') }}</td>
          <td>{{ $item->quantity }}</td>
          <td>Rp{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</td>
        </tr>
        <input type="hidden" name="cart_items[]" value="{{ $item->id }}">
        @endforeach
      </tbody>
    </table>
    <div class="total">
      <strong>Total: Rp{{ number_format($total, 0, ',', '.') }}</strong>
    </div>
    <div class="form-group">
      <label for="address">Alamat Pengiriman</label>
      <textarea name="address" id="address" class="form-control" required></textarea>
    </div>
    <div class="form-group">
      <label for="address">Bukti Pembayaran</label>
      <input id="proof" class="proof" type="file" name="proof" class="form-control" onchange="previewImage(event)"
        required>
      <img id="proof-preview" src="" alt="Pratinjau Bukti Pembayaran"
        style="display:none; margin-top: 10px; max-width: 200px; min-width: 200px;" />
    </div>
    <button type="submit" class="btn btn-primary">Proses Pembayaran</button>
  </form>
</div>
@endsection



<script>
  function previewImage(event) {
      var reader = new FileReader();
      reader.onload = function(){
          var output = document.getElementById('proof-preview');
          output.src = reader.result;
          output.style.display = 'block';
      };
      reader.readAsDataURL(event.target.files[0]);
  }
</script>