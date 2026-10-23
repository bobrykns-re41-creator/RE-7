<div style="margin-bottom: 15px;">
    <label style="display: block; color: #d4af37; font-weight: bold; margin-bottom: 5px;">Назва альбому</label>
    <input type="text" name="title" value="{{ old('title', $vinyl->title ?? '') }}" style="width: 100%; padding: 10px; background: #333; color: #fff; border: 1px solid #555; border-radius: 4px; box-sizing: border-box;">
    @error('title') <p style="color: #ff5252; margin-top: 5px; font-size: 13px;">{{ $message }}</p> @enderror
</div>

<div style="margin-bottom: 15px;">
    <label style="display: block; color: #d4af37; font-weight: bold; margin-bottom: 5px;">Виконавець</label>
    <input type="text" name="artist" value="{{ old('artist', $vinyl->artist ?? '') }}" style="width: 100%; padding: 10px; background: #333; color: #fff; border: 1px solid #555; border-radius: 4px; box-sizing: border-box;">
    @error('artist') <p style="color: #ff5252; margin-top: 5px; font-size: 13px;">{{ $message }}</p> @enderror
</div>

<div style="margin-bottom: 15px;">
    <label style="display: block; color: #d4af37; font-weight: bold; margin-bottom: 5px;">Жанр</label>
    <input type="text" name="genre" value="{{ old('genre', $vinyl->genre ?? '') }}" placeholder="Rock, Jazz, Pop..." style="width: 100%; padding: 10px; background: #333; color: #fff; border: 1px solid #555; border-radius: 4px; box-sizing: border-box;">
    @error('genre') <p style="color: #ff5252; margin-top: 5px; font-size: 13px;">{{ $message }}</p> @enderror
</div>

<div style="display: flex; gap: 15px; margin-bottom: 20px;">
    <div style="flex: 1;">
        <label style="display: block; color: #d4af37; font-weight: bold; margin-bottom: 5px;">Рік випуску</label>
        <input type="number" name="year" value="{{ old('year', $vinyl->year ?? '') }}" style="width: 100%; padding: 10px; background: #333; color: #fff; border: 1px solid #555; border-radius: 4px; box-sizing: border-box;">
        @error('year') <p style="color: #ff5252; margin-top: 5px; font-size: 13px;">{{ $message }}</p> @enderror
    </div>
    <div style="flex: 1;">
        <label style="display: block; color: #d4af37; font-weight: bold; margin-bottom: 5px;">Ціна (₴)</label>
        <input type="number" step="0.01" name="price" value="{{ old('price', $vinyl->price ?? '') }}" style="width: 100%; padding: 10px; background: #333; color: #fff; border: 1px solid #555; border-radius: 4px; box-sizing: border-box;">
        @error('price') <p style="color: #ff5252; margin-top: 5px; font-size: 13px;">{{ $message }}</p> @enderror
    </div>
</div>
