@extends('layouts.dashboard')
@section('content')

@if(session('success'))
<p>{{ session('success') }}</p>
@endif

<section>
    {{-- <table>
        <tr>
            <th>No</th>
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

                <img src="{{ Storage::url('payment_proofs/' . $transaction->payment_proof) }}" alt="Bukti Pembayaran">


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
    </table> --}}


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-16 py-3">
                        Payment Proof
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Payment Method
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($transactions->isEmpty())
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center">
                    Tidak Ada Transaksi
                </td>
                </tr>
                @else
                @foreach ($transactions as $transaction)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="p-4">
                        <img src="{{ Storage::url('payment_proofs/' . $transaction->payment_proof) }}"
                            alt="Bukti Pembayaran" class="max-w-[200px]">
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                        {{ $transaction->user->username }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $transaction->payment_method }}
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                        Rp.{{ number_format($transaction->total_amount) }}
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('admin.verify-payment', ['id' => $transaction->id]) }}" method="POST">
                            @csrf
                            @method('POST')
                            <button class="" type="submit" name="status" value="paid" class="text-green-500">
                                Verify
                            </button>
                            <button class="" type="submit" name="status" value="canceled" class="text-red-600">
                                Cancel
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>


</section>

@endsection
