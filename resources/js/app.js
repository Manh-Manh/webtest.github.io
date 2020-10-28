$(document).ready(function () {
	//var _token = $('input[name="_token"]').val();
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		}
	});
	// function doSearch()
	// {
	// 	var dataSearch={};
	// 	dataSearch["name"]="is name";
	// 	dataSearch["pas"]="is pass";
		
	// 	var name=this;
	// 	alert(name.id);
	// }	
	$('.cat').click(function () { 
		
		datas=[4,7,2,8,4,8,3,2];
		$.ajaxSetup({
			beforeSend: function(xhr, type) {
				if (!type.crossDomain) {
					xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
				}
			},
			headers: {
				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			}
		});
		$.ajax({
			type: 'POST',
			method:       'POST',
			url:        "{{ url('Home/') }}",
			data:       {searchvalue: datas, _token: '{{csrf_token()}}'},
			
			success:function(data){
				$('#ajax').html(data);
				console.log(data);
			}
		});
		
	});

});
