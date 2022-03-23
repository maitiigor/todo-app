<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\TodoCreateFormRequest;
use App\Interfaces\TodoRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private TodoRepositoryInterface $todoRepository;

    public function __construct(TodoRepositoryInterface $todoRepository) 
    {
        $this->todoRepository = $todoRepository;
    }


    public function index()
    {
        //
        return response()->json([
            'data' => $this->todoRepository->getAllOrders()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoCreateFormRequest $request)
    {
        //
        $tododetails = $request->all();

        return response()->json(
            [
                'data' => $this->orderRepository->createOrder($orderDetails)
            ],
            Response::HTTP_CREATED
        );
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
        $todoId = $request->route('id');

        return response()->json([
            'data' => $this->todoRepository->getTodorById($todoId)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $todoId = $request->route('id');

        return response()->json([
            'data' => $this->todoRepository->getTodoById($todoId)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoCreateFormRequest $request, $id)
    {
        //
        $todoId = $id;
        $todoDetails = $request->only([
            'client',
            'details'
        ]);

        return response()->json([
            'data' => $this->todoRepository->update($todoId, $todoDetails)
        ]);
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
        $todoId = $request->route('id');
        $this->todoRepository->deletetodo($todoId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
