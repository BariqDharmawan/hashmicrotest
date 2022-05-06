<?php

namespace App\Http\Controllers;

use App\Helper\Word;
use App\Models\UserCompare;
use App\Models\WordToCompare;
use Illuminate\Http\Request;

class UserCompareController extends Controller
{
    public function result()
    {
        return view('user-compare.result', ['userCompares' => UserCompare::all()]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user-compare.index');
    }

    public function store(Request $request)
    {
        $compareTwoString = Word::compareString($request->username_1, $request->username_2);
        $compareTwoString = json_decode(json_encode($compareTwoString));

        UserCompare::create([
            'word_1' => $request->username_1,
            'word_2' => $request->username_2,
            'result_percentage' => $compareTwoString->percentageEqual
        ]);

        return redirect()->back()->with('success', "Total persamaan adalah $compareTwoString->percentageEqual%");
    }

    public function update(UserCompare $userCompare, Request $request)
    {
        $compareTwoString = Word::compareString($request->username_1, $request->username_2);
        $compareTwoString = json_decode(json_encode($compareTwoString));
        // dd($compareTwoString);

        $userCompare->word_1 = $request->username_1;
        $userCompare->word_2 = $request->username_2;
        $userCompare->result_percentage = $compareTwoString->percentageEqual;
        $userCompare->save();

        return redirect()->route('user-compare.result');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserCompare  $userCompare
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCompare $userCompare)
    {
        return view('user-compare.edit', compact('userCompare'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserCompare  $userCompare
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCompare $userCompare)
    {
        $userCompare->delete();

        return redirect()->back()->with('success_delete', 'berhasil menghapus data');
    }
}
