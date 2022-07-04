<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Live Table Edit Delete Mysql Data using Tabledit Plugin in Laravel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
  </head>
  <body>
    <?php
    extract($data);
    ?>
    
    <div class="container">

      
          <div class="table table-sm table-responsive table-hover table-bordered  mt-3" >
            @csrf
            <style type="text/css">
                /*pengaturan lebar kolom*/
                .t_order1_col0 {
                    width: 1.5cm;
                    height: 1cm;
                     !important;
                }

                .t_order1_col1 {
                    width: 200px !important;
                }

                .t_order1_col2 {
                    width: 90px !important;
                }

                .t_order1_col2x {
                    width: 3cm !important;
                }

                .t_order1_col3 {
                    width: 60px !important;
                }

                .t_order1_col4 {
                    width: 80px !important;
                }

                .t_order1_col3x {
                    min-width: 150px !important;
                }
            </style>
            <table id="editable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                    <th class="text-center t_order1_col0">No </th>
                    <th class="th-sm text-center  t_order1_col1">No Sales Order</th>
                    <th class="th-sm text-center  t_order1_col1">Tanggal</th>
                    <th class="th-sm text-center t_order1_col2x">Nama Toko</th>
                    <th class="th-sm text-center t_order1_col3x">Keterangan</th>

                    <th class="th-sm text-center t_order1_col3x">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 0; ?>
                @foreach ($sales1 as $sales)
                    <tr class="text-center py-1 " style="padding-right:1px" ;>
                        <td class="mr-0 py-1 ">{{ ++$i }}</td>
                        <td class="mr-0 py-1 ">{{ $sales->kode_sales1 }}</td>
                        <td class="mr-0 py-1 ">{{ $sales->tanggal }}</td>
                        <td class="mr-0 py-1 ">{{ $sales->TokoModel->namatoko }}</td>
                        <td class="mr-0 py-1 ">{{ $sales->ketsales }}</td>

                        <td class="text-center py-1 " style="padding-right:1px" ;>
                            <form action="" method="POST">

                                <a class="btnTableOrderShow text-center btn btn-info  btn-sm  mr-0 py-1 "
                                    kode="{{ $sales->kode_sales1 }}">Show</a>
                                <a class="btnTableOrderEdit text-center btn btn-info btn-sm mr-0 py-1"
                                    kode="{{ $sales->kode_sales1 }}">Edit</a>
                                {{-- <a class="btn btn-info" onclick="myFunction()" name="tombolShow">Show</a> --}}
                                {{-- <a class="btEdit btn btn-primary" href="{{url('/')}}/siswa/{{$sales->id_siswa}}/edit">Edit</a> --}}
                                {{-- <a class="btn btn-primary" href="{{url('/')}}/siswa">Edit Baru</a> --}}
                                @csrf

                                <a type="button" kode="{{ $sales->kode_sales1 }}"
                                    class="btnTableOrderDelete px-3 text-center btn btn-danger btn-sm ml-0 mr-0 my-0 py-1 ">
                                    Delete</a>


                            </form>
                        </td>

                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
      
    </div>
  </body>
</html>

<script type="text/javascript">
$(document).ready(function(){
   
  $.ajaxSetup({
    headers:{
      'X-CSRF-Token' : $("input[name=_token]").val()
    }
  });

  $('#editable').Tabledit({
    buttons: {
      edit: {
        class: 'btn btn-sm btn-info',
        html: '<span class="glyphicon glyphicon-pencil"></span>',
        action: 'edit'
      }
    },
    url:'{{ route("tabledit.action") }}',
    dataType:"json",
    columns:{
      identifier:[1, 'kode_sales1'],
      editable:[[2, 'tanggal'], [4, 'ket']]
    },
    restoreButton:false,
    onSuccess:function(data, textStatus, jqXHR)
    {
        // $.each(data,function(){
        // 	var v = this;
        //     console.log(v);
           
        // });
        // console.log("ini di tabelEdit = "+data);
      if(data.action == 'delete')
      {
        $('#'+data.id).remove();
      }
    }
  });


  

});  
</script>