
@extends('backend.layouts.master')

@section('title')
Dashboard Page - Admin Panel
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Dashboard</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src="{{ asset('backend/assets/images/author/avatar.png') }}" alt="avatar">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Kumkum Rai <i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Message</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
    <!-- sales report area start -->
    <div class="sales-report-area mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"><i class="fa fa-btc"></i></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Bitcoin</h4>
                            <p>24 H</p>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2>$ 4567809,987</h2>
                            <span>- 45.87</span>
                        </div>
                    </div>
                    <canvas id="coin_sales1" height="100"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"><i class="fa fa-btc"></i></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Bitcoin Dash</h4>
                            <p>24 H</p>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2>$ 4567809,987</h2>
                            <span>- 45.87</span>
                        </div>
                    </div>
                    <canvas id="coin_sales2" height="100"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-report">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"><i class="fa fa-eur"></i></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Euthorium</h4>
                            <p>24 H</p>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2>$ 4567809,987</h2>
                            <span>- 45.87</span>
                        </div>
                    </div>
                    <canvas id="coin_sales3" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- sales report area end -->
    <!-- overview area start -->
    <div class="row">
        <div class="col-xl-9 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title mb-0">Overview</h4>
                        <select class="custome-select border-0 pr-3">
                            <option selected>Last 24 Hours</option>
                            <option value="0">01 July 2018</option>
                        </select>
                    </div>
                    <div id="verview-shart"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 coin-distribution">
            <div class="card h-full">
                <div class="card-body">
                    <h4 class="header-title mb-0">Coin Distribution</h4>
                    <div id="coin_distribution"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- overview area end -->
    <!-- market value area start -->
    <div class="row mt-5 mb-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <h4 class="header-title mb-0">Market Value And Trends</h4>
                        <select class="custome-select border-0 pr-3">
                            <option selected>Last 24 Hours</option>
                            <option value="0">01 July 2018</option>
                        </select>
                    </div>
                    <div class="market-status-table mt-4">
                        <div class="table-responsive">
                            <table class="dbkit-table">
                                <tr class="heading-td">
                                    <td class="mv-icon">Logo</td>
                                    <td class="coin-name">Coin Name</td>
                                    <td class="buy">Buy</td>
                                    <td class="sell">Sells</td>
                                    <td class="trends">Trends</td>
                                    <td class="attachments">Attachments</td>
                                    <td class="stats-chart">Stats</td>
                                </tr>
                                <tr>
                                    <td class="mv-icon"><img src="{{ asset('backend/assets/images/icon/market-value/icon1.png') }}" alt="icon">
                                    </td>
                                    <td class="coin-name">Dashcoin</td>
                                    <td class="buy">30% <img src="{{ asset('backend/assets/images/icon/market-value/triangle-down.png') }}" alt="icon"></td>
                                    <td class="sell">20% <img src="{{ asset('backend/assets/images/icon/market-value/triangle-up.png') }}" alt="icon"></td>
                                    <td class="trends"><img src="{{ asset('backend/assets/images/icon/market-value/trends-up-icon.png') }}" alt="icon"></td>
                                    <td class="attachments">$ 56746,857</td>
                                    <td class="stats-chart">
                                        <canvas id="mvaluechart"></canvas>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="mv-icon">
                                        <div class="mv-icon"><img src="{{ asset('backend/assets/images/icon/market-value/icon2.png') }}" alt="icon"></div>
                                    </td>
                                    <td class="coin-name">LiteCoin</td>
                                    <td class="buy">30% <img src="{{ asset('backend/assets/images/icon/market-value/triangle-down.png') }}" alt="icon"></td>
                                    <td class="sell">20% <img src="{{ asset('backend/assets/images/icon/market-value/triangle-up.png') }}" alt="icon"></td>
                                    <td class="trends"><img src="{{ asset('backend/assets/images/icon/market-value/trends-down-icon.png') }}" alt="icon"></td>
                                    <td class="attachments">$ 56746,857</td>
                                    <td class="stats-chart">
                                        <canvas id="mvaluechart2"></canvas>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="mv-icon">
                                        <div class="mv-icon"><img src="{{ asset('backend/assets/images/icon/market-value/icon3.png') }}" alt="icon"></div>
                                    </td>
                                    <td class="coin-name">Euthorium</td>
                                    <td class="buy">30% <img src="{{ asset('backend/assets/images/icon/market-value/triangle-down.png') }}" alt="icon"></td>
                                    <td class="sell">20% <img src="{{ asset('backend/assets/images/icon/market-value/triangle-up.png') }}" alt="icon"></td>
                                    <td class="trends"><img src="{{ asset('backend/assets/images/icon/market-value/trends-up-icon.png') }}" alt="icon"></td>
                                    <td class="attachments">$ 56746,857</td>
                                    <td class="stats-chart">
                                        <canvas id="mvaluechart3"></canvas>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="mv-icon">
                                        <div class="mv-icon"><img src="{{ asset('backend/assets/images/icon/market-value/icon4.png') }}" alt="icon"></div>
                                    </td>
                                    <td class="coin-name">Bitcoindash</td>
                                    <td class="buy">30% <img src="{{ asset('backend/assets/images/icon/market-value/triangle-down.png') }}" alt="icon"></td>
                                    <td class="sell">20% <img src="{{ asset('backend/assets/images/icon/market-value/triangle-up.png') }}" alt="icon"></td>
                                    <td class="trends"><img src="{{ asset('backend/assets/images/icon/market-value/trends-up-icon.png') }}" alt="icon"></td>
                                    <td class="attachments">$ 56746,857</td>
                                    <td class="stats-chart">
                                        <canvas id="mvaluechart4"></canvas>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- market value area end -->
    <!-- row area start -->
    <div class="row">
        <!-- Live Crypto Price area start -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Live Crypto Price</h4>
                    <div class="cripto-live mt-5">
                        <ul>
                            <li>
                                <div class="icon b">b</div> Bitcoin<span><i class="fa fa-long-arrow-up"></i>$876909.00</span></li>
                            <li>
                                <div class="icon l">l</div> Litecoin<span><i class="fa fa-long-arrow-up"></i>$29780.00</span></li>
                            <li>
                                <div class="icon d">d</div> Dashcoin<span><i class="fa fa-long-arrow-up"></i>$13276.00</span></li>
                            <li>
                                <div class="icon b">b</div> Bitcoindash<span><i class="fa fa-long-arrow-down"></i>$5684.890</span></li>
                            <li>
                                <div class="icon e">e</div> Euthorium<span><i class="fa fa-long-arrow-down"></i>$3890.98</span></li>
                            <li>
                                <div class="icon t">b</div> Tcoin<span><i class="fa fa-long-arrow-up"></i>$750.789</span></li>
                            <li>
                                <div class="icon b">b</div> Bitcoin<span><i class="fa fa-long-arrow-up"></i>$325.037</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Live Crypto Price area end -->
        <!-- trading history area start -->
        <div class="col-lg-8 mt-sm-30 mt-xs-30">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <h4 class="header-title">Trading History</h4>
                        <div class="trd-history-tabs">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#buy_order" role="tab">Buy Order</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#sell_order" role="tab">Sell Order</a>
                                </li>
                            </ul>
                        </div>
                        <select class="custome-select border-0 pr-3">
                            <option selected>Last 24 Hours</option>
                            <option value="0">01 July 2018</option>
                        </select>
                    </div>
                    <div class="trad-history mt-4">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="buy_order" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="dbkit-table">
                                        <tr class="heading-td">
                                            <td>Trading ID</td>
                                            <td>Time</td>
                                            <td>Status</td>
                                            <td>Amount</td>
                                            <td>Last Trade</td>
                                        </tr>
                                        <tr>
                                            <td>78211</td>
                                            <td>4.00 AM</td>
                                            <td>Pending</td>
                                            <td>$758.90</td>
                                            <td>$05245.090</td>
                                        </tr>
                                        <tr>
                                            <td>782782</td>
                                            <td>4.00 AM</td>
                                            <td>Pending</td>
                                            <td>$77878.90</td>
                                            <td>$7778.090</td>
                                        </tr>
                                        <tr>
                                            <td>89675978</td>
                                            <td>4.00 AM</td>
                                            <td>Pending</td>
                                            <td>$0768.90</td>
                                            <td>$0945.090</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sell_order" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="dbkit-table">
                                        <tr class="heading-td">
                                            <td>Trading ID</td>
                                            <td>Time</td>
                                            <td>Status</td>
                                            <td>Amount</td>
                                            <td>Last Trade</td>
                                        </tr>
                                        <tr>
                                            <td>8964978</td>
                                            <td>4.00 AM</td>
                                            <td>Pending</td>
                                            <td>$445.90</td>
                                            <td>$094545.090</td>
                                        </tr>
                                        <tr>
                                            <td>89675978</td>
                                            <td>4.00 AM</td>
                                            <td>Pending</td>
                                            <td>$78.90</td>
                                            <td>$074852945.090</td>
                                        </tr>
                                        <tr>
                                            <td>78527878</td>
                                            <td>4.00 AM</td>
                                            <td>Pending</td>
                                            <td>$0768.90</td>
                                            <td>$65465.090</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- trading history area end -->
    </div>
    <!-- row area end -->
    <div class="row mt-5">
        <!-- latest news area start -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Latest News</h4>
                    <div class="letest-news mt-5">
                        <div class="single-post mb-xs-40 mb-sm-40">
                            <div class="lts-thumb">
                                <img src="{{ asset('backend/assets/images/blog/post-thumb1.jpg') }}" alt="post thumb">
                            </div>
                            <div class="lts-content">
                                <span>Admin Post</span>
                                <h2><a href="blog.html">Sed ut perspiciatis unde omnis iste.</a></h2>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some...</p>
                            </div>
                        </div>
                        <div class="single-post">
                            <div class="lts-thumb">
                                <img src="{{ asset('backend/assets/images/blog/post-thumb2.jpg') }}" alt="post thumb">
                            </div>
                            <div class="lts-content">
                                <span>Admin Post</span>
                                <h2><a href="blog.html">Sed ut perspiciatis unde omnis iste.</a></h2>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- latest news area end -->
        <!-- exchange area start -->
        <div class="col-xl-6 mt-md-30 mt-xs-30 mt-sm-30">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Exchange</h4>
                    <div class="exhcange-rate mt-5">
                        <form action="#">
                            <div class="input-form">
                                <input type="text" value="0.76834">
                                <span>BTC</span>
                            </div>
                            <div class="exchange-devider">To</div>
                            <div class="input-form">
                                <input type="text" value="5689.846">
                                <span>USD</span>
                            </div>
                            <div class="exchange-btn">
                                <button type="submit">Exchange Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- exchange area end -->
    </div>
    <!-- row area start-->
</div>
@endsection