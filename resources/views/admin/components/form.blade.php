
@php
    $routeName = \Request::route()->getName();
    $route = explode('.', $routeName);
    $removeS = rtrim($route[0], 's');
@endphp
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">
                        {{ $title }}
                    </h2>
                    <a href="{{ route($route[0] . '.index') }}">Back to {{ $route[0] }}</a>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            </div>
        @endif
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="section-block" id="basicform">
                </div>
                <div class="card mb-5 shadow-sm">
                    <h5 class="card-header">Basic Form</h5>
                    <div class="card-body">
                        @if(isset($id))
                            <form action="{{ route($action, $id) }}" method="post">
                        @else
                            <form action="{{ route($action) }}" method="post">
                        @endif
                            @csrf
                            @method($method)
                            @if(isset($arrayInputs))
                                @foreach($arrayInputs as $input)
                                    <div class="{{ $input['div_class'] ?? 'form-group' }}">
                                        @if(!isset($input['noLabel']))
                                        <label class="col-form-label">{{ $input['label'] ?? ''}}</label>
                                        @endif
                                        <input type="{{ $input['type'] ?? 'text' }}" name="{{ $input['name'] ?? '' }}" value="{{ $input['value'] ?? '' }}" placeholder="{{ $input['placeholder'] ?? '' }}" class="form-control">
                                    </div>
                                @endforeach
                            @endif

                            @if(isset($arrayDropdowns))
                                @foreach($arrayDropdowns as $singleDdl)
                                    <div class="form-group">
                                        <label class="col-form-label">{{ $singleDdl->label ?? ''}}</label>
                                        <select class="custom-select ml-auto" name="{{ $singleDdl->name }}">
                                            <option value="1000">Select</option>
                                            @foreach($singleDdl->option as $option)
                                               @if(isset($singleDdl->selected))
                                                    @if($option['value'] == $singleDdl->selected)
                                                        <option selected value="{{ $option['value'] ?? '' }}">{{ $option['text'] }}</option>
                                                    @else
                                                        <option value="{{ $option['value'] ?? '' }}">{{ $option['text'] }}</option>
                                                    @endif
                                               @else
                                                    <option value="{{ $option['value'] ?? '' }}">{{ $option['text'] }}</option>
                                               @endif
                                            @endforeach
                                        </select>
                                    </div>
                                @endforeach
                            @endif
{{--                            <div class="custom-file mb-3">--}}
{{--                                <label class="custom-file-label" for="">File Input</label>--}}
{{--                                <input type="file" class="custom-file-input" id="customFile">--}}

{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleFormControlTextarea1">Example textarea</label>--}}
{{--                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>--}}
{{--                            </div>--}}
                                @if(isset($button))
                                    <div class="form-group">
                                        <button type="{{ $button['type'] ?? 'submit' }}" name="{{ $button['name'] ?? '' }}" id="{{ $button['id'] ?? '' }}" class="btn btn-space btn-primary {{ $button['class'] ?? '' }}">{{ $button['value'] ?? 'Submit' }}</button>
                                    </div>
                                @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


