@extends('layouts.sidebar')
@section('title', 'Item')
@section('content')
    <div class="container mx-auto">
        <div class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ url('/items') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Item
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Add
                            Item</a>
                    </div>
                </li>
            </ol>
        </div>

        <div class="py-3">
            <form action="{{ url('/items') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid md:gap-6 gap-y-1 mb-6 md:grid-cols-2">
                    <div>
                        <h1 class="text-lg text-gray-900 font-semibold pb-3">Item Information</h1>

                        <div class="pb-3">
                            <label for="item_name" class="block mb-2 text-md font-medium text-gray-900">Item Name</label>
                            <input type="text" id="item_name" name="item_name" value="{{ old('item_name') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('item_name') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror"
                                placeholder="Input Name">
                            @error('item_name')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="pb-3">
                            <label for="category_id" class="block mb-2 text-md font-medium text-gray-900">Select
                                Category</label>
                            <select id="category_id" name="category_id"
                                class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('category_id') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                                <option value="">Choose Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="pb-3">
                            <label for="price" class="block mb-2 text-md font-medium text-gray-900">Price</label>
                            <input type="text" id="" name="price" value="{{ old('price') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('price') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror"
                                placeholder="Enter Price">
                            @error('price')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="pb-3">
                            <label for="description"
                                class="block mb-2 text-md font-medium text-gray-900">Description</label>
                            <textarea id="editor" rows="4" name="description"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('description') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror"
                                placeholder="Enter description">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="pb-3">
                            <label for="item_condition" class="block mb-2 text-md font-medium text-gray-900">Select Item
                                Condition</label>
                            <select name="item_condition" id="item_condition"
                                class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('item_condition') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                                <option value="">Select Item Condition</option>
                                <option value="new" {{ old('item_condition') ? 'selected' : '' }}>New</option>
                                <option value="used" {{ old('item_condition') ? 'selected' : '' }}>Used</option>
                                <option value="good second hand" {{ old('item_condition') ? 'selected' : '' }}>Good Second
                                    Hand</option>
                            </select>
                            @error('item_condition')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="pb-3">
                            <label for="item_type" class="block mb-2 text-md font-medium text-gray-900">Select Item
                                Type</label>
                            <select name="item_type" id="item_type"
                                class="form-input border rounded-md w-full py-2 px-3 text-gray-700 @error('item_type') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                                <option value="">Select Item Type</option>
                                <option value="sell" {{ old('item_type') ? 'selected' : '' }}>For Sell</option>
                                <option value="buy" {{ old('item_type') ? 'selected' : '' }}>For Buy</option>
                                <option value="exchange" {{ old('item_type') ? 'selected' : '' }}>For Exchange</option>
                            </select>
                            @error('item_type')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="pb-3">
                            <label for="status" class="block mb-2 text-md font-medium text-gray-900">Status</label>
                            <input id="default-checkbox" type="checkbox" value="1" name="status"
                                {{ old('status') ? 'checked' : '' }}
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900">Publish</label>
                        </div>

                        <div class="pb-3">
                            <label for="image" class="block mb-2 text-md font-medium text-gray-900">Item Photo</label>
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p
                                        class="mb-2 text-sm text-gray-500 @error('images') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                                        <span class="font-semibold">Click
                                            to upload</span> or drag and drop
                                    </p>
                                    <p class="text-xs text-gray-500">PNG, JPG or JPEG (MAX. 800x400px)
                                    </p>
                                </div>
                                <input id="dropzone-file" type="file" name="images[]" multiple class="hidden" />
                            </label>
                            @error('images')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <h1 class="text-lg text-gray-900 font-semibold pb-3">Owner Information</h1>

                        <div class="pb-3">
                            <label for="owner_name" class="block mb-2 text-md font-medium text-gray-900">Owner
                                Name</label>
                            <input type="text" id="owner_name" name="owner_name" value="{{ old('owner_name') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('owner_name') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror"
                                placeholder="Input Owner Name">
                            @error('owner_name')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="pb-3">
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Contact
                                Number</label>
                            <div class="flex">
                                <span
                                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">
                                    +95
                                </span>
                                <input type="number" id="phone" name="phone" value="{{ old('phone') }}"
                                    class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5 @error('phone') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror"
                                    placeholder="Add Number">
                            </div>
                            @error('phone')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="pb-3">
                            <label for="address" class="block mb-2 text-md font-medium text-gray-900">Address</label>
                            <textarea id="address" rows="4" name="address"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('address') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror"
                                placeholder="Enter Address">{{ old('address') }}</textarea>
                            @error('address')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="pb-3">
                            <label for="location" class="block mb-2 text-md font-medium text-gray-900">Location</label>
                            <div class="grid gap-1 md:grid-cols-2">
                                <div>
                                    <input type="text" value="{{ old('latitude') }}" readonly
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('latitude') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror placeholder="latitude"
                                        name="latitude" id="latitude" placeholder="Latitude">
                                    @error('latitude')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <input type="text" value="{{ old('longitude') }}" readonly
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('longitude') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror placeholder="longitude"
                                        name="longitude" id="longitude" placeholder="Longitude">
                                    @error('longitude')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div id="map" style="height:530px; width: 100%;" class="my-3"></div>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="reset"
                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Cancel</button>
                    <button type="submit"
                        class="focus:outline-none text-white bg-indigo-500 hover:bg-indigo-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-3.5 py-2.5 mb-2">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        CKEDITOR.replace('editor');
    </script>
    <script>
        let map;
        let marker;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 16.839,
                    lng: 96.173
                },
                zoom: 8,
                scrollwheel: true,
            });

            const uluru = {
                lat: 16.839,
                lng: 96.173
            };

            marker = new google.maps.Marker({
                position: uluru,
                map: map,
                draggable: true
            });

            google.maps.event.addListener(marker, 'dragend', function() {
                let lat = marker.position.lat();
                let lng = marker.position.lng();
                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;
            });

            google.maps.event.addListener(map, 'click', function(event) {
                marker.setPosition(event.latLng);
                let lat = marker.position.lat();
                let lng = marker.position.lng();
                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript"></script>
@endsection
