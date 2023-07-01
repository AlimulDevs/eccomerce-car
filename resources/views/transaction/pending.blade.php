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
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Proof Transaction</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                <th class="text-secondary opacity-7"></th>
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
                                    @if ($dtt->proof_url == null)
                                    <p class="text-xs font-weight-bold mb-0 ">proof empety</p>
                                    @else
                                    <a href="{{$dtt->proof_url}}">
                                        <img src="{{$dtt->proof_url}}" alt="proof url" width="50px" height="50px">
                                    </a>
                                    @endif

                                </td>

                                <td class="align-middle text-center ">
                                    <a href="/admin/transaction/accept/{{$dtt->id}}" class="mt-3 text-secondary font-weight-bold text-white btn btn-sm btn-success">
                                        ACCEPT
                                    </a>
                                    <a href="/admin/transaction/reject/{{$dtt->id}}" class="mt-3 text-secondary font-weight-bold text-white btn btn-sm btn-danger">
                                        REJECT
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