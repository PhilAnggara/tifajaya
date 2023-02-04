@extends('layouts.pdf')
@section('title', 'Surat Perintah Pengujian (Belum ditandatangani).pdf')

@section('content')
  <h1>Surat Perintah Pengujian {{ $item->token }}</h1>
@endsection