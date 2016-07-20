@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('career::job.name') !!} <small> {!! trans('cms.manage') !!} {!! trans('career::job.names') !!}</small>
@stop

@section('title')
{!! trans('career::job.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('cms.home') !!} </a></li>
    <li class="active">{!! trans('career::job.names') !!}</li>
</ol>
@stop

@section('entry')
<div class="box box-warning" id='career-job-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="career-job-list" class="table table-striped table-bordered data-table">
    <thead  class="list_head">
        <th>{!! trans('career::job.label.title')!!}</th>
        <th>{!! trans('career::job.label.job_type')!!}</th>
        <th>{!! trans('career::job.label.location')!!}</th>
        <th>Published</th>
    </thead>
    <thead  class="search_bar">
        <th>{!! Form::text('search[title]')->raw()!!}</th>

        <th>{!! Form::select('search[job_type]')
                ->options(['' => 'All'] + trans('career::job.options.job_type'))
                ->raw()!!}</th>
        <th>{!! Form::text('search[location]')->raw()!!}</th>
          <th>{!! Form::select('search[published]')
                ->options(['' => 'All','Yes' => 'Published', 'No' => 'Unpublished'])
                ->raw()!!}</th>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#career-job-entry', '{!!trans_url('admin/career/job/0')!!}');
    oTable = $('#career-job-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/career/job') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#career-job-list .search_bar input, #career-job-list .search_bar select').each(
                function(){
                    aoData.push( { 'name' : $(this).attr('name'), 'value' : $(this).val() } );
                }
            );
            app.dataTable(aoData);
            $.ajax({
                'dataType'  : 'json',
                'data'      : aoData,
                'type'      : 'GET',
                'url'       : sSource,
                'success'   : fnCallback
            });
        },

        "columns": [
                    {data :'title'},
                    {data :'job_type'},
                    {data :'location'},
                    {data :'published'},
        ],
        "pageLength": 25
    });

    $('#career-job-list tbody').on( 'click', 'tr', function () {


        if ($(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        } else {
            oTable.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }


        var d = $('#career-job-list').DataTable().row( this ).data();

        $('#career-job-entry').load('{!!trans_url('admin/career/job')!!}' + '/' + d.id);
    });

    $("#career-job-list .search_bar input, #career-job-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });
    $("#career-job-list .search_bar select, #posted_on").on('change', function (e) {
        e.preventDefault();
        oTable.api().draw();
    });
});
</script>
@stop

@section('style')
@stop
