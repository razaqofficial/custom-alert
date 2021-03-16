<?php

namespace App\Http\Controllers;

use App\Http\Requests\Alert\NewAlertRequest;
use App\Models\Alert;
use DB;

class AlertController extends Controller
{
    public function index()
    {
        return view('alert.index');
    }

    /**
     *
     * @param NewAlertRequest $request
     */
    public function create(NewAlertRequest $request)
    {
        DB::beginTransaction();

        $alert = new Alert();
        $alert->alert_message = $request->alert_message;
        $alert->user()->associate($request->user());
        $alert->save();

        DB::commit();

        return redirect(route('alert.details', $alert))->with('success', 'You can now add rules to this alert');
    }

    public function details(Alert $alert)
    {
        return view('alert.details', compact('alert'));
    }

    public function delete(Alert $alert)
    {
        DB::beginTransaction();

        $alert->delete();

        DB::commit();

        return back()->with('success', 'Alert deleted successfully');
    }
}
