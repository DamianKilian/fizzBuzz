@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">Person List</div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">name</th>
                                <th scope="col">surname</th>
                                <th scope="col">email</th>
                                <th scope="col">tel</th>
                                <th scope="col">sms_sub</th>
                                <th scope="col">email_sub</th>
                                <th scope="col"><a href="{{ route('persons.create') }}" class="btn btn-primary">Create
                                        person</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($persons as $person)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $person->name }}</td>
                                    <td>{{ $person->surname }}</td>
                                    <td>{{ $person->email }}</td>
                                    <td>{{ $person->tel }}</td>
                                    <td><b>{{ $person->smsSub ? 'TAK' : 'NIE' }}</b></td>
                                    <td><b>{{ $person->emailSub ? 'TAK' : 'NIE' }}</b></td>
                                    <td>
                                        <form action="{{ route('persons.destroy', $person->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ route('persons.show', $person->id) }}"
                                                class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                            <a href="{{ route('persons.edit', $person->id) }}"
                                                class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Do you want to delete this person?');"><i
                                                    class="bi bi-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="7">
                                    <span class="text-danger">
                                        <strong>No Person Found!</strong>
                                    </span>
                                </td>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $persons->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection
