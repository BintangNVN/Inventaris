@extends('layouts.app')

@section('title', 'Admin Category')
@section('pageTitle', 'Welcome Back, ' . auth()->user()->name)

@section('content')

<div class="max-w-6xl mx-auto">

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Categories Table</h2>
            <p class="text-sm text-slate-500 mt-1">
                Add, edit, and delete <span class="text-red-500">.categories</span>
            </p>
        </div>

        <a href="{{ route('categories.create') }}"
           class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg shadow transition">
            <i class="fa-solid fa-plus"></i> Add Category
        </a>
    </div>

    <!-- CARD -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <div class="overflow-x-auto">
            <table class="w-full text-sm">

                <!-- HEAD -->
                <thead class="bg-slate-100">
                    <tr class="text-slate-600">
                        <th class="px-5 py-4 text-center w-14">#</th>
                        <th class="px-5 py-4 text-left">Name</th>
                        <th class="px-5 py-4 text-left">Division</th>
                        <th class="px-5 py-4 text-center">Total Items</th>
                        <th class="px-5 py-4 text-center">Action</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody>
                    @forelse ($categories as $index => $category)
                        <tr class="border-b hover:bg-slate-50 transition">

                            <td class="px-5 py-4 text-center text-slate-500">
                                {{ $index + 1 }}
                            </td>

                            <td class="px-5 py-4 font-semibold text-slate-800">
                                {{ $category->name }}
                            </td>

                            <td class="px-5 py-4 text-slate-700">
                                {{ $category->division }}
                            </td>

                            <td class="px-5 py-4 text-center text-slate-700">
                                {{ $category->items_count ?? 0 }}
                            </td>

                            <td class="px-5 py-4 text-center">
                                <a href="{{ route('categories.edit', $category->id) }}"
                                   class="inline-flex items-center gap-1 bg-violet-600 hover:bg-violet-700 text-white text-xs font-semibold px-4 py-2 rounded-lg shadow transition">
                                    <i class="fa-solid fa-pen"></i> Edit
                                </a>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-10 text-center text-slate-400">
                                No categories found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

</div>

@endsection