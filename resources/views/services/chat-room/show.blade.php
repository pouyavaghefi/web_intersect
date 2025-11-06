@extends('layouts.social-real.master')

@section('chat')
    <main class="main h-100 d-flex flex-column">

        <!-- Chat Header -->
        <div class="chat-header border-bottom py-4 py-lg-7">
            <div class="row align-items-center">

                <!-- Mobile: close -->
                <div class="col-2 d-xl-none">
                    <a class="icon icon-lg text-muted" href="" data-toggle-chat>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-chevron-left">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </a>
                </div>

                <!-- Title / Avatar -->
                <div class="col-8 col-xl-12 text-center text-xl-start">
                    <div class="d-flex align-items-center justify-content-center justify-content-xl-start">
                        <div class="avatar avatar-online me-3">
                            <img class="avatar-img"
                                 src="{{ asset('chat-room/assets/img/avatars/2.jpg') }}"
                                 alt="{{ $otherUser->name ?? 'User' }}">
                        </div>
                        <div>
                            <h5 class="mb-0 text-truncate">
                                {{ $conversation->is_group ? $conversation->title : ($otherUser->name ?? 'Unknown User') }}
                            </h5>
                            <p class="text-muted mb-0" id="typingIndicator">
                                {{ $conversation->is_group ? $conversation->members->count().' members' : 'Online' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Mobile: more -->
                <div class="col-2 d-xl-none text-end">
                    <a href="#" class="icon icon-lg text-muted"
                       data-bs-toggle="offcanvas" data-bs-target="#offcanvas-more"
                       aria-controls="offcanvas-more">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-more-vertical">
                            <circle cx="12" cy="12" r="1"/>
                            <circle cx="12" cy="5" r="1"/>
                            <circle cx="12" cy="19" r="1"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Chat Body -->
        <div class="chat-body flex-1 overflow-auto hide-scrollbar py-6">
            @if($messages->count() > 0)
                @foreach($messages as $message)
                    <div class="message {{ $message->sender_id == Auth::id() ? 'message-out' : '' }}">
                        <!-- Avatar -->
                        <a href="#" class="avatar avatar-sm me-2">
                            <img class="avatar-img"
                                 src="{{ $message->sender_id == Auth::id()
                                    ? asset('chat-room/assets/img/avatars/1.jpg')
                                    : asset('chat-room/assets/img/avatars/2.jpg') }}"
                                 alt="{{ $message->sender_id == Auth::id() ? 'You' : ($message->sender->name ?? 'User') }}">
                        </a>

                        <!-- Message bubble -->
                        <div class="message-inner">
                            <div class="message-body">
                                <div class="message-content">
                                    <p>{{ $message->content }}</p>
                                </div>
                            </div>
                            <div class="message-footer">
                                <small class="text-muted">
                                    {{ $message->created_at->format('h:i A') }}
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center py-6">
                    <div class="avatar avatar-lg mb-3">
                        <div class="avatar-text bg-light text-muted">
                            <i class="fas fa-comment fa-2x"></i>
                        </div>
                    </div>
                    <h5>No messages yet</h5>
                    <p class="text-muted">Send a message to start the conversation</p>
                </div>
            @endif
        </div>

        <!-- Chat Footer -->
        <div class="chat-footer py-3 py-lg-5">
            <form id="messageForm" class="d-flex align-items-center">
                @csrf
                <input type="hidden" name="conversation_id" value="{{ $conversation->id }}">
                <textarea class="form-control me-2"
                          name="message"
                          placeholder="Type a message..."
                          rows="1" required></textarea>
                <button type="submit" class="btn btn-primary rounded-circle">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chatBody = document.querySelector('.chat-body');
            if(chatBody) chatBody.scrollTop = chatBody.scrollHeight;

            const form = document.getElementById('messageForm');
            if(form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const formData = new FormData(this);

                    fetch('', {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        body: formData
                    })
                        .then(res => res.json())
                        .then(data => {
                            if(data.success) location.reload();
                        })
                        .catch(console.error);
                });
            }
        });
    </script>
@endsection
