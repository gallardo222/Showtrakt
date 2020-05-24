@extends('admin.layouts.layout')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="statistics">
                                <div class="info">
                                    <div class="icon icon-primary">
                                        <i class="now-ui-icons tech_tv"></i>
                                    </div>
                                    <h3 class="info-title">{{$item['showswatched']}}</h3>
                                    <h6 class="stats-title">Watched TV Shows</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="statistics">
                                <div class="info">
                                    <div class="icon icon-success">
                                        <i class="now-ui-icons media-2_sound-wave"></i>
                                    </div>
                                    <h3 class="info-title">{{$item['moviesswatched']}}</h3>
                                    <h6 class="stats-title">Watched Movies</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="statistics">
                                <div class="info">
                                    <div class="icon icon-info">
                                        <i class="now-ui-icons users_single-02"></i>
                                    </div>
                                    <h3 class="info-title">{{$user}}</h3>
                                    <h6 class="stats-title">Total Users</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="statistics">
                                <div class="info">
                                    <div class="icon icon-danger">
                                        <i class="now-ui-icons ui-2_chat-round"></i>
                                    </div>
                                    <h3 class="info-title">{{$totalcomments}}</h3>
                                    <h6 class="stats-title">Total Comments</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Most Active Users</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-shopping">
                            <thead class="">
                            <tr><th class="text-center">
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Custom Title
                                </th>
                                <th>
                                    Total Movies
                                </th>
                                <th class="text-right">
                                    Total TV Shows
                                </th>
                                <th class="text-right">
                                    Total Comments
                                </th>
                            </tr></thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="img-container">
                                        <img src="../assets/img/saint-laurent.jpg" alt="...">
                                    </div>
                                </td>
                                <td class="td-name">
                                    <a href="#jacket">Suede Biker Jacket</a>
                                    <br>
                                    <small>by Saint Laurent</small>
                                </td>
                                <td>
                                    Black
                                </td>
                                <td>
                                    M
                                </td>
                                <td class="td-number">
                                    <small>€</small>3,390
                                </td>
                                <td class="td-number">
                                    1
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Most Watched Movies</h5>
                    <h2 class="card-title">34,252</h2>
                    <div class="dropdown">
                        <button type="button" class="btn btn-round btn-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown" aria-expanded="false">
                            <i class="now-ui-icons loader_gear"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-127px, 38px, 0px);">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <a class="dropdown-item text-danger" href="#">Remove Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>
                                    <div class="flag">
                                        <img src="../assets/img/US.png">
                                    </div>
                                </td>
                                <td>USA</td>
                                <td class="text-right">
                                    2.920
                                </td>
                                <td class="text-right">
                                    53.23%
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flag">
                                        <img src="../assets/img/DE.png">
                                    </div>
                                </td>
                                <td>Germany</td>
                                <td class="text-right">
                                    1.300
                                </td>
                                <td class="text-right">
                                    20.43%
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flag">
                                        <img src="../assets/img/AU.png">
                                    </div>
                                </td>
                                <td>Australia</td>
                                <td class="text-right">
                                    760
                                </td>
                                <td class="text-right">
                                    10.35%
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flag">
                                        <img src="../assets/img/GB.png">
                                    </div>
                                </td>
                                <td>United Kingdom</td>
                                <td class="text-right">
                                    690
                                </td>
                                <td class="text-right">
                                    7.87%
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flag">
                                        <img src="../assets/img/RO.png">
                                    </div>
                                </td>
                                <td>Romania</td>
                                <td class="text-right">
                                    600
                                </td>
                                <td class="text-right">
                                    5.94%
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flag">
                                        <img src="../assets/img/BR.png">
                                    </div>
                                </td>
                                <td>Brasil</td>
                                <td class="text-right">
                                    550
                                </td>
                                <td class="text-right">
                                    4.34%
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Most Watched TV Shows</h5>
                    <h2 class="card-title">34,252</h2>
                    <div class="dropdown">
                        <button type="button" class="btn btn-round btn-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown" aria-expanded="false">
                            <i class="now-ui-icons loader_gear"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-127px, 38px, 0px);">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <a class="dropdown-item text-danger" href="#">Remove Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>
                                    <div class="flag">
                                        <img src="../assets/img/US.png">
                                    </div>
                                </td>
                                <td>USA</td>
                                <td class="text-right">
                                    2.920
                                </td>
                                <td class="text-right">
                                    53.23%
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flag">
                                        <img src="../assets/img/DE.png">
                                    </div>
                                </td>
                                <td>Germany</td>
                                <td class="text-right">
                                    1.300
                                </td>
                                <td class="text-right">
                                    20.43%
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flag">
                                        <img src="../assets/img/AU.png">
                                    </div>
                                </td>
                                <td>Australia</td>
                                <td class="text-right">
                                    760
                                </td>
                                <td class="text-right">
                                    10.35%
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flag">
                                        <img src="../assets/img/GB.png">
                                    </div>
                                </td>
                                <td>United Kingdom</td>
                                <td class="text-right">
                                    690
                                </td>
                                <td class="text-right">
                                    7.87%
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flag">
                                        <img src="../assets/img/RO.png">
                                    </div>
                                </td>
                                <td>Romania</td>
                                <td class="text-right">
                                    600
                                </td>
                                <td class="text-right">
                                    5.94%
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flag">
                                        <img src="../assets/img/BR.png">
                                    </div>
                                </td>
                                <td>Brasil</td>
                                <td class="text-right">
                                    550
                                </td>
                                <td class="text-right">
                                    4.34%
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Latest Comments</h4>
                </div>
                <div class="card-body">
                    <hr>
                    @forelse($comments as $comment)
                    <p>{{$comment->body}}</p>
                        <hr>
                    @empty
                        <p>No comments yet!</p>
                    @endforelse
                </div>

            </div>
        </div>
    </div>


@endsection