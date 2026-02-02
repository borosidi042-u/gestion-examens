<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-lg font-bold">Liste des Notes</h3>
                    <a href="{{ route('note.create') }}" class="btn btn-primary btn-sm px-4">
                        + Ajouter une note
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover border text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Étudiant</th>
                                <th>Examen</th>
                                <th>Type</th> <th>Note /20</th>
                                <th>Coeff</th> <th>Note Totale</th>
                                <th>Mention / Décision</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($notes as $note)
                            <tr>
                                <td>{{ $note->id }}</td>
                                <td class="text-start">{{ $note->etudiant->nom ?? 'N/A' }}</td>
                                <td class="text-start">{{ $note->examen->titre ?? 'Examen inconnu' }}</td>
                                <td>
                                    <span class="badge {{ $note->type == 'Examen' ? 'bg-dark' : 'bg-secondary' }}">
                                        {{ $note->type }}
                                    </span>
                                </td>
                                <td><strong>{{ $note->valeur }}</strong></td>
                                <td>x{{ $note->coefficient }}</td>
                                <td class="fw-bold text-primary">
                                    {{ $note->valeur * $note->coefficient }}
                                    <span class="text-muted small">/{{ 20 * $note->coefficient }}</span>
                                </td>
                                <td>
                                    @php
                                        $v = $note->valeur;
                                    @endphp
                                    @if($v >= 16)
                                        <span class="badge bg-success text-uppercase">Très Bien</span>
                                    @elseif($v >= 14)
                                        <span class="badge bg-primary text-uppercase">Bien</span>
                                    @elseif($v >= 12)
                                        <span class="badge bg-info text-dark text-uppercase">Assez Bien</span>
                                    @elseif($v >= 10)
                                        <span class="badge bg-warning text-dark text-uppercase">Passable</span>
                                    @else
                                        <span class="badge bg-danger text-uppercase">Ajourné</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">Aucune note enregistrée pour le moment.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>