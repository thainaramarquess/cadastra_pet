<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller {

    
    // Listar os pets
    public function index() {
        $pets = Pet::latest()->paginate(9);
        return view('pets.index', compact('pets'));
    }


    // Mostrar a view para criar um novo pet
    public function create() {
        return view('pets.create');
    }


    // Processar e salvar os dados de um novo pet
    public function store(Request $request) {
        $validated = $request->validate([
            'nome' => ['required', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'especie' => ['required', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'raca' => ['nullable', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'genero' => ['required', 'in:Macho,Fêmea'],
            'dono' => ['required', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'data_nascimento' => ['required', 'date'],
        ], [
            'nome.regex' => 'O nome deve conter apenas letras e espaços.',
            'especie.regex' => 'A espécie deve conter apenas letras e espaços.',
            'raca.regex' => 'A raça deve conter apenas letras e espaços.',
            'dono.regex' => 'O dono deve conter apenas letras e espaços.',
        ]);

        Pet::create($validated);

        return redirect()->route('pets.index')->with('success', 'Pet cadastrado com sucesso!');
    }


    // Mostrar a view para editar um pet
    public function edit(Pet $pet) {
        return view('pets.edit', compact('pet'));
    }


    // Atualizar os dados do pet
    public function update(Request $request, Pet $pet) {
        $validated = $request->validate([
            'nome' => ['required', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'especie' => ['required', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'raca' => ['nullable', 'max:255', 'regex:/^[a-zA-Z\s]*$/'],
            'data_nascimento' => ['required', 'date'],
            'genero' => ['required', 'in:Macho,Fêmea'],
            'dono' => ['required', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
        ]);

        $pet->update($validated);

        return redirect()->route('pets.index')->with('success', 'Pet atualizado com sucesso!');
    }


    // Excluir um pet
    public function destroy(Pet $pet) {
        $pet->delete();

        return redirect()->route('pets.index')->with('success', 'Pet removido com sucesso!');
    }
}
