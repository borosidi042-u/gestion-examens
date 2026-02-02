<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Modifier un examen') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4">
        <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800">Modifier l'examen</h2>
            </div>

            <div class="p-6">
                <form action="{{route('examen.update', $examen->id)}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Titre d'examen</label>
                        <input type="text" name="titre" value="{{$examen->titre}}" 
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('titre') <p class="mt-1 text-sm text-red-600">{{$message}}</p> @enderror
                    </div>

                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Date de composition</label>
                        <input type="date" name="date_examen" value="{{$examen->date_examen}}" 
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('date_examen') <p class="mt-1 text-sm text-red-600">{{$message}}</p> @enderror
                    </div>

                    <div class="mb-8">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Sélectionner un cours</label>
                        <select name="cours_id" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Sélectionner un cours</option>
                            @foreach($cours as $cour)
                                <option value="{{$cour->id}}" {{ old('cours_id', $examen->cours_id) == $cour->id ? 'selected' : '' }}>
                                    {{$cour->name ?? $cour->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('cours_id') <p class="mt-1 text-sm text-red-600">{{$message}}</p> @enderror
                    </div>
                    <div class="flex flex-row justify-between items-center gap-4 pt-6 border-t border-gray-100">
                        
                        <a href="{{route('examen.index')}}"
                            class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Annuler
                        </a>
                        <button type="submit"
                            class="bg-blue-600 p-3 text-white text-sm rounded-sm"
                            style="min-width: 150px;">
                            Enregistrer
                        </button>
                        
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>