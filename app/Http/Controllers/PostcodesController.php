<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postcode;
use App\Http\Requests\PostcodesRequest;
use App\Ward;

class PostcodesController extends Controller
{
    public function getPostcodes(PostcodesRequest $request)
    {
        return Postcode::paginate();
    }

    public function getWards(PostcodesRequest $request)
    {
        $wards = null;
        $orderBy = $request->orderBy ? $request->orderBy : 'ward';
        $orderType = $request->orderType ? $request->orderType : 'asc';

        return Ward::where('ward', 'LIKE', $request->search . '%')
            ->orWhere('postcode', 'LIKE', $request->search . '%')
            ->orderBy($orderBy, $orderType)
            ->get();
    }
}
