<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        Profile::where('user_id', $user_id)->update([
            'address' => request('address'),
            'experience' => request('experience'),
            'bio' => request('bio'),
        ]);

        return redirect()->back()->with('message', 'Profile Updated Successfully');
    }

    public function coverletter(Request $request)
    {
        $user_id = auth()->user()->id;
        $cover = $request->file('cover_letter')->store('public/files');

        Profile::where('user_id', $user_id)->update([
            'cover_letter' => $cover,
        ]);

        return redirect()->back()->with('message', 'CoverLetter Updated Successfully');
    }

    public function resume(Request $request)
    {
        $user_id = auth()->user()->id;

        $resume = $request->file('resume')->store('public/files');

        Profile::where('user_id', $user_id)->update([
            'resume' => $resume,
        ]);

        return redirect()->back()->with('message', 'Resume Updated Successfully');
    }

    public function avater(Request $request)
    {
        $user_id = auth()->user()->id;

        if ($request->hasFile('avater')) {

            $avater = $request->file('avater');
            $extension = $avater->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $avater->move('uploads/avater', $fileName);

            Profile::where('user_id', $user_id)->update([
                'avater' => $fileName,
            ]);

            return redirect()->back()->with('message', 'Avater Uploaded Successfully');
        }
    }
}
