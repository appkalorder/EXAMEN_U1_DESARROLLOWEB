<?php

namespace App\Http\Controllers;

use App\Models\Computador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComputadorController extends Controller
{
    public function index(Request $request)
    {
        $query = Computador::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('codigo_tienda', 'LIKE', "%{$search}%");
        }

        $computadores = $query->latest()->get();
        return view('computadores.index', compact('computadores'));
    }

    public function create()
    {
        return view('computadores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo_tienda' => 'required|unique:computadores',
            'procesador' => 'required',
            'RAM' => 'required',
            'almacenamiento' => 'required',
            'tarjeta_grafica' => 'required',
            'precio' => 'required|numeric',
            'imagen' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('computadores', 'public');
            $data['imagen'] = 'storage/' . $path;
        }

        Computador::create($data);

        return redirect()->route('computadores.index')
            ->with('success', 'Computador creado exitosamente');
    }

    public function show(Computador $computador)
    {
        return view('computadores.show', compact('computador'));
    }

    public function edit(Computador $computador)
    {
        return view('computadores.edit', compact('computador'));
    }

    public function update(Request $request, Computador $computador)
    {
        $request->validate([
            'codigo_tienda' => 'required|unique:computadores,codigo_tienda,' . $computador->id,
            'procesador' => 'required',
            'RAM' => 'required',
            'almacenamiento' => 'required',
            'tarjeta_grafica' => 'required',
            'precio' => 'required|numeric',
            'imagen' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            if ($computador->imagen) {
                Storage::delete(str_replace('storage/', 'public/', $computador->imagen));
            }
            $path = $request->file('imagen')->store('computadores', 'public');
            $data['imagen'] = 'storage/' . $path;
        }

        $computador->update($data);

        return redirect()->route('computadores.index')
            ->with('success', 'Computador actualizado exitosamente');
    }

    public function destroy(Computador $computador)
    {
        if ($computador->imagen) {
            Storage::delete(str_replace('storage/', 'public/', $computador->imagen));
        }
        
        $computador->delete();

        return redirect()->route('computadores.index')
            ->with('success', 'Computador eliminado exitosamente');
    }
}