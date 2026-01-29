<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PollController extends Controller
{
    /* =======================
       MODULE 1
       Show polls list
    ======================== */
    public function index()
    {
        $polls = Poll::with('options')->get();
        return view('polls.index', compact('polls'));
    }

    /* =======================
       MODULE 1
       Get poll with options (AJAX)
    ======================== */
    public function show($id)
    {
        $poll = Poll::with('options')->findOrFail($id);
        return response()->json($poll);
    }

    /* =======================
       MODULE 2
       Vote logic (IP restricted)
    ======================== */
    public function vote(Request $request)
    {
        $ip = $request->ip();

        $alreadyVoted = Vote::where('poll_id', $request->poll_id)
            ->where('ip_address', $ip)
            ->where('is_active', true)
            ->exists();

        if ($alreadyVoted) {
            return response()->json([
                'status' => 'error',
                'message' => 'You have already voted from this IP'
            ]);
        }

        Vote::create([
            'poll_id'    => $request->poll_id,
            'option_id'  => $request->option_id,
            'ip_address' => $ip,
            'is_active'  => true
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Vote recorded successfully'
        ]);
    }

    /* =======================
       MODULE 3
       Live results (AJAX)
    ======================== */
    public function results($id)
    {
        $results = DB::table('poll_options')
            ->leftJoin('votes', function ($join) {
                $join->on('poll_options.id', '=', 'votes.option_id')
                     ->where('votes.is_active', true);
            })
            ->where('poll_options.poll_id', $id)
            ->select(
                'poll_options.id',
                'poll_options.option_text',
                DB::raw('COUNT(votes.id) as total_votes')
            )
            ->groupBy('poll_options.id', 'poll_options.option_text')
            ->get();

        return response()->json($results);
    }

    /* =======================
       MODULE 4
       ADMIN – View all votes (IP list + history)
    ======================== */
    public function adminVotes($id)
    {
        $votes = Vote::where('poll_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.votes', compact('votes', 'id'));
    }

    /* =======================
       MODULE 4
       ADMIN – Release IP (Rollback vote)
    ======================== */
    public function releaseVote(Request $request)
    {
        Vote::where('poll_id', $request->poll_id)
            ->where('ip_address', $request->ip_address)
            ->where('is_active', true)
            ->update(['is_active' => false]);

        return response()->json([
            'status'  => 'success',
            'message' => 'IP released and vote rolled back'
        ]);
    }
}
