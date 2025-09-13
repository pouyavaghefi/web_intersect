<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
    @include('layouts.init.head')
</head>

<body>
<!-- Layout -->
<div class="layout overflow-hidden">
    <!-- Navigation -->
    @include('layouts.includes.overalls.navigation')
    <!-- Navigation -->

    <!-- Sidebar -->
    @include('layouts.includes.overalls.sidebar')
    <!-- Sidebar -->

    <!-- Chat -->
    @yield('chat')
    <!-- Chat -->

</div>
<!-- Layout -->

@include('layouts.includes.gadgets.modals')

@include('layouts.init.scripts')
</body>
</html>
