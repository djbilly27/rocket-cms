@extends('admin.products.index')

@section('title',  trans('admin/products.contents.create.title'), @parent)

@section('stylesheet')

    @parent
    
    <!-- Blueimp Jquery File Upload -->
    <link href="{!! asset('assets/components/blueimp-file-upload/css/jquery.fileupload.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/components/blueimp-file-upload/css/jquery.fileupload-ui.css') !!}" rel="stylesheet">

@show

@section('actions')
    <a href="{{ route('admin.products.contents.list') }}" class="btn btn-default"><i class="fa fa-angle-left"></i> @lang('admin/_globals.buttons.back')</a>
@endsection

@section('products')
	
	@section('subtitle',  trans('admin/products.contents.create.title'))

	<div class="tabs-container">

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-contents"> @lang('admin/_globals.forms.nav.contents')</a></li>
            <li><a data-toggle="tab" href="#tab-images"> @lang('admin/_globals.forms.nav.images')</a></li>
            <li><a data-toggle="tab" href="#tab-seo"> @lang('admin/_globals.forms.nav.seo')</a></li>
        </ul>

		<form action="{{ route('admin.products.contents.store') }}" class="fileupload" method="post" nctype="multipart/form-data">
            <div class="tab-content">

                <div id="tab-contents" class="tab-pane active">
                    <div class="panel-body">
                        {{ csrf_field() }}
                        <fieldset class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.category'):</label>
                                <div class="col-sm-10">
                                    <select name="category_id" class="form-control">
                                        @foreach($categorys as $ky => $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.title'):</label>
                                <div class="col-sm-10"><input type="text" name="title" class="form-control" value="{{ old('title') }}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.content'):</label>
                                <div class="col-sm-10">
                                    <textarea name="content" class="form-control summernote">{{ old('content') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.status'):</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control">
                                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>@lang('admin/_globals.forms.active')</option>
                                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>@lang('admin/_globals.forms.inactive')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10"><button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> @lang('admin/_globals.buttons.create')</button></div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div id="tab-images" class="tab-pane">
                    <div class="panel-body">
                        @include('admin._inc.fileupload.buttons')
                    </div>
                </div>

                <div id="tab-seo" class="tab-pane">
                    <div class="panel-body">
                        <fieldset class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.title'):</label>
                                <div class="col-sm-10">
                                    <input type="text" maxlength="70" name="seo_title" class="form-control" value="{{ old('seo_title') }}">
                                    <div class="text-muted">@lang('admin/_globals.forms.limit_characters',['limit' => 70])</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('admin/_globals.forms.description'):</label>
                                <div class="col-sm-10">
                                    <textarea maxlength="170" name="seo_description" class="form-control">{{ old('seo_description') }}</textarea>
                                    <div class="text-muted">@lang('admin/_globals.forms.limit_characters',['limit' => 170])</div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                
            </div>
        </form>
        
	</div>

@endsection



@section('javascript')

    @parent

    @include('admin._inc.fileupload.upload')
    @include('admin._inc.fileupload.download')

    <!-- Blueimp Jquery File Upload -->
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/vendor/jquery.ui.widget.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-tmpl/js/tmpl.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-load-image/js/load-image.all.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-canvas-to-blob/js/canvas-to-blob.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.iframe-transport.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-process.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-image.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-audio.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-video.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-validate.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-ui.js') !!}"></script>

    <script type="text/javascript">

        // Initialize the jQuery File Upload widget:
        $('.fileupload').fileupload({
            autoUpload: true,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png|bmp)$/i,
            maxFileSize: 10240000, // 10 MB
            url: '{{ route('admin.products.contents.upload') }}',
        });

         // Load existing files:
        $('.fileupload').addClass('fileupload-processing');

        $.ajax({
            url: $('.fileupload').fileupload('option', 'url'),
            dataType: 'json',
            context: $('.fileupload')[0]
        }).always(function () {
            $(this).removeClass('fileupload-processing');
        }).done(function (result) {
            $(this).fileupload('option', 'done').call(this, $.Event('done'), {result: result});
        });

    </script>

@stop