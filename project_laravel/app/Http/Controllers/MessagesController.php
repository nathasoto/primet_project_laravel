<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\StoremessagesRequest;
use App\Http\Requests\UpdatemessagesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $datos = Message::all();
       return view ('dashboard',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    
     public function store(Request $request)
     {
         $request->validate([
             'message' => 'required|string|max:300',
         ]);
     
         $userId = Auth::id(); // Obtenemos el ID del usuario autenticado
     
         Message::create([
             'message' => $request->message,
             'users_id' => $userId, // Asignamos el ID del usuario al mensaje
         ]);
     
         return redirect()->route('dashboard')->with('success', 'Message added successfully');
     }

    /**
     * Display the specified resource.
     */
    public function show(message $messages)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(message $messages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
  {
    $request->validate([
        'message' => 'required|string|max:300',
    ]);

    // Verifica si el usuario autenticado es el propietario del mensaje
    if ($message->user_id !== Auth::id()) {
        // Si el usuario no es el propietario, redirige con un mensaje de error
        return redirect()->route('dashboard')->with('error', 'You are not authorized to edit this message.');
    }

    // Actualiza el mensaje con los datos del formulario
    $message->update([
        'message' => $request->message,
    ]);

    return redirect()->route('dashboard')->with('success', 'Message updated successfully');
  }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->route('dashboard')->with('success', 'Message deleted successfully');
    }
}
