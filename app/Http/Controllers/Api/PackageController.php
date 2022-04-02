<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('admin')->except(['index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $sorts = explode(',', $request->input('sort', ''));

            $query = Package::query();

            foreach ($sorts as $sortColumn) {
                if ($sortColumn !== '') {
                    $sortDirection = str_starts_with($sortColumn, '-') ? 'desc' : 'asc';
                    $sortColumn = ltrim($sortColumn, '-');

                    $query->orderBy($sortColumn, $sortDirection);
                }
            }

            $filters = explode(',', $request->query('filter'));

            foreach ($filters as $filterColumn) {
                if ($filterColumn !== '') {
                    [$field, $value] = explode(':', $filterColumn);

                    $query->where($field, $value);
                }
            }

            $packages = $query->with(['tags'])->get();

            return response()->json([
                "errorCode" => 0,
                "message" => "Success",
                "data" => [
                    "total_items" => count($packages),
                    "mem_tier" => $request->user()->type,
                    "pack_list" => $packages,
                ]
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                "errorCode" => 1,
                "message" => "Something Went Wrong!!!"
            ], 500); 
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
