<div id="product-management" class="admin-content">
    <div class="bg-white text-gray-800 p-6 rounded-lg shadow mb-6">
        <h3 class="text-xl font-semibold mb-4 text-indigo-700">
            <i class="fas fa-box mr-2"></i>Product Management
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Product Form -->
            <div>
                <h4 class="font-medium mb-3">Add New Product</h4>
                <div class="space-y-4">
                    <input type="text" placeholder="Product Name" class="w-full px-3 py-2 border border-gray-300 rounded">
                    <textarea placeholder="Product Description" class="w-full px-3 py-2 border border-gray-300 rounded" rows="3"></textarea>
                    <input type="number" placeholder="Price" class="w-full px-3 py-2 border border-gray-300 rounded">
                    <input type="file" class="w-full px-3 py-2 border border-gray-300 rounded">
                    <button class="bg-indigo-600 text-white px-4 py-2 rounded text-sm w-full hover:bg-indigo-700">
                        Add Product
                    </button>
                </div>
            </div>

            <div>
                <h4 class="font-medium mb-3">Product List</h4>
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-center justify-between mb-4">
                        <input type="text" placeholder="Search products..." class="px-3 py-1 border border-gray-300 rounded text-sm">
                        <select class="px-3 py-1 border border-gray-300 rounded text-sm">
                            <option>All Categories</option>
                        </select>
                    </div>
                    @foreach($products as $product)
                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-2 bg-white rounded border">
                            <div class="flex items-center">
                                <img src="products/{{ $product->image }}" width="50" height="50" class="rounded mr-3" alt="{{ $product->name }}">
                                <div>
                                    <div class="font-medium">{{ $product->name }}</div>
                                    <div class="text-sm text-gray-500">${{ $product->price }}</div>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <button class="edit-btn text-blue-600 hover:text-blue-800" data-id="{{ $product->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="delete-btn text-red-600 hover:text-red-800" data-id="{{ $product->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

