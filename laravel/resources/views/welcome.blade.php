<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body class="d-flex align-items-center justify-content-center vh-100 bg-light">

<main class="w-100" style="max-width: 400px;">
    <div class="card shadow p-4">
        <h2 class="text-center mb-4">Форма</h2>
        <form id="contact-form">
            <div class="mb-3">
                <label class="form-label">Имя</label>
                <input type="text" name="name" class="form-control" placeholder="Введите имя" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Телефон</label>
                <input type="text" name="phone" class="form-control" placeholder="Введите телефон" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Введите email" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Отправить</button>
        </form>
    </div>
</main>
<script>
    // console.log($)
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#contact-form').on('submit', function (e) {
            e.preventDefault();
            let formData = $(this).serialize();
            // async axios.post
            const BASE_URL = 'http://127.0.0.1:8000';
            $.ajax({
                url: `${BASE_URL}/contact`,
                method: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        alert('ушли');
                        $('#contact-form')[0].reset();
                    } else {
                        alert('не ушли');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        // ошибка
                        let firstError = Object.values(errors)[0][0];
                        alert(firstError);
                    } else {
                        alert('0');
                    }
                }
            });
        });
    });

</script>

</body>
</html>
