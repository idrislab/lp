@extends('layouts.admin')

@section('title', $landingPage->name . ' - Landing Page')

@push('styles')
<link rel="stylesheet" href="{{ mix('css/admin.css') }}">
@endpush

@php
    $path      = $landingPage->client->id . DIRECTORY_SEPARATOR . $landingPage->id . DIRECTORY_SEPARATOR;
    $htmlFile  = $path . 'page.blade.php';
    $emailFile = $path . 'email.blade.php';
    $cssFile   = $path . 'css'. DIRECTORY_SEPARATOR . 'style.css';
    $jsFile    = $path . 'js'. DIRECTORY_SEPARATOR . 'script.js';
@endphp

@push('scripts')
<script src="{{ mix('js/admin.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/ace/ace.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/ace/theme-solarized_dark.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/ace/mode-html.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/ace/worker-html.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/ace/mode-javascript.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/ace/worker-javascript.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/ace/mode-css.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/ace/worker-css.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/ace/ext-language_tools.js') }}" type="text/javascript" charset="utf-8"></script>
<script>
    $('#wizard').smartWizard({
        keyNavigation: false,
        buttonOrder: ['prev', 'next', 'finish'],
        labelNext: 'Seguinte',
        labelPrevious: 'Anterior',
        labelFinish: 'Guardar',
        onLeaveStep: leaveAStepCallback,
        onFinish: onFinishCallback,
        enableAllSteps:  true,
    });

    function leaveAStepCallback(obj, context) {
        return validateSteps(context.fromStep); // return false to stay on step and true to continue navigation
    }

    function onFinishCallback(objs, context) {
        if (validateAllSteps()) {
            if (imagesUpload.getQueuedFiles().length > 0) {
                imagesUpload.processQueue();
            } else {
                submitForm();
            }
        }
    }

    // Your Step validation logic
    function validateSteps(stepnumber) {
        var isStepValid = true;
        // validate step 1
        if (stepnumber == 1) {
            // Your step validation logic
            // set isStepValid = false if has errors
        }

        return true;
    }

    function validateAllSteps() {
        var isStepValid = true;
        // all step validation logic
        return isStepValid;
    }

    $('.buttonNext').addClass('btn btn-success');
    $('.buttonPrevious').addClass('btn btn-primary');
    $('.buttonFinish').addClass('btn btn-default');

    var switchery = new Switchery('.js-switch', {
        color: '#26B99A'
    });

    Mousetrap.bind(['ctrl+s', 'command+s'], function(e) {
        if (validateAllSteps()) {
            if (imagesUpload.getQueuedFiles().length > 0) {
                imagesUpload.processQueue();
            } else {
                submitForm();
            }
        }
    });

    /**
     *  Ace Code Editor
     */
    function editor(element, mode) {
        var editor = ace.edit(element);
        editor.setOptions({
            enableBasicAutocompletion: true,
            enableSnippets: true,
            enableLiveAutocompletion: false
        });

        editor.setTheme("ace/theme/solarized_dark");

        var EditorMode = ace.require("ace/mode/" + mode).Mode;
        editor.session.setMode(new EditorMode());
        editor.session.setOptions({ tabSize: 2, useSoftTabs: true });

        var textarea = $('textarea[name="' + element + '"]');
        textarea.val(editor.getSession().getValue());
        editor.getSession().on('change', function () {
            textarea.val(editor.getSession().getValue());
        });
    }

    editor('html-editor', 'html');
    editor('css-editor', 'css');
    editor('javascript-editor', 'javascript');
    editor('email-editor', 'html');

    /**
     * DropZone
     */
    Dropzone.autoDiscover = false;

    var imagesUpload = new Dropzone('#images-upload', {
        url: "{{ route('manager.landingPages.update', [ 'landingPage' => $landingPage->id ]) }}",
        acceptedFiles: "image/*,.ttf, .woff, .woff2, .eot, .otf",
        autoProcessQueue: false,
        uploadMultiple: true,
        uploadAsync: false,
        parallelUploads: 20,
        maxFiles: 30,
        maxFilesize: 5,
        addRemoveLinks: true,
        dictDefaultMessage: 'Arraste as para aqui ou clique para escolher',
        dictRemoveFile: 'Remover',
        sendingmultiple: function (data, xhr, formData) {
            $("#landing-pages-form").find("input, select, textarea").each(function () {
                formData.append($(this).attr("name"), $(this).val());
            });
        },
        init: function () {
            this.on("removedfile", function (file) {
                var input = $('<input name="removedFiles[]" type="hidden" value="' + file.name + '">');
                $('#landing-pages-form').append(input);
            });
        },
        error: function (errorMessage, xhr) {
            notify(xhr, 'notice', 'Erro');
        },
        success: function (file, response) {
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                notify(response, 'success', 'Sucesso');
            }
        },
    });

    function addFile(filename, filesize, url) {
        var mockFile = {name: filename, size: filesize};
        imagesUpload.emit("addedfile", mockFile);
        if(filename.match(/.(jpg|jpeg|png|gif)$/i)) {
            imagesUpload.emit("thumbnail", mockFile, url);
        }
        imagesUpload.emit("complete", mockFile);
        imagesUpload.files.push(mockFile);
    }

    @php
        $files = \Storage::disk('assets')->files($path.DIRECTORY_SEPARATOR.'img');
        $files += \Storage::disk('assets')->files($path.DIRECTORY_SEPARATOR.'fonts');

        foreach($files as $file) {
             $filename = basename($file);
             $filesize = \Storage::disk('assets')->size($file);
              echo 'addFile("'. $filename .'",'. $filesize .', "/assets/'. $file .'");' . PHP_EOL;
        }
    @endphp

    function submitForm() {
        $.ajax({
            method: "POST",
            url: $('#landing-pages-form').attr('action'),
            data: $('#landing-pages-form').serializeArray(),
            dataType: "json",
        })
            .done(function (data) {
                notify(data, 'success', 'Sucesso');
            })
            .fail(function (jqXHR) {
                if (jqXHR.status == 422) {
                    notify(jqXHR.responseJSON, 'notice', 'Erro');
                }
            });
    }

    $(document).ready(function () {
        $('input:checkbox, #name').on('change input blur', throttle(function () {
            if ($("#slug").is(':checked')) {
                $.ajax({
                    method: "GET",
                    url: "{{ route('manager.slugify') }}",
                    data: {slug: $('#name').val()}
                })
                    .done(function (data) {
                        $("#domain-slug").text('/' + data.slug);
                    });
            } else {
                $("#domain-slug").text('/');
            }
        }, 500));
    });
