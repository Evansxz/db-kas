@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('content')

<div class="card">

    <h1>Edit Siswa</h1>

    <form action="{{ route('siswa.update', $siswa->id_siswa) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label>NIS</label>
            <input type="text"
                   name="nis"
                   value="{{ old('nis', $siswa->nis) }}"
                   required>
        </div>

        <div class="form-group">
            <label>Nama</label>
            <input type="text"
                   name="nama"
                   value="{{ old('nama', $siswa->nama) }}"
                   required>
        </div>

        <div class="form-group">
            <label>Jabatan</label>
            <input type="text"
                   name="jabatan"
                   value="{{ old('jabatan', $siswa->jabatan) }}"
                   required>
        </div>

        <div class="form-group">
            <label>Kelas</label>
            <input type="text"
                   name="kelas"
                   value="{{ old('kelas', $siswa->kelas) }}"
                   required>
        </div>

        <button type="submit" class="btn btn-primary">
            Update
        </button>

        <a href="{{ route('siswa.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection