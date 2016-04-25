@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">管理评论</div>

        <div class="panel-body">
        
        <table class="table table-striped">
          <tr class="row">
            <th class="col-lg-2">User</th>
            <th class="col-lg-4">Address</th>
	    <th class="col-lg-4">Content</th>
            <th class="col-lg-2">Page</th>
            <th class="col-lg-1">编辑</th>
            <th class="col-lg-1">确认</th>
            <th class="col-lg-1">删除</th>
          </tr> 
          @forelse ($comments as $comment)
	   
           @can ('update-comment',$comment)
	     <tr class="row">
              <td class="col-lg-2">
   
                {{ $comment->nickname }}
               <br>
                {{ $comment->email }}
              </td>
	      <td class="col-lg-4" >
                {{ $comment->website }}
              </td>
              <td class="col-lg-4">
                {{ $comment->content }}
              </td>
              <td class="col-lg-4">
                <a href="{{ URL('pages/'.$comment->page_id) }}" target="_blank">
                  {{ App\Page::find($comment->page_id)->title }}
                </a>
              </td>
              <td class="col-lg-1">
                <a href="{{ URL('admin/comments/'.$comment->id.'/edit') }}" class="btn btn-success">编辑</a>
              </td>
              <td class="col-lg-1">
                <form action="{{ URL('admin/comments/'.$comment->id) }}" method="POST" style="display: inline;">
                  <input name="_method" type="hidden" value="PUT">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
		  <input type="hidden" name="is_active" value="{{ 1 }}">
                  <button type="submit" class="btn  btn-info">确认</button>
                </form>
              </td>
              <td class="col-lg-1">
                <form action="{{ URL('admin/comments/'.$comment->id) }}" method="POST" style="display: inline;">
                  <input name="_method" type="hidden" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="btn btn-danger">删除</button>
                </form>
              </td>
            </tr>
        
	 
         @endcan
	  @empty
	
	  <div class="alert alert-danger">
		<strong>Whoops!</strong> There is no order.<br><br>
							
	  </div>
          
          @endforelse
         
        </table>
	
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