</script>
@endpush

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{ $landingPage->name }}
                    <small>{{ $landingPage->client->name }}</small>
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form id="landing-pages-form" class="form-horizontal form-label-left" enctype="multipart/form-data"
                      method="post"
                      action="{{ route('manager.landingPages.update', [ 'landingPage' => $landingPage->id ]) }}">
                    <!-- Smart Wizard -->
                    <div id="wizard" class="form_wizard wizard_horizontal">
                        <ul class="wizard_steps">
                            <li>
                                <a href="#step-1">
                                    <span class="step_no">1</span>
                                    <span class="step_descr">
                                              <small>Informações</small>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-2">
                                    <span class="step_no">2</span>
                                    <span class="step_descr">
                                              <small>HTML</small>
                                          </span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-3">
                                    <span class="step_no">3</span>
                                    <span class="step_descr">
                                              <small>CSS</small>
                                          </span>
                                </a>
                            </li>

                            <li>
                                <a href="#step-4">
                                    <span class="step_no">4</span>
                                    <span class="step_descr">
                                              Imagens e Fontes<br/>
                                          </span>
                                </a>
                            </li>

                            <li>
                                <a href="#step-5">
                                    <span class="step_no">5</span>
                                    <span class="step_descr">
                                              Javascript<br/>
                                </span>
                                </a>
                            </li>

                            <li>
                                <a href="#step-6">
                                    <span class="step_no">6</span>
                                    <span class="step_descr">
                                              Email<br/>
                                </span>
                                </a>
                            </li>
                        </ul>
                        <div id="step-1">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $landingPage->id }}">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Cliente *</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="client">
                                        @foreach(\LandingPages\User::clients() as $client)
                                            <option value="{{$client->id}}" {{ $client->id == $landingPage->client->id ?  ' selected' : ''}}>
                                                {{ $client->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nome
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="name" required="required" name="name"
                                           class="form-control col-md-7 col-xs-12"
                                           value="{{ $landingPage->name ?: '' }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email *
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="email" name="email" required="required"
                                           class="form-control col-md-7 col-xs-12"
                                           value="{{ $landingPage->email ?: '' }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slug">Slug
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="">
                                        <label>
                                            <input id="slug" type="checkbox" class="js-switch"
                                                   name="slug" {{ ($landingPage->slug != 'index') ? 'checked' : '' }}/>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="domain"
                                       class="control-label col-md-3 col-sm-3 col-xs-12">Domínio *</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon3">http://</span>
                                        <input id="domain" class="form-control col-md-7 col-xs-12" type="text"
                                               name="domain" aria-describedby="basic-addon3"
                                               value="{{ $landingPage->domain ?: '' }}">
                                        <span class="input-group-addon"
                                              id="domain-slug">/{{ ($landingPage->slug != 'index') ? $landingPage->slug : '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="step-2" style="min-height: 500px;">
                            <h2 class="StepTitle">HTML</h2>
                            <textarea name="html-editor"></textarea>
                            <div class="editor" id="html-editor">
                                @if(\Storage::disk('pages')->exists($htmlFile))
                                    {{ Storage::disk('pages')->get($htmlFile) }}
                                @endif
                            </div>
                        </div>
                        <div id="step-3" style="min-height: 500px;">
                            <h2 class="StepTitle">CSS</h2>
                            <textarea name="css-editor"></textarea>
                            <div class="editor" id="css-editor">
                                @if(\Storage::disk('assets')->exists($cssFile))
                                    {{ \Storage::disk('assets')->get($cssFile) }}
                                @endif
                            </div>
                        </div>
                        <div id="step-4">
                            <h2 class="StepTitle">Imagens</h2>
                            <div class="dropzone" id="images-upload"></div>
                        </div>
                        <div id="step-5" style="min-height: 500px;">
                            <h2 class="StepTitle">Javascript</h2>
                              <div class="editor" id="javascript-editor">
                                @if(\Storage::disk('assets')->exists($jsFile))
                                    {{ \Storage::disk('assets')->get($jsFile) }}
                                @endif
                            </div>
                        </div>
                        <div id="step-6" style="min-height: 500px;">
                            <h2 class="StepTitle">Email</h2>
                            <textarea name="email-editor"></textarea>
                            <div class="editor" id="email-editor">
                                @if(\Storage::disk('pages')->exists($emailFile))
                                    {{ \Storage::disk('pages')->get($emailFile) }}
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- End SmartWizard Content -->
                </form>
            </div>
        </div>
    </div>
@endsection