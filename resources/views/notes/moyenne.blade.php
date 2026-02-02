<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des moyenne') }}
        </h2>
    </x-slot>
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>Etudiant</th>
                <th>Totale Point</th>
                <th>Somme coefficient</th>
                <th>Moyenne Générale</th>
                <th>Décision / Mention</th>
                <th>Rang</th>
            </tr>
        </thead>
        <tbody>
            @foreach($etudiants as $etudiant)
                @php
                    $notes = $etudiant->notes ?? collect();
                    $totalPoints = $notes->sum(fn($n)=>$n->valeur * $n->coefficient);
                    $sommeCoeffs = $notes->sum('coefficient');
                    $moyenne = $sommeCoeffs > 0 ? $totalPoints / $sommeCoeffs : 0;
                @endphp
                <tr>
                    <td>{{$etudiant->nom}}</td>
                    <td>{{$totalPoints}}</td>
                    <td>{{$sommeCoeffs}}</td>
                    
                    <td class="fw-bold {{$etudiant->moyenne_calculee >= 10 ? 'text-success':'text-danger'}}">
                        {{number_format($etudiant->moyenne_calculee, 2)}} / 20
                    </td>
                    <td>
                        @if($etudiant->moyenne_calculee >= 10)
                            <span class="badge bg-success">ADMIS</span>
                        @else
                            <span class="badge bg-danger">EHEC</span>
                        @endif
                    </td>
                    <td>
                        {{$loop->iteration}} {{$loop->iteration == 1 ? 'er' : 'ème'}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>