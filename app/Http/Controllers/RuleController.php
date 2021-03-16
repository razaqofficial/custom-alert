<?php

namespace App\Http\Controllers;

use App\Http\Requests\Rule\NewUserRuleRequest;
use App\Models\Alert;
use App\Models\Rule;
use App\Models\User;
use DB;

class RuleController extends Controller
{
    public function index()
    {

        return view('index');
    }

    /**
     *
     * @param NewUserRuleRequest $request
     * @param Alert $alert
     */
    public function create(NewUserRuleRequest $request, Alert $alert)
    {
        DB::beginTransaction();

        $rule = new Rule();
        $rule->name = $request->name;
        $rule->query_string = $request->query_string;
        $rule->display = $request->display;
        $rule->alert()->associate($alert);
        $rule->save();

        DB::commit();

        return back()->with('success', 'Rule added successfully');
    }

    public function getUserRules(User $user)
    {
        return response()->json([
            'message' => 'user rules',
            'rules' => $user->rules()->showOn()->with('alert')->get()
        ]);
    }

    /**
     * @param Rule $rule
     */
    public function delete(Rule $rule)
    {
        DB::beginTransaction();

        $rule->delete();

        DB::commit();

        return back()->with('success', 'Rule deleted successfully');
    }

}
