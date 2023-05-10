@extends('layouts.app')
@section('style')
<style type="text/css">
.switch-field {
	display: flex;
	margin-bottom: 36px;
	overflow: hidden;
}

.switch-field input {
	position: absolute !important;
	clip: rect(0, 0, 0, 0);
	height: 1px;
	width: 1px;
	border: 0;
	overflow: hidden;
}

.switch-field label {
	background-color: #e4e4e4;
	color: rgba(0, 0, 0, 0.6);
	font-size: 14px;
	line-height: 1;
	text-align: center;
	padding: 8px 16px;
	margin-right: -1px;
	border: 1px solid rgba(0, 0, 0, 0.2);
	box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
	transition: all 0.1s ease-in-out;
}

.switch-field label:hover {
	cursor: pointer;
}

.switch-field input:checked + label {
	background-color: #a5dc86;
	box-shadow: none;
}

.switch-field label:first-of-type {
	border-radius: 4px 0 0 4px;
}

.switch-field label:last-of-type {
	border-radius: 0 4px 4px 0;
}
</style>
@endsection
@section('content')
	<div class="row">
		<div class="col-sm-12">
          <div class="card card-primary card-outline">
             <div class="card-header">
              <h5 class="m-0" style="display: inline;">قائمة المشتريين</h5>
            </div>  
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>الصوره</th>
                  <th>الإسم</th>
                  <th>الحاله</th>
                  <th>التحكم</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $value)
	                <tr>
	                  <td>{{$key+1}}</td>
	                  
	                  <td><img alt="Avatar" class="table-avatar" src="{{asset('uploads/customers/avatar/'.$value->avatar)}}" style="border-radius: 50px;width:50px;"></td>
                    <td>{{$value->name_f}} {{$value->name_l}}</td>
                    	      
	                  <td>@if($value->active == 1)<span class=" badge badge-success">نشط</span>@else<span class=" badge badge-danger">حظر</span>@endif</td>
                    </td>
	                  <td>
                      <a href="{{route('editcustomers',$value->id)}}" class="btn btn-primary btn-sm " type="submit"> <i class="fas fa-edit"></i></a>
                     <a href="{{route('deletecustomers',$value->id)}}" class="btn btn-danger btn-sm delete"> <i class="fas fa-trash"></i></a>
	                  </td>
	                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            {{csrf_field()}}
            <!-- /.card-body -->
          </div>
		</div>
	</div>
@endsection

@section('script')
<script type="text/javascript">
    // switch
$(document).on('click','.state', function(){

var data = {
id    : $(this).data('id'),
state    : $(this).data('state'),
_token        : $("input[name='_token']").val()
}


    $.ajax({
    url     : "{{ route('updatecustomerstatus') }}",
    method  : 'post',
    data    : data,
    success : function(s,result){
  
            toastr.success('تم حفظ التعديلات بنجاح')

    }});

});
</script>
@endsection