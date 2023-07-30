<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Item Detail</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ url('/') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                    <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Home
                </a>
            </li>
            @if ($category)
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{ url('/selected-categories/' . $category->id) }}"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Fashion</a>
                    </div>
                </li>
            @endif
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="#"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">{{ $item->item_name }}</a>
                </div>
            </li>
        </ol>
    </div>

    <div id="custom-controls-gallery" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            @foreach ($item->itemImages as $itemImage)
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('storage/item-images/' . $itemImage->image) }}"
                        class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </div>
            @endforeach
        </div>
        <div class="flex justify-center items-center pt-4">
            <button type="button"
                class="flex justify-center items-center mr-4 h-full cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 5H1m0 0 4 4M1 5l4-4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="flex justify-center items-center h-full cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>

    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="grid md:grid-cols-2 gap-2 md:p-5 px-2 md:justify-items-center max-w-5xl">
                <div>
                    <h1 class="p-2 text-2xl font-bold tracking-tight text-gray-800">{{ $item->item_name }}</h1>
                    <p class="p-2 text-xl font-medium text-indigo-500">${{ $item->price }}</p>
                    <div class="flex justify-start p-2">
                        <div class="text-center">
                            <p class="font-medium text-gray-700 mb-1">Type</p>
                            <div class="p-3 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="font-medium">{{ $item->item_type }}</span>
                            </div>
                        </div>

                        <div class="ms-10 text-center">
                            <p class="font-medium text-gray-700 mb-1">Condition</p>
                            <div
                                class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50
                                role="alert">
                                <span class="font-medium">{{ $item->item_condition }}</span>
                            </div>
                        </div>
                        <div class="ms-10 text-center">
                            <p class="font-medium text-gray-700 mb-1">Status</p>
                            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                                <span class="font-medium">{{ $item->status === 1 ? 'Available' : 'Pending' }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="p-2">
                        <h4 class="font-medium text-gray-700 text-xl">Highlighted Information</h4>
                        <p class="font-medium text-gray-700">Try a quick search to explore hundreds of affordable
                            options.</p>
                    </div>

                    <div class="p-2">
                        <h4 class="font-medium text-gray-700 text-xl">Product Description</h4>
                        <p class="font-medium text-gray-700">{{ $item->description }}</p>
                    </div>

                    <h1 class="font-medium text-gray-700 text-lg p-2">Owner Information</h1>

                    <div class="p-2">
                        <h4 class="font-medium text-gray-700 text-xl">Contact Number</h4>
                        <p class="font-medium text-gray-700">+95 {{ $item->phone }}</p>
                    </div>

                    <div class="flex p-2">
                        <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt=""
                            class="block w-7 h-7">
                        <p class="mb-3 font-medium text-gray-700 ms-2 self-center text-lg">{{ $item->owner_name }}</p>
                    </div>
                </div>

                <div>
                    <div class="p-2">
                        <h4 class="font-medium text-gray-700 text-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            Location
                        </h4>
                        <p class="font-medium text-gray-700">{{ $item->address }}</p>
                    </div>

                    <input type="hidden" id="latitude" value="{{ $item->latitude }}">
                    <input type="hidden" id="longitude" value="{{ $item->longitude }}">

                    <div id="map" class="my-3 p-2 md:w-96 h-96"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let map;
        let marker;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: parseFloat(document.getElementById('latitude').value),
                    lng: parseFloat(document.getElementById('longitude').value)
                },
                zoom: 8,
                scrollwheel: true,
            });

            const uluru = {
                lat: parseFloat(document.getElementById('latitude').value),
                lng: parseFloat(document.getElementById('longitude').value)
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
</body>

</html>
