@extends('layouts.app')

@section('title', 'Edit Pembayaran')

@section('content')

<div class="card">

    <h1>Edit Pembayaran</h1>

    <form action="{{ route('pembayaran.update', $pembayaran->id_pembayaran) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_siswa">Siswa</label>

            <select name="id_siswa" id="id_siswa" required>

                @foreach($siswa as $item)

                    <option value="{{ $item->id_siswa }}"
                        {{ old('id_siswa', $pembayaran->id_siswa) == $item->id_siswa ? 'selected' : '' }}>

                        {{ $item->nis }} - {{ $item->nama }}

                    </option>

                @endforeach

            </select>
        </div>

        <div class="form-group">
            <label for="tanggal_bayar">Tanggal Bayar</label>

            <input type="date"
                   name="tanggal_bayar"
                   id="tanggal_bayar"
                   value="{{ old('tanggal_bayar', $pembayaran->tanggal_bayar) }}"
                   required>
        </div>

        <div class="form-group">
            <label for="jumlah_bayar">Jumlah Bayar</label>

            <input type="number"
                   name="jumlah_bayar"
                   id="jumlah_bayar"
                   value="{{ old('jumlah_bayar', $pembayaran->jumlah_bayar) }}"
                   min="1"
                   required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>

            <select name="status" id="status" required>

                <option value="Lunas"
                    {{ old('status', $pembayaran->status) == 'Lunas' ? 'selected' : '' }}>
                    Lunas
                </option>

                <option value="Belum Lunas"
                    {{ old('status', $pembayaran->status) == 'Belum Lunas' ? 'selected' : '' }}>
                    Belum Lunas
                </option>

            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            Update
        </button>

        <a href="{{ route('pembayaran.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection