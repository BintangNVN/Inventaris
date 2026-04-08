@extends('layouts.app')

@section('title', 'Admin Item')
@section('pageTitle', 'Welcome Back, ' . auth()->user()->name)

@section('content')

<div class="max-w-6xl mx-auto">

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-6">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">Items Table</h2>
        <p class="text-sm text-slate-500 mt-1">
            Add, delete, and update <span class="text-red-500">.items</span>
        </p>
    </div>

    <!-- WRAPPER BUTTON -->
    <div class="flex items-center gap-3">
        <a href="{{ route('items.create') }}"
           class="inline-flex items-center gap-2 bg-purple-600 hover:bg-purple-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg shadow transition">
            <i class="fa-solid fa-file-excel"></i> Export Excel
        </a>

        <a href="{{ route('items.create') }}"
           class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold px-5 py-2.5 rounded-lg shadow transition">
            <i class="fa-solid fa-plus"></i> Add Item
        </a>
    </div>
</div>

    <!-- CARD -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <div class="overflow-x-auto">
            <table class="w-full text-sm">

                <!-- HEAD -->
                <thead class="bg-slate-100">
                    <tr class="text-slate-600">
                        <th class="px-5 py-4 text-center w-14">#</th>
                        <th class="px-5 py-4 text-left">Category</th>
                        <th class="px-5 py-4 text-left">Name</th>
                        <th class="px-5 py-4 text-left">Total</th>
                        <th class="px-5 py-4 text-center">Repair</th>
                        <th class="px-5 py-4 text-center">Lending</th>
                        <th class="px-5 py-4 text-center">Action</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody>
                    @forelse ($items as $index => $item)
                        <tr class="border-b hover:bg-slate-50 transition">
                            <td class="px-5 py-4 text-center text-slate-500">
                                {{ $index + 1 }}
                            </td>

                            <td class="px-5 py-4 font-semibold text-slate-800">
                                {{ $item->category->name ?? '-' }}
                            </td>

                            <td class="px-5 py-4 text-slate-700">
                                {{ $item->name }}
                            </td>

                            <td class="px-5 py-4 text-slate-700">
                                {{ $item->total }}
                            </td>

                            <td class="px-5 py-4 text-center text-slate-700">
                                {{ $item->repairs_count ?? 0 }}
                            </td>

                            <td class="px-5 py-4 text-center text-slate-700">
                                {{ $item->lendings_count ?? 0 }}
                            </td>
                            <td class="px-5 py-4 text-center">
                                <a href="{{ route('items.edit', $item->id) }}"
                                   class="inline-flex items-center gap-1 bg-violet-600 hover:bg-violet-700 text-white text-xs font-semibold px-4 py-2 rounded-lg shadow transition">
                                    <i class="fa-solid fa-pen"></i> Edit
                                </a>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-10 text-center text-slate-400">
                                No items found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

</div>

@endsection