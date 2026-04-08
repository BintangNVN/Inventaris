@extends('layouts.app')

@section('title', 'Tambah Kategori')
@section('pageTitle', 'Welcome Back, ' . auth()->user()->name)

@section('content')

<div style="max-width: 600px; margin: auto;">
    <div style="margin-bottom: 24px;">
        <h2 class="text-2xl font-bold mb-4">Add User Forms</h2>
        <h4>Please <span class="text-red-500">.fill-all</span> input form right value</h4>
    </div>
    <div style="background: #fff; padding: 24px; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <!-- Nama -->
            <div style="margin-bottom: 16px;">
                <label style="display:block; margin-bottom:6px; font-weight:600;">Name</label>
                <input 
                    type="text" 
                    name="name" 
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama kategori"
                    style="width:100%; padding:10px; border-radius:8px; border:1px solid #ccc;"
                    required
                >

                @error('name')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            <!-- Email -->
            <div style="margin-bottom: 16px;">
                <label style="display:block; margin-bottom:6px; font-weight:600;">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    style="width:100%; padding:10px; border-radius:8px; border:1px solid #ccc;"
                    required
                >

                @error('email')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            <!-- Division -->
            <div style="margin-bottom: 20px;">
                <label style="display:block; margin-bottom:6px; font-weight:600;">Division</label>
                <select 
                    name="division" 
                    style="width:100%; padding:10px; border-radius:8px; border:1px solid #ccc;"
                    required
                >
                    <option value="">-- Pilih Division --</option>
                    <option value="Sarpras" {{ old('division') == 'Sarpras' ? 'selected' : '' }}>Sarpras</option>
                    <option value="Tata usaha" {{ old('division') == 'Tata usaha' ? 'selected' : '' }}>Tata usaha</option>
                    <option value="Tefa" {{ old('division') == 'Tefa' ? 'selected' : '' }}>Tefa</option>
                </select>

                @error('division')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            <!-- Button -->
            <div style="display:flex; justify-content:space-between;">
                <a href="{{ route('categories.index') }}" 
                   style="padding:10px 16px; background:#e5e7eb; border-radius:8px; text-decoration:none; color:#111;">
                    Kembali
                </a>

                <button 
                    type="submit" 
                    style="padding:10px 18px; background:#3b82f6; color:#fff; border:none; border-radius:8px; cursor:pointer;">
                    Simpan
                </button>
            </div>

        </form>

    </div>

</div>

@endsection