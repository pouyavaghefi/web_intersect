<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Complete your purchase - TechServices">
    <title>Checkout | TechServices</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #3498db;
            --accent: #e74c3c;
            --light: #ecf0f1;
            --dark: #2c3e50;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .checkout-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .checkout-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }

        .checkout-steps {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            padding: 0 2rem;
        }

        .step-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #e9ecef;
            color: #6c757d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-bottom: 0.5rem;
            z-index: 2;
        }

        .step.active .step-number {
            background-color: var(--secondary);
            color: white;
        }

        .step.completed .step-number {
            background-color: #28a745;
            color: white;
        }

        .step:not(:last-child):after {
            content: '';
            position: absolute;
            top: 20px;
            left: 70px;
            width: calc(100% - 40px);
            height: 2px;
            background-color: #e9ecef;
            z-index: 1;
        }

        .step.completed:not(:last-child):after {
            background-color: #28a745;
        }

        .checkout-card {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 1.5rem;
            border: none;
        }

        .checkout-card .card-header {
            background-color: white;
            border-bottom: 1px solid #eaeaea;
            font-weight: 600;
            padding: 1rem 1.5rem;
        }

        .checkout-card .card-body {
            padding: 1.5rem;
        }

        .cart-item {
            display: flex;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 1rem;
        }

        .cart-item-details {
            flex: 1;
        }

        .cart-item-name {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .cart-item-price {
            color: var(--accent);
            font-weight: bold;
            font-size: 1.1rem;
        }

        .remove-item {
            color: #dc3545;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            transition: color 0.3s;
            padding: 0.5rem;
            border-radius: 4px;
        }

        .remove-item:hover {
            color: #bd2130;
            background-color: rgba(220, 53, 69, 0.1);
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
        }

        .summary-row.total {
            border-top: 1px solid #eaeaea;
            margin-top: 0.5rem;
            padding-top: 1rem;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .payment-method {
            border: 1px solid #eaeaea;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
            cursor: pointer;
            transition: all 0.3s;
        }

        .payment-method:hover {
            border-color: var(--secondary);
        }

        .payment-method.selected {
            border-color: var(--secondary);
            background-color: rgba(52, 152, 219, 0.05);
        }

        .payment-icon {
            font-size: 1.5rem;
            margin-right: 0.5rem;
            color: var(--primary);
        }

        .btn-checkout {
            background-color: var(--secondary);
            color: white;
            padding: 0.75rem 2rem;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            transition: background-color 0.3s;
            width: 100%;
            margin-top: 1rem;
        }

        .btn-checkout:hover {
            background-color: #2980b9;
            color: white;
        }

        .btn-checkout:disabled {
            background-color: #6c757d;
            cursor: not-allowed;
        }

        .btn-back {
            background-color: #6c757d;
            color: white;
            padding: 0.75rem 2rem;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            transition: background-color 0.3s;
            width: 100%;
            margin-top: 1rem;
        }

        .btn-back:hover {
            background-color: #5a6268;
            color: white;
        }

        .empty-cart {
            text-align: center;
            padding: 3rem;
        }

        .empty-cart-icon {
            font-size: 4rem;
            color: #e9ecef;
            margin-bottom: 1rem;
        }

        .footer {
            background-color: var(--dark);
            color: white;
            padding: 3rem 0 1rem;
            margin-top: 3rem;
        }

        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
            min-width: 250px;
        }

        @media (max-width: 768px) {
            .checkout-steps {
                flex-wrap: wrap;
            }

            .step {
                padding: 0 1rem;
                margin-bottom: 1rem;
            }

            .step:not(:last-child):after {
                display: none;
            }

            .cart-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .cart-item-image {
                margin-bottom: 1rem;
            }
        }
    </style>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fas fa-laptop-code me-2"></i>TechServices
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/services') }}">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle me-1"></i> Account
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                        @if(auth()->check())
                            <li><a class="dropdown-item" href="{{ url('/dashboard') }}"><i class="fas fa-user me-2"></i>Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ url('/dashboard/orders') }}"><i class="fas fa-shopping-bag me-2"></i>Orders</a></li>
                            <li><a class="dropdown-item" href="{{ url('/user/profile') }}"><i class="fas fa-cog me-2"></i>Profile Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ url('/user/logout') }}"><i class="fas fa-sign-out-alt me-2"></i>Sign Out</a></li>
                        @else
                            <li><a class="dropdown-item" href="{{ url('/login') }}"><i class="fas fa-sign-in-alt me-2"></i>Login</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ url('/register') }}"><i class="fas fa-user-plus me-2"></i>Register</a></li>
                        @endif
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/checkout') }}" class="nav-link cart-icon">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="badge bg-danger rounded-pill cart-count">0</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Checkout Header -->
<div class="checkout-header">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Checkout</h1>
                <p class="lead">Complete your purchase securely</p>
            </div>
        </div>
    </div>
</div>

