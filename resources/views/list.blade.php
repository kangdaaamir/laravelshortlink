   @extends('layouts.layout')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
 <a href="{{ route('generate.shorten.create') }}" class="orangeBtn mt-3 mt-md-0 backBtn" title="Add Short Link"><img src="{{ URL('img/add-user-icon.png') }}" alt="Add Short Link" title="Add Short Link" class="mr-1"/>Add Link</a>
</div>

<div class="row">
   <div class="card-body">
   
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
   
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Short Link</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shortLinks as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td><a href="{{ route('shorten.link', $row->code) }}" target="_blank">{{ route('shorten.link', $row->code) }}</a></td>
                            <td>{{ $row->link }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
</div>
      @endsection