<x-app-layout>
    <x-slot name="header">
        <!--h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Titre de la page') }}
        </h2>
    </x-slot-->

    <div class="py-16">
        <div class="wrapper w-50 shadow mx-auto p-4 mt-5 ">
        <h2>Créer un examen</h2>
        <div class="group-form mb-4">
            <form action="{{route('examen.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" @error('titre') style="background-color:cornsilk;" @enderror name="titre" placeholder="Titre d'examen" class="form-control mb-3">
                    @error('titre')
                        <div class="text-danger" >Le champs titre est requis </div>
                    @enderror
                    <input type="date" @error('date_examen') style="background-color:cornsilk;" @enderror name="date_examen" placeholder="jj/m/d" class="form-control mb-3">
                    @error('date_examen')
                        <div class="text-danger">Le champs date est requis</div>
                    @enderror
                    <select name="cours_id" @error('cours_id') style="background-color:cornsilk;" @enderror class="form-control mb-3 ">
                        <option value=""> --Cliquer ici pour selectionner un cours--</option>
                        @foreach($cours as $cour)
                            <option value="{{$cour->id}}" {{ old('cours_id')== $cour->id ? 'selected' : '' }}>
                                {{$cour->name ?? $cour->nom }}
                            </option>
                        @endforeach
                    </select>
                    @error('cours_id')
                        <div class="text-danger">Le champs select est requis</div>
                    @enderror
                    <button class="btn btn-success">Enregistrer</button>
                    <a href="{{route('examen.index')}}" class=" btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
    </div>
</x-app-layout>