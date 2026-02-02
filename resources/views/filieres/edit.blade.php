<x-app-layout>
    <x-slot name="header">
        <!--h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Titre de la page') }}
        </h2>
    </x-slot-->

    <div class="py-16">
        <div class="w-50 shadow m-auto p-4 mt-5">
    <h1>Modifier la filière</h1>
    <form action="{{route('filiere.update', $filiere->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <input type="text" name="name" value="{{$filiere->name}}" class="form-control">
        @error('name')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <button class="btn btn-success">Modifier</button>
    <a href="{{ route('filiere.index')}}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
    </div>
</x-app-layout>

