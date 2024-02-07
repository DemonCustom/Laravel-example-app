<form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label>
        Название
        <input type="text" name="name" id="name" required>
    </label>

    <label>
        Постер
        <input type="file" name="poster" id="poster" required>
    </label>

    <button type="submit">
        <span>Сохранить</span>
    </button>
</form>
