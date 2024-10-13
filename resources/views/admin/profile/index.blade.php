@extends('layouts.app')

@section('content')
<div class="container minecraft-container" style="text-align: center;">

    <!-- Container with Background Image -->
    <div class="profile-container" style="background-image: url('{{ asset('assets/img/MC-5.jpg') }}'); background-size: cover; background-position: center; padding: 50px; border-radius: 10px;">

        <!-- Heading -->
        <h1 style="color: #39ff14; font-family: 'Minecraftia', sans-serif;">Update Profile</h1>

        <!-- Update Email Form (with Password confirmation) -->
        <form method="POST" action="{{ route('profile.update') }}" class="minecraft-form">
            @csrf
            @method('PUT')

            <!-- Email -->
            <div class="form-group">
                <label for="email" style="color: white; font-family: 'Minecraftia', sans-serif;">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control minecraft-input" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Current Password for Email Change -->
            <div class="form-group">
                <label for="current_password" style="color: white; font-family: 'Minecraftia', sans-serif;">Current Password</label>
                <input type="password" name="current_password" class="form-control minecraft-input" required>
                @error('current_password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Update Button -->
            <button type="submit" class="btn minecraft-button">Update Email</button>
        </form>

        <hr>

        <!-- Update Password Form -->
        <form method="POST" action="{{ route('profile.update.password') }}" class="minecraft-form">
            @csrf
            @method('PUT')

            <!-- Current Password -->
            <div class="form-group">
                <label for="current_password" style="color: white; font-family: 'Minecraftia', sans-serif;">Current Password</label>
                <input type="password" name="current_password" class="form-control minecraft-input" required>
                @error('current_password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- New Password -->
            <div class="form-group">
                <label for="password" style="color: white; font-family: 'Minecraftia', sans-serif;">New Password</label>
                <input type="password" name="password" class="form-control minecraft-input" required>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm New Password -->
            <div class="form-group">
                <label for="password_confirmation" style="color: white; font-family: 'Minecraftia', sans-serif;">Confirm New Password</label>
                <input type="password" name="password_confirmation" class="form-control minecraft-input" required>
            </div>

            <!-- Update Password Button -->
            <button type="submit" class="btn minecraft-button">Update Password</button>
        </form>

        <hr>

        <!-- Delete Account Form -->
        <form method="POST" action="{{ route('profile.destroy') }}" class="minecraft-form">
            @csrf
            @method('DELETE')

            <!-- Password Confirmation for Account Deletion -->
            <div class="form-group">
                <label for="password" style="color: white; font-family: 'Minecraftia', sans-serif;">Confirm Password to Delete Account:</label>
                <input type="password" name="password" class="form-control minecraft-input" required>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Delete Button -->
            <button type="submit" class="btn minecraft-button minecraft-danger">Delete Account</button>
        </form>

    </div>
</div>
@endsection
