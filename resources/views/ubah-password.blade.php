@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5 py-2">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-5 text-center align-items-center">
                        <div class="profile-img">
                            <img src="{{ asset('assets/profile.png') }}" class="rounded-circle" alt="Profile Image"
                                width="150">
                        </div>
                        <h3 class="mt-3">Ahmad Syahroni Kurniawan</h3>
                    </div>
                    <div class="col-md-6">
                        <h1 class="fw-bold mt-4 mb-4">Ubah Password</h1>
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="password-lama" class="form-label fw-bold mb-0">Password Lama</label>
                                </div>
                                <input type="password" class="form-control" id="password" name="password-lama"
                                    placeholder="Password Lama" required>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="password-baru" class="form-label fw-bold mb-0">Password Baru</label>
                                </div>
                                <input type="password" class="form-control" id="password" name="password-baru"
                                    placeholder="Password Baru" required>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="konfirmasi-password" class="form-label fw-bold mb-0">Konfirmasi
                                        Password</label>
                                </div>
                                <input type="password" class="form-control" id="password" name="konfirmasi-password"
                                    placeholder="Konfirmasi Password" required>
                            </div>
                            <button type="submit" class="btn btn-warning px-3 py-3">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
