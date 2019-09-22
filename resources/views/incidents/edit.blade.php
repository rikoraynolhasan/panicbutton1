@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Incidents
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($incidents, ['route' => ['incidents.update', $incidents->id], 'method' => 'patch']) !!}

                        @include('incidents.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection