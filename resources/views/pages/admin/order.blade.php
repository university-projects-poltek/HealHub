@extends('layouts.dashboard')
@section('content')

@if(session('success'))
<p>{{ session('success') }}</p>
@endif

<section>
  <table>
    <tr>
      <th>No</th>
      <th>Username</th>
      <th>Payment Method</th>
      <th>Total amount</th>
    </tr>
    @foreach ($orders as $order)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $order->user->username }}</td>
      <td>{{ $order->payment_method }}</td>
      <td>{{ $order->total_amount }}</td>



    </tr>

    @endforeach
  </table>

</section>

@endsection
