<!-- resources/views/chat/friends.blade.php -->

<div class="tab-pane fade h-100" id="tab-content-friends" role="tabpanel">
    <div class="d-flex flex-column h-100">
        <div class="hide-scrollbar">
            <div class="container py-8">

                <!-- Title -->
                <div class="mb-8">
                    <h2 class="fw-bold m-0">Friends</h2>
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
                                   placeholder="Search friends..."
                                   aria-label="Search friends">
                        </div>
                    </form>

                    <!-- Invite button -->
                    <div class="mt-5">
                        <a href="#"
                           class="btn btn-lg btn-primary w-100 d-flex align-items-center"
                           data-bs-toggle="modal"
                           data-bs-target="#modal-invite">
                            Find Friends
                            <span class="icon ms-auto">
                                <i class="bi bi-person-plus"></i>
                            </span>
                        </a>
                    </div>
                </div>

                <!-- Friends list -->
                <div class="card-list">
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-people fs-1 mb-3"></i>
                        <p class="mb-0">You don’t have any friends yet.</p>
                        <small>Use the button above to find and add friends.</small>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
