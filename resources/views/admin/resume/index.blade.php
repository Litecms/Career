@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('career::resume.name') !!} <small> {!! trans('cms.manage') !!} {!! trans('career::resume.names') !!}</small>
@stop

@section('title')
{!! trans('career::resume.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('cms.home') !!} </a></li>
    <li class="active">{!! trans('career::resume.names') !!}</li>
</ol>
@stop

@section('entry')
<div class="box box-warning" id='career-resume-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="career-resume-list" class="table table-striped table-bordered data-table">
    <thead  class="list_head">
        <th>{!! trans('career::resume.label.name')!!}</th>
        <th>{!! trans('career::resume.label.email_id')!!}</th>
        <th>{!! trans('career::resume.label.mobile')!!}</th>
        <th>{!! trans('career::resume.label.job_id')!!}</th>
    </thead>
    <thead  class="search_bar">
        <th>{!! Form::text('search[name]')->raw()!!}</th>
        <th>{!! Form::text('search[email_id]')->raw()!!}</th>
        <th>{!! Form::text('search[mobile]')->raw()!!}</th>
        <th>{!! Form::select('search[job_id]')
                ->options(['' => 'All'] + Career::getJob())
                ->raw()!!}</th>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#career-resume-entry', '{!!trans_url('admin/career/resume/0')!!}');
    oTable = $('#career-resume-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! trans_url('/admin/career/resume') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#career-resume-list .search_bar input, #career-resume-list .search_bar select').each(
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
            {data :'name'},
            {data :'email_id'},
            {data :'mobile'},
            {data :'job_id'},
        ],
        "pageLength": 25
    });

    $('#career-resume-list tbody').on( 'click', 'tr', function () {


        if ($(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        } else {
            oTable.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }

        var d = $('#career-resume-list').DataTable().row( this ).data();

        $('#career-resume-entry').load('{!!trans_url('admin/career/resume')!!}' + '/' + d.id);
    });

    $("#career-resume-list .search_bar input, #career-resume-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });
     $("#career-resume-list .search_bar select, #posted_on").on('change', function (e) {
        e.preventDefault();
        oTable.api().draw();
    });
});
</script>
@stop

@section('style')
@stop
