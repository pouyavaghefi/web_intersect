<div id="slider-management" class="admin-content active">
    <div class="bg-white text-gray-800 p-6 rounded-lg shadow mb-6">
        <h3 class="text-xl font-semibold mb-4 text-indigo-700">
            <i class="fas fa-images mr-2"></i>Slider Management
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Upload Form -->
            <div>
                <h4 class="font-medium mb-3">Upload New Slider Image</h4>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                    <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                    <p class="text-sm text-gray-500 mb-4">Drag & drop an image here or click to browse</p>
                    <input type="file" class="hidden" id="slider-upload">
                    <label for="slider-upload" class="bg-indigo-600 text-white px-4 py-2 rounded text-sm cursor-pointer hover:bg-indigo-700">
                        Select Image
                    </label>
                    <div class="mt-4">
                        <input type="text" placeholder="Image Title" class="w-full px-3 py-2 border border-gray-300 rounded mb-2">
                        <textarea placeholder="Description" class="w-full px-3 py-2 border border-gray-300 rounded mb-2" rows="2"></textarea>
                        <input type="text" placeholder="Button Link" class="w-full px-3 py-2 border border-gray-300 rounded mb-2">
                        <button class="bg-indigo-600 text-white px-4 py-2 rounded text-sm w-full hover:bg-indigo-700">
                            Upload Slider
                        </button>
                    </div>
                </div>
            </div>

            <!-- Slider Images Table -->
            <div>
                <h4 class="font-medium mb-3">Current Slider Images</h4>
                <div class="bg-gray-50 rounded-lg p-4">
                    <table class="slider-table">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($sliders as $slider)
                            <tr>
                                <td><img src="{{ asset('sliders/' . $slider->image) }}" class="slider-image" alt="{{ $slider->title }}"></td>
                                <td>{{ $slider->title }}</td>
                                <td>
                                    @if($slider->is_active)
                                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded">Active</span>
                                    @else
                                        <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="text-blue-600 hover:text-blue-800 mr-2">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-800">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center py-2">No slider image has been added</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
