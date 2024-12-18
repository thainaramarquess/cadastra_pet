@extends('layouts.app')

@section('title', 'Adicionar Pet')

@section('content')
<div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
        <h1 class="text-3xl font-semibold text-gray-900">Adicionar Novo Pet</h1>
        <p class="mt-2 text-sm text-gray-700">Preencha os detalhes do novo pet para adicioná-lo ao sistema.</p>
    </div>
</div>

<div class="mt-8">
    <form action="{{ route('pets.store') }}" method="POST" class="space-y-6">
        @csrf
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Informações do Pet</h3>
            <div class="space-y-4">
                <div>
                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg outline-indigo-400 block w-full p-2.5">
                    @error('nome')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-4">
                    <div class="w-1/2">
                        <label for="especie" class="block text-sm font-medium text-gray-700">Espécie</label>
                        <select name="especie" id="especie" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg outline-indigo-400 block w-full p-2.5">
                            <option value="" disabled selected>Selecione uma espécie</option>
                            <option value="Cachorro" {{ old('especie') == 'Cachorro' ? 'selected' : '' }}>Cachorro</option>
                            <option value="Gato" {{ old('especie') == 'Gato' ? 'selected' : '' }}>Gato</option>
                            <option value="Pássaro" {{ old('especie') == 'Pássaro' ? 'selected' : '' }}>Pássaro</option>
                            <option value="Peixe" {{ old('especie') == 'Peixe' ? 'selected' : '' }}>Peixe</option>
                            <option value="Réptil" {{ old('especie') == 'Réptil' ? 'selected' : '' }}>Réptil</option>
                            <option value="Roedor" {{ old('especie') == 'Roedor' ? 'selected' : '' }}>Roedor</option>
                            <option value="Coelho" {{ old('especie') == 'Coelho' ? 'selected' : '' }}>Coelho</option>
                            <option value="Cavalo" {{ old('especie') == 'Cavalo' ? 'selected' : '' }}>Cavalo</option>
                            <option value="Outro" {{ old('especie') == 'Outro' ? 'selected' : '' }}>Outro</option>
                        </select>
                        @error('especie')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-1/2">
                        <label for="raca" class="block text-sm font-medium text-gray-700">Raça (opcional)</label>
                        <input type="text" name="raca" id="raca" value="{{ old('raca') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg outline-indigo-400 block w-full p-2.5">
                        @error('raca')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="genero" class="block text-sm font-medium text-gray-700">Gênero</label>
                    <select name="genero" id="genero" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg outline-indigo-400 block w-full p-2.5">
                        <option value="" disabled selected>Selecione um gênero</option>
                        <option value="Macho" {{ old('genero') == 'Macho' ? 'selected' : '' }}>Macho</option>
                        <option value="Fêmea" {{ old('genero') == 'Fêmea' ? 'selected' : '' }}>Fêmea</option>
                    </select>
                    @error('genero')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="data_nascimento" class="block text-sm font-medium text-gray-700">Data de Nascimento</label>
                    <input type="date" name="data_nascimento" id="data_nascimento" value="{{ old('data_nascimento') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg outline-indigo-400 block w-full p-2.5">
                    @error('data_nascimento')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="dono" class="block text-sm font-medium text-gray-700">Nome do Dono</label>
                    <input type="text" name="dono" id="dono" value="{{ old('dono') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg outline-indigo-400 block w-full p-2.5">
                    @error('dono')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('pets.index') }}"
                class="py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Cancelar
            </a>
            <button type="submit"
                class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Cadastrar Pet
            </button>
        </div>
    </form>
</div>
@endsection