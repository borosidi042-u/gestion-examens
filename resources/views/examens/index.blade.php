<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Liste des Examens') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex items-center justify-between mb-6 gap-4">
                    <a href="{{route('examen.create')}}" class="btn btn-success text-white shadow-sm">
                        Ajouter un examen
                    </a>
                    

                    <h2 class="text-2xl font-bold text-gray-800">
                        Examens enregistrés
                    </h2>
                    <a href="{{route('note.create')}}" class="btn btn-warning shadow-sm">
                        Ajouter une note
                    </a>

                    
                </div>
                @if(session()->has('success'))
                    <div class="alert alert-success text-center mb-4">
                        {{session()->get('success')}}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-striped shadow-sm border">
                        <thead class="bg-gray-50">
                            <tr>
                                <th>#</th>
                                <th>Titre</th>
                                <th>Date de composition</th>
                                <th>Matière</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($examens as $examen)
                                <tr class="align-middle">
                                    <td>{{$examen->id}}</td>
                                    <td class="font-semibold">{{$examen->titre}}</td>
                                    <td>{{$examen->date_examen}}</td>
                                    <td>{{$examen->cours->name ?? 'Non défini'}}</td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <a href="{{ route('examen.edit', $examen->id) }}" class="btn btn-info btn-sm text-white">Modifier</a>
                                            <form action="{{route('examen.destroy', $examen->id)}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer {{$examen->titre}} ?')">
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>