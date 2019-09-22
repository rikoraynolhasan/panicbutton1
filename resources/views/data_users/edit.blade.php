@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Users
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dataUsers, ['route' => ['dataUsers.update', $dataUsers->id], 'method' => 'patch']) !!}

                        @include('data_users.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection