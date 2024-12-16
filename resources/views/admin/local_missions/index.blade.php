@extends('layouts.dashboard')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Liste des Missions Locales</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID Mission</th>
                <th>Employé</th>
                <th>Région</th>
                <th>Date Début</th>
                <th>Date Fin</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Sample Mission Row 1 -->
            <tr class="table-light">
                <td>1001</td>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="/assets/img/team-1.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="John Doe">
                        <div>
                            <h6 class="text-sm mb-0">John Doe</h6>
                            <p class="text-xs text-secondary mb-0">john@example.com</p>
                        </div>
                    </div>
                </td>
                <td>Paris, France</td>
                <td>2024-12-01</td>
                <td>2024-12-10</td>
                <td>
                    <span class="badge bg-warning">En attente</span>
                </td>
                <td>
                    <form action="{{ route('admin.local_missions.approve', 1001) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Approuver</button>
                    </form>
                    <form action="{{ route('admin.local_missions.reject', 1001) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Rejeter</button>
                    </form>
                </td>
            </tr>

            <!-- Sample Mission Row 2 -->
            <tr class="table-secondary">
                <td>1002</td>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="/assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="Sarah Connor">
                        <div>
                            <h6 class="text-sm mb-0">Sarah Connor</h6>
                            <p class="text-xs text-secondary mb-0">sarah@example.com</p>
                        </div>
                    </div>
                </td>
                <td>Berlin, Germany</td>
                <td>2024-12-15</td>
                <td>2024-12-22</td>
                <td>
                    <span class="badge bg-success">Approuvée</span>
                </td>
                <td>
                    <button class="btn btn-secondary btn-sm" disabled>Action non disponible</button>
                </td>
            </tr>

            <!-- Sample Mission Row 3 -->
            <tr class="table-light">
                <td>1003</td>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="/assets/img/team-3.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="Michael Knight">
                        <div>
                            <h6 class="text-sm mb-0">Michael Knight</h6>
                            <p class="text-xs text-secondary mb-0">michael@example.com</p>
                        </div>
                    </div>
                </td>
                <td>Tokyo, Japan</td>
                <td>2024-12-20</td>
                <td>2024-12-30</td>
                <td>
                    <span class="badge bg-danger">Rejetée</span>
                </td>
                <td>
                    <button class="btn btn-secondary btn-sm" disabled>Action non disponible</button>
                </td>
            </tr>

            <!-- Sample Mission Row 4 -->
            <tr class="table-secondary">
                <td>1004</td>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="/assets/img/team-4.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="Linda Hamilton">
                        <div>
                            <h6 class="text-sm mb-0">Linda Hamilton</h6>
                            <p class="text-xs text-secondary mb-0">linda@example.com</p>
                        </div>
                    </div>
                </td>
                <td>New York, USA</td>
                <td>2024-11-15</td>
                <td>2024-11-20</td>
                <td>
                    <span class="badge bg-success">Approuvée</span>
                </td>
                <td>
                    <button class="btn btn-secondary btn-sm" disabled>Action non disponible</button>
                </td>
            </tr>

            <!-- Sample Mission Row 5 -->
            <tr class="table-light">
                <td>1005</td>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="/assets/img/team-5.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="Arnold Schwarzenegger">
                        <div>
                            <h6 class="text-sm mb-0">Arnold Schwarzenegger</h6>
                            <p class="text-xs text-secondary mb-0">arnold@example.com</p>
                        </div>
                    </div>
                </td>
                <td>Los Angeles, USA</td>
                <td>2024-12-05</td>
                <td>2024-12-12</td>
                <td>
                    <span class="badge bg-warning">En attente</span>
                </td>
                <td>
                    <form action="{{ route('admin.local_missions.approve', 1005) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Approuver</button>
                    </form>
                    <form action="{{ route('admin.local_missions.reject', 1005) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Rejeter</button>
                    </form>
                </td>
            </tr>

        </tbody>
    </table>
</div>
@endsection
