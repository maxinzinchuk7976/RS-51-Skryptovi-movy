<div>
    <label for="name">Ім'я</label>
    <input
        id="name"
        name="name"
        type="text"
        value="{{ old('name', $order->name ?? '') }}"
    >
    @error('name')
    <p class="error">{{ $message }}</p>
    @enderror
</div>
<div>
    <label for="email">Email</label>
    <input
        id="email"
        name="email"
        type="text"
        min="0"
        value="{{ old('email',$order->email ?? 0) }}"
    >
    @error('email')
    <p class="error">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="phone">Телефон</label>
    <input
        id="phone"
        name="phone"
        type="text"
        min="0"
        value="{{ old('phone',$order->phone ?? 0) }}"
    >
    @error('phone')
    <p class="error">{{ $message }}</p>
    @enderror
</div>


<div>
    <label for="address">Адреса доставки</label>
    <input
        id="address"
        name="address"
        type="text"
        min="0"
        value="{{ old('address',$order->address ?? 0) }}"
    >
    @error('address')
    <p class="error">{{ $message }}</p>
    @enderror
</div>
<div>
    <label for="products">Товари</label>
    <select id="products" name="products[]" multiple>
    @foreach ($products as $id => $name)
        <option
        value="{{ $id }}"
        @selected(
        in_array(
        $id,
        old('products', $selected ?? [])) )>
        {{ $name }}
        </option>
    @endforeach
    </select>
    @error('products')
    <p class="error">{{ $message }}</p>
    @enderror
</div>
