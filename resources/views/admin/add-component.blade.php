@extends('admin.layout')
@section('title', 'Yeni Component Ekle')
@section('head')
    <link href="{{ asset('admins/assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('admins/plugins/file-upload/file-upload-with-preview.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admins/assets/css/forms/switches.css') }}">
@endsection
@section('content')
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget widget-content-area br-4">
                <div class="widget-one">

                    <p>
                        Hali hazırda bulunan bir componenti kayıt edebilirsiniz. Geliştirici değil iseniz burada
                        eklediğiniz component sitede görüntülenmez. Bu sayfa eklenen özellikler daha sonra
                        değiştirilemez.
                    </p>


                    <div class="widget-content widget-content-area">
                        <form action="{{ route('admin.components.store') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <select name="parent" class="form-control">
                                    @foreach($parents as $parent)
                                        <option value="{{ $parent->id }}">{{ $parent->title }}</option>
                                    @endforeach

                                </select>
                                <small class="form-text text-muted">Component sayfası (* Ön yüzde veriyi çekerken bu
                                    alana göre çekilecektir. Lütfen eksiksiz girin.)</small>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="title" class="form-control" placeholder="Component İsmi">
                                <small class="form-text text-muted">Component ismini giriniz</small>
                            </div>
                            <div class="form-group mb-3">
                                <textarea name="description" class="form-control"> </textarea>
                                <small class="form-text text-muted">Component Açıklaması</small>
                            </div>
                            <div class="form-group mb-3">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Component Resmi (Tek Dosya) <a href="javascript:void(0)"
                                                                          class="custom-file-container__image-clear"
                                                                          title="Resmi kaldır">x</a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" name="image"
                                               class="custom-file-container__custom-file__custom-file-input"
                                               accept="image/*">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="switch s-icons s-outline s-outline-secondary mr-2">
                                    <input name="multiple" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                                <small class="form-text text-muted">Component çoklu içerik destekliyor mu?</small>
                            </div>
                            <div class="form-group mb-3">
                                <h6>Component Özellikleri</h6>
                                <a class="btn btn-primary btn-sm my-4" onclick="child()">Yeni satır ekle</a>
                                <div id="fields">
                                    <div class="row mb-4">
                                        <div class="col">
                                            <input type="text" name="properties[0][title]" class="form-control"
                                                   placeholder="Anahtar">
                                        </div>
                                        <div class="col">
                                            <select name="properties[0][type]" class="form-control">
                                                <option value="text">Text</option>
                                                <option value="textarea">Textarea</option>
                                                <option value="editor">Editor</option>
                                                <option value="image">Image</option>
                                                <option value="multipleImage">Multiple Image</option>
                                            </select>
                                            <input type="hidden" name="properties[0][content]" value="">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Componenti Ekle</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('admins/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script>
        const firstUpload = new FileUploadWithPreview('myFirstImage')
        const secondUpload = new FileUploadWithPreview('mySecondImage')
    </script>
    <script>
        let current = 1
        const ekle = document.querySelector('#ekle')
        const fields = document.querySelector('#fields')

        function child(e) {
            const row = document.createElement('div')
            row.classList.add('row')
            row.classList.add('mb-4')
            const col = document.createElement('div')
            col.classList.add('col')
            const col2 = document.createElement('div')
            col2.classList.add('col')
            const input = document.createElement('input')
            input.name = `properties[${current}][title]`
            input.classList.add('form-control')
            input.placeholder = 'Anahtar'
            const select = document.createElement('select')
            select.name = `properties[${current}][type]`
            select.classList.add('form-control')
            const hidden = document.createElement('input')
            hidden.type = 'hidden'
            hidden.value = ''
            hidden.name = `properties[${current}][content]`
            const option1 = document.createElement('option')
            const option2 = document.createElement('option')
            const option3 = document.createElement('option')
            const option4 = document.createElement('option')
            const option5 = document.createElement('option')
            option1.value = 'text'
            option1.innerText = 'Text'
            option2.value = 'textarea'
            option2.innerText = 'Textarea'
            option3.value = 'editor'
            option3.innerText = 'Editor'
            option4.value = 'image'
            option4.innerText = 'Image'
            option5.value = 'multipleImage'
            option5.innerText = 'Multiple Image'
            row.appendChild(col)
            row.appendChild(col2)
            col.appendChild(input)
            col2.appendChild(select)
            select.appendChild(option1)
            select.appendChild(option2)
            select.appendChild(option3)
            select.appendChild(option4)
            select.appendChild(option5)
            col2.appendChild(hidden)
            fields.appendChild(row)
            current = current + 1
        }
    </script>
@endsection
