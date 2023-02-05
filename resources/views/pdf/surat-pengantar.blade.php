@extends('layouts.pdf')
@section('title', 'Surat Pengantar Pengujian (Belum ditandatangani).pdf')

@section('content')
  <h1>Surat Pengantar Pengujian {{ $item->token }}</h1>
@endsection