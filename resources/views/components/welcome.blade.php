<!DOCTYPE html>
<html lang="en">
@include('init.head')
<body class="bg-gray-50 min-h-screen">
<div class="container mx-auto px-4 py-8">
    <!-- Admin Panel  -->
    <div class="admin-panel bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-xl p-6 mb-8">
        <!-- Navbar -->
        @include('overalls.navbar')

        <!-- Slider Management Content -->
        @include('sections.slider', ['sliders' => $sliders])

        <!-- Product Management Content -->
        @include('sections.product')

        <!-- Content Management Content -->
        @include('sections.cms')

        <!-- Stats -->
        @include('sections.stats')
    </div>

    <!-- Big Interactive Analog Clock -->
    @include('gadgets.analog-clock')

    <!-- Welcome Card -->
    @include('gadgets.welcome-card')
</div>

<!-- Scripts -->
@include('init.scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Handle Edit
        document.querySelectorAll(".edit-btn").forEach(button => {
            button.addEventListener("click", function () {
                const productId = this.getAttribute("data-id");

                Swal.fire({
                    title: "Edit Product?",
                    text: "You are about to edit this product.",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#2563eb",
                    cancelButtonColor: "#6b7280",
                    confirmButtonText: "Yes, edit it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to edit page (adjust route as needed)
                        window.location.href = `/products/${productId}/edit`;
                    }
                });
            });
        });

        // Handle Delete
        document.querySelectorAll(".delete-btn").forEach(button => {
            button.addEventListener("click", function () {
                const productId = this.getAttribute("data-id");

                Swal.fire({
                    title: "Are you sure?",
                    text: "This product will be permanently deleted!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#dc2626",
                    cancelButtonColor: "#6b7280",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit a form or send AJAX to delete
                        fetch(`/products/${productId}`, {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Content-Type": "application/json"
                            }
                        })
                            .then(res => res.json())
                            .then(() => {
                                Swal.fire("Deleted!", "Product has been deleted.", "success")
                                    .then(() => location.reload());
                            });
                    }
                });
            });
        });
    });
</script>
</body>
</html>
