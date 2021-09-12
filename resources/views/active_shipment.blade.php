@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Active Shipment</h2>
        <p class="display">Status Filter</p>
        <button class="filter" id="get_all">All</button>
        <button class="filter" id="new_order">New order</button>
        <button class="filter" id="assigned">Carrier assigned</button>
        <button class="filter" id="in_transit">In transit</button>
        <button class="filter" id="deliveried">Deliveried</button>
        <div class="filter-container">
            <span class="filter-icons">Sort by:</span>
            <span class="filter-icons">Order date</span>
            
        </div>
        {!! $view !!}
    </div>
@endsection