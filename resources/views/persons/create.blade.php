@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Add New Person
                    </div>
                    <div class="float-end">
                        <a href="{{ route('persons.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('persons.store') }}" method="post">
                        @csrf

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                            <div class="col-md-6">
                                <input class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="surname" class="col-md-4 col-form-label text-md-end text-start">Surname</label>
                            <div class="col-md-6">
                                <input class="form-control @error('surname') is-invalid @enderror" id="surname"
                                    name="surname" value="{{ old('surname') }}">
                                @if ($errors->has('surname'))
                                    <span class="text-danger">{{ $errors->first('surname') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email</label>
                            <div class="col-md-6">
                                <input class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="tel" class="col-md-4 col-form-label text-md-end text-start">Tel</label>
                            <div class="col-md-6">
                                <input class="form-control @error('tel') is-invalid @enderror" id="tel" name="tel"
                                    value="{{ old('tel') }}">
                                @if ($errors->has('tel'))
                                    <span class="text-danger">{{ $errors->first('tel') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="SmsSub" class="col-md-4 col-form-label text-md-end text-start">Sms sub</label>
                            <div class="col-md-6">
                                <input class="form-check-input @error('SmsSub') is-invalid @enderror" type="checkbox"
                                    name="SmsSub" id="SmsSub" {{ old('SmsSub') ? 'checked' : '' }}>
                                @if ($errors->has('SmsSub'))
                                    <span class="text-danger">{{ $errors->first('SmsSub') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="emailSub" class="col-md-4 col-form-label text-md-end text-start">Email sub</label>
                            <div class="col-md-6">
                                <input class="form-check-input @error('emailSub') is-invalid @enderror" type="checkbox"
                                    name="emailSub" id="emailSub" {{ old('emailSub') ? 'checked' : '' }}>
                                @if ($errors->has('emailSub'))
                                    <span class="text-danger">{{ $errors->first('emailSub') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Person">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
