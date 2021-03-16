<?php

namespace App\Http\Controllers;

use App\Http\Requests\Rule\NewUserRuleRequest;
use App\Models\Rule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RuleController extends Controller
{
    public function index()
    {
        
        return view('index');
    }

    /**
     *
     * @param NewUserRuleRequest $request
     */
    public function create(NewUserRuleRequest $request)
    {
        DB::beginTransaction();

        $rule = new Rule();
        $rule->name = $request->name;
        $rule->alert_message = $request->alert_message;
        $rule->query_string = $request->query_string;
        $rule->display = $request->display;
        $rule->user()->associate($request->user());
        $rule->save();

        DB::commit();

        return back()->with('success', 'Rule added successfully');
    }

    public function getUserRules(User $user)
    {
        return response()->json([
            'message' => 'user rules',
            'rules' => $user->rules()->showOn()->get()
        ]);
    }

    /**
     * @param Rule $rule
     */
    public function delete(Rule $rule)
    {
        $rule->delete();

        return back()->with('success', 'Rule deleted successfully');
    }

    /**
     * @param Request $request
     */
    public function downloadJsFile(Request $request)
    {
        $file = $request->file == 'task' ? 'task.js' : 'jquery.min.js';
        return response()->download(public_path($file));
    }
}
