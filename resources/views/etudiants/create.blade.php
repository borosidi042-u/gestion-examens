<x-app-layout>
    <x-slot name="header">
        <!--h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Titre de la page') }}
        </h2-->
    </x-slot>

    <div class="py-16">
        <div class="wrapper w-50 shadow mx-auto p-4 mt-3">
        <h2>Ajouter un etudiant</h2>
        <form action="{{route('etudiant.store')}}" method="POST">
            @csrf
                <div class="form-group mb-3">
                    <label><strong>Nom</strong></label>
                    <input type="text" name="nom" placeholder="Nom" class="form-control">
                    @error('nom')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <label><strong>Prénom</strong></label>
                    <input type="text" name="prenom" placeholder="Prénom" class="form-control">
                    @error('prenom')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <label><strong>E-mail</strong></label>
                    <input type="mail" name="mail" placeholder="E-mail" class="form-control">
                    @error('mail')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <label><strong>Téléphone</strong></label>
                    <input type="number" name="telephone" placeholder="Téléphone" class="form-control">
                    @error('telephone')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <label><strong>Filiere</label><br>
                    <select name="filiere_id" class="form-control">
                        <option value="">Choisir une filiere</option>
                        @foreach($filieres as $filiere)
                        <option value="{{$filiere->id}}">{{$filiere->name}}</option>
                        @endforeach
                    </select>
                    @error('filiere_id')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <button class="btn btn-primary">Enregistrer</button>
                <a href="{{route('etudiant.index')}}" class="btn btn-secondary">Retour</a>
        </form>
    </div>
    </div>
</x-app-layout>