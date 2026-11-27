<p>
    <label for="category_id">Категорія</label>
    <select id="category_id" name="category_id">
        <option value="">— Без категорії —</option>
        @foreach ($categories as $id => $name)
            <option
                value="{{ $id }}"
                @selected(
                old('category_id', $blog->category_id ?? '') == $id)>
                {{ $name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <p class="error">{{ $message }}</p>
    @enderror
</p>
<p>
    <label for="title">Заголовок</label>
    <input
        type="text"
        id="title"
        name="title"
        value="{{ old('title', $blog->title ?? '') }}"
    >
    @error('title')
        <p class="error">{{ $message }}</p>
    @enderror
</p>
<p>
    <label for="description">Опис</label>
    <textarea
        id="description"
        name="description"
    >{{ old('description', $blog->description ?? '') }}</textarea>
    @error('description')
        <p class="error">{{ $message }}</p>
    @enderror
</p>
<p>
    <label for="text">Текст</label>
    <textarea
        id="text"
        name="text"
    >{{ old('text', $blog->text ?? '') }}</textarea>
    @error('text')
        <p class="error">{{ $message }}</p>
    @enderror
</p>
