<!-- resources/views/chat/chats.blade.php -->

<div class="tab-pane fade h-100 show active" id="tab-content-chats" role="tabpanel">
    <div class="d-flex flex-column h-100 position-relative">
        <div class="hide-scrollbar">
            <div class="container py-8">

                <!-- Title -->
                <div class="mb-8">
                    <h2 class="fw-bold m-0">Chats</h2>
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
                                   placeholder="Search messages or users..."
                                   aria-label="Search messages or users">
                        </div>
                    </form>
                </div>

                <!-- Chat list -->
                <div class="card-list">
                    @forelse($conversations as $chat)
                        <a href="{{ route('chat.show', $chat->id) }}" class="card border-0 text-reset">
                            <div class="card-body">
                                <div class="row gx-5">
                                    <!-- Avatar -->
                                    <div class="col-auto">
                                        <div class="avatar">
                                            @if($chat->is_group)
                                                <span class="avatar-text">G</span>
                                            @else
                                                @php $other = $chat->members->first(); @endphp
                                                <span class="avatar-text">{{ strtoupper(substr($other->name, 0, 1)) }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Chat info -->
                                    <div class="col">
                                        <div class="d-flex align-items-center mb-2">
                                            <h5 class="me-auto mb-0">
                                                {{ $chat->is_group ? $chat->name : $other->name }}
                                            </h5>
                                            <span class="text-muted extra-small ms-2">
                                                {{ optional($chat->lastMessage)->created_at?->diffForHumans() }}
                                            </span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="line-clamp me-auto">
                                                {{ $chat->lastMessage->body ?? 'No messages yet' }}
                                            </div>
                                            @if($chat->unread_count > 0)
                                                <div class="badge badge-circle bg-primary ms-3">
                                                    <span>{{ $chat->unread_count }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <!-- Empty state -->
                        <div class="text-center py-5 text-muted">
                            <i class="bi bi-chat-dots fs-1 mb-3"></i>
                            <p class="mb-0">No chats yet</p>
                            <small>Start a new chat to see it here.</small>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
