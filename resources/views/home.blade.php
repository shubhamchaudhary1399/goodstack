@extends('layouts.app')
@section('header')
<link rel="stylesheet" type="text/css" href="/css/login.css">
@endsection
@section('title', 'Dashboard | goodstack')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center my-card">Welcome on Dashboard</div>

                <div class="card-body">
                  <table style="width: -webkit-fill-available;">
              <tbody>
                <tr>
                  <td style="color:#878787;">Username</td>
                  <td>  {{ Auth::user()->username }}</td>
                </tr>
                <tr>
                  <td style="color:#878787;">Email</td>
                  <td>  {{ Auth::user()->email }}</td>
                </tr>
                <tr>
                  <td style="color:#878787;">Phone number</td>
                  <td>  {{ Auth::user()->contact }}</td>
                </tr>
              </tbody>
            </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
