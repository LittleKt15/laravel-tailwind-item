@extends('layouts.matser')
@section('title', 'Home')
@section('content')
    <div class="container mx-auto md:px-4 px-2 max-w-6xl">
        <div class="flex justify-between pb-3">
            <h1 class="text-lg font-semibold">What are you looking for?</h1>
            <a class="text-indigo-600" href="#">
                View More
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 inline">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-3 md:grid-cols-6 md:gap-3 gap-1 pb-10">
            @foreach ($categories as $category)
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow text-center">
                    <a href="{{ url('/selected-categories/' . $category->id) }}">
                        <div class="flex justify-center pb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-7 h-7 text-indigo-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                            </svg>
                        </div>
                        <p class="mb-3 font-normal text-gray-600">
                            {{ $category->name }}
                        </p>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="flex justify-between pb-3">
            <h1 class="text-lg font-semibold">Recent Item</h1>
            <a class="text-indigo-600" href="#">
                View More
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 inline">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 md:gap-3 gap-2 pb-10">
            @foreach ($items as $item)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                    <a href="{{ url('/item-details/' . $item->id) }}">
                        @foreach ($item->itemImages->take(1) as $itemImage)
                            <img class="rounded-t-lg" src="{{ asset('storage/item-images/' . $itemImage->image) }}"
                                alt="" />
                        @endforeach
                        <div class="p-5">
                            <div class="flex justify-between">
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">{{ $item->item_name }}</h5>
                                <span class="text-indigo-600 italic">New</span>
                            </div>
                            <p class="mb-3 font-normal text-indigo-700">$ {{ $item->price }}</p>
                            <div class="flex">
                                <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt=""
                                    class="block w-7 h-7">
                                <p class="mb-3 font-normal text-gray-700 ms-2 self-center">{{ $item->owner_name }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
