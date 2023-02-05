@extends('layouts.pdf')
@section('title', 'Laporan Pengujian (Belum ditandatangani).pdf')

@section('content')
  <h1>Laporan Pengujian {{ $item->token }}</h1>
@endsection