@extends('components.component')

@section('content')



<div class="row mt-4 " style=" display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;">
    <div class="col-8">
        <h2 class="text-center">FORM TAMBAH DATA</h2>
        <div class="card mb-4">
            <form action="/admin/car/create" class="m-5" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" class="form-control mb-3" placeholder="name" required>
                <input type="file" name="image_url" class="form-control mb-3" placeholder="image" required>
                <textarea name="description" id="description" rows="4" cols="50" class="form-control mb-3" required placeholder="description" class="form-control"></textarea>
                <input type="number" name="price" class="form-control mb-3" placeholder="price" required>
                <input type="number" name="stock" class="form-control mb-3" placeholder="stock" required>


                <button class="btn btn-primary align-center" type="submit">Tambah Data</button>
            </form>
        </div>

    </div>
</div>

@endsection