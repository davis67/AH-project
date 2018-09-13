@extends('layouts.app')
@section('content')
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-home"></i>                 
        </span>
        Dashboard
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Overview
            <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>
    <div class="row">
      <div class="col-md-12 stretch-card grid-margin">
        <div class="card bg-gradient-default card-img-holder">
          <div class="card-body">
            <h4 class="font-weight-normal mb-3">
              On Going Projects
              <i class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">
            {{ $projects->count() }}
          </h2>
            <h6 class="card-text">These are overall projects under your department</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                  <div class="add-items d-flex">
            <?php

            $arrData = [

                    "chart"=> [
                        "caption"=> "Opportunities Summary ",
                        "numberSuffix"=> "",
                        "paletteColors"=> "#FF79AA",
                        "useplotgradientcolor"=> "0",
                        "plotBorderAlpha"=> "0",
                        "bgColor"=> "#FFFFFFF",
                        "canvasBgColor"=> "#FFFFFF",
                        "showValues"=>"1",
                        "showCanvasBorder"=> "0",
                        "showBorder"=> "0",
                        "divLineColor"=> "#DCDCDC",
                        "alternateHGridColor"=> "#DCDCDC",
                        "labelDisplay"=> "auto",
                        "baseFont"=> "Assistant",
                        "baseFontColor"=> "#153957",
                        "outCnvBaseFont"=> "Assistant",
                        "outCnvBaseFontColor"=> "#8A8A8A",
                        "baseFontSize"=> "13",
                        "outCnvBaseFontSize"=> "13",
                        "yAxisMinValue"=>"40",
                        "labelFontColor"=> "#8A8A8A",
                        " captionFontColor"=> "#153957",
                        "captionFontBold"=> "1",
                        "captionFontSize"=> "20",
                        "subCaptionFontColor"=> "#153957",
                        "subCaptionfontSize"=> "17",
                        "subCaptionFontBold"=> "0",
                        "captionPadding"=> "20",
                        "valueFontBold"=> "0",
                        "showAxisLines"=> "1",
                        "yAxisLineColor"=> "#DCDCDC",
                        "xAxisLineColor"=> "#DCDCDC",
                        "xAxisLineAlpha"=> "15",
                        "yAxisLineAlpha"=> "15",
                        "toolTipPadding"=> "7",
                        "toolTipBorderColor"=> "#DCDCDC",
                        "toolTipBorderThickness"=> "0",
                        "toolTipBorderRadius"=> "2",
                        "showShadow"=> "0",
                        "toolTipBgColor"=> "#153957",
                        "theme"=> "fint"
                    ]

            ];
            $arrData["data"] = [];
            foreach($opportunities as &$opportunity){
              array_push($arrData["data"],[
                "label" => $opportunity->sales_stage,
                "value" =>$opportunity->opportunitiesdone

              ]);
            }
            $jsonEncodedData = json_encode($arrData);

            $barChart = new FusionCharts("bar2d", "myFirstChart" , 700, 500, "chart-container", "json",$jsonEncodedData);
            $barChart->render();
        ?>
        <div id="chart-container">Opportunities Fusion Charts will render here</div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-center">Overall Project Status</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>
                      #
                    </th>
                    <th>
                      Name
                    </th>
                    <th>
                      Due Date
                    </th>
                    <th>
                      Progress
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($projects as $project)
                  <tr>
                    <td>
                      1
                    </td>
                    <td>
                      {{ 
                        $project->id }}
                    </td>
                    <td>
                      {{ $project->start_date }}
                    </td>
                    <td>
                      in progress
                    </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-white">Todo</h4>
            <div class="add-items d-flex">
              <input type="text" class="form-control todo-list-input"  placeholder="What do you need to do today?">
              <button class="add btn btn-gradient-primary font-weight-bold todo-list-add-btn" id="add-task">Add</button>
            </div>
            <div class="list-wrapper">
              <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Meeting with Alisa
                    </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Call John
                    </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Create invoice
                    </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Print Statements
                    </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Pick up kids from school
                    </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

  <!-- content-wrapper ends -->
  <!-- partial -->
</div>
@endsection
