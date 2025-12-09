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
    public function index(searchAnouceRequest $request)
    {
        try{
            $query = Anounce::query();

            if ($request->has('title') && !empty($request->title)) {
                $query->where('title', 'like', '%' . $request->title . '%');
            }

            // PAGINATION : Nombre d'éléments par page (par défaut 15)
            $perPage = $request->input('per_page', 15);

            // Exécuter la requête avec pagination
            $anounces = $query->paginate($perPage);

            return response()->json([
                'success' => true,
                'data' => $anounces->items(),
                'pagination' => [
                    'total' => $anounces->total(),
                    'per_page' => $anounces->perPage(),
                    'current_page' => $anounces->currentPage(),
                    'last_page' => $anounces->lastPage(),
                    'from' => $anounces->firstItem(),
                    'to' => $anounces->lastItem(),
                ]
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la récupération des annonces',
                'error' => $e->getMessage()
            ], 500);
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
