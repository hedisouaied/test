<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedback = Feedback::orderby('id', 'DESC')->get();

        return view('backend.feedback.index', compact('feedback'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'nullable|string',
            'description' => 'string|required',
            'status' => 'nullable|in:active,inactive',
        ]);
        $data = $request->all();
        $status = Feedback::create($data);
        if ($status) {
            return redirect()->route('feedback.index')->with('success', 'Socièté crée avec succès');
        } else {
            return back()->with('error', 'Something went wrong!!');
        }
    }

    public function feedbackStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('feedback')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('feedback')->where('id', $request->id)->update(['status' => 'inactive']);
        }
        return response()->json(['msg' => 'Seccessfully updated', 'status' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feedback = Feedback::find($id);
        if ($feedback) {
            return view('backend.feedback.edit', compact('feedback'));
        } else {
            return back()->with('error', 'Data not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $feedback = Feedback::find($id);
        if ($feedback) {

            $this->validate($request, [
                'title' => 'nullable|string',
                'description' => 'string|required',
                'status' => 'nullable|in:active,inactive',
            ]);
            $data = $request->all();
            $status = $feedback->fill($data)->save();
            if ($status) {
                return redirect()->route('feedback.index')->with('success', 'Socièté modifiée avec succès');
            } else {
                return back()->with('error', 'something went wrong!');
            }
        } else {
            return back()->with('error', 'Data not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = Feedback::find($id);
        if ($feedback) {
            $status = $feedback->delete();
            if ($status) {
                return redirect()->route('feedback.index')->with('success', 'Socièté supprimée avec succès');
            } else {
                return back()->with('error', 'Something went wrong!');
            }
        } else {
            return back()->with('error', 'Data not found');
        }
    }
}
