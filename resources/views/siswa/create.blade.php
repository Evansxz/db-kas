@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('content')

<div class="card">

    <h1>Tambah Siswa</h1>

    <form action="{{ route('siswa.store') }}"
          method="POST">

        @csrf

        <div class="form-group">
            <label>NIS</label>

            <input type="text"
                   name="nis"
                   value="{{ old('nis') }}"
                   required>
        </div>

        <div class="form-group">
            <label>Nama</label>

            <input type="text"
                   name="nama"
                   value="{{ old('nama') }}"
                   required>
        </div>

        <div class="form-group">
            <label>Jabatan</label>

            <input type="text"
                   name="jabatan"
                   value="{{ old('jabatan') }}"
                   required>
        </div>

        <div class="form-group">
            <label>Kelas</label>

            <input type="text"
                   name="kelas"
                   value="{{ old('kelas') }}"
                   required>
        </div>

        <button type="submit"
                class="btn btn-primary">
            Simpan
        </button>

        <a href="{{ route('siswa.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection