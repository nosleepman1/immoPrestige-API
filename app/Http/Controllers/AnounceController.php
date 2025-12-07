<?php

namespace App\Http\Controllers;

use App\Models\Anounce;
use App\Http\Controllers\Controller;
use App\Http\Requests\searchAnouceRequest;
use App\Http\Requests\StoreAnounceRequest;
use App\Http\Requests\UpdateAnounceRequest;
use Exception;
use Illuminate\Http\Request;

class AnounceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(searchAnouceRequest $request)
    {
        try{
            $data = $request->validated();

            $query = Anounce::query();
            $total = $query->count();
            $paginatation = $query->paginate(2);
            $current_page = ($total/$paginatation);
            $search = $query->where('title', 'like', );
            return response()->json([
                'posts' => $query->get(),
                'total' => $total
            ], 200);

        } catch (Exception $e) {
            return response()->json($e);

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StoreAnounceRequest $request)
    {



    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnounceRequest $request)
    {
        try{

           Anounce::create($request->validated());

           response()->json([
            'message' => 'annonce créé avec success',
            'data' => $request->validated()
           ], 201);

            } catch (Exception $e) {
                return response()->json($e);

         }
    }

    /**
     * Display the specified resource.
     */
    public function show(Anounce $anounce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anounce $anounce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnounceRequest $request, Anounce $anounce)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anounce $anounce)
    {
        //
    }
}
