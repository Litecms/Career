<div class='col-md-3 col-sm-6'>
     {!! Form::text('name')
     -> required()
     -> label(trans('career::resume.label.name'))
     -> placeholder(trans('career::resume.placeholder.name'))!!}
</div>

<div class='col-md-3 col-sm-6'>
     {!! Form::email('email_id')
     -> label(trans('career::resume.label.email_id'))
     -> placeholder(trans('career::resume.placeholder.email_id'))!!}
</div>

<div class='col-md-3 col-sm-6'>
     {!! Form::tel('mobile')
     -> label(trans('career::resume.label.mobile'))
     -> placeholder(trans('career::resume.placeholder.mobile'))!!}
</div>



<div class='col-md-3 col-sm-6'>
     {!! Form::select('job_id')
     -> options(Career::getJob())
     -> label(trans('career::resume.label.job_id'))
     -> placeholder(trans('career::resume.placeholder.job_id'))!!}
</div>
<div class='col-md-12 col-sm-12'>
     {!! Form::textarea('message')
     -> addClass('html-editor')
     -> label(trans('career::resume.label.message'))
     -> placeholder(trans('career::resume.placeholder.message'))!!}
</div>

<div class='col-md-6 col-sm-12'>
 <label>Resume</label>
     {!!Filer::uploader('resume', @$resume->getUploadURL('resume'),1,'filer::upload','application/pdf')!!}
      {!!Filer::editor('resume', @$resume['resume'])!!}
</div>


<div class='col-md-6 col-sm-12'>
 <label>Photo</label>
     {!!Filer::uploader('image', @$resume->getUploadURL('image'),1)!!}
      {!!Filer::editor('image', @$resume['image'])!!}
</div>
