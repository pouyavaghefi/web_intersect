<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="TechServices - Premium digital services marketplace">
    <title>TechServices | Online Services Marketplace | PouyaIT</title>

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
        body {font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;background-color: #f8f9fa;}
        .navbar {box-shadow: 0 2px 10px rgba(0,0,0,0.1);}
        .nav-search-form {min-width: 300px;}
        .hero-slider {height: 500px;overflow: hidden;position: relative;}
        .hero-slide {height: 500px;background-size: cover;background-position: center;}
        .slide-content {position: absolute;bottom: 20%;left: 10%;color: white;text-shadow: 1px 1px 3px rgba(0,0,0,0.7);max-width: 600px;}
        .product-card {border-radius: 8px;overflow: hidden;transition: transform 0.3s ease, box-shadow 0.3s ease;height: 100%;background: white;margin-bottom: 20px;}
        .product-card:hover {transform: translateY(-5px);box-shadow: 0 10px 20px rgba(0,0,0,0.1);}
        .product-image {height: 200px;object-fit: cover;width: 100%;}
        .product-price {color: var(--accent);font-weight: bold;font-size: 1.2rem;}
        .add-to-cart {background-color: var(--secondary);transition: background-color 0.3s ease;color: white;border: none;}
        .add-to-cart:hover {background-color: #2980b9;color: white;}
        .section {padding: 3rem 0;}
        .section-title {position: relative;margin-bottom: 2rem;padding-bottom: 0.5rem;text-align: center;}
        .section-title:after {content: '';position: absolute;bottom: 0;left: 50%;transform: translateX(-50%);width: 80px;height: 3px;background: var(--secondary);}
        .footer {background-color: var(--dark);color: white;padding: 3rem 0 1rem;}
        .category-card {transition: transform 0.3s;height: 100%;}
        .category-card:hover {transform: translateY(-5px);}
        @media screen and (max-width: 767px) {
            .slide-content h2 {font-size: 1.5rem;}
            .slide-content p {display: none;}
            .nav-search-form {min-width: 100%;margin: 10px 0;}
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ env('APP_URL') }}">
            <i class="fas fa-laptop-code me-2"></i>TechServices
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="https://pouyait.com/">Resume</a></li>
                <li class="nav-item"><a class="nav-link" href="https://pouyait.com/services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="https://pouyait.com/about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="https://pouyait.com/blog">Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="https://pouyait.com/contact">Contact</a></li>
            </ul>
{{--            <form class="d-flex nav-search-form me-3" role="search">--}}
{{--                <div class="input-group">--}}
{{--                    <input class="form-control" type="search" placeholder="Search services..." aria-label="Search">--}}
{{--                    <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>--}}
{{--                </div>--}}
{{--            </form>--}}
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle me-1"></i> Account
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                        @if(auth()->check())
                            <li><a class="dropdown-item" href="/dashboard"><i class="fas fa-user me-2"></i>Dashboard</a></li>
                            <li><a class="dropdown-item" href="/dashboard/orders"><i class="fas fa-shopping-bag me-2"></i>Orders</a></li>
                            <li><a class="dropdown-item" href="/user/profile"><i class="fas fa-cog me-2"></i>Profile Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/user/logout"><i class="fas fa-sign-out-alt me-2"></i>Sign Out</a></li>
                        @else
                            <li><a class="dropdown-item" href="/login"><i class="fas fa-sign-in-alt me-2"></i>Login</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/register"><i class="fas fa-user-plus me-2"></i>Register</a></li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link cart-icon dropdown-toggle" data-bs-toggle="dropdown" id="cartDropdown">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count">0</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end p-3" style="min-width:300px;">
                        <ul id="cartItems" class="list-unstyled mb-2" style="max-height:200px;overflow-y:auto;">
                            <li class="text-center text-muted small">Cart is empty</li>
                        </ul>
                        <div class="d-grid">
                            <a href="/checkout" class="btn btn-primary btn-sm">Checkout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach($sliders as $key => $slide)
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $key }}"
                    class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}"
                    aria-label="Slide {{ $key+1 }}"></button>
        @endforeach
    </div>
    <div class="carousel-inner">
        @foreach($sliders as $key => $slide)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }} hero-slide"
                 style="background-image: url('{{ asset('sliders/' . $slide->image) }}')">
                <div class="slide-content">
                    <h2>{{ $slide->title }}</h2>
                    @if($slide->subtitle)
                        <p class="d-none d-md-block">{{ $slide->subtitle }}</p>
                    @endif
                    @if($slide->button_text)
                        <a href="{{ $slide->button_link ?? '#' }}" class="btn btn-light">{{ $slide->button_text }}</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<section class="section">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="section-title">Our Featured Services</h2>
            <p class="lead">Browse our most popular digital services and solutions</p>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="product-card">
                        <img src="{{ asset('products/' . $product->image) }}" class="product-image" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            <p class="product-price">${{ number_format($product->price, 2) }}</p>
                            <button class="btn btn-primary w-100 add-to-cart"
                                    data-id="{{ $product->id }}"
                                    data-name="{{ $product->name }}"
                                    data-price="{{ $product->price }}"
                                    data-image="{{ asset('products/' . $product->image) }}">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="/services" class="btn btn-outline-primary">View All Services</a>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="container text-center">
        <p>&copy; 2025 TechServices. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    function updateCartDisplay() {
        const cartCount = document.querySelector('.cart-count');
        const cartItems = document.getElementById('cartItems');
        cartCount.textContent = cart.length;
        if (cart.length === 0) {
            cartItems.innerHTML = '<li class="text-center text-muted small">Cart is empty</li>';
        } else {
            cartItems.innerHTML = cart.map(item => `
            <li class="d-flex justify-content-between align-items-center mb-2">
                <span>${item.name}</span><strong>$${item.price.toFixed(2)}</strong>
            </li>`).join('');
        }
        document.querySelectorAll('.add-to-cart').forEach(btn => {
            const id = btn.dataset.id;
            if (cart.some(p => p.id === id)) {
                btn.classList.remove('btn-primary');
                btn.classList.add('btn-success');
                btn.textContent = 'Added to Cart';
                btn.disabled = true;
            } else {
                btn.classList.remove('btn-success');
                btn.classList.add('btn-primary');
                btn.textContent = 'Add to Cart';
                btn.disabled = false;
            }
        });
    }

    document.addEventListener('click', e => {
        if (e.target.classList.contains('add-to-cart')) {
            const btn = e.target;
            const id = btn.dataset.id;
            const name = btn.dataset.name;
            const price = parseFloat(btn.dataset.price);
            const image = btn.dataset.image;
            if (!cart.some(p => p.id === id)) {
                cart.push({ id, name, price, image });
                localStorage.setItem('cart', JSON.stringify(cart));
                updateCartDisplay();
            }
        }
    });

    document.addEventListener('DOMContentLoaded', updateCartDisplay);
</script>
</body>
</html>
