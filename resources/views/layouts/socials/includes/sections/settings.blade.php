<!-- resources/views/settings.blade.php -->

<div class="tab-pane fade h-100" id="tab-content-settings" role="tabpanel">
    <div class="d-flex flex-column h-100">
        <div class="hide-scrollbar">
            <div class="container py-8">

                <!-- Title -->
                <div class="mb-8">
                    <h2 class="fw-bold m-0">Settings</h2>
                </div>

                <!-- Profile Card -->
                <div class="card border-0 mb-6">
                    <div class="card-body">
                        <div class="row align-items-center gx-5">
                            <div class="col-auto">
                                <div class="avatar">
                                    <!-- Default avatar if not set -->
                                    <img src="{{ asset('assets/img/avatars/1.jpg') }}"
                                         alt="Profile Picture"
                                         class="avatar-img">

                                    <!-- Upload button -->
                                    <div class="badge badge-circle bg-secondary border-outline position-absolute bottom-0 end-0">
                                        <i class="bi bi-camera"></i>
                                    </div>
                                    <input id="upload-profile-photo" class="d-none" type="file" name="profile_photo">
                                    <label class="stretched-label mb-0" for="upload-profile-photo"></label>
                                </div>
                            </div>
                            <div class="col">
                                <h5>{{ auth()->user()->name ?? 'New User' }}</h5>
                                <p>{{ auth()->user()->email ?? 'example@email.com' }}</p>
                            </div>
                            <div class="col-auto">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-link text-muted p-0">
                                        <i class="bi bi-box-arrow-right fs-4"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Settings -->
                <div class="card border-0 mb-6">
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="profile-name"
                                       name="name" value="{{ old('name', auth()->user()->name) }}" required>
                                <label for="profile-name">Name</label>
                            </div>

                            <div class="form-floating mb-4">
                                <input type="email" class="form-control" id="profile-email"
                                       name="email" value="{{ old('email', auth()->user()->email) }}" required>
                                <label for="profile-email">Email</label>
                            </div>

                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="profile-phone"
                                       name="phone" value="{{ old('phone', auth()->user()->phone) }}">
                                <label for="profile-phone">Phone</label>
                            </div>

                            <div class="form-floating mb-4">
                                <textarea class="form-control" id="profile-bio" name="bio" style="min-height: 120px;">{{ old('bio', auth()->user()->bio) }}</textarea>
                                <label for="profile-bio">Bio</label>
                            </div>

                            <button type="submit" class="btn btn-lg btn-primary w-100">Save Changes</button>
                        </form>
                    </div>
                </div>

                <!-- Security -->
                <div class="card border-0 mb-6">
                    <div class="card-body">
                        <h5 class="mb-4">Change Password</h5>
                        <form method="POST" action="">
                            @csrf
                            @method('PUT')

                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="current-password" name="current_password" required>
                                <label for="current-password">Current Password</label>
                            </div>

                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="new-password" name="password" required>
                                <label for="new-password">New Password</label>
                            </div>

                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
                                <label for="password-confirm">Confirm Password</label>
                            </div>

                            <button type="submit" class="btn btn-lg btn-warning w-100">Update Password</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
