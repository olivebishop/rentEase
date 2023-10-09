@extends('layouts.dashboard')

@section('content')
   <main>
    <section class="container-fluid">
        <div class="">
            <div class="col-md-12">
                
                <div class="page-header">
                    <h1> {{ __('Update') }} Tenant </h1>
                    @include('layouts.gadget-welcome')
                </div>
                
                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Tenant</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tenants.update', $tenant->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tenant.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
   </main>
@endsection
