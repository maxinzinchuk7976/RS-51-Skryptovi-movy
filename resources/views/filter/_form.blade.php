<div>
    <label for="filter_name">Назва</label>
    <input
        id="filter_name"
        name="filter_name"
        type="text"
        value="{{ old('filter_name', $filter->filter_name ?? '') }}"
    >
    @error('name')
    <p class="error">{{ $message }}</p>
    @enderror
</div>
