<template>
  <form onsubmit="{{ route('beheer.brands.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label>Merk naam:</label>
      <input type="text" name="brand_name" value="{{ old('brand_name') }}" class="form-control" placeholder="Merk naam">
    </div>

    <div class="form-group">
      <label>Categorie:</label>
      <select class="form-control" name="categories_id">
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary float-right">Opslaan</button>
  </form>
</template>
