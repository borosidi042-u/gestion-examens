<x-app-layout>
    <x-slot name="header">
        <!--h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Titre de la page') }}
        </h2>
    </x-slot-->

    <div class="py-16">
        <div class="row">
        <div class="col-md_8 mx-auto mt-5">
                <h2>Liste des etudiants</h2>
                <a href="{{route('etudiant.create')}}" class="btn btn-primary">AJouter</a>
                <table class="table table-striped shadow">
                    <!-- Afficher le messge de success-->
                    @if(session()->has('success'))
                        <div class="alert alert-success text-center my-2">{{session()->get('success')}}</div>
                    @endif
                    <tr style="background-color:aquamarine;">
                        <th style="background-color: #f1f1;">ID</th>
                        <th  style="background-color: #f1f1;">Nom</th>
                        <th  style="background-color: #f1f1;">Prénom</th>
                        <th  style="background-color: #f1f1;">E-mail</th>
                        <th  style="background-color: #f1f1;">Télélphone</th>
                        <th  style="background-color: #f1f1;">filiere</th>
                        <th class="text-center"  style="background-color: #f1f1;">Action</th>
                    </tr>
                    @foreach($etudiants as $etudiant)
                        <tr>
                            <td>{{$etudiant->id}}</td>
                            <td>{{$etudiant->nom}}</td>
                            <td>{{$etudiant->prenom}}</td>
                            <td>{{$etudiant->mail}}</td>
                            <td>{{$etudiant->telephone}}</td>
                            <td>{{$etudiant->filiere->name}}</td>
                            <td >
                                <div class="d-flex gap-2">
                                    <a href="{{route('etudiant.edit',$etudiant->id )}}" class="btn btn-info">Modifier</a>
                                    <form action="{{route('etudiant.destroy', $etudiant->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cet etudiant ?')">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
        </div>
    </div>
    </div>
</x-app-layout>