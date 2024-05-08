@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Request new credit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('credit.index') }}">Back</a>
            </div>
        </div>
    </div>
    <form action="{{ route('credit.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Borrower name:</strong>
                    <input type="text" name="borrower_name" class="form-control" value="{{ old('borrower_name') }}" placeholder="Borrower name">
                    @if ($errors->has('borrower_name'))
                        <div class="alert alert-danger">{{ $errors->first('borrower_name') }}</div>
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Requested amount</strong>
                    <input type="number" name="requested_amount" class="form-control" value="{{ old('requested_amount') }}" placeholder="Requested amount">
                    @if ($errors->has('requested_amount'))
                        <div class="alert alert-danger">{{ $errors->first('requested_amount') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Period</strong>
                    <input type="number" name="credit_period" class="form-control" value="{{ old('credit_period') }}" placeholder="Period">
                    @if ($errors->has('credit_period'))
                        <div class="alert alert-danger">{{ $errors->first('credit_period') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" >
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
