<x-app-layout>
    <x-slot name="header">
        <!--h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Titre de la page') }}
        </h2>
    </x-slot-->

    <div class="py-16">
        <div class="row">
        <div class="col-md_8 mx-auto mt-5">
            <h1 class="mb-3">Liste des filieres</h1>
            <!-- Bouton pour ajouter une filiere-->
            <a href="{{route('filiere.create')}}" class="btn btn-info mb-3"><strong>+ Ajoter</strong></a>
            <table class="table table-striped shadow">
                <!-- Afficher le messge de success-->
                @if(session()->has('success'))
                    <div class="alert alert-success text-center my-2">
                        {{session()->get('success')}}
                    </div>
                @endif
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
                <!-- Boucle pour afficher les informations de chaque enregistrement-->
                @foreach($filieres as $filiere)
                <tr>
                    <td>{{$filiere->id}}</td>
                    <td>{{$filiere->name}}</td>
                    <td>
                        <!-- Bouton modifier-->
                        <a href="{{route('filiere.edit', $filiere->id)}}" class="btn btn-info">Modifier</a>
                        <!-- Bouton supprimer-->
                        <form action="{{route('filiere.destroy', $filiere->id)}}" method="POST" style="display:inline">
                        @csrf
                        @method ('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Voulez vous vraiment supprimer {{$filiere->name}} ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    </div>
</x-app-layout>