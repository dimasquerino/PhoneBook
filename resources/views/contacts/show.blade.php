@extends('layouts.master')
@section('title', 'PhoneBook de User - Adicionar novo Contato')

@section('content')
    <div class="py-4">
        <div>
            <h2 class="pb-2 md:pb-4 text-lg md:text-xl text-center text-gray-600">Detalhes de {{ $contact->name }}</h2>
        </div>
        <div class="flex">
            <div class="avatar">
                <img class="rounded-3xl w-40 md:w-48" src="{{ url("storage/{$contact->avatar}") }}"" alt="">
            </div>
            <div class="data pl-3 md:pl-6">
                <ul>
                    <li class="text-gray-400">Nome:</li>
                    <li class="text-lg mb-2 text-gray-600">{{ $contact->name }}</li>
                    <li class="text-gray-400">Telefone:</li>
                    <li class="text-lg mb-2 text-gray-600">{{ $contact->telephone }}</li>
                    <li class="text-gray-400">Informação extra:</li>
                    <li class="text-lg text-gray-600">{{ $contact->observation }}</li>
                </ul>
            </div>
        </div>
        <div class="flex justify-between pt-6">
            <a
                class="flex items-center bg-blue-400 hover:bg-blue-500 text-white md:font-semibold rounded-lg px-4 py-2 shadow"
                href="{{ route('contacts.index') }}">
                <x-iconpark-back class="w-5 h-5 mr-2"/>Voltar
            </a>
            <a
                class="flex items-center bg-yellow-400 hover:bg-yellow-500 text-white md:font-semibold rounded-lg px-4 py-2 shadow"
                href="{{ route('contacts.edit', $contact->id) }}">
                <x-fas-edit class="w-5 h-5 mr-2"/>Editar
            </a>
            <form action="{{ route('contacts.delete', $contact->id) }}" method="post"
                  class="">
                @csrf
                @method('DELETE')
                <button type="submit" class="flex items-center bg-red-400 hover:bg-red-500 text-white md:font-semibold rounded-lg px-4 py-2 shadow">
                    <x-ri-delete-bin-2-fill class="w-5 h-5 mr-2"/>Deletar
                </button>
            </form>
        </div>
    </div>
@endsection
