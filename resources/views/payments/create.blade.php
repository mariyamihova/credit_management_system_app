@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Make payment</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('credit.index') }}">Back</a>
            </div>
        </div>
    </div>
    <form action="{{ route('payment.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <select name="credit_id" id="credit_id" class="form-control">
                    <option value="-1">Select credit</option>
                    @foreach ($activeCredits as $credit)
                        <option value="{{ $credit['id'] }}">
                            {{ $credit['credit_number'] }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('credit_id'))
                    <div class="alert alert-danger">{{ $errors->first('credit_id') }}</div>
                @endif
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Payment amount</strong>
                    <input type="number" name="amount" class="form-control" value="{{ old('amount') }}" placeholder="Payment amount">
                    @if ($errors->has('amount'))
                        <div class="alert alert-danger">{{ $errors->first('amount') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
