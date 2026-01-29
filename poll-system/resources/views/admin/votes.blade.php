@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">👑 Admin Panel – Poll {{ $id }}</h2>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>IP Address</th>
                        <th>Option ID</th>
                        <th>Status</th>
                        <th>Voted At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($votes as $vote)
                    <tr>
                        <td>{{ $vote->ip_address }}</td>
                        <td>{{ $vote->option_id }}</td>
                        <td>
                            @if($vote->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Released</span>
                            @endif
                        </td>
                        <td>{{ $vote->created_at }}</td>
                        <td>
                            @if($vote->is_active)
                                <button class="btn btn-sm btn-danger"
                                    onclick="releaseVote('{{ $vote->ip_address }}')">
                                    Release IP
                                </button>
                            @else
                                —
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function releaseVote(ip) {
    fetch('/admin/release-vote', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            poll_id: {{ $id }},
            ip_address: ip
        })
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message);
        location.reload();
    });
}
</script>
@endsection
