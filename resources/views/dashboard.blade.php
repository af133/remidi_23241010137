
@extends('layouts.app')
@section('content')
@section('title','Dashboard')

    <h1 class="font-bold text-[1.5rem] my-[1rem] ml-[2rem] text-[#D1293F]">Items</h1>
    <div class="flex flex-wrap justify-start gap-4 p-2">
        @foreach($products as $product)
        <x-card-product :datum="$product" />

        @endforeach
    </div>

@endsection
