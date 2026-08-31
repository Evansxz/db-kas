@extends('layouts.app')

@section('title', 'Tambah Pembayaran')

@section('content')

<div class="card">

    <h1>Tambah Pembayaran</h1>

    <form action="{{ route('pembayaran.store') }}" method="POST">

        @csrf

        <div class="form-group">
            <label for="id_siswa">Siswa</label>

            <select name="id_siswa" id="id_siswa" required>

                <option value="">
                    -- Pilih Siswa --
                </option>

                @foreach($siswa as $item)

                    <option value="{{ $item->id_siswa }}"
                        {{ old('id_siswa') == $item->id_siswa ? 'selected' : '' }}>

                        {{ $item->nis }} - {{ $item->nama }}

                    </option>

                @endforeach

            </select>
        </div>


        <div class="form-group">

            <label for="tanggal_bayar">
                Tanggal Bayar
            </label>

            <input type="date"
                   name="tanggal_bayar"
                   id="tanggal_bayar"
                   value="{{ old('tanggal_bayar', date('Y-m-d')) }}"
                   required>

        </div>


        <div class="form-group">

            <label for="jumlah_bayar">
                Jumlah Bayar
            </label>

            <input type="number"
                   name="jumlah_bayar"
                   id="jumlah_bayar"
                   value="{{ old('jumlah_bayar') }}"
                   min="1"
                   required>

        </div>


        <div class="form-group">

            <label for="status">
                Status
            </label>

            <select name="status" id="status" required>

                <option value="">
                    -- Pilih Status --
                </option>

                <option value="Lunas"
                    {{ old('status') == 'Lunas' ? 'selected' : '' }}>
                    Lunas
                </option>

                <option value="Belum Lunas"
                    {{ old('status') == 'Belum Lunas' ? 'selected' : '' }}>
                    Belum Lunas
                </option>

            </select>

        </div>


        <button type="submit"
                class="btn btn-primary">

            Simpan

        </button>


        <a href="{{ route('pembayaran.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>

@endsection