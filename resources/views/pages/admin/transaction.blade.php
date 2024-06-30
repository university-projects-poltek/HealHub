@extends('layouts.dashboard')
@section('content')

@if(session('success'))
<p>{{ session('success') }}</p>
@endif

<section>
  <table>
    <tr>
      <th >No</th>
      <th>Username</th>
      <th>Payment Method</th>
      <th>Total amount</th>
      <th>image</th>
      <th>Status</th>
      <th>Verification</th>
    </tr>
    @foreach ($transactions as $transaction)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $transaction->user->username }}</td>
      <td>{{ $transaction->payment_method }}</td>
      <td>{{ $transaction->total_amount }}</td>
      <td class="max-w-[200px]">

       <img src="{{ Storage::url('payment_proofs/' . $transaction->payment_proof) }}" alt="Bukti Pembayaran"  >
        
   
      </td>
      <td>{{ $transaction->status }}</td>
      <td>
        <form action="{{ route('admin.verify-payment', ['id' => $transaction->id]) }}" method="POST">
          @csrf
          @method('POST')
          <button class="" type="submit" name="status" value="paid">
            Verify
          </button>
        </form>
      </td>
    </tr>

    @endforeach
  </table>

</section>

@endsection