@extends('layouts.master')
@section('title', 'PhoneBook de ' . Auth::user()->name . '')
@section('content')
    <div>
        <h2 class="py-2 md:py-4 text-lg md:text-xl text-center text-gray-600">Meus contatos</h2>
    </div>
    <div>
        <form action="{{ route('contacts.index') }}" method="get">
            <div class="flex">
                <div class="relative w-full">
                    <input type="search" name="search" id="search" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-md" placeholder="Buscar contatos">
                    <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-400 rounded-r-lg border border-blue-400 hover:bg-blue-500 focus focus:outline-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </form>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-2 md:my-4">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-sm text-gray-600 uppercase bg-gray-50">
                <tr>
                    <th scope="col"></th>
                    <th scope="col" class="px-4 py-2">Nome</th>
                    <th scope="col" class="px-4 py-2">Telefone</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $contact)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td  class="pl-2 pr-0 md:p-4">
                            <img src="{{ url("storage/{$contact->avatar}") }}" alt="" class="rounded-full sm:w-8 md:w-10 lg:w-12 object-cover">
                        </td>
                        <td class="font-light p-2 md:p-4 md:font-medium text-gray-900 whitespace-nowrap">

                            <p class="pl-3 md:text-lg text-gray-600">{{ $contact->name }}</p>
                        </td>
                        <td class="px-2 md:text-lg whitespace-nowrap ">
                            {{ $contact->telephone }}
                        </td>
                        <td class="p-1 md:p-2">
                            <a href=" https://wa.me/55{{ Str::replace(['(', ')', '-', ' '], '', $contact->telephone) }}" target="_blank" class="">
                                <x-uni-whatsapp-alt-o class="md:w-7 md:h-7 w-5 h-5 text-green-400 hover:text-green-500" />
                            </a>
                        </td>
                        <td class="p-1 md:p-2">
                            <a href="{{ route('contacts.show', $contact->id) }}" class="">
                                <x-icomoon-eye-plus class="md:w-7 md:h-7 w-5 h-5 text-blue-400 hover:text-blue-500" />
                            </a>
                        </td>
                        <td class="p-1 md:p-2">
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="">
                                <x-fas-edit class="md:w-7 md:h-7 w-5 h-5 text-yellow-400 hover:text-yellow-500" />
                            </a>
                        </td>
                        <td class="p-1 pr-2 md:p-2">
                            <form action="{{ route('contacts.delete', $contact->id) }}" method="post" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <x-ri-delete-bin-2-fill class="md:w-7 md:h-7 w-5 h-5 text-red-400 hover:text-red-500" />
                                </button>
                            </form>
                        </td>
                    </tr>
              @endforeach
                </tbody>
            </table>
        </div>
        @if($bookIsNull)
            <div>
                <p class="p-4 bg-blue-100 rounded-lg border border-blue-600 text-center text-blue-700">{{ $bookIsNull }}</p>
            </div>
        @endif
        <div class="m-4">
            {{ $contacts->appends([
                'search' => request()->get('search', '')
            ])->links() }}
        </div>
    </div>

@endsection
