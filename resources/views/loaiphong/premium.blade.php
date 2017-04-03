@extends('loaiphong')

@section('CarouselRoom')
	<div id="CarouselRoom" class="carousel slide">
		<ol class="carousel-indicators" style="display: inline-block;"> 
		<li data-target="#CarouselRoom" data-slide-to="0" class="active"></li> 
		<li data-target="#CarouselRoom" data-slide-to="1"></li> 
		<li data-target="#CarouselRoom" data-slide-to="2"></li> 
		<li data-target="#CarouselRoom" data-slide-to="3"></li> 
		</ol>

		<div class="carousel-inner"> 
			<div class="item active">
				<img src="{{ asset('public/img/room/premium1.jpg')}}" alt="premium1" class="img-responsive">
			</div> 
			<div class="item">
				<img src="{{ asset('public/img/room/premium2.jpg')}}" alt="premium2" class="img-responsive">
			</div> 
			<div class="item">
				<img src="{{ asset('public/img/room/premium3.jpg')}}" alt="premium3" class="img-responsive">
			</div>
			<div class="item">
				<img src="{{ asset('public/img/room/premium4.jpg')}}" alt="premium4" class="img-responsive">
			</div> 

		</div>
		<a class="left carousel-control" href="#CarouselRoom" role="button" data-slide="prev">
			<span class="icon-prev" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#CarouselRoom" role="button" data-slide="next">
			<span class="icon-next" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
@stop

@section('RoomDetails')
	<h2 class="text-LoaiPhong text-center">Phòng Premium - Villa</h2>				
	<?php														
        $room = DB::table('loai_phong')->where('tenlp','Premium-Villa')->first();                     
	?>			
	<table class="table-hover  table-LoaiPhong">
		<tr>
			<th>
				<i class="glyphicon glyphicon-menu-right" ></i>
				Diện tích
			</th>
			<td>
				<?php 
					echo $room->dientich . " m<sup>2</sup>";
				?>						 
			</td>						
		</tr>
		<tr>
			<th>
				<i class="glyphicon glyphicon-menu-right" ></i>
				Giường
			</th>
			<td>
				<?php 
					echo $room->giuong;
				?>	
			</td>
		</tr>
		<tr>
			<th>
				<i class="glyphicon glyphicon-menu-right" ></i>
				Sức chứa
			</th>
			<td>
				<?php 
					echo $room->succhua . " khách";
				?>	
			</td>
		</tr>
		<tr>
			<th>
				<i class="glyphicon glyphicon-menu-right" ></i>
				Giường phụ
			</th>
			<td>650.000VND/giường/đêm</td>
		</tr>
	</table>
	<p style="margin-top: 20px">
	Tại Terracotta Đà Lạt, chúng tôi còn phục vụ các loại phòng riêng tại Villas dành cho gia đình nhỏ hay những nhóm du khách riêng lẻ muốn tận hưởng không gian riêng biệt với loại phòng Premium bao gồm đầy đủ các tiện nghi sang trọng, đẳng cấp ngay trong mỗi căn Villa khác nhau tùy theo nhu cầu của khách hàng. 
	</p>
@stop
