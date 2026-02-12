<x-app-layout>
    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm border border-gray-200 rounded-lg">
                
                <div class="bg-blue-50 p-8 border-b border-gray-100 text-center">
                    <h2 class="text-3xl font-bold text-cyan-800 underline decoration-cyan-500 underline-offset-8">
                        Plateforme des Examens
                    </h2>
                </div>

                <div class="p-10 text-gray-600 flex flex-col items-center text-center">
                    <div class="max-w-2xl">
                        <p class="mb-6 text-xl font-semibold text-gray-800">
                            Bienvenue sur votre espace personnel de consultation des résultats.
                        </p>
                            <div>
                                Cette plateforme vous permet de suivre votre évolution académique en temps réel. 
                            </div>
                            <div class="">
                                cliquer sur le bouton à droite pour accéder à la liste de vos examens 
                                et consulter vos notes définitives.
                            </div>
                    </div>
                </div>
                <div class="p-6 bg-gray-50 flex justify-end border-t border-gray-100">
                    <a href="{{ route('note.index') }}"
                    class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 px-8 rounded-md shadow-lg transition-all uppercase text-xs tracking-widest">
                        Consulter votre résultat
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>