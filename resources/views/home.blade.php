@extends('layouts.dashboard')

@section('content')
    <main>
        <div class="dashboard">
            <h1>Dashboard</h1>

            <div class="dashboard__date">
                <input class="dashboard__input-date" type="month" name="" id="">
            </div>

            <!-- Insights -->
            <div class="dashboard__insights">

                <!-- CARD OF SALES -->
                <div class="card">
                  <span class="material-icons-sharp card__icon card__icon">people</span>

                    <div class="card__middle">

                        <div class="card__left">
                            <h3 class="card__label">Tenants</h3>
                            <h2 class="card__title">{{ $tenantCount }}</h2>
                        </div>

                        <div class="card__right">
                            <div class="progress">
                                <svg class="progress_svg">
                                    <circle class="progress_circle progress_circle--sales" cx="38" cy="38" r="36"
                                        style="stroke-dasharray: {{ $tenantCount * 3.6 }} 226.195;"  <!-- 3.6 = (360 / 100) -->
                                    ></circle>
                                </svg>
                                <div class="progress__number">
                                    <p>{{ $tenantCount }}%</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <small class="card__text-small">Tenants added</small>
                </div>

                <!-- CARD OF  EXPENSES-->
                <div class="card">
                 <span class="material-icons-sharp card__icon">house</span>
                    <div class="card__middle">

                        <div class="card__left">
                            <h1 class="card__label">Rooms</h1>
                            <h4 class="card__title">{{ $roomCount }}</h4>
                        </div>

                        <div class="card__right">
                            <div class="progress">
                                <svg class="progress_svg">
                                    <circle class="progress_circle progress_circle--expenses" cx="38" cy="38" r="36"
                                        style="stroke-dasharray: {{ $roomCount * 3.6 }} 226.195;"
                                    ></circle>
                                </svg>
                                <div class="progress__number">
                                    <p>{{ $roomCount }}%</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <small class="card__text-small">Rooms Added</small>
                </div>

                <!-- CARD OF INCOME -->
                <div class="card">
                  <span class="material-icons-sharp card__icon">payment</span>

                    <div class="card__middle">

                        <div class="card__left">
                            <h3 class="card__label">Payments</h3>
                            <h2 class="card__title">Ksh 170,864</h2>
                        </div>

                        <div class="card__right">
                            <div class="progress">
                                <svg class="progress_svg">
                                    <circle class="progress_circle progress_circle--income" cx="38" cy="38" r="36"
                                        style="stroke-dasharray: 82 226.195;"  <!-- Adjust the percentage as needed -->
                                    ></circle>
                                </svg>
                                <div class="progress__number">
                                    <p>82%</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <small class="card__text-small">Transactions done</small>
                </div>

            </div>

            
        </div>
    </main>

    </div>
    </div>
@endsection
