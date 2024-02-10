
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
    @csrf
            <h1 class="main_title">Создание поста</h1>

            <label class="title">
                Название
                <input class="input" type="text" name="name"  required>
            </label>

            <label class="description">
                Описание
                <input class="input" type="text" name="description" >
            </label>

            <label class="content">
                Содержимое
                <textarea class="input_content" name="content" id="content" cols="30" rows="10" required></textarea>
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
                    output.innerHTML = '<img src="' + reader.result + '" style=" max-width: 100%; max-height: 300px; border-radius: 5px; margin:5%;">';
                };
                reader.readAsDataURL(file);
            }
            </script>

            <label class="category">
                Категория
                <select class="input_category" name="category_ids" id="category_ids" multiple>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </label>

            <div class="button">
                <button type="submit">
                    <span>Сохранить</span>
                </button>
            </div>
        </div>
    </div>
</form>
</body>
</html>