<!-- Checkout Steps -->
<div class="container">
    <div class="checkout-steps">
        <div class="step completed">
            <div class="step-number">1</div>
            <div class="step-label">Cart</div>
        </div>
        <div class="step active">
            <div class="step-number">2</div>
            <div class="step-label">Checkout</div>
        </div>
        <div class="step">
            <div class="step-number">3</div>
            <div class="step-label">Payment</div>
        </div>
        <div class="step">
            <div class="step-number">4</div>
            <div class="step-label">Confirmation</div>
        </div>
    </div>
</div>

<!-- Checkout Content -->
<div class="container checkout-container">
    <div class="row">
        <!-- Order Summary -->
        <div class="col-lg-8 mb-4">
            <div class="checkout-card">
                <div class="card-header">
                    <i class="fas fa-shopping-bag me-2"></i>Order Summary
                </div>
                <div class="card-body" id="orderSummary">
                    <!-- Cart items will be dynamically inserted here -->
                </div>
            </div>

            <!-- Customer Information -->
            <div class="checkout-card">
                <div class="card-header">
                    <i class="fas fa-user me-2"></i>Customer Information
                </div>

                @if(session('success'))
                    <div class="alert alert-success mt-2 mb-2">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger mt-2 mb-2">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form id="customerForm" method="POST" action="/checkout/update">
                        @csrf

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="userName" class="form-label">User Name</label>
                                <input type="text" name="username" class="form-control" id="userName" required value="{{ auth()->user()->username }}" disabled="disabled">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" name="firstName" class="form-control" id="firstName" required value="{{ auth()->user()->name }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" name="lastName" class="form-control" id="lastName" value="{{ auth()->user()->last_name ?? '' }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" id="email" required value="{{ auth()->user()->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" name="phone" class="form-control" id="phone" value="{{ auth()->user()->phone ?? '' }}">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary px-4">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Order Total & Payment -->
        <div class="col-lg-4">
            <div class="checkout-card sticky-top" style="top: 100px;">
                <div class="card-header">
                    <i class="fas fa-receipt me-2"></i>Order Total
                </div>
                <div class="card-body">
                    <div class="summary-row">
                        <span>Subtotal:</span>
                        <span id="subtotal">$0.00</span>
                    </div>
                    <div class="summary-row">
                        <span>Service Fee:</span>
                        <span id="serviceFee">$0.00</span>
                    </div>
                    <div class="summary-row total">
                        <span>Total:</span>
                        <span id="totalAmount">$0.00</span>
                    </div>

                    <hr>

                    <h6 class="mb-3">Select Payment Method</h6>

                    <div class="payment-method" data-method="card">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="cardPayment" value="card" checked>
                            <label class="form-check-label d-flex align-items-center" for="cardPayment">
                                <i class="fas fa-credit-card payment-icon"></i>
                                Credit/Debit Card
                            </label>
                        </div>
                    </div>

                    <div class="payment-method" data-method="paypal">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="paypalPayment" value="paypal">
                            <label class="form-check-label d-flex align-items-center" for="paypalPayment">
                                <i class="fab fa-paypal payment-icon"></i>
                                PayPal
                            </label>
                        </div>
                    </div>

                    <div class="payment-method" data-method="bank">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="bankPayment" value="bank">
                            <label class="form-check-label d-flex align-items-center" for="bankPayment">
                                <i class="fas fa-university payment-icon"></i>
                                Bank Transfer
                            </label>
                        </div>
                    </div>

                    <button class="btn btn-checkout" id="proceedToPayment">
                        <i class="fas fa-lock me-2"></i>Proceed to Payment
                    </button>

                    <button class="btn btn-back" onclick="window.history.back()">
                        <i class="fas fa-arrow-left me-2"></i>Back to Shopping
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <h5>About TechServices</h5>
                <p>We provide premium digital services to help businesses grow their online presence and maximize their digital potential.</p>
                <div class="social-icons">
                    <a href="#" class="text-white me-3" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white me-3" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white me-3" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/') }}" class="text-white text-decoration-none">Home</a></li>
                    <li><a href="https://pouyait.com/" class="text-white text-decoration-none">Resume</a></li>
                    <li><a href="https://pouyait.com/services" class="text-white text-decoration-none">Services</a></li>
                    <li><a href="https://pouyait.com/about" class="text-white text-decoration-none">About Us</a></li>
                    <li><a href="https://pouyait.com/blog" class="text-white text-decoration-none">Blog</a></li>
                    <li><a href="https://pouyait.com/contact" class="text-white text-decoration-none">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-4 mb-4">
                <h5>Contact Us</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-phone me-2"></i> (+98) 912-834-7349 (Telegram)</li>
                    <li class="mb-2"><i class="fas fa-envelope me-2"></i> info@pouyait.com</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <p>&copy; 2023 TechServices. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

<!-- Toast for notifications -->
<div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" id="successToast">
    <div class="d-flex">
        <div class="toast-body">
            Item removed from cart successfully.
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Cart data from localStorage
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Function to get correct image URL
    function getImageUrl(imageName) {
        // Use Laravel asset helper for the correct path
        return `http://localhost:8000/products/${imageName}`;
    }

    // Initialize checkout page
    document.addEventListener('DOMContentLoaded', function() {
        updateOrderSummary();
        updateCartCount();
        setupPaymentMethods();

        // Use event delegation for remove buttons
        document.getElementById('orderSummary').addEventListener('click', function(e) {
            if (e.target.closest('.remove-item')) {
                const itemId = e.target.closest('.remove-item').getAttribute('data-id');
                removeFromCart(itemId);
            }
        });

        // Proceed to payment button handler
        document.getElementById('proceedToPayment').addEventListener('click', function() {
            if (validateForm()) {
                // In a real application, you would submit the form data to your server
                // For this demo, we'll just show an alert
                const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
                alert(`Proceeding to ${paymentMethod} payment...`);

                // Here you would redirect to the payment gateway
                // window.location.href = `/payment/${paymentMethod}`;
            }
        });
    });

    // Update order summary with cart items
    function updateOrderSummary() {
        const orderSummary = document.getElementById('orderSummary');
        const subtotalElement = document.getElementById('subtotal');
        const serviceFeeElement = document.getElementById('serviceFee');
        const totalAmountElement = document.getElementById('totalAmount');
        const checkoutButton = document.getElementById('proceedToPayment');

        if (cart.length === 0) {
            orderSummary.innerHTML = `
                <div class="empty-cart">
                    <div class="empty-cart-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h4>Your cart is empty</h4>
                    <p>Add some services to your cart before checking out.</p>
                    <a href="{{ url('/') }}" class="btn btn-primary">Browse Products</a>
                </div>
            `;

            // Disable checkout button if cart is empty
            checkoutButton.disabled = true;

            // Reset totals
            subtotalElement.textContent = '$0.00';
            serviceFeeElement.textContent = '$0.00';
            totalAmountElement.textContent = '$0.00';

            return;
        }

        let itemsHTML = '';
        let subtotal = 0;

        cart.forEach(item => {
            subtotal += item.price;

            // Use the correct image path
            const imageUrl = getImageUrl(item.image);

            itemsHTML += `
                <div class="cart-item">
                    <div class="cart-item-details">
                        <div class="cart-item-name">${item.name}</div>
                        <div class="cart-item-price">$${item.price.toFixed(2)}</div>
                    </div>
                    <button class="remove-item" data-id="${item.id}" title="Remove item">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
        });

        orderSummary.innerHTML = itemsHTML;

        // Calculate fees and totals
        const serviceFee = subtotal * 0.05; // 5% service fee
        const total = subtotal + serviceFee;

        subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
        serviceFeeElement.textContent = `$${serviceFee.toFixed(2)}`;
        totalAmountElement.textContent = `$${total.toFixed(2)}`;

        // Enable checkout button
        checkoutButton.disabled = false;
    }

    // Remove item from cart
    function removeFromCart(itemId) {
        const id = String(itemId).trim();

        // Create a shallow copy of cart
        let updatedCart = cart.filter(item => String(item.id).trim() !== id);

        // Find the removed item (only for toast message)
        const itemToRemove = cart.find(item => String(item.id).trim() === id);

        // Update storage and UI
        cart = updatedCart;
        localStorage.setItem('cart', JSON.stringify(cart));
        updateOrderSummary();
        updateCartCount();

        if (itemToRemove) {
            showToast(`"${itemToRemove.name}" removed from cart`);
        }
    }



    // Update cart count in navbar
    function updateCartCount() {
        document.querySelector('.cart-count').textContent = cart.length;
    }

    // Setup payment method selection
    function setupPaymentMethods() {
        const paymentMethods = document.querySelectorAll('.payment-method');

        paymentMethods.forEach(method => {
            method.addEventListener('click', function() {
                // Remove selected class from all methods
                paymentMethods.forEach(m => m.classList.remove('selected'));

                // Add selected class to clicked method
                this.classList.add('selected');

                // Check the radio button inside
                const radio = this.querySelector('input[type="radio"]');
                radio.checked = true;
            });

            // Also trigger selection when clicking the radio button directly
            const radio = method.querySelector('input[type="radio"]');
            radio.addEventListener('change', function() {
                if (this.checked) {
                    paymentMethods.forEach(m => m.classList.remove('selected'));
                    method.classList.add('selected');
                }
            });
        });

        // Select the first payment method by default
        if (paymentMethods.length > 0) {
            paymentMethods[0].classList.add('selected');
        }
    }

    // Validate form before proceeding to payment
    function validateForm() {
        const firstName = document.getElementById('firstName').value;
        const lastName = document.getElementById('lastName').value;
        const email = document.getElementById('email').value;

        if (!firstName || !lastName || !email) {
            alert('Please fill in all required customer information fields.');
            return false;
        }

        if (!isValidEmail(email)) {
            alert('Please enter a valid email address.');
            return false;
        }

        return true;
    }

    // Simple email validation
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Show toast notification
    function showToast(message) {
        const toastElement = document.getElementById('successToast');
        const toastBody = toastElement.querySelector('.toast-body');

        toastBody.textContent = message;

        const toast = new bootstrap.Toast(toastElement);
        toast.show();
    }
</script>
</body>
</html>
