@extends('layouts.dashboard')
@can('Gestion Financiera')
@section('panel')

@livewire('Dashboard.GestionFinanciera.ReporteSemanal')

@endsection
@endcan