{{-- @extends('siswa.layout')

@section('content') --}}

<?php 
  // echo $data['jenisinputIndex']." <br>"; 
  extract($data);
  
?>


<!-- Default form contact -->
{{-- <form  id="cobaupload" method="POST" class="text-center border border-light p-2" enctype="multipart/form-data" action="{{ URL::to("$url") }}"> --}}
<form  id="cobaupload"  class="text-center border border-light p-2" enctype="multipart/form-data" >
    @csrf
    <meta name="_token" content="{{ csrf_token() }}"/>
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <p class="h4 mb-4">Tambah Data Siswa</p>

    <?php 
    //untuk Edit
    // $id_siswa = $id_siswa?$id_siswa : '';
    ?>
    <input type="hidden" id="id_siswa"  name="id_siswa" class="form-control mb-4" placeholder="ID Siswa">
    <input type="text" id="nama" name="nama" class="form-control mb-4" placeholder="Name">
    <input type="text" id="alamat" name="alamat" class="form-control mb-4" placeholder="Alamat">
    <input type="text" id="no_hp" name="no_hp" class="form-control mb-4" placeholder="Telepon">
    <div class="md-form">
        <input placeholder="Selected date" type="text" id="date-picker-example3" name="tanggal" class="form-control ">
        <label for="date-picker-example" class="active ">Try me...</label>
      </div>

    
        <div class="custom-file ">
            <label for="foto" class="custom-file-label"> Pilih File... </label>
            <input class="custom-file-input" type="file" id="foto" name="file">
        </div>
    
    
    <!-- Subject -->
    {{-- <div class="custom-file "> --}}
    <label>Status</label>
   
    <select class="browser-default custom-select mb-4">
        <option value="" disabled>Choose option</option>
        <option value="Aktif" > Aktif</option>
        <option value="Tidak Aktif" selected> Tidak Aktif</option>
        
    </select>
    {{-- </div> --}}
    <input type="hidden" id="jenisinput"  name="jenisinput" class="form-control mb-4" placeholder="jenisinput" value="">
    

    <!-- Send button -->
    <button class="btn btn-info btn-block" type="submit">Save</button>
    <button type="button" id= 'simpanModal' class="btn btn-primary">Save changes</button>

</form>

{{-- @endsection --}}


<!-- Default form contact -->

<script>
 $('#date-picker-example3').pickadate({
    showMonthsShort: true,
    format: "d mmm yyyy",
    min: new Date(),
    max: +270,
    footer: false,
    //agar tidak terkurung didalam modal
    container: '#content_index',
})

</script>