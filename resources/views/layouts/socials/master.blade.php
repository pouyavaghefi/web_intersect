<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
    @include('layouts.socials.init.head')
    <style>
        /* Lock overlay */
        .lock-overlay {
            position: fixed;
            inset: 0; /* top:0, left:0, right:0, bottom:0 */
            background: rgba(0,0,0,0.6); /* grey transparent */
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999; /* keep it above everything */
        }
        .lock-overlay .lock-icon {
            font-size: 100px;
            color: #fff;
            opacity: 0.9;
            transition: transform 0.3s ease;
        }
        .lock-overlay .lock-icon:hover {
            transform: scale(1.1);
        }
    </style>
    <!-- Font Awesome (for lock icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
<!-- Layout -->
<div class="layout overflow-hidden">
    <!-- Navigation -->
    @include('layouts.socials.includes.overalls.navigation')
    <!-- Navigation -->

    <!-- Sidebar -->
    @include('layouts.socials.includes.overalls.sidebar')
    <!-- Sidebar -->

    <!-- Chat -->
    @yield('chat')
    <!-- Chat -->

</div>
<!-- Layout -->

@include('layouts.socials.includes.gadgets.modals')

@include('layouts.socials.init.scripts')

{{-- Show lock overlay only for guest users --}}

    <div class="lock-overlay">
        <i class="fas fa-lock lock-icon"></i>
    </div>
@

</body>
</html>
