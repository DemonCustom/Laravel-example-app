<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <h1 class="main_title">Создание категории</h1>

    <label class="title">
        Название
        <input class="input" type="text" name="name" id="name" required>
    </label>

    <label class="poster">
        Постер
        <input class="input" type="file" name="poster" id="poster" required onchange="previewImage(event)">
    </label>

    <div class="image_preview" id="imagePreview"></div>

    <script>
    function previewImage(event) {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('imagePreview');
            output.innerHTML = '<img src="' + reader.result + '" style="max-width: 100%; max-height: 300px; border-radius: 5px;">';
        };
        reader.readAsDataURL(file);
    }
    </script>

    <button class="button" type="submit">
        <span>Сохранить</span>
    </button>
</form>
</body>
</html>
