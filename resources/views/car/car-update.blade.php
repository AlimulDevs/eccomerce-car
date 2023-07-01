@extends('components.component')

@section('content')


@foreach ($dataCar as $dtc)


<div class="row mt-4 " style=" display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;">
    <div class="col-8">
        <h2 class="text-center">FORM UPDATE DATA</h2>
        <div class="card mb-4">
            <form action="/admin/car/update" class="m-5" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$dtc->id}}">
                <input type="text" name="name" class="form-control mb-3" placeholder="name" value="{{$dtc->name}}" required>
                <input type="file" name="image_url" class="form-control mb-3" placeholder="image">
                <textarea name="description" id="description" rows="4" cols="50" class="form-control mb-3" required placeholder="description" class="form-control">
                {{$dtc->description}}
                </textarea>
                <input type="number" name="price" class="form-control mb-3" placeholder="price" value="{{$dtc->price}}" required>
                <input type="number" name="stock" class="form-control mb-3" placeholder="stock" value="{{$dtc->stock}}" required>


                <button class="btn btn-primary align-center" type="submit">Update Data</button>
            </form>
        </div>

    </div>
</div>
@endforeach
@endsection