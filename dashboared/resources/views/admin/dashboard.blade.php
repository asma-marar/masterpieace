@extends('layouts.master')

@section('title', 'Dashboard')
@section('name', 'Details')

@section('content')
                <!-- Card With Icon States Background -->
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                      <div class="card card-stats card-round">
                        <div class="card-body">
                          <div class="row align-items-center">
                            <div class="col-icon">
                              <div
                                class="icon-big text-center icon-primary bubble-shadow-small"
                              >
                                <i class="fas fa-users"></i>
                              </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                              <div class="numbers">
                                <p class="card-category">Users</p>
                                <h4 class="card-title">{{ $users }}</h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="card card-stats card-round">
                        <div class="card-body">
                          <div class="row align-items-center">
                            <div class="col-icon">
                              <div
                                class="icon-big text-center icon-info bubble-shadow-small"
                              >
                                <i class="fas fa-user-check"></i>
                              </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                              <div class="numbers">
                                <p class="card-category">Products</p>
                                <h4 class="card-title">{{$products}}</h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="card card-stats card-round">
                        <div class="card-body">
                          <div class="row align-items-center">
                            <div class="col-icon">
                              <div
                                class="icon-big text-center icon-success bubble-shadow-small"
                              >
                                <i class="fas fa-luggage-cart"></i>
                              </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                              <div class="numbers">
                                <p class="card-category">Sales</p>
                                <h4 class="card-title">$ {{$totalSales}}</h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="card card-stats card-round">
                        <div class="card-body">
                          <div class="row align-items-center">
                            <div class="col-icon">
                              <div
                                class="icon-big text-center icon-secondary bubble-shadow-small"
                              >
                                <i class="far fa-check-circle"></i>
                              </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                              <div class="numbers">
                                <p class="card-category">Orders</p>
                                <h4 class="card-title">{{$orders}}</h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="container">
                    <h3>Daily User Activity</h3>
                    {!! $chart->renderHtml() !!}
                </div>
      
        {!! $chart->renderChartJsLibrary() !!}
        {!! $chart->renderJs() !!}
      
@endsection
