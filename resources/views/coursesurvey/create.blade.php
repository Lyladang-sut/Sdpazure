@extends('app')

@push('styles')

@endpush

@section('title')
                
        Course, Accommodation, Overall Satisfaction Survey

@endsection

@section('content')
{!! Form::open(['route' => 'course-survey.store', 'class' => 'form-horizontal']) !!}
   
   <div class="widget">
        <div class="widget-heading">
            <h3 class="widget-title">
                <a href="{{ route('course-survey.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជី | ALL COURSE SURVEY</a>
                <div class="pull-right">
                    <button data-style="expand-left" class="btn btn-raised btn-primary ladda-button"><span class="ladda-label">រក្សាទុក | Save</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                </div>
            </h3>
        </div>

            <div class="widget-body"> 
                <div class="tabbable">
                <div class="tab-content">  
                    <div class="tab-pane active" id="basic-tab1">
                        @include('coursesurvey.form.survey')
                    </div>    
                </div>

            </div>
        </div>
    </div>        
{!! Form::close() !!}

@endsection

@push('scripts')


@endpush