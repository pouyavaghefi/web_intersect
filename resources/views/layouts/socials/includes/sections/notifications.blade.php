<!-- resources/views/chat/notifications.blade.php -->

<div class="tab-pane fade h-100" id="tab-content-notifications" role="tabpanel">
    <div class="d-flex flex-column h-100">
        <div class="hide-scrollbar">
            <div class="container py-8">

                <!-- Title -->
                <div class="mb-8">
                    <h2 class="fw-bold m-0">Notifications</h2>
                </div>

                <!-- Search -->
                <div class="mb-6">
                    <form method="GET" action="">
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="bi bi-search"></i>
                            </div>
                            <input type="text"
                                   name="q"
                                   class="form-control form-control-lg ps-0"
                                   placeholder="Search notifications..."
                                   aria-label="Search notifications">
                        </div>
                    </form>
                </div>

                <!-- Notifications list -->
                <div class="card-list">
{{--                    @forelse($notifications as $notification)--}}
{{--                        <div class="card border-0 mb-4">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="row gx-5">--}}
{{--                                    <!-- Avatar -->--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <div class="avatar">--}}
{{--                                            @if($notification->avatar)--}}
{{--                                                <img src="{{ $notification->avatar }}" class="avatar-img" alt="">--}}
{{--                                            @else--}}
{{--                                                <span class="avatar-text bg-primary">--}}
{{--                                                    <i class="bi bi-bell"></i>--}}
{{--                                                </span>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <!-- Content -->--}}
{{--                                    <div class="col">--}}
{{--                                        <div class="d-flex align-items-center mb-2">--}}
{{--                                            <h5 class="me-auto mb-0">--}}
{{--                                                {{ $notification->title }}--}}
{{--                                            </h5>--}}
{{--                                            <span class="extra-small text-muted ms-2">--}}
{{--                                                {{ $notification->created_at->diffForHumans() }}--}}
{{--                                            </span>--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex">--}}
{{--                                            <div class="me-auto">--}}
{{--                                                {!! $notification->message !!}--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @empty--}}
{{--                        <!-- Empty state -->--}}
{{--                        <div class="text-center py-5 text-muted">--}}
{{--                            <i class="bi bi-bell-slash fs-1 mb-3"></i>--}}
{{--                            <p class="mb-0">No notifications yet</p>--}}
{{--                            <small>You’ll see updates and alerts here.</small>--}}
{{--                        </div>--}}
{{--                    @endforelse--}}
                </div>

            </div>
        </div>
    </div>
</div>
