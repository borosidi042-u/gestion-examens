<x-app-layout>
    <div class="py-16">
        <div class="wrapper w-50 shadow mx-auto p-4 mt-5 bg-white rounded">
            <h3 class="mb-4">Enregistrer une note</h3>
            <form action="{{route('note.store')}}" method="POST">
                @csrf
                
                <div class="form-group mb-3">
                    <label class="form-label small fw-bold">Étudiant</label>
                    <select name="etudiant_id" @error('etudiant_id') style="background-color:cornsilk;" @enderror class="form-control mb-3">
                        <option value="">-- Choisir un Étudiant --</option>
                        @foreach($etudiants as $etudiant)
                            <option value="{{$etudiant->id}}" {{ old('etudiant_id') == $etudiant->id ? 'selected' : '' }}>
                                {{$etudiant->nom ?? $etudiant->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('etudiant_id') <div class="text-danger small">{{$message}}</div> @enderror

                    <label class="form-label small fw-bold">Examen / Matière</label>
                    <select name="examen_id" class="form-control mb-3">
                        <option value="">-- Choisir un Examen --</option>
                        @foreach($examens as $examen)
                            <option value="{{$examen->id}}" {{ old('examen_id') == $examen->id ? 'selected' : ''}}>
                                {{$examen->titre ?? $examen->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('examen_id') <div class="text-danger small">{{$message}}</div> @enderror

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Note (/20)</label>
                            <input type="number" name="note" step="0.1" min="0" max="20" placeholder="0.00" 
                                class="form-control" oninput="calculerMention(this.value)">
                            @error('note') <div class="text-danger small">{{$message}}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Coefficient</label>
                            <input type="number" name="coefficient" min="1" value="{{ old('coefficient', 1) }}" class="form-control">
                            @error('coefficient') <div class="text-danger small">{{$message}}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Type d'évaluation</label>
                        <select name="type" class="form-control">
                            <option value="CC" {{ old('type') == 'CC' ? 'selected' : '' }}>Contrôle Continu (CC)</option>
                            <option value="Examen" {{ old('type') == 'Examen' ? 'selected' : '' }}>Examen Final</option>
                        </select>
                        @error('type') <div class="text-danger small">{{$message}}</div> @enderror
                    </div>

                    <input type="hidden" name="mention" id="mention">
                    <input type="hidden" name="decision" id="decision">
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Enregistrer la note</button>
                    <a href="{{route('note.index')}}" class="btn btn-info text-white">Consulter les notes</a>
                </div>
            </form>

            <script>
                function calculerMention(note) {
                    let mentionField = document.getElementById('mention');
                    let decisionField = document.getElementById('decision');
                    
                    if(note === "") return;

                    let n = parseFloat(note);

                    if(n >= 16) {
                        mentionField.value = 'Très bien';
                        decisionField.value = 'Valider';
                    } else if(n >= 14) {
                        mentionField.value = 'Bien';
                        decisionField.value = 'Valider';
                    } else if(n >= 10) {
                        mentionField.value = 'Passable';
                        decisionField.value = 'Valider';
                    } else {
                        mentionField.value = 'Ajourné';
                        decisionField.value = 'Refuser';
                    }
                    
                    // Optionnel : console.log pour vérifier le calcul en direct
                    console.log("Note: " + n + " | Mention: " + mentionField.value);
                }
            </script>
        </div>
    </div>
</x-app-layout>