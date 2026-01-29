@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4 text-center">📊 Live Polls</h2>

    @foreach($polls as $poll)
        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="#" class="text-decoration-none"
                       onclick="loadPoll({{ $poll->id }})">
                        {{ $poll->question }}
                    </a>
                </h5>
            </div>
        </div>
    @endforeach

    <div id="poll-details"></div>
</div>

<script>
let resultInterval = null;

function loadPoll(id) {
    fetch('/poll/' + id)
        .then(res => res.json())
        .then(data => {

            let html = `
                <div class="card shadow mt-4">
                    <div class="card-body">
                        <h4 class="mb-3">${data.question}</h4>

                        <div class="mb-3">
                            ${data.options.map(opt => `
                                <button class="btn btn-outline-primary m-1"
                                    onclick="vote(${data.id}, ${opt.id})">
                                    ${opt.option_text}
                                </button>
                            `).join('')}
                        </div>

                        <hr>
                        <h5>📈 Live Results</h5>
                        <div id="live-results"></div>
                    </div>
                </div>
            `;

            document.getElementById('poll-details').innerHTML = html;

            if (resultInterval) clearInterval(resultInterval);
            fetchResults(data.id);
            resultInterval = setInterval(() => fetchResults(data.id), 1000);
        });
}

function fetchResults(pollId) {
    fetch(`/poll/${pollId}/results`)
        .then(res => res.json())
        .then(data => {
            let total = data.reduce((sum, d) => sum + d.total_votes, 0) || 1;

            let html = '';
            data.forEach(r => {
                let percent = Math.round((r.total_votes / total) * 100);
                html += `
                    <div class="mb-2">
                        <strong>${r.option_text}</strong>
                        <span class="float-end">${r.total_votes} votes</span>
                        <div class="progress">
                            <div class="progress-bar bg-success"
                                style="width: ${percent}%">
                                ${percent}%
                            </div>
                        </div>
                    </div>
                `;
            });

            document.getElementById('live-results').innerHTML = html;
        });
}

function vote(pollId, optionId) {
    fetch('/vote', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ poll_id: pollId, option_id: optionId })
    })
    .then(res => res.json())
    .then(data => alert(data.message));
}
</script>
@endsection
