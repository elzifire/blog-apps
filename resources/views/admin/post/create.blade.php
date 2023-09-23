@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Berita</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-book-open"></i> Tambah Berita</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>GAMBAR</label>
                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror">

                                @error('image')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>JUDUL BERITA</label>
                                <input type="text" name="title" value="{{ old('title') }}"
                                    placeholder="Masukkan Judul Berita"
                                    class="form-control @error('title') is-invalid @enderror">

                                @error('title')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>KATEGORI</label>
                                <select class="form-control select-category @error('category_id') is-invalid @enderror"
                                    name="category_id">
                                    <option value="">-- PILIH KATEGORI --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>KONTEN</label>
                                <textarea id="file-picker" class="form-control content @error('content') is-invalid @enderror" name="content"
                                    placeholder="Masukkan Konten / Isi Berita" rows="10">{!! old('content') !!}</textarea>
                                @error('content')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tag" class="font-weight-bold">TAGS</label>
                                <select class="form-control" name="tags[]" multiple="multiple" id="tag">
                                    @php
                                        $sortedTags = $tags->sortBy('name');
                                    @endphp
                                    @foreach ($sortedTags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>



                            <div class="form-group">
                                <label>Penulis</label>
                                <input type="text" name="penulis" value="{{ old('penulis') }}"
                                    placeholder="Masukkan Penulis"
                                    class="form-control @error('penulis') is-invalid @enderror">

                                @error('penulis')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                                SIMPAN</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i>
                                RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.2/tinymce.min.js"></script> --}}
    <script src="https://cdn.tiny.cloud/1/31fk3dv7kvw3biknorel2anuvrzy0iivkk4x02kgiek0ygc1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
       tinymce.init({
      selector: 'textarea',
      plugins: 'tinydrive anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount ',
      toolbar: ' undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat paste',
    //   tinydrive_token_provider: '/jwt/'
    paste_data_images: false,
    images_file_types: 'jpg,svg,webpjpeg,jpg,jpe,jfi,jif,jfif,png,gif,bmp,webp',
//     tinydrive_token_provider: 'URL_TO_YOUR_TOKEN_PROVIDER',
//   tinydrive_dropbox_app_key: 'kv3ehrz1mzpjh5p',
    tinydrive_google_drive_key: 'AIzaSyBpVIiSdxLwxxCefwiXZIFXcX1hvQ4R1ik',
    tinydrive_google_drive_client_id: '138764128104-l0tnhfmo2h4u538583j7vq0i8dvm23jh.apps.googleusercontent.com',
    
    });
    </script>
@stop
