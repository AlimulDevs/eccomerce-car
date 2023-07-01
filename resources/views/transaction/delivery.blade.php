@extends('components.component')

@section('content')

<div class="row mt-4">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Authors table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">

                <div class="table-responsive p-0">

                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name Customer</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Code Transaction</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name Car</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Qty</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Price</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataTransaction as $dtt)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="{{$dtt->user->photo_profile_url}}" class="avatar avatar-sm me-3" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$dtt->user->name}}</h6>

                                        </div>
                                    </div>
                                </td>
                                <td>

                                    <p class="text-xs font-weight-bold mb-0">{{$dtt->code_transaction}}</p>

                                </td>
                                <td class="align-middle text-center text-sm">
                                    {{$dtt->car->name}}
                                </td>
                                <td class="align-middle text-center text-sm">
                                    {{$dtt->total_qty}}
                                </td>
                                <td class="align-middle text-center text-sm">
                                    Rp.{{$dtt->total_price}}
                                </td>
                                <td class="align-middle text-center text-sm">
                                    {{$dtt->user->address}}
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