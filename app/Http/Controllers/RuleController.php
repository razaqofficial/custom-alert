<?php

namespace App\Http\Controllers;

use App\Http\Requests\Rule\NewUserRuleRequest;
use App\Models\Rule;
use App\Models\User;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function index()
    {
        $rules = Rule::all();
        return view('index', compact('rules'));
    }

    /**
     *
     * @param NewUserRuleRequest $request
     */
    public function create(NewUserRuleRequest $request)
    {
        $request->user()->rules()->attach($request->rule_id, [
            'alert_message' => $request->alert_message,
            'query_string' => $request->query_string,
            'display' => $request->display,
        ]);

        return back()->with('success', 'Rule added successfully');
    }

    public function getUserRules(User $user)
    {
        return response()->json([
            'message' => 'user rules',
            'rules' => $user->rules
        ]);
    }
}
