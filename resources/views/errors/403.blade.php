@extends("layouts.app")
@section("title") 403 Access Denied @endsection

@section("content")
<div class="main-page">
    <h3 class="title1">403 Access Denied</h3>
    <div class="error-page">
        <div class="">
            <h2>403</h2>
        </div>
        <div class="">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! Access to resource was denied.</h3>
        </div>
        <p>You don't have authorization to view this page. Meanwhile, you may return to dashboard.</p>
    </div>
</div>
@endsection
