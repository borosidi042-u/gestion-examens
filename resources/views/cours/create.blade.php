<x-app-layout>

    <div class="py-16">:
        <div class=" wrapper w-50 shadow m-auto p-4 mt-5 ">
        <h3>Créer un cours</h3>
        <form action="{{route('cours.store')}}" method="POST" class="mt-4">
            @csrf
            <div class="form-goup mb-3">
                <label for=""><strong>Nom du cours</strong> </label>
                <input type="text" name="name" placeholder="Nom du cours" class="form-control">
                @error('name')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <label for="" style="margin-top: 10px;"><strong>Description</strong> </label>
                <textarea name="description" placeholder="Description "  class="form-control"></textarea>
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
            <button type="submit" class="btn btn-primary">Créer</button>
            <a href="{{route('cours.index')}}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
    </div>
</x-app-layout>