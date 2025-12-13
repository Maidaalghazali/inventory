@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-3">Riwayat Perubahan Stok</h2>

    <div class="card">
        <div class="card-body">
            @if($histories->isEmpty())
                <p class="text-muted">Belum ada riwayat stok.</p>
            @else
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Item</th>
                            <th>Stok Awal</th>
                            <th>Perubahan</th>
                            <th>Stok Akhir</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($histories as $history)
                        <tr>
                            <td>{{ $history->created_at }}</td>
                            <td>{{ $history->item->name }}</td>
                            <td>{{ $history->initial_stock }}</td>
                            <td>{{ $history->change_amount }}</td>
                            <td>{{ $history->final_stock }}</td>
                            <td>{{ $history->note ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

</div>
@endsection
