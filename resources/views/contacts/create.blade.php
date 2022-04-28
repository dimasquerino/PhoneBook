@extends('layouts.master')
@section('title', 'PhoneBook de User - Adicionar novo Contato')

@section('content')
    <div class="py-4">
        <div>
            <h2 class="pb-2 md:pb-4 text-lg md:text-xl text-center text-gray-600">Adicionar novo Contato</h2>
        </div>

        @if($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li  class="bg-red-100 border-l-4 border-red-500 text-red-700 p-2">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <form action="{{ route('contacts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex py-1 md:py-2">
                  <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">
                    <x-feathericon-user class="w-5 h-5 text-gray-400"/>
                  </span>
                    <input type="text" name="name" id="name" placeholder="Nome" value="{{ old('name') }}" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5">
                </div>

                <div class="flex py-1 md:py-2">
                  <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">
                    <x-heroicon-o-phone class="w-5 h-5 text-gray-400"/>
                  </span>
                    <input type="tel" name="telephone" id="telephone" placeholder="Telefone" value="{{ old('telephone') }}" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5">
                </div>

                <div class="flex py-1 md:py-2">
                  <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">
                    <x-uni-chat-info-o class="w-5 h-5 text-gray-400"/>
                  </span>
                    <input type="text" name="observation" id="observation" placeholder="Informações adicionais" value="{{ old('observation') }}" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5" >
                </div>

                <input class="my-1 md:my-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" aria-describedby="user_avatar_help" id="avatar" name="avatar" type="file">

                <input class="cursor-pointer rounded-md mt-2 md:text-lg text-white md:font-semibold text-center w-full py-2 bg-emerald-400 hover:bg-emerald-500" type="submit" value="Cadastrar Contato">

            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            var SPMaskBehavior = function (val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                spOptions = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
                };
            $('#telephone').mask(SPMaskBehavior, spOptions);
        });
    </script>
@endsection
