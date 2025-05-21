@extends('layouts.app')

@section('content')
<div class="container py-5">
    <style>
        .profile-img-container {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto 1.5rem;
        }
        .profile-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid rgb(245, 243, 240);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .profile-header {
            background-color: #653450;
            color: white;
            padding: 3rem;
            border-radius: 15px;
            margin-bottom: 2rem;
        }
        .profile-title {
            font-size: 2.2rem;
            font-weight: 600;
            color: rgb(235, 235, 235);
            margin-bottom: 0.5rem;
        }
        .profile-email {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        .btn-edit {
            background-color: #AA5486;
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
        }
        .btn-edit:hover {
            background-color: #4b2738;
        }
        .upload-section {
<<<<<<< HEAD
            background: rgba(255,255,255,0.1);
            padding: 1.5rem;
            border-radius: 10px;
            margin-top: 1.5rem;
        }
=======
    background: rgba(255,255,255,0.05);
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    margin-top: 2rem;
}

.upload-section h4 {
    font-weight: 600;
    font-size: 1.4rem;
}

.form-control-lg {
    padding: 0.75rem 1rem;
    font-size: 1rem;
    border-radius: 10px;
}

@media (max-width: 576px) {
    .upload-section {
        padding: 1rem;
    }

    .form-control-lg {
        font-size: 0.9rem;
    }

    .btn-edit {
        margin-top: 1rem;
        width: 100%;
    }
}

>>>>>>> itom
        .wide-card {
            max-width: 900px;
            margin: 0 auto;
        }
    </style>

    <!-- Profile Header Section -->
    <div class="profile-header text-center">
        <div class="profile-img-container">
            @if(auth()->user()->profile_image)
                <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" 
                     class="profile-img" 
                     alt="Profile Image">
            @else
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&size=150&background=random" 
                     class="profile-img" 
                     alt="Default Profile Image">
            @endif
        </div>
        
        <!-- Image Upload Section -->
    
        
        <h1 class="profile-title">{{ auth()->user()->name }}</h1>
        <p class="profile-email">{{ auth()->user()->email }}</p>

<<<<<<< HEAD
         <div class="upload-section">
            <h4 class="text-white mb-3">Update Profile Picture</h4>
            <form method="POST" action="{{ route('profile.image') }}" enctype="multipart/form-data" class="d-flex justify-content-center">
                @csrf
                <div class="w-75">
                    <input type="file" class="form-control" name="image" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-edit ms-3">
                    Upload
                </button>
            </form>
        </div>
=======
      <div class="upload-section">
    <h6 class="text-white mb-4 text-center">Update Profile Picture</h6>
    <form method="POST" action="{{ route('profile.image') }}" enctype="multipart/form-data">
        @csrf
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 mb-3 mb-md-0">
                <input 
                    type="file" 
                    class="form-control form-control-lg" 
                    name="image" 
                    accept="image/*" 
                    required>
            </div>
            <div class="col-md-3 text-center text-md-start">
                <button type="submit" class="btn btn-edit w-100">
                    <i class="fas fa-upload me-1"></i> Upload
                </button>
            </div>
        </div>
    </form>
</div>

>>>>>>> itom
    </div>

    <!-- Profile Information Section -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm wide-card">
                <div class="card-body p-4">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm wide-card">
                <div class="card-body p-4">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4 mb-5">
        <div class="col-12">
            <div class="card shadow-sm wide-card">
                <div class="card-body p-4">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection