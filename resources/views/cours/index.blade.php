<x-app-layout>
    <x-slot name="header">
        <!--h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cours') }}
        </h2--->
    </x-slot>
    <div class="py-16">
        <div class="row">
            <div class="col-md_8 mx-auto mt-5">
                <h1>Liste des cours disponible</h1>
                <a href="{{route('cours.create')}}" class="btn btn-success">Ajouter</a>
                @if(session()->has('success'))
                <div class="alert alert-success text-center my-2">{{session()->get('success')}}</div>
                @endif
                <table class="table table-striped shadow">
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    @foreach($cour as $cou)
                    <tr>
                        <td>{{$cou->id}}</td>
                        <td>{{$cou->name}}</td>
                        <td>{{$cou->description}}</td>
                        <td>
                            <a href="{{route('cours.edit',$cou->id)}}" class="btn btn-info">Modifier</a>
                            <form action="{{route('cours.destroy',$cou->id)}}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Voulez vous vraiment supprimer ce cours ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

