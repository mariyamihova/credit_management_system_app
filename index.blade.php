@extends('layout')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    @if ($countOfActiveCredits > 0)
        <h2 style="text-align: center">Total count of active credits at the moment:  {{ $countOfActiveCredits }}</h2>
    @else
        <h2 style="text-align: center">There are no active credits at the moment</h2>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
        <tr>
            <th>Credit number</th>
            <th>Borrower name</th>
            <th>Requested amount</th>
            <th>Period</th>
            <th>Monthly payment</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($allActiveCredits as $credit)
            <tr>
                <td> {{ $credit['credit_number'] }} </td>
                <td> {{ $credit['name'] }} </td>
                <td> {{ $credit['requested_amount'] }} </td>
                <td> {{ $credit['credit_period'] }} </td>
                <td> {{ round($credit['total_amount'] / $credit['credit_period'], 2) }} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">{{ $allActiveCredits->onEachSide(2)->links() }}</div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route("credit.create") }}">Request new credit</a>
                <a class="btn btn-success" href="{{ route("payment.create") }}">Make payment</a>
            </div>
        </div>
    </div>
@endsection



