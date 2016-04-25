@extends('_layouts.default')

@section('content')
  <h4>
    <a href="/home">⬅️返回首页</a>
  </h4>

  <div id="comments" style="margin-bottom: 100px;">

    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div id="new">
      <form action="{{ URL('apply/store') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="form-group">
          <label>Title</label>
          <input type="text" name="title" class="form-control" style="width: 300px;" required="required">
        </div>
        <div class="form-group">
          <label>Slug</label>
          <input type="text" name="slug" class="form-control" style="width: 300px;" required="required">
        </div>
        <div class="form-group">
          <label>Body</label>
           <textarea name="body" id="newFormContent" rows="10" class="form-control" required="required"></textarea>
        </div>
        
        <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
      </form>
    </div>



    
@endsection
