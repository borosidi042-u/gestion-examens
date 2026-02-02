<x-app-layout>
    <x-slot name="header">
        <!--h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Titre de la page') }}
        </h2>
    </x-slot-->

    <div class="py-16">
        <div class=".wrapper w-50 shadow m-auto p-4 mt-5">
        <h1>Ajout d'une filiere</h1>
        <form action="{{route('filiere.store')}}" method="POST" class="mt-4">
            @csrf
            <div class=".form-group mb-3">
                <input type="text" name="name" placeholder="Nom de filiere" class="form-control">
                @error('name')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Ajouter</button>
            <a class="btn btn-info" href="{{route('filiere.index')}}">Annuler</a>
        </form>
    </div>
    </div>
</x-app-layout>
