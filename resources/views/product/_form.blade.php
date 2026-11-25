<div>
    <label for="name">Назва</label>
    <input
        id="name"
        name="name"
        type="text"
        value="{{ old('name', $product->name ?? '') }}"
    >
    @error('name')
    <p class="error">{{ $message }}</p>
    @enderror
</div>
<div>
    <label for="brand">Виробник</label>
    <input
        id="brand"
        name="brand"
        type="text"
        value="{{ old('brand', $product->brand ?? '') }}"
    >
    @error('brand')
    <p class="error">{{ $message }}</p>
    @enderror
</div>
<div>
    <label for="material">Матеріал</label>
    <input
        id="material"
        name="material"
        type="text"
        value="{{ old('material', $product->material ?? '') }}"
    >
    @error('material')
    <p class="error">{{ $message }}</p>
    @enderror
</div>
<div>
    <label for="cost">Ціна</label>
    <input
        id="cost"
        name="cost"
        type="number"
        min="0"
        value="{{ old('cost',$product->cost ?? 0) }}"
    >
    @error('cost')
    <p class="error">{{ $message }}</p>
    @enderror
</div>
<div>
    <label for="photo_path">Фото</label>
    <input type="file" id="photo_path" name="photo_path" accept="image/*" value="{{ old('photo_path') }}">
    @error('photo_path')
    <p class="error">{{ $message }}</p>
    @enderror
</div>
