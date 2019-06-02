$(function(){
    $('#select-productor').on('change', onSelectProductor);
});

function onSelectProductor() 
{
	var id_product = $(this).val(); 	

	$.get('/experiencias/'+id_product+'/productor/', function (data) 
	{
		var html_table = '<tr id="table-experiencia">';
		for (var i=0; i<data.length; ++i)
			html_table += '<td>'+data[i].id+'</td>'+'<td>'+data[i].nombre_exper+'</td>'+'<td>'+data[i].precio+'</td>'+'<td>'+data[i].estado_exper+'</td>';
		$('table-experiencia').html(html_table);

	});
}