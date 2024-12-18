@extends('layouts.app')

@section('title', 'Editar Pet')

@section('content')
<div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
        <h1 class="text-3xl font-semibold text-gray-900">Editar Pet: {{ $pet->nome }}</h1>
        <p class="mt-2 text-sm text-gray-700">Atualize os detalhes do pet conforme necessário.</p>
    </div>
</div>

<div class="mt-8">
    <form action="{{ route('pets.update', $pet) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Informações do Pet</h3>

            <div class="space-y-4">
                <div>
                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input type="text" name="nome" id="nome" value="{{ old('name', $pet->nome) }}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg outline-indigo-400 block w-full p-2.5">
                    @error('nome')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="especie" class="block text-sm font-medium text-gray-700">Espécie</label>
                    <select name="especie" id="especie" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg outline-indigo-400 block w-full p-2.5">
                        <option value="" disabled>Selecione uma espécie</option>
                        <option value="Cachorro" {{ old('especie', $pet->especie) == 'Cachorro' ? 'selected' : '' }}>Cachorro</option>
                        <option value="Gato" {{ old('especie', $pet->especie) == 'Gato' ? 'selected' : '' }}>Gato</option>
                        <option value="Pássaro" {{ old('especie', $pet->especie) == 'Pássaro' ? 'selected' : '' }}>Pássaro</option>
                        <option value="Peixe" {{ old('especie', $pet->especie) == 'Peixe' ? 'selected' : '' }}>Peixe</option>
                        <option value="Réptil" {{ old('especie', $pet->especie) == 'Réptil' ? 'selected' : '' }}>Réptil</option>
                        <option value="Roedor" {{ old('especie', $pet->especie) == 'Roedor' ? 'selected' : '' }}>Roedor</option>
                        <option value="Coelho" {{ old('especie', $pet->especie) == 'Coelho' ? 'selected' : '' }}>Coelho</option>
                        <option value="Cavalo" {{ old('especie', $pet->especie) == 'Cavalo' ? 'selected' : '' }}>Cavalo</option>
                        <option value="Outro" {{ old('especie', $pet->especie) == 'Outro' ? 'selected' : '' }}>Outro</option>
                    </select>
                    @error('especie')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="raca" class="block text-sm font-medium text-gray-700">Raça (opcional)</label>
                    <input type="text" name="raca" id="raca" value="{{ old('raca', $pet->raca) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg outline-indigo-400 block w-full p-2.5">
                    @error('raca')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="genero" class="block text-sm font-medium text-gray-700">Gênero</label>
                    <select name="genero" id="genero" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg outline-indigo-400 block w-full p-2.5">
                        <option value="" disabled {{ old('genero') == '' ? 'selected' : '' }}>Selecione um gênero</option>
                        <option value="Macho" {{ old('genero', $pet->genero) == 'Macho' ? 'selected' : '' }}>Macho</option>
                        <option value="Fêmea" {{ old('genero', $pet->genero) == 'Fêmea' ? 'selected' : '' }}>Fêmea</option>
                    </select>
                    @error('genero')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="data_nascimento" class="block text-sm font-medium text-gray-700">Data de Nascimento</label>
                    <input type="date" name="data_nascimento" id="data_nascimento" value="{{ old('data_nascimento', $pet->data_nascimento) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg outline-indigo-400 block w-full p-2.5">
                    @error('data_nascimento')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="dono" class="block text-sm font-medium text-gray-700">Nome do Dono</label>
                    <input type="text" name="dono" id="dono" value="{{ old('dono', $pet->dono) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg outline-indigo-400 block w-full p-2.5">
                    @error('dono') 
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p> 
                    @enderror
                </div>
            </div>
        </div>

        <div class="flex justify-end space-x-3 mt-4">
            <a href="{{ route('pets.index') }}"
                class="py-2 px-4 bg-gray-200 rounded-md shadow-sm text-gray-700 hover:bg-gray-300 focus:outline-none">
                Cancelar
            </a>

            <button type="submit"
                class="py-2 px-4 bg-indigo-600 rounded-md shadow-sm text-white font-medium hover:bg-indigo-700 focus:outline-none">
                Atualizar Pet
            </button>
        </div>

    </form>
</div>
@endsection
