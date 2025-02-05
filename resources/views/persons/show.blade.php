@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Person Information
                    </div>
                    <div class="float-end">
                        <a href="{{ route('persons.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <label for="name"
                            class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $person->name }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="surname"
                            class="col-md-4 col-form-label text-md-end text-start"><strong>Surname:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $person->surname }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-end text-start"><strong>Email:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $person->email }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="tel"
                            class="col-md-4 col-form-label text-md-end text-start"><strong>Tel:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $person->tel }}
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-4 col-form-label text-md-end text-start"><strong>SmsSub:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            @if ($person->smsSub)
                                <b class="text-success">TAK</b>
                            @else
                                <b class="text-danger">NIE</b>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-4 col-form-label text-md-end text-start"><strong>EmailSub:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            @if ($person->emailSub)
                                <b class="text-success">TAK</b>
                            @else
                                <b class="text-danger">NIE</b>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
