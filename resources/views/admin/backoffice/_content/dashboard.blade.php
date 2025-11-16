@extends('admin.backoffice.index')

@section('content')
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-stats">
                <div class="card-stats-title">Artikel</div>
            </div>
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Artikel</h4>
                </div>
                <div class="card-body">
                    <h4>{{ $news->count() }}</h4>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('admin.articles') }}" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-stats">
                <div class="card-stats-title">Admin</div>
            </div>
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Admin</h4>
                </div>
                <div class="card-body">
                    <h4>{{ $admins->count() }}</h4>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('admin.users') }}" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection