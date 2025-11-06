<div class="tab-pane fade h-100" id="tab-content-create-chat" role="tabpanel">
    <div class="d-flex flex-column h-100">
        <div class="hide-scrollbar">
            <div class="container py-8">

                <!-- Title -->
                <div class="mb-8">
                    <h2 class="fw-bold m-0">Create Chat</h2>
                </div>

                <!-- Search -->
                <div class="mb-6 position-relative"> <!-- relative parent for absolute dropdown -->
                    <form id="searchForm" method="GET" action="/chat-room/search-users">
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="bi bi-search"></i>
                            </div>
                            <input type="text"
                                   class="form-control form-control-lg ps-0"
                                   name="q"
                                   placeholder="Search users by username globally..."
                                   aria-label="Search users"
                                   autocomplete="off">
                        </div>
                    </form>

                    <!-- Search results dropdown -->
                    <div id="searchResults" class="list-group position-absolute w-100"
                         style="z-index:1000; display:none; max-height:300px; overflow-y:auto;"></div>
                </div>

                <!-- AJAX script -->
                <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
                <script>
                    $(function() {
                        const $input = $('input[name="q"]');
                        const $results = $('#searchResults');
                        const $select = $('#user_id');
                        let ajaxRequest = null;

                        // Handle input typing with debounce
                        let typingTimer;
                        const typingDelay = 300; // ms

                        $input.on('input', function() {
                            clearTimeout(typingTimer);
                            typingTimer = setTimeout(doSearch, typingDelay);
                        });

                        function doSearch() {
                            const query = $input.val().trim();
                            if (!query) {
                                $results.hide();
                                return;
                            }

                            if (ajaxRequest) ajaxRequest.abort();

                            ajaxRequest = $.ajax({
                                url: '/chat-room/search-users',
                                method: 'GET',
                                data: { q: query },
                                success: function(users) {
                                    $results.empty();
                                    if (!users || users.length === 0) {
                                        $results.append('<div class="list-group-item">No users found</div>').show();
                                        return;
                                    }

                                    users.forEach(user => {
                                        const item = $('<button type="button" class="list-group-item list-group-item-action"></button>');
                                        item.text(user.username + ' (' + user.name + ')');
                                        item.on('click', function() {
                                            // Populate select
                                            $select.empty().append(
                                                `<option value="${user.id}" selected>${user.username} (${user.name})</option>`
                                            );
                                            $results.hide();
                                            $input.val('');
                                        });
                                        $results.append(item);
                                    });
                                    $results.show();
                                },
                                error: function(xhr, status, error) {
                                    console.error('Search error:', error);
                                }
                            });
                        }

                        // Hide results when clicking outside
                        $(document).on('click', function(e) {
                            if (!$(e.target).closest('#searchForm, #searchResults').length) {
                                $results.hide();
                            }
                        });
                    });
                </script>

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
                        <form method="POST" action="{{ route('chat.create') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="user_id" class="form-label">Select User</label>
                                <select class="form-select" name="user_id" id="user_id" required>
                                    <option value="" disabled selected>Choose a user...</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary w-100">Start Chat</button>
                        </form>

                        <!-- Add SweetAlert CDN in your Blade layout -->
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                        <script>
                            @if($errors->any())
                            Swal.fire({
                                icon: 'error',
                                title: 'Validation Error',
                                html: `
                <ul style="text-align:left;">
                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                @endforeach
                                </ul>
`
                            });
                            @endif

                            @if(session('error'))
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: '{{ session('error') }}'
                            });
                            @endif
                        </script>
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
                                <select class="form-select" name="members[]" id="members" multiple required></select>
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
