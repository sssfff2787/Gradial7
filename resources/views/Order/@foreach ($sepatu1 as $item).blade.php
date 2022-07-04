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
        @foreach ($sales2 as $item)
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
                    @if (isset($qtysales[$item->idsepatu2][$j ] ))
                        <?php
                            $subtot += $qtysales[$item->idsepatu2][$j];
                            $totalsize[$j] += $qtysales[$item->idsepatu2][$j];
                        ?>
                            <td class="align-middle  ">
                                {{$qtysales[$item->idsepatu2][$j] }}
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