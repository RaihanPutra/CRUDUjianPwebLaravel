@extends('layouts.dashboard.main')

@section('content')

<form action="{{route('product.dashboard.product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        @error('slug')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label class="font-createtitle" style="margin-top: 100px" for="title">Title</label>
        <div class="font-createtitle2">Add car’s year and  brand</div>
        <input type="text" class="form-control border-creatproduct @error('title') is-invalid @enderror" id="title" name="title"
            placeholder="e.g. 2018 Chevrolet TRAX PREMIERE 1.4" value="{{old('title')}}">
        @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">      
        <label class="font-createtitle" for="price">Price </label>
        <input type="text" class="form-control border-creatproduct @error('price') is-invalid @enderror" id="price" name="price"
            placeholder="Price (example: 55000000)" value="{{old('price')}}">
        @error('price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>    
    
    <div class="form-group">
        <label class="font-createtitle" for="body">Detail Information</label>
        <div class="font-createtitle2">Add car’s color, fuel, model, type,  machine capacity, guarantee, and another description</div>
        <input type="hidden" class="form-control border-creatproduct @error('body') is-invalid @enderror" id="body" name="body"
            value="{{old('body')}}">
        <trix-editor input="body"></trix-editor>
        @error('body')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

        
    
    <div class="d-flex" style="justify-content: center">
        <button type="submit" class="btn btn-addproduct">Add Product</button>
    </div>
</form>

@endsection

@section('script')
<script>
    const csrf_token = "{{csrf_token()}}";

    // previewImage
    // function previewImage(){

    //     const image = document.querySelector('#image');
    //     const imgPreview = document.querySelector('.img-preview');

    //     imgPreview.style.display = 'block';

    //     const oFReader = new FileReader();
    //     oFReader.readAsDataURL(image.files[0]);

    //     oFReader.onload = function(oFREvent) {
    //         imgPreview.src = oFREvent.target.result;
    //     }
    // }
</script>
<script src="{{URL::asset('/js/select2-conf.js')}}" defer></script>
@endsection