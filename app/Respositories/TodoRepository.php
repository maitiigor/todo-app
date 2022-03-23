<?php

namespace App\Repositories;

use App\Interfaces\TodoRepositoryInterface;
use App\Models\Todo;

class TodoRepository implements TodoRepositoryInterface 
{
    public function getAllTodos() 
    {
        return Todo::all();
    }

    public function getTodoById($todoId) 
    {
        return Todo::findOrFail($todoId);
    }

    public function deleteTodo($todoId) 
    {
        Todo::destroy($todoId);
    }

    public function createOrder(array $todoDetails) 
    {
        return Todo::create($todoDetails);
    }

    public function updateOrder($todoId, array $newDetails) 
    {
        return Todo::whereId($todoId)->update($newDetails);
    }

  
}