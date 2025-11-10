@extends('filament-panels::page')

@section('title', 'Panel administrativo')

@section('content')
    <x-filament::section>
        <x-slot name="heading">
            Administración y monitoreo
        </x-slot>

        <p class="text-sm text-gray-600 dark:text-gray-300">
            Supervisa métricas clave de usuarios y revisa los registros de accesos recientes desde un único lugar.
        </p>
    </x-filament::section>
@endsection


