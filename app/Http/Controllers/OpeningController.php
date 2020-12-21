<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Opening;
use Illuminate\Http\Request;

class OpeningController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $opening)
    {
        return Inertia::render('Opening/Show', [
            'opening' => Opening::where('opening', $opening)->first()
        ]);
    }
}
