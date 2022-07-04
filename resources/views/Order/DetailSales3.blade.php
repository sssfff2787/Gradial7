<?php
    extract($data); 
?>
<div class="mb-3">
    <button type="button" class="btn btn-sm pb-1 px-3 my-0 btn-outline-grey black-text waves-effect waves-light" id="print1all">
        <i class="fa fa-print" aria-hidden="true"></i> &nbsp; Print (REKAP BY PO)
    </button>
</div>
<div class="card ">
    <div class="card-body">
        <div class="row mb-2">
			
			<div class="col-sm-12 pl-2">
    			<button type="button" class="tbkembali btn btn-sm unique-color">
                    <i class="fa fa-arrow-left" aria-hidden="true"> </i> &nbsp; Back
                </button>	
                <button type="button" class="btn btn-sm btn-outline-info black-text" id="editso" kode="{{$sales1->kode_sales1}}">
                    <i class="fas fa-pencil-alt" aria-hidden="true"></i> &nbsp; Edit Sales Order
                </button>	
    		</div>
		</div>

        <div class="row pr-0 mr-0">

            <div class="col-4 note note-info pl-4 ml-4 mr-4 pr-4 ">
                <div class="row">
                    <div class="col">
                        No Sales Order 
                    </div>
                    <div class="col">
                        :<strong> {{$sales1->lbnosales}} </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Tanggal Input
                    </div>
                    <div class="col">
                        : {{$sales1->tanggal}}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    Customer
                    </div>
                    <div class="col">
                        :  {{$sales1->TokoModel->namatoko}} 
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        Keterangan
                    </div>
                    <div class="col">
                        : {{$sales1->ketsales}}
                    </div>
                </div>
                <div >
                    <hr> {{-- garis pemisah --}}
                </div>
                <div class="row">
                    <div class="col">
                        Status SO
                    </div>
                    <div class="col">
                        : {{$statusSO}}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Status KIK
                    </div>
                    <div class="col">
                        : {{$statusKIK}}
                    </div>
                </div>
                <tr>
                    <button type="button" class="btn btn-sm btn-outline-warning black-text updatestatus" label="{{$sales1->lbnosales}}" kode="111" statusbaru="on going">
                        <i class="fa fa-check mr-2 orange-text" aria-hidden="true"></i> &nbsp; Set Status : On Going
                    </button>
                </tr>

            </div>
            <div class="col-7   ">
                
                        <table id="tabel" class="table table-sm table-hover table-bordered" cellspacing="0" >
                            
                            <thead>
                                <tr>
                                    <td> No</td>
                                    <td> Keterangan</td>
                                    <td> Pilihan</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> 1 </td>
                                    <td> Print Rekap Order</td>
                                    <td> <a href="#" > <button class=" fas fa-print" id=""></button> </a> </td>
                                </tr>
                                <tr>
                                    <td>2 </td>
                                    <td>Print Rekap Harga Sales order </td>
                                    <td> <a href="#" > <button class=" fas fa-print" id=""></button> </a> </td>
                                </tr>
                                <tr>
                                    <td> 3</td>
                                    <td> Export to Excel </td>
                                    <td> <a href="#" > <button class=" fas fa-file-excel" id=""></button> </a> </td>
                                </tr>
                                <tr>
                                    <td>4 </td>
                                    <td>Print Inpek Report (Bobux) </td>
                                    <td> <a href="#" > <button class=" fas fa-print" id=""></button> </a> </td>
                                </tr>


                            </tbody>
                            
                        </table>
                
            </div>

        </div>
        <br>


        <a href="#" type="button" kode="{{$sales1->kode_sales1}}" class="tambahpobaru btn btn-sm btn-outline-danger btn-md mb-1 "><i class="fa fa-plus mr-2" aria-hidden="true"></i> Input PO Baru</a>
 
        <br>
        <h5><strong>Rincian Sales Order</strong></h5>
        <table class="table table-sm table-hover table-bordered mb-0 mt-2 white">
			<thead class="primary-color white-text">
				<tr>
					<th class="text-center" style="width:35px;">No</th>
					<th class="text-center">No Sales order</th> {{-- sales1->lbnosales  --}}
					<th class="text-center" style="width:90px;">Tanggal</th> {{-- sales1->tanggal  --}}
					<th class="text-center">Kode Artikel</th> {{-- sepatu2->kodeart  --}}
					<th class="text-center">Style</th> {{-- sepatu1->namastyle  --}}
					<th class="text-center">Warna</th>{{-- sepatu2->warna  --}}
                            
                       
                       @for ($i = $sizemin; $i <= $sizemax; $i++)
                            <?php $totalsize[$i] = 0;?> {{-- untuk menampung total di setiap size--}}
                            <th class="text-center">{{$i}}</th>
                       @endfor
                    
                    
                    <th class="text-center" style="width: 70px;">Total</th>
				</tr>
			</thead>
			<tbody>
                <?php $i=0; $total=0;?>
                @foreach ($sales3 as $item)
                    <tr class="">
                        <td class="align-middle text-center  ">
                        {{$i+1}}  
                        </td>
                        <td class="align-middle text-center  ">
                            {{$item->idsepatu2}}
                        </td>
                        <td class="align-middle text-center  ">
                            {{$item->Sales1Model->tanggal}}
                        </td>
                        <td class="align-middle text-center  ">
                            {{$item->Sepatu2Model->kodeart}}
                        </td>
                        <td class="align-middle  ">
                            {{$item->Sepatu2Model->Sepatu1Model->namastyle}}
                            <br>
                            {{-- {{$sepatu1[$i]->namastyle}} ini yang di rubah--}} 
                         
                        </td>
                        <td class="align-middle  ">
                            {{$item->Sepatu2Model->warna}}
                        </td>

                        <?php $subtot = 0; ?>
                        
                        @for ($j = $sizemin; $j <= $sizemax; $j++)
                            @if (isset($qtysales[$item->idsepatu3][$j ] ))
                                <?php
                                    $subtot += $qtysales[$item->idsepatu3][$j];
                                    $totalsize[$j] += $qtysales[$item->idsepatu3][$j];
                                ?>
                                    <td class="align-middle  ">
                                        {{$qtysales[$item->idsepatu3][$j] }}
                                    </td>
                            @else
                            <td class="align-middle  ">
                                {{"" }}
                            </td>
                            @endif 

                         @endfor
                            <?php $total +=$subtot; ?>
                        <td class="align-middle text-center ">
                            <b>
                                {{$subtot}}
                            </b>
                        </td>
                    </tr>
                
                     <?php $i++; ?>                            
                @endforeach


			
					
                <tr>
					<td colspan="6" class="align-middle text-center">
						Total
					</td>
                    
                    @for ($j = $sizemin; $j <= $sizemax; $j++)

                        @if (isset($totalsize[$j]  ))
                        <td class="align-middle  ">
                            {{$totalsize[$j]}}
                        </td>
                        @else
                        <td class="align-middle  ">
                            {{"" }}
                        </td>
                        @endif 

                    @endfor
                    <td class="text-center align-middle">
						<b>{{$total}}</b>
					</td>
					
				</tr>
			</tbody>
		</table>

    </div>
</div>

<script>
    
    // $(document).on('click', '.tbkembali', function(e){
    //     e.preventDefault();
    //     $('#loadingpanel').show();
    //     $('#loadingpanel').hide();

        
    //     $("#isi1").show();
    //     $("#isi2").hide();
    //     $("#isi3").hide();

    // });
</script>