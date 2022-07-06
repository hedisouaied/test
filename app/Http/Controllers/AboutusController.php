<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Feedback;
use App\Models\Mission;
use App\Models\SolideEx;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function index()
    {
        $about = AboutUs::first();
        $missions = Mission::orderby('id','ASC')->get();
        $solides = SolideEx::orderby('id','ASC')->get();

        return view('backend.about.index', compact(['about','missions','solides']));
    }
    public function aboutUpdate(Request $request)
    {
        $about = AboutUs::first();
        $status = $about->update([
            'heading' => $request->heading,
            'content' => $request->content,
            'image' => $request->image,
            'video' => $request->video,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'mot_president' => $request->mot_president,
            'desc_mot_president' => $request->desc_mot_president,
            'nom_mot_president' => $request->nom_mot_president,
            'poste_mot_president' => $request->poste_mot_president,
            'photo_mot_president' => $request->photo_mot_president,
            'video_mot_president' => $request->video_mot_president,
            'solide_desc' => $request->solide_desc,
            'mission_desc' => $request->mission_desc,
            'catalogue' => $request->catalogue,
			'photo_wcu' =>$request->photo_wcu,
			'title1_wcu' =>$request->title1_wcu,
			'title2_wcu' =>$request->title2_wcu,
			'title3_wcu' =>$request->title3_wcu,
			'title4_wcu' =>$request->title4_wcu,
			'desc1_wcu' =>$request->desc1_wcu,
			'desc2_wcu' =>$request->desc2_wcu,
			'desc3_wcu' =>$request->desc3_wcu,
			'desc4_wcu' =>$request->desc4_wcu,
        ]);

        if ($status) {
            return redirect()->back()->with('success', 'Modifié avec succès');
        } else {
            return back()->with('error', 'something went wrong!');
        }
    }



}
