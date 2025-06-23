@extends('layouts.app')
@section('back')
    <a href="{{ url('/my-umkm/show/'.$umkm->id) }}" class="back-btn"> <i class="icon-left"></i> </a>
@endsection
@section('container')
    <form class="tf-form" action="{{ url('/my-umkm/update/'.$umkm->id) }}" enctype="multipart/form-data" method="POST">
        <div id="app-wrap" class="mt-4">
            <div class="bill-content">
                <div class="tf-container ms-4 me-4">
                    <div class="card-secton transfer-section mt-2">
                        <div class="tf-container">
                            @method('PUT')
                            @csrf

                            <div class="group-input">
                                <label for="name">Nama Product</label>
                                <input type="text" class="@error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $umkm->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" id="description" class="@error('keterangan') is-invalid @enderror" cols="30" rows="10">{{ old('description', $umkm->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="group-input">
                                <label for="price">Harga</label>
                                <input type="text" class="money @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $umkm->price) }}">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <label for="video_file_path">Video</label>
                            <div class="group-input">
                                <input class="form-control @error('video_file_path') is-invalid @enderror" type="file" id="video_file_path" name="video_file_path" accept="video/*">
                                @if ($umkm->video_file_path)
                                    <a href="{{ url('/storage/'.$umkm->video_file_path) }}" style="color: blue" target="_blank"><i class="fa fa-download me-1"></i>{{ $umkm->video_file_name }}</a>
                                @endif
                                @error('video_file_path')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div id="fotoContainer">
                                @if (count($umkm->items) > 0)
                                    @foreach ($umkm->items as $key => $item)
                                        <div class="fotoItem">
                                            <label for="umkm_file_path">Foto {{ $key + 1 }}</label>
                                            <div class="group-input">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <input class="form-control @error('umkm_file_path') is-invalid @enderror" type="file" id="umkm_file_path" name="umkm_file_path[]" accept="image/*">
                                                        @if ($item->umkm_file_path)
                                                            <a href="{{ url('/storage/'.$item->umkm_file_path) }}" style="color: blue" target="_blank"><i class="fa fa-download me-1"></i>{{ $item->umkm_file_name }}</a>
                                                        @endif
                                                    </div>
                                                    <div class="col-2">
                                                        <button class="tf-btn danger large delete" style="font-size: 12px"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                    <input type="hidden" name="old_umkm_file_path[]" class="old_umkm_file_path" id="old_umkm_file_path" value="{{ $item->umkm_file_path }}">
                                                    <input type="hidden" name="old_umkm_file_name[]" class="old_umkm_file_name" id="old_umkm_file_name" value="{{ $item->umkm_file_name }}">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
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
                                                <input type="hidden" name="old_umkm_file_path[]" class="old_umkm_file_path" id="old_umkm_file_path">
                                                <input type="hidden" name="old_umkm_file_name[]" class="old_umkm_file_name" id="old_umkm_file_name">
                                            </div>
                                        </div>
                                    </div>
                                @endif
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
                                <input type="hidden" name="old_umkm_file_path[]" class="old_umkm_file_path" id="old_umkm_file_path">
                                <input type="hidden" name="old_umkm_file_name[]" class="old_umkm_file_name" id="old_umkm_file_name">
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
