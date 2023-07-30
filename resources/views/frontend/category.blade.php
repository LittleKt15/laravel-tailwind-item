<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Selected Category</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
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
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="#"
                        class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Fashion</a>
                </div>
            </li>
        </ol>
    </div>

    <div class="container mx-auto">
        <div class="grid gap-2 md:grid-cols-3">
            <div class="px-5 py-3">
                <form action="{{ url('/search-items/' . $category->id) }}" method="GET">
                    @csrf
                    <div class="flex justify-between pb-3">
                        <h4 class="font-medium text-gray-800 text-lg">Filter By</h4>
                        <button type="reset" class="text-red-500 font-medium">Clear Filter</button>
                    </div>

                    <div class="pb-3">
                        <h4 class="font-medium text-gray-800 text-md">Sorting</h4>
                        <div class="grid grid-cols-2 gap-1 content-center">
                            <div class="flex items-center">
                                <input id="default-radio-1" type="radio" value="" name="default-radio"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                <label for="default-radio-1"
                                    class="ml-2 text-sm font-medium text-gray-900">Latest</label>
                            </div>
                            <div class="flex items-center">
                                <input id="default-radio-2" type="radio" value="" name="default-radio"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                <label for="default-radio-2"
                                    class="ml-2 text-sm font-medium text-gray-900">Popular</label>
                            </div>
                        </div>
                    </div>

                    <div class="pb-3">
                        <label for="item_name" class="block mb-2 text-md font-medium text-gray-900">Item name</label>
                        <input type="text" id="item_name" name="item_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Input name" required>
                    </div>

                    <div class="pb-3">
                        <label for="price" class="block mb-2 text-md font-medium text-gray-900">Price</label>
                        <div class="flex">
                            <input type="text" id="min_price" name="min_price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Min">
                            <input type="text" id="max_price" name="max_price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Max">
                        </div>
                    </div>

                    <div class="pb-3">
                        <label for="category_id" class="block mb-2 text-md font-medium text-gray-900">Category</label>
                        <select id="category_id" name="category_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option selected>Choose One</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="pb-3">
                        <label for="item_condition" class="block mb-2 text-md font-medium text-gray-900">Item
                            Condition</label>
                        <select id="item_condition" name="item_condition"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option selected>Choose One</option>
                            <option value="new">New</option>
                            <option value="used">Used</option>
                            <option value="good second hand">Good Second hand</option>
                        </select>
                    </div>

                    <div class="pb-3">
                        <label for="item_type" class="block mb-2 text-md font-medium text-gray-900">Item Type</label>
                        <select id="item_type" name="item_type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option selected>Choose One</option>
                            <option value="sell">For sell</option>
                            <option value="buy">For buy</option>
                            <option value="exchange">For exchange</option>
                        </select>
                    </div>

                    <button type="submit"
                        class="focus:outline-none text-white bg-indigo-500 hover:bg-indigo-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-3.5 py-2.5 mb-2 w-full">
                        Apply filter
                    </button>
                </form>
            </div>

            <div class="md:col-span-2 px-5 py-3">
                <div class="grid md:grid-cols-3 gap-2">
                    @foreach ($items as $item)
                        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                            <a href="{{ url('/item-details/' . $item->id) }}">
                                @foreach ($item->itemImages->take(1) as $itemImage)
                                    <img class="rounded-t-lg"
                                        src="{{ asset('storage/item-images/' . $itemImage->image) }}"
                                        alt="" />
                                @endforeach
                                <div class="p-5">
                                    <div class="flex justify-between">
                                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">
                                            {{ $item->item_name }}</h5>
                                            <p >{{ $item->item_type }}</p>
                                            <p >{{ $item->item_condition }}</p>
                                        <span class="text-indigo-600 italic">New</span>
                                    </div>
                                    <p class="mb-3 font-normal text-indigo-700">$ {{ $item->price }}</p>
                                    <div class="flex">
                                        <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png"
                                            alt="" class="block w-7 h-7">
                                        <p class="mb-3 font-normal text-gray-700 ms-2 self-center">
                                            {{ $item->owner_name }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</body>

</html>
