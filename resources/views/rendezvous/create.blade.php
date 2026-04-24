@extends('layouts.app')

@section('content')

<div class="p-8">

    {{-- Header --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('patient.dashboard') }}" class="text-sm text-gray-400 hover:text-gray-600">
            ← Retour
        </a>
        <span class="text-gray-200">|</span>
        <h1 class="text-lg font-semibold text-gray-800">Prendre un rendez-vous</h1>
        <div class="ml-auto flex items-center gap-2">
            <div class="w-7 h-7 rounded-full bg-[#0C447C] text-white text-xs flex items-center justify-center font-semibold">1</div>
            <div class="w-6 h-px bg-gray-200"></div>
            <div class="w-7 h-7 rounded-full bg-gray-100 text-gray-400 text-xs flex items-center justify-center border border-gray-200">2</div>
            <div class="w-6 h-px bg-gray-200"></div>
            <div class="w-7 h-7 rounded-full bg-gray-100 text-gray-400 text-xs flex items-center justify-center border border-gray-200">3</div>
        </div>
    </div>

    {{-- ═══ 3 COLONNES ═══ --}}
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="grid grid-cols-3 divide-x divide-gray-100 min-h-[480px]">

            {{-- ══ ÉTAPE 1 : Spécialité ══ --}}
            <div class="p-6">
                <p class="text-xs text-gray-400 uppercase tracking-widest mb-4">Étape 1 — Spécialité</p>

                <input type="text" placeholder="Rechercher..." id="search-specialite"
                    class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm mb-4
                           focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-300 bg-gray-50">

                <div class="space-y-2">
                    @foreach ($specialites as $specialite)
                        <div onclick="selectSpecialite(this, '{{ $specialite }}')"
                            class="specialite-item {{ $loop->first ? 'border-2 border-blue-400 bg-blue-50' : 'border border-gray-100 bg-gray-50 hover:border-gray-200' }}
                                   flex items-center justify-between px-4 py-2.5 rounded-lg cursor-pointer transition-all">
                            <span class="text-sm {{ $loop->first ? 'font-medium text-blue-700' : 'text-gray-700' }}">
                                {{ $specialite }}
                            </span>
                            @if ($loop->first)
                                <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                </svg>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- ══ ÉTAPE 2 : Calendrier ══ --}}
            <div class="p-6">
                <p class="text-xs text-gray-400 uppercase tracking-widest mb-4">Étape 2 — Date</p>

                <div class="border border-gray-100 rounded-xl p-4 mb-4">
                    <div class="flex items-center justify-between mb-3">
                        <button type="button" class="text-gray-400 hover:text-gray-600 text-lg">‹</button>
                        <span class="text-sm font-semibold text-gray-800" id="mois-label">
                            {{ now()->translatedFormat('F Y') }}
                        </span>
                        <button type="button" class="text-gray-400 hover:text-gray-600 text-lg">›</button>
                    </div>

                    <div class="grid grid-cols-7 mb-1">
                        @foreach (['L','M','M','J','V','S','D'] as $j)
                            <div class="text-center text-xs text-gray-400 py-1">{{ $j }}</div>
                        @endforeach
                    </div>

                    <div class="grid grid-cols-7 gap-1" id="calendar-days">
                        @foreach ($joursCalendrier as $jour)
                            <div onclick="{{ $jour['disponible'] ? "selectDay(this, '{$jour['date']}', '{$jour['label']}')" : '' }}"
                                class="text-center text-xs py-1.5 rounded-lg
                                    {{ !$jour['current_month'] ? 'text-gray-300' : '' }}
                                    {{ $jour['today'] ? 'border-2 border-blue-400 text-blue-600 font-semibold' : '' }}
                                    {{ $jour['disponible'] && !$jour['today'] ? 'bg-blue-50 text-blue-700 font-medium cursor-pointer hover:bg-blue-100' : '' }}
                                    {{ !$jour['disponible'] && $jour['current_month'] && !$jour['today'] ? 'text-gray-400 hover:bg-gray-50 cursor-pointer' : '' }}">
                                {{ $jour['day'] }}
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="flex gap-4 text-xs text-gray-400">
                    <span class="flex items-center gap-1.5">
                        <span class="w-3 h-3 rounded bg-blue-50 border border-blue-200 inline-block"></span>
                        Disponible
                    </span>
                    <span class="flex items-center gap-1.5">
                        <span class="w-3 h-3 rounded border-2 border-blue-400 inline-block"></span>
                        Aujourd'hui
                    </span>
                </div>
            </div>

            {{-- ══ ÉTAPE 3 : Créneau ══ --}}
            <div class="p-6 flex flex-col">
                <p class="text-xs text-gray-400 uppercase tracking-widest mb-4">Étape 3 — Créneau</p>

                <p class="text-xs text-gray-400 mb-2">Médecin :</p>
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl mb-5">
                    <div class="w-9 h-9 rounded-full bg-[#0C447C] flex items-center justify-center text-white text-xs font-semibold flex-shrink-0" id="medecin-initiales">
                        --
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-800" id="medecin-nom">Sélectionnez une date</p>
                        <p class="text-xs text-gray-400" id="medecin-info">—</p>
                    </div>
                </div>

                <p class="text-xs text-gray-400 mb-3">Créneaux disponibles :</p>
                <div class="grid grid-cols-2 gap-2 mb-5" id="creneaux-grid">
                    <p class="col-span-2 text-xs text-gray-400 text-center py-4">
                        Sélectionnez une date pour voir les créneaux
                    </p>
                </div>

                <div class="p-3 bg-gray-50 rounded-xl border border-gray-100 mb-4">
                    <p class="text-xs text-gray-400 mb-1">Récapitulatif</p>
                    <p class="text-sm font-semibold text-gray-800" id="recap">—</p>
                </div>

                <form method="POST" action="{{ route('rendezvous.store') }}" class="mt-auto">
                    @csrf
                    <input type="hidden" name="medecin_id" id="input-medecin-id" value="">
                    <input type="hidden" name="date_heure" id="input-date-heure" value="">
                    <input type="hidden" name="specialite" id="input-specialite" value="{{ $specialites[0] ?? '' }}">

                    <button type="submit" id="btn-confirmer" disabled
                        class="w-full py-3 text-sm font-semibold rounded-lg transition-colors duration-200
                               bg-gray-200 text-gray-400 cursor-not-allowed"
                        onclick="return validateForm()">
                        Confirmer le rendez-vous
                    </button>
                    <p class="text-xs text-gray-400 text-center mt-2">
                        Un email de confirmation vous sera envoyé
                    </p>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    let selectedSpecialite = '{{ $specialites[0] ?? "" }}';
    let selectedDate = '';
    let selectedHeure = '';
    let selectedMedecinId = '';
    let selectedMedecinNom = '';

    function selectSpecialite(el, nom) {
        document.querySelectorAll('.specialite-item').forEach(i => {
            i.className = i.className
                .replace('border-2 border-blue-400 bg-blue-50', 'border border-gray-100 bg-gray-50 hover:border-gray-200');
            const span = i.querySelector('span');
            span.className = 'text-sm text-gray-700';
            const svg = i.querySelector('svg');
            if (svg) svg.remove();
        });
        el.className = el.className
            .replace('border border-gray-100 bg-gray-50 hover:border-gray-200', 'border-2 border-blue-400 bg-blue-50');
        el.querySelector('span').className = 'text-sm font-medium text-blue-700';
        selectedSpecialite = nom;
        document.getElementById('input-specialite').value = nom;
    }

    function selectDay(el, date, label) {
        document.querySelectorAll('#calendar-days > div').forEach(d => {
            d.classList.remove('bg-[#0C447C]', 'text-white');
        });
        el.classList.add('bg-[#0C447C]', 'text-white');
        el.classList.remove('bg-blue-50', 'text-blue-700');
        selectedDate = date;

        // Charger les créneaux via fetch
        fetch(`/rendezvous/creneaux?date=${date}&specialite=${selectedSpecialite}`)
            .then(r => r.json())
            .then(data => {
                afficherCreneaux(data.creneaux, data.medecin, label);
            });
    }

    function afficherCreneaux(creneaux, medecin, label) {
        const grid = document.getElementById('creneaux-grid');
        grid.innerHTML = '';

        if (medecin) {
            selectedMedecinId = medecin.id;
            selectedMedecinNom = medecin.nom;
            document.getElementById('medecin-nom').textContent = 'Dr. ' + medecin.nom;
            document.getElementById('medecin-info').textContent = selectedSpecialite + ' · ' + label;
            document.getElementById('medecin-initiales').textContent = medecin.initiales;
        }

        creneaux.forEach(c => {
            const div = document.createElement('div');
            div.className = c.disponible
                ? 'creneau available text-center py-2 rounded-lg text-xs text-blue-600 bg-blue-50 border border-blue-200 cursor-pointer font-medium'
                : 'creneau text-center py-2 rounded-lg text-xs text-gray-300 bg-gray-50 line-through border border-gray-100';
            div.textContent = c.heure;
            if (c.disponible) {
                div.onclick = () => selectCreneau(div, c.heure, c.datetime);
            }
            grid.appendChild(div);
        });
    }

    function selectCreneau(el, heure, datetime) {
        document.querySelectorAll('.creneau.available').forEach(c => {
            c.classList.remove('bg-[#0C447C]', 'text-white', 'border-[#0C447C]');
            c.classList.add('bg-blue-50', 'text-blue-600', 'border-blue-200');
        });
        el.classList.remove('bg-blue-50', 'text-blue-600', 'border-blue-200');
        el.classList.add('bg-[#0C447C]', 'text-white', 'border-[#0C447C]');
        selectedHeure = heure;
        document.getElementById('input-date-heure').value = datetime;
        document.getElementById('input-medecin-id').value = selectedMedecinId;

        document.getElementById('recap').textContent =
            selectedDate + ' · ' + heure + ' · Dr. ' + selectedMedecinNom;

        const btn = document.getElementById('btn-confirmer');
        btn.disabled = false;
        btn.className = btn.className
            .replace('bg-gray-200 text-gray-400 cursor-not-allowed', 'bg-[#0C447C] hover:bg-[#185FA5] text-white cursor-pointer');
    }

    function validateForm() {
        return selectedMedecinId !== '' && selectedHeure !== '';
    }
</script>

@endsection
