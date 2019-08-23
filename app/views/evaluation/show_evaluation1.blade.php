@extends('evaluation.index_adminEvaluation')
@section('css_evaluation')
{{ HTML::style('assets/plugins/dataTables/dataTables.bootstrap.css'); }}
@stop
@section('marco_contenido_evaluation')
<div class="row">
<div class="col-lg-12">
<!-- Form Elements -->
<div class="panel panel-primary">
<div class="panel-heading">
   <ul class="breadcrumb">
   <li><a href="{{URL::route('index')}}">Home</a></li>
            <li><a href="{{URL::route('evaluation_list')}}">Store {{--{{$market->num_market}}--}}</a></li>
            <li><a href="#">Evaluation details</a></li>
        </ul>
</div>
<div class="panel-body">
<div class="row">
<div class=" col-xs-12 col-lg-12 col-sm-12 ">
        <div class="clearfix"></div>
        <div class="row">
            <fieldset class="col-md-12">
             <div class="form-static form-horizontal col-lg-12">
                <div class="row">
                    <div class="col-md-4"  >
                        <div class="row">
                            <div class="form-group col-sm-6 form-group-label">
                                <label class="control-label" >Store Name:</label>
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="form-control-static">
                                    boutike
                                </div>
                            </div>
                        </div>
 <div class="row">
                            <div class="form-group col-sm-6 form-group-label">
                                <label class="control-label" >Total for shop::</label>
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="form-control-static">
                                    4.30
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4" >
                    <div class="row">
                                                <div class="form-group col-sm-6 form-group-label">
                                                    <label class="control-label" >Date:
                                                    </label>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <div class="form-control-static " >
                                                        02/20/2017
                                                    </div></div>
                                            </div>

                        <div class="row">
                            <div class="form-group col-sm-6 form-group-label">
                                <label class="control-label" >Total for the Store::
                                </label>
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="form-control-static " >
                                    4.8
                                </div></div>
                        </div>

                    </div><div class="col-md-4" >
                     <div class="row">
                                                <div class="form-group col-sm-6 form-group-label">
                                                    <label class="control-label" >Time:</label>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <div class="form-control-static " >
                                                        11:05 AM
                                                    </div></div>
                                            </div>
                        <div class="row">
                                                    <div class="form-group col-sm-6 form-group-label">
                                                        <label class="control-label" >Incentive Program Score::</label>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <div class="form-control-static " >
                                                            4.8
                                                        </div></div>
                                                </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Step 1.  Cafeteria Department</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body" style="padding: 0">
                                            <div class="list-group" style="margin: 0;">
                                                <a  class="list-group-item" style="background-color: #d9edf7;">
                                                    Employee Name: <em>Sonia J.</em>
                                    <span class="pull-right text-muted small"><em></em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                                    1.  Wait time (5=<3min. 4<4 min. 3>6 min. 2<8 min. 1>10 min)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                                    2.  Associate's uniform and name tag visibility (1= no uniform or head cover / 3 = uniform but no tag / 5=uniform and tag)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                                    2a. Condition of Associate's uniform (5 = excellent / 3 = good / 1 = poor)
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                             3.  Associate smile and stated greeting  (1 = no smile or greeting / 3 = greeted - no smile / 5 = smile and greeting)
                                    <span class="pull-right text-muted small"><em>4 </em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                                   4.  Associate's tone of voice and body language
                                    <span class="pull-right text-muted small"><em>5</em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                                  5.  Associate's helpfulness, willingness to listen and find solutions
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                                   6.  Handling of food (1 = improper / 5 = done correctly)
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                                    7.  Speed of transaction
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Step 2. Hot Food</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body" style="padding: 0">
                                            <div class="list-group" style="margin: 0;">
                                                <a  class="list-group-item" style="background-color: #d9edf7;">
                                                    Employee Name: <em>Sonia J.</em>
                                    <span class="pull-right text-muted small"><em></em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                                    1.  Wait time (5=<3min. 4<4 min. 3>6 min. 2<8 min. 1>10 min)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                                    2.  Associate's uniform and name tag visibility (1= no uniform or head cover / 3 = uniform but no tag / 5=uniform and tag)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                                    2a. Condition of Associate's uniform (5 = excellent / 3 = good / 1 = poor)
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                                    3.  Associate smile and stated greeting  (1 = no smile or greeting / 3 = greeted - no smile / 5 = smile and greeting)
                                    <span class="pull-right text-muted small"><em>4 </em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                                    4.  Associate's tone of voice and body language
                                    <span class="pull-right text-muted small"><em>5</em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                                    5.  Associate's helpfulness, willingness to listen and find solutions
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                                    6.  Handling of food (1 = improper / 5 = done correctly)
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                                    7.  Speed of transaction
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Step 3.   Bakery</a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body" style="padding: 0">
                                            <div class="list-group" style="margin: 0;">
                                                <a  class="list-group-item" style="background-color: #d9edf7;">
                                                    Employee Name: <em>Sonia J.</em>
                                    <span class="pull-right text-muted small"><em></em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                                    1.  Wait time (5=<3min. 4<4 min. 3>6 min. 2<8 min. 1>10 min)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                                    2.  Associate's uniform and name tag visibility (1= no uniform or head cover / 3 = uniform but no tag / 5=uniform and tag)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                                    2a. Condition of Associate's uniform (5 = excellent / 3 = good / 1 = poor)
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                                    3.  Associate smile and stated greeting  (1 = no smile or greeting / 3 = greeted - no smile / 5 = smile and greeting)
                                    <span class="pull-right text-muted small"><em>4 </em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                                    4.  Associate's tone of voice and body language
                                    <span class="pull-right text-muted small"><em>5</em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                                    5.  Associate's helpfulness, willingness to listen and find solutions
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                                    6.  Handling of food (1 = improper / 5 = done correctly)
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                </a>
                                                <a  class="list-group-item">
                                                    7.  Speed of transaction
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Step 4.   Produce</a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse">
                                            <div class="panel-body" style="padding: 0">
                                                <div class="list-group" style="margin: 0;">
                                                    <a  class="list-group-item" style="background-color: #d9edf7;">
                                                        Employee Name: <em>Sonia J.</em>
                                    <span class="pull-right text-muted small"><em></em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        1.  Wait time (5=<3min. 4<4 min. 3>6 min. 2<8 min. 1>10 min)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        2.  Associate's uniform and name tag visibility (1= no uniform or head cover / 3 = uniform but no tag / 5=uniform and tag)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        2a. Condition of Associate's uniform (5 = excellent / 3 = good / 1 = poor)
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        3.  Associate smile and stated greeting  (1 = no smile or greeting / 3 = greeted - no smile / 5 = smile and greeting)
                                    <span class="pull-right text-muted small"><em>4 </em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        4.  Associate's tone of voice and body language
                                    <span class="pull-right text-muted small"><em>5</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        5.  Associate's helpfulness, willingness to listen and find solutions
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        6.  Handling of food (1 = improper / 5 = done correctly)
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        7.  Speed of transaction
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                    </a>

                                                </div>
                                            </div>

                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Step 5.   Meat Department</a>
                                        </h4>
                                    </div>
                                    <div id="collapseFive" class="panel-collapse collapse">
                                        <div class="panel-body" style="padding: 0">
                                                <div class="list-group" style="margin: 0;">
                                                    <a  class="list-group-item" style="background-color: #d9edf7;">
                                                        Employee Name: <em>Sonia J.</em>
                                    <span class="pull-right text-muted small"><em></em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        1.  Wait time (5=<3min. 4<4 min. 3>6 min. 2<8 min. 1>10 min)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        2.  Associate's uniform and name tag visibility (1= no uniform or head cover / 3 = uniform but no tag / 5=uniform and tag)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        2a. Condition of Associate's uniform (5 = excellent / 3 = good / 1 = poor)
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        3.  Associate smile and stated greeting  (1 = no smile or greeting / 3 = greeted - no smile / 5 = smile and greeting)
                                    <span class="pull-right text-muted small"><em>4 </em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        4.  Associate's tone of voice and body language
                                    <span class="pull-right text-muted small"><em>5</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        5.  Associate's helpfulness, willingness to listen and find solutions
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        6.  Handling of food (1 = improper / 5 = done correctly)
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        7.  Speed of transaction
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                    </a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Step 6. Deli</a>
                                        </h4>
                                    </div>
                                    <div id="collapseSix" class="panel-collapse collapse">
                                            <div class="panel-body" style="padding: 0">
                                                <div class="list-group" style="margin: 0;">
                                                    <a  class="list-group-item" style="background-color: #d9edf7;">
                                                        Employee Name: <em>Sonia J.</em>
                                    <span class="pull-right text-muted small"><em></em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        1.  Wait time (5=<3min. 4<4 min. 3>6 min. 2<8 min. 1>10 min)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        2.  Associate's uniform and name tag visibility (1= no uniform or head cover / 3 = uniform but no tag / 5=uniform and tag)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        2a. Condition of Associate's uniform (5 = excellent / 3 = good / 1 = poor)
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        3.  Associate smile and stated greeting  (1 = no smile or greeting / 3 = greeted - no smile / 5 = smile and greeting)
                                    <span class="pull-right text-muted small"><em>4 </em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        4.  Associate's tone of voice and body language
                                    <span class="pull-right text-muted small"><em>5</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        5.  Associate's helpfulness, willingness to listen and find solutions
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        6.  Handling of food (1 = improper / 5 = done correctly)
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        7.  Speed of transaction
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                    </a>

                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">Step 7. Fish Department</a>
                                        </h4>
                                    </div>
                                    <div id="collapseSeven" class="panel-collapse collapse">
                                            <div class="panel-body" style="padding: 0">
                                                <div class="list-group" style="margin: 0;">
                                                    <a  class="list-group-item" style="background-color: #d9edf7;">
                                                        Employee Name: <em>Sonia J.</em>
                                    <span class="pull-right text-muted small"><em></em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        1.  Wait time (5=<3min. 4<4 min. 3>6 min. 2<8 min. 1>10 min)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        2.  Associate's uniform and name tag visibility (1= no uniform or head cover / 3 = uniform but no tag / 5=uniform and tag)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        2a. Condition of Associate's uniform (5 = excellent / 3 = good / 1 = poor)
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        3.  Associate smile and stated greeting  (1 = no smile or greeting / 3 = greeted - no smile / 5 = smile and greeting)
                                    <span class="pull-right text-muted small"><em>4 </em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        4.  Associate's tone of voice and body language
                                    <span class="pull-right text-muted small"><em>5</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        5.  Associate's helpfulness, willingness to listen and find solutions
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        6.  Handling of food (1 = improper / 5 = done correctly)
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        7.  Speed of transaction
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                    </a>

                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseEigth">Step 8.  Stock Personnel</a>
                                        </h4>
                                    </div>
                                    <div id="collapseEigth" class="panel-collapse collapse">
                                            <div class="panel-body" style="padding: 0">
                                                <div class="list-group" style="margin: 0;">
                                                    <a  class="list-group-item" style="background-color: #d9edf7;">
                                                        Employee Name: <em>Sonia J.</em>
                                    <span class="pull-right text-muted small"><em></em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        1.  Wait time (5=<3min. 4<4 min. 3>6 min. 2<8 min. 1>10 min)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        2.  Associate's uniform and name tag visibility (1= no uniform or head cover / 3 = uniform but no tag / 5=uniform and tag)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        2a. Condition of Associate's uniform (5 = excellent / 3 = good / 1 = poor)
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        3.  Associate smile and stated greeting  (1 = no smile or greeting / 3 = greeted - no smile / 5 = smile and greeting)
                                    <span class="pull-right text-muted small"><em>4 </em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        4.  Associate's tone of voice and body language
                                    <span class="pull-right text-muted small"><em>5</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        5.  Associate's helpfulness, willingness to listen and find solutions
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        6.  Handling of food (1 = improper / 5 = done correctly)
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        7.  Speed of transaction
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                    </a>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine">Step 9.  Dairy</a>
                                        </h4>
                                    </div>
                                    <div id="collapseNine" class="panel-collapse collapse">
                                            <div class="panel-body" style="padding: 0">
                                                <div class="list-group" style="margin: 0;">
                                                    <a  class="list-group-item" style="background-color: #d9edf7;">
                                                        Employee Name: <em>Sonia J.</em>
                                    <span class="pull-right text-muted small"><em></em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        1.  Wait time (5=<3min. 4<4 min. 3>6 min. 2<8 min. 1>10 min)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        2.  Associate's uniform and name tag visibility (1= no uniform or head cover / 3 = uniform but no tag / 5=uniform and tag)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        2a. Condition of Associate's uniform (5 = excellent / 3 = good / 1 = poor)
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        3.  Associate smile and stated greeting  (1 = no smile or greeting / 3 = greeted - no smile / 5 = smile and greeting)
                                    <span class="pull-right text-muted small"><em>4 </em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        4.  Associate's tone of voice and body language
                                    <span class="pull-right text-muted small"><em>5</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        5.  Associate's helpfulness, willingness to listen and find solutions
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        6.  Handling of food (1 = improper / 5 = done correctly)
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        7.  Speed of transaction
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                    </a>

                                                </div>
                                            </div>

                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTen">Step 10.   General Checkout</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTen" class="panel-collapse collapse">
                                            <div class="panel-body" style="padding: 0">
                                                <div class="list-group" style="margin: 0;">
                                                    <a  class="list-group-item" style="background-color: #d9edf7;">
                                                        Employee Name: <em>Sonia J.</em>
                                    <span class="pull-right text-muted small"><em></em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        1.  Wait time (5=<3min. 4<4 min. 3>6 min. 2<8 min. 1>10 min)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        2.  Associate's uniform and name tag visibility (1= no uniform or head cover / 3 = uniform but no tag / 5=uniform and tag)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        2a. Condition of Associate's uniform (5 = excellent / 3 = good / 1 = poor)
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        3.  Associate smile and stated greeting  (1 = no smile or greeting / 3 = greeted - no smile / 5 = smile and greeting)
                                    <span class="pull-right text-muted small"><em>4 </em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        4.  Associate's tone of voice and body language
                                    <span class="pull-right text-muted small"><em>5</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        5.  Associate's helpfulness, willingness to listen and find solutions
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        6.  Handling of food (1 = improper / 5 = done correctly)
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        7.  Speed of transaction
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                    </a>

                                                </div>
                                            </div>

                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">Step 11.   Customer Service Counter</a>
                                        </h4>
                                    </div>
                                    <div id="collapseEleven" class="panel-collapse collapse">

                                            <div class="panel-body" style="padding: 0">
                                                <div class="list-group" style="margin: 0;">
                                                    <a  class="list-group-item" style="background-color: #d9edf7;">
                                                        Employee Name: <em>Sonia J.</em>
                                    <span class="pull-right text-muted small"><em></em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        1.  Wait time (5=<3min. 4<4 min. 3>6 min. 2<8 min. 1>10 min)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        2.  Associate's uniform and name tag visibility (1= no uniform or head cover / 3 = uniform but no tag / 5=uniform and tag)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        2a. Condition of Associate's uniform (5 = excellent / 3 = good / 1 = poor)
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        3.  Associate smile and stated greeting  (1 = no smile or greeting / 3 = greeted - no smile / 5 = smile and greeting)
                                    <span class="pull-right text-muted small"><em>4 </em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        4.  Associate's tone of voice and body language
                                    <span class="pull-right text-muted small"><em>5</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        5.  Associate's helpfulness, willingness to listen and find solutions
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        6.  Handling of food (1 = improper / 5 = done correctly)
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        7.  Speed of transaction
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                    </a>

                                                </div>
                                            </div>

                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve">Step 12.   Manager</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwelve" class="panel-collapse collapse">

                                            <div class="panel-body" style="padding: 0">
                                                <div class="list-group" style="margin: 0;">
                                                    <a  class="list-group-item" style="background-color: #d9edf7;">
                                                        Employee Name: <em>Sonia J.</em>
                                    <span class="pull-right text-muted small"><em></em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        1.  Wait time (5=<3min. 4<4 min. 3>6 min. 2<8 min. 1>10 min)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        2.  Associate's uniform and name tag visibility (1= no uniform or head cover / 3 = uniform but no tag / 5=uniform and tag)
                                    <span class="pull-right text-muted small"><em>3</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        2a. Condition of Associate's uniform (5 = excellent / 3 = good / 1 = poor)
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        3.  Associate smile and stated greeting  (1 = no smile or greeting / 3 = greeted - no smile / 5 = smile and greeting)
                                    <span class="pull-right text-muted small"><em>4 </em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        4.  Associate's tone of voice and body language
                                    <span class="pull-right text-muted small"><em>5</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        5.  Associate's helpfulness, willingness to listen and find solutions
                                    <span class="pull-right text-muted small"><em>2</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        6.  Handling of food (1 = improper / 5 = done correctly)
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                    </a>
                                                    <a  class="list-group-item">
                                                        7.  Speed of transaction
                                    <span class="pull-right text-muted small"><em>4</em>
                                    </span>
                                                    </a>

                                                </div>
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

    </div>
            </div>


            </fieldset>
            <fieldset class="col-sm-12">
                <legend></legend>

                <div class=" col-xs-12 col-sm-2 col-sm-offset-6">
                    <a href="lw_evaluacion.html" class="col-xs-12 btn btn-default">Close</a>
                </div>
            </fieldset>
        </div>
        <input name="flash_messages" value="1" type="hidden">
        <div class="row">
            <div class="col-md-12 form-error-container"></div>
        </div>

</div>


</div>
</div>
</div>
</div>

<!-- End Form Elements -->
</div>

@stop

@section('js_evaluation')
    {{ HTML::script('assets/plugins/datepicker/bootstrap-datepicker.min.js'); }}
    {{ HTML::script('assets/plugins/timepicker/bootstrap-timepicker.min.js'); }}
    {{ HTML::script('assets/proyecto/js/evaluate.js'); }}
    <script type="text/javascript">
        // Run Select2 plugin on elements
        $(document).ready(function () {
            // Add tooltip to form-controls
            $('.form-control').tooltip();
            // Load example of form validation
          //  LoadBootstrapValidatorScript(DemoFormValidator);
            $.fn.datepicker.defaults.format = "yyyy-mm-dd";
            $('.js-datepicker').datepicker({
                startDate: 'now()',
                onSelect: function (date) {
                    alert(date)
                },
                pickTime: false,
                autoclose: true
            });
           /* $(".timepicker").timepicker({
                showInputs: true
            });*/
        });
    </script>
@stop