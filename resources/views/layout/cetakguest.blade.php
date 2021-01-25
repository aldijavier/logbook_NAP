<!DOCTYPE html>
<html lang="en">
    <head>
        <style type="text/css" media="print">
            @page port {size: portrait;}
            @page land {size: landscape;}
            .portrait {page: port;}
            .landscape {page: land;}
            </style>
        <title> GUESTBOOK-NAP</title>
    </head>
<body class="landscape">
    <div class="card-header table-responsive">
<table  class="landscape table table-hover table-striped table-bordered table-sm" style="width:auto;  border: 1px solid black; padding:12px;" >                   
    <thead class="thead-dark">
        <tr>
            <th class="text-center" width="30" style="white-space: nowrap !important;background-color:#336699; border: 1px solid black;">No </th>
            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699; border: 1px solid black;">Date In</th>
            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699; border: 1px solid black;">Date Out</th>
            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699; border: 1px solid black;">Nama </th>
            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699; border: 1px solid black;">Telephone </th>
            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699; border: 1px solid black;">Company </th>
            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699;border: 1px solid black;">Email</th>
            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699; border: 1px solid black;">Activity</th>
            <th class="text-center" scope="col"  style="white-space: nowrap !important;background-color:#336699;border: 1px solid black;">No Rack </th>
            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699; border: 1px solid black;">No Loker</th>
            <th  class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699; border: 1px solid black;">Foto </th>
            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699; border: 1px solid black;">Durasi </th>
            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699; border: 1px solid black;">Lokasi </th>
            <th class="text-center" scope="col" style="white-space: nowrap !important;background-color:#336699; border: 1px solid black;">Remarks </th>
        </tr>
    </thead>
        <tbody>
@foreach ($guests as $guest)
    <tr>
      

        <td style="  border: 0.1px solid;">{{ $loop->iteration}} </td>
        <td style=" border: 0.1px solid;">{{$guest->datein}}</td>
        <td style="  border: 0.1ch solid;">{{$guest->dateout}}</td>
        <td style="  border: 0.1px solid;">{{$guest->name}}</td>
        <td style="  border: 0.1px solid;">{{$guest->telephone}}</td>
        <td style="  border: 0.1px solid;">{{$guest->company}}</td>
        <td style="  border: 0.1px solid;">{{$guest->email}}</td>
        <td style="  border: 0.1px solid;">{{$guest->activity}}</td>
        <td style="  border: 0.1px solid;">{{$guest->noRack}}</td>
        <td style="  border: 0.1px solid;">{{$guest->noLoker}}</td>
        <td style="  border: 0.1px solid;">
            @if($guest->foto)
                    <img src="/image/{{$guest->foto}}" width="60" height="70" alt="" ></a>     
                    @else
                <i>NULL</i>
            @endif
        </td>
        <td style="white-space: nowrap !important; border: 0.1px solid;">{{$guest->durasi}}</td>
        <td style="  border: 0.1px solid;">{{$guest->lokasi}}</td>
        <td style="  border: 0.1px solid;">{{$guest->remarks}}</td>
      
@endforeach
   </tr>  
</tbody>
</table>

<span>Jumlah Data : {{ $guests->count() }} </span>

</div>

<script type="text/javascript">
    window.print();
</script>
</body>
</html>