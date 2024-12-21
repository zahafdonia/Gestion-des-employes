

@section('content')
    <div class="container">
        <h2>Attribuer une Prime</h2>
        <form id="awardPrimeForm">
            <div class="form-group">
                <label for="employee_id">ID de l'employé</label>
                <input type="number" class="form-control" id="employee_id" placeholder="Entrez l'ID de l'employé" required>
            </div>
            <button type="submit" class="btn btn-primary">Attribuer la prime</button>
        </form>
        <div id="responseMessage"></div>
    </div>

    <script>
        $(document).ready(function() {
            $('#awardPrimeForm').submit(function(e) {
                e.preventDefault();

                const employeeId = $('#employee_id').val();

                $.ajax({
                    url: `/admin/award-prime/${employeeId}`,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#responseMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                    },
                    error: function(xhr) {
                        $('#responseMessage').html('<div class="alert alert-danger">' + xhr.responseJSON.message + '</div>');
                    }
                });
            });
        });
    </script>
@endsection
