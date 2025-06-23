@extends('layouts.app')
@section('back')
    <a href="{{ url('/my-umkm') }}" class="back-btn"> <i class="icon-left"></i> </a>
@endsection
@section('container')
    <form class="tf-form" action="{{ url('/my-umkm/store') }}" enctype="multipart/form-data" method="POST">
        <div id="app-wrap" class="mt-4">
            <div class="bill-content">
                <div class="tf-container ms-4 me-4">
                    <div class="card-secton transfer-section mt-2">
                        <div class="tf-container">
                            @csrf

                            <div class="group-input">
                                <label for="name">Nama Product</label>
                                <input type="text" class="@error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" id="description" class="@error('keterangan') is-invalid @enderror" cols="30" rows="10">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="price">Harga</label>
                                <input type="text" class="money @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <label for="video_file_path">Video</label>
                            <div class="group-input">
                                <input class="form-control @error('video_file_path') is-invalid @enderror" type="file" id="video_file_path" name="video_file_path" accept="video/*">
                                @error('video_file_path')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div id="fotoContainer">
                                <div class="fotoItem">
                                    <label for="umkm_file_path">Foto 1</label>
                                    <div class="group-input">
                                        <div class="row">
                                            <div class="col-10">
                                                <input class="form-control @error('umkm_file_path') is-invalid @enderror" type="file" id="umkm_file_path" name="umkm_file_path[]" accept="image/*" required>
                                            </div>
                                            <div class="col-2">
                                                <button class="tf-btn danger large delete" style="font-size: 12px"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button class="tf-btn success large addFoto">+ Tambah Foto</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom-navigation-bar st2 bottom-btn-fixed" style="bottom:65px">
            <div class="tf-container">
                <button type="submit" class="tf-btn accent large">Save</button>
            </div>
        </div>
    </form>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
        <script>
            $('.money').mask('000,000,000,000,000', {
                reverse: true
            });

            $('.addFoto').click(function(e) {
                e.preventDefault();
                let fotoCount = $('#fotoContainer .fotoItem').length + 1;
                let newFoto = `
                    <div class="fotoItem">
                        <label for="umkm_file_path">Foto ${fotoCount}</label>
                        <div class="group-input">
                            <div class="row">
                                <div class="col-10">
                                    <input class="form-control @error('umkm_file_path') is-invalid @enderror" type="file" id="umkm_file_path" name="umkm_file_path[]" accept="image/*" required>
                                </div>
                                <div class="col-2">
                                    <button class="tf-btn danger large delete" style="font-size: 12px"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                $('#fotoContainer').append(newFoto);
            });

            $('#fotoContainer').on('click', '.delete', function(e) {
                e.preventDefault();
                let fotoCount = $('#fotoContainer .fotoItem').length + 1;

                if (fotoCount == 2) {
                    alert('Cannot Delete First Row');
                } else {
                    if (confirm('Are you sure to delete this data')) {
                        const fotoItem = $(this).closest('.fotoItem');
                        fotoItem.remove();
                        $('#fotoContainer .fotoItem').each(function(index) {
                            $(this).find('label').text('Foto ' + (index + 1));
                        });
                    }
                }
            });
        </script>
    @endpush
@endsection
