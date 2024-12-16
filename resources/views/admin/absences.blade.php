@extends('layouts.dashboard')
@section('content')
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-12">
            <div class="card my-4 shadow-lg">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 d-flex justify-content-between align-items-center">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Rapport d'Absence</h6>
                    </div>
                    <a href="{{ route('admin.absences.create') }}" class="btn btn-primary me-3">Ajouter une Absence</a>
                </div>
                <div class="card-body px-0 pb-2">

                    <div class="table-responsive p-0">

                        <table class="table table-bordered table-hover align-items-center mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Employé</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Durée</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Raison</th>
                                    <th class="text-center text-secondary opacity-7">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $images = [
                                        'assets/img/team-1.jpg',
                                        'assets/img/team-2.jpg',
                                        'assets/img/team-3.jpg',
                                        'assets/img/team-4.jpg',
                                        'assets/img/team-5.jpg'
                                    ];
                                    $imageIndex = 0;
                                @endphp
                                @forelse ($absences as $absence)
                                    <tr class="{{ $loop->even ? 'table-secondary' : 'table-light' }}">
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="{{ asset($images[$imageIndex % count($images)]) }}" class="avatar avatar-sm me-3 border-radius-lg" alt="avatar">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $absence->employee->name ?? 'Inconnu' }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $absence->employee->email ?? '-' }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">{{ $absence->date }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-gradient-info">{{ $absence->duration }} hrs</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-gradient-primary">{{ $absence->reason }}</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.absences.edit', $absence->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                                            <form action="{{ route('admin.absences.destroy', $absence->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette absence ?')">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php $imageIndex++; @endphp
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Aucune absence enregistrée</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
