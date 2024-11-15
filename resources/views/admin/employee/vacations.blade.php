@extends('adminlte::page')

@section('title', 'Crear empleado')

@section('content_header')
    <h1>Administrador de los empleados.</h1>
@stop

@section('content')
    <h4 class="title_view">Vacaciones del empleado</h4>
    <div class="card fondo">

        <div class="overley">
            @if (session('message'))
                <div class="alert alert-success">
                    <strong>{{ session('message') }}</strong>
                </div>
            @endif
            @if (session('message-danger'))
                <div class="alert alert-danger">
                    <strong>{{ session('message-danger') }}</strong>
                </div>
            @endif
            <div class="card-body carta_formulario ">
                @include('admin.employee.partials.nav')

                {!! Form::model($employee, [
                    'route' => ['admin.employees.updateVacations', $employee],
                    'method' => 'put',
                    'files' => true,
                ]) !!}
                <div class=" m-2">
                    {!! Form::label('', 'Dias maximos de vacación ') !!}

                    @if ($employee->days_vacations === null)
                        <h3 class="text-danger">Para conocer la cantidad de días, actualice los datos del empleado.</h3>
                    @else
                        <h4 class="">{{ $employee->days_vacations }}</h4>
                    @endif

                </div>
                <div></div>
                <div class=" m-2">
                    {!! Form::label('', 'Tomo vacaciones anteriormente ') !!}
                    <h4 class="">{{ $tomoVacaciones }}</h4>
                </div>
                <div></div>
                <div class="form-group m-2">
                    {!! Form::label('vacation_start_date', 'Fecha de inicio de vacación: ') !!}
                    {!! Form::date('vacation_start_date', null, [
                        'class' => 'textarea w-100',
                    ]) !!}

                    @error('vacation_start_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group m-2">
                    {!! Form::label('vacation_final_date', 'Final de la vacación: ') !!}
                    {!! Form::date('vacation_final_date', null, [
                        'class' => 'textarea w-100',
                    ]) !!}

                    @error('vacation_final_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                @if ($employee->days_vacations === null)
                @else
                    <div class="form-group">
                        {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                    </div>
                @endif
                {!! Form::close() !!}
                @if ($employee->days_vacations !== null)
                    {!! Form::model($employee, [
                        'route' => ['admin.employees.resetVacations', $employee],
                        'method' => 'put',
                        'files' => true,
                    ]) !!}
                    <div class="form-group">
                        {!! Form::submit('Resetear Vacaciones', ['class' => 'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                @endif






            </div>
        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

@stop

@section('js')

@stop
