@extends('layouts.sidebar')
@section('title', 'Category')
@section('content')
    <div class="container mx-auto">
        <div class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ url('/categories') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400">
                        <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Category
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Edit
                            Category</a>
                    </div>
                </li>
            </ol>
        </div>

        <div class="py-3">
            <form action="{{ url('/categories/' . $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="pb-3">
                    <label for="name" class="block mb-2 text-md font-medium text-gray-900">Category</label>
                    <input type="text" id="name" name="name" value="{{ $category->name ?? old('name') }}"
                        class="md:w-1/2 bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('name') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror"
                        placeholder="Input Name">
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pb-3">
                    <label for="image" class="block mb-2 text-md font-medium text-gray-900">Category Photo</label>
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full md:w-1/2 h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p
                                class="mb-2 text-sm text-gray-500 @error('image') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @enderror">
                                <span class="font-semibold">Click
                                    to upload</span> or drag and drop
                            </p>
                            <p class="text-xs text-gray-500">PNG, JPG or JPEG (MAX. 800x400px)
                            </p>
                        </div>
                        <input id="dropzone-file" type="file" name="image" class="hidden" />
                    </label>
                    @error('image')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pb-3">
                    <label for="status" class="block mb-2 text-md font-medium text-gray-900">Status</label>
                    <input type="hidden" name="status" value="0">
                    <input id="default-checkbox" type="checkbox" value="1" name="status"
                        @if ($category->status) checked @endif
                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900">Publish</label>
                </div>

                <div class="md:w-1/2 text-end">
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
