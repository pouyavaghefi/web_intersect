<!-- resources/views/chat/support.blade.php -->

<div class="tab-pane fade h-100" id="tab-content-support" role="tabpanel">
    <div class="d-flex flex-column h-100">
        <div class="hide-scrollbar">
            <div class="container py-8">

                <!-- Title -->
                <div class="mb-8">
                    <h2 class="fw-bold m-0">Support</h2>
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
                                   placeholder="Search documentation or help..."
                                   aria-label="Search documentation or help">
                        </div>
                    </form>
                </div>

                <!-- Docs -->
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row align-items-center gx-5">
                            <div class="col-auto text-primary">
                                <i class="bi bi-journal-text fs-1"></i>
                            </div>

                            <div class="col">
                                <h4 class="mb-1">Documentation</h4>
                                <p>Setup guides and tools</p>
                            </div>

                            <div class="col-auto">
                                <a href="" class="btn btn-sm btn-icon btn-primary rounded-circle">
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pages -->
                <div class="card-list mt-8">
                    <div class="d-flex align-items-center mb-4 px-6">
                        <small class="text-muted me-auto">Pages</small>
                    </div>

{{--                    @forelse($pages as $page)--}}
{{--                        <div class="card border-0 mb-3">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="row align-items-center gx-0">--}}
{{--                                    <div class="col">--}}
{{--                                        <h4 class="mb-1">{{ $page['title'] }}</h4>--}}
{{--                                        <p>{{ $page['description'] }}</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <a href="{{ $page['url'] }}" class="btn btn-sm btn-icon btn-primary rounded-circle">--}}
{{--                                            <i class="bi bi-chevron-right"></i>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @empty--}}
{{--                        <!-- Empty state -->--}}
{{--                        <div class="text-center py-5 text-muted">--}}
{{--                            <i class="bi bi-journal-x fs-1 mb-3"></i>--}}
{{--                            <p class="mb-0">No support pages available</p>--}}
{{--                            <small>Documentation and guides will appear here.</small>--}}
{{--                        </div>--}}
{{--                    @endforelse--}}
                </div>

            </div>
        </div>
    </div>
</div>
