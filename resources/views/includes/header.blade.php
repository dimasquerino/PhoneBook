<div class="flex justify-between items-center">
    <div class="flex items-center">
        <img
            src="{{ url('images/phonebook.png') }}" alt="Logo {{ env('APP_NAME') }}"
            class="w-16"
        >
        <h1 class="pl-2 text-gray-600 text-xl md:text-2xl">PhoneBook<br> de {{ Auth::user()->name }}</h1>
    </div>
    @if(Route::getCurrentRoute()->getName() == 'contacts.edit' || Route::getCurrentRoute()->getName() == 'contacts.create')
        <a
            class="flex items-center text-center bg-blue-400 hover:bg-blue-500 text-white md:font-semibold rounded-lg px-4 py-2 shadow"
            href="{{ route('contacts.index') }}">
            <x-iconpark-back class="w-5 h-5 mr-2"/>Voltar
        </a>
    @else
        <a
            class="flex items-center text-center bg-emerald-400 hover:bg-emerald-500 text-white md:font-semibold rounded-lg px-4 py-2 shadow"
            href="{{ route('contacts.create') }}">
            <x-fas-user-plus class="w-5 h-5 mr-2"/>Adicionar contato
        </a>
    @endif
</div>

@if(session('msg'))
    <div>
        <p class="mt-6 p-4 bg-green-100 rounded-lg border border-green-600 text-center text-green-700">{{ session('msg') }}</p>
    </div>
@endif

