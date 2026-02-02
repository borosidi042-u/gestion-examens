<x-app-layout>
    <div class="py-16">
        <div class="wrapper w-50 shadow  mx-auto p-4 mt-5">
        <h1>Modification d'un cours</h1>
            <form action="{{route('cours.update',$cour->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for=""><strong>Nom du cours</strong> </label>
                    <input type="text" name="name" placeholder="Nom du cours" class="form-control" value="{{$cour->name}}">
                    @error('name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <label for="" style="margin-top: 10px;"><strong>Description</strong> </label>
                    <textarea name="description" placeholder="Description" class="form-control" >{{$cour->description}}</textarea>
                    @error('description')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <label><strong>Filiere</strong></label>
                        <select name="filiere_id" class="form-control">
                            @foreach($filieres as $filiere)
                                <option value="{{$filiere->id}}" {{isset($cours) && $cours->filiere_id == $filiere->id ? 'selected': ''}}>{{$filiere->name}}</option>
                            @endforeach
                        </select>
                </div>
                <button class="btn btn-info" type="submit">Modifier</button>
                <a href="{{route('cours.index')}}" class="btn btn-danger">Annuler</a>
            </form>
        </div>
    </div>
</x-app-layout>

