@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            User Incident
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($userIncident, ['route' => ['userIncidents.update', $userIncident->id], 'method' => 'patch']) !!}

                        @include('user_incidents.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection