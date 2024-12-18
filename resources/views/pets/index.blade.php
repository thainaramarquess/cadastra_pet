@extends('layouts.app')

@section('title', 'Lista de Pets')

@section('content')
<div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
        <h1 class="text-3xl font-semibold text-gray-900">Lista de Pets</h1>
        <p class="mt-2 text-sm text-gray-700">Lista de todos amiguinhos cadastrados no sistema.</p>
    </div>
</div>

@if (session('success'))
    <div class="rounded-md bg-emerald-50 border border-emerald-500 p-4 mt-6">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-emerald-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-emerald-800">{{ session('success') }}</p>
            </div>
        </div>
    </div>
@endif

<div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
    @forelse ($pets as $pet)
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="mt-4 text-lg font-medium text-gray-900">{{ $pet->nome }}</h3>
                <dl class="mt-2 divide-y divide-gray-200">
                    <div class="py-2 flex justify-between text-sm">
                        <dt class="text-gray-500">Espécie:</dt>
                        <dd class="text-gray-900">{{ $pet->especie }}</dd>
                    </div>
                    @if ($pet->raca)
                        <div class="py-2 flex justify-between text-sm">
                            <dt class="text-gray-500">Raça:</dt>
                            <dd class="text-gray-900">{{ $pet->raca }}</dd>
                        </div>
                    @endif
                    @if ($pet->data_nascimento)
                        <div class="py-2 flex justify-between text-sm">
                            <dt class="text-gray-500">Data de Nascimento:</dt>
                            <dd class="text-gray-900">{{ \Carbon\Carbon::parse($pet->data_nascimento)->format('d/m/Y') }}</dd>
                        </div>
                    @endif
                    @if ($pet->genero)
                        <div class="py-2 flex justify-between text-sm">
                            <dt class="text-gray-500">Genero:</dt>
                            <dd class="text-gray-900">{{ $pet->genero }}</dd>
                        </div>
                    @endif
                    @if ($pet->dono)
                        <div class="py-2 flex justify-between text-sm">
                            <dt class="text-gray-500">Dono:</dt>
                            <dd class="text-gray-900">{{ $pet->dono }}</dd>
                        </div>
                    @endif
                </dl>
            </div>
            <div class="px-4 py-4 sm:px-6">
                <div class="flex justify-between">
                    <a href="{{ route('pets.edit', $pet) }}" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Editar
                    </a>
                    <form action="{{ route('pets.destroy', $pet) }}" method="POST" x-data="{ showConfirm: false }">
                        @csrf
                        @method('DELETE')
                        <button type="button" @click="showConfirm = true" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Remover
                        </button>
                        <div x-show="showConfirm" class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                                    <div class="sm:flex sm:items-start">
                                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                        </div>
                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                                Remover Pet
                                            </h3>
                                            <div class="mt-2">
                                                <p class="text-sm text-gray-500">
                                                    Tem certeza que deseja remover este pet? Esta ação não pode ser desfeita.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                            Remover
                                        </button>
                                        <button type="button" @click="showConfirm = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                                            Cancelar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-3 text-center py-8">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">Nenhum pet encontrado</h3>
            <p class="mt-1 text-sm text-gray-500">Comece adicionando um novo pet ao sistema.</p>
            <div class="mt-6">
                <a href="{{ route('pets.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Adicionar Pet
                </a>
            </div>
        </div>
    @endforelse
</div>

<div class="mt-6">
    {{ $pets->links() }}
</div>
@endsection

