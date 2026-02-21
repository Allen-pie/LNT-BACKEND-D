@extends('layout.master')

@section('title', 'Add Item Page')

@section('content')

@include('components.navbar')

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Item Name</th>
            <th scope="col">Item Description</th>
            <th scope="col">Item Stock</th>
             <th scope="col">Item Image</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach($items as $idx=> $item)
            <tr>
                <th >{{ $item->id  }}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->stock}}</td>

                 <td> 
                    <!-- <img src="{{ asset('storage/' . $item->img_path) }}" style="height:50px;"/> -->
                    <img src="{{ $item->img_path }}" style="height:50px;"/>
                </td>


                <td style="display: flex; gap: 5px;">
                    <a class="btn btn-primary" href="{{ route('view.update.item', $item->id) }}">
                        Update
                    </a>
                    <form method="POST" action="{{ route('delete.item', $item->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>                          
            </tr>
        @endforeach

    </tbody>
</table>

{{ $items->links() }}

@endsection