<!-- resources/views/chat/create.blade.php -->

<div class="tab-pane fade h-100" id="tab-content-create-chat" role="tabpanel">
    <div class="d-flex flex-column h-100">
        <div class="hide-scrollbar">
            <div class="container py-8">

                <!-- Title -->
                <div class="mb-8">
                    <h2 class="fw-bold m-0">Create Chat</h2>
                </div>

                <!-- Search -->
                <div class="mb-6">
                    <form method="GET" action="">
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="bi bi-search"></i>
                            </div>
                            <input type="text"
                                   class="form-control form-control-lg ps-0"
                                   name="q"
                                   placeholder="Search users..."
                                   aria-label="Search users">
                        </div>
                    </form>
                </div>

                <!-- Tabs -->
                <ul class="nav nav-pills nav-justified mb-4" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active"
                           data-bs-toggle="pill"
                           href="#create-chat-single"
                           role="tab">
                            Single Chat
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           data-bs-toggle="pill"
                           href="#create-chat-group"
                           role="tab">
                            New Group
                        </a>
                    </li>
                </ul>

                <!-- Tabs content -->
                <div class="tab-content" role="tablist">

                    <!-- Single Chat -->
                    <div class="tab-pane fade show active" id="create-chat-single" role="tabpanel">
                        <form method="POST" action="">
                            @csrf
                            <div class="mb-4">
                                <label for="user_id" class="form-label">Select User</label>
                                <select class="form-select" name="user_id" id="user_id" required>
                                    <option value="" disabled selected>Choose a user...</option>
                                    {{-- Populate from DB --}}
{{--                                    @foreach($users as $user)--}}
{{--                                        <option value="{{ $user->id }}">{{ $user->name }}</option>--}}
{{--                                    @endforeach--}}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary w-100">
                                Start Chat
                            </button>
                        </form>
                    </div>

                    <!-- New Group -->
                    <div class="tab-pane fade" id="create-chat-group" role="tabpanel">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="group_name" class="form-label">Group Name</label>
                                <input type="text" class="form-control" name="group_name" id="group_name" required>
                            </div>
                            <div class="mb-4">
                                <label for="group_description" class="form-label">Description</label>
                                <textarea class="form-control" name="group_description" id="group_description" rows="3"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="group_photo" class="form-label">Group Photo</label>
                                <input type="file" class="form-control" name="group_photo" id="group_photo" accept="image/*">
                            </div>
                            <div class="mb-4">
                                <label for="members" class="form-label">Select Members</label>
                                <select class="form-select" name="members[]" id="members" multiple required>
                                    {{-- Populate from DB --}}

                                </select>
                            </div>
                            <button type="submit" class="btn btn-lg btn-success w-100">
                                Create Group
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
