@extends('components.component')

@section('content')

<div class="row mt-4">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Authors table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <a href="/admin/car/create-index" class="btn btn-primary ms-4">Tambah Data</a>
                <div class="table-responsive p-0">

                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name Car</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stock</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sold</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataCar as $dtc)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="{{$dtc->image_url}}" class="avatar avatar-sm me-3" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$dtc->name}}</h6>

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">Rp.{{$dtc->price}}</p>

                                </td>
                                <td class="align-middle text-center text-sm">
                                    {{$dtc->stock}}
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{$dtc->sold}}</span>
                                </td>
                                <td class="align-middle text-center ">
                                    <a href="/admin/car/update-index/{{$dtc->id}}" class="mt-3 text-secondary font-weight-bold text-white btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                    <a href="/admin/car/delete/{{$dtc->id}}" class="mt-3 text-secondary font-weight-bold text-white btn btn-sm btn-danger">
                                        delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection