@extends('layouts.app')
@section('content')
			<div class="blog-cover">
				<h1 class="text-center" style="font-family: 'Acme', sans-serif;"><span class="blog-page-title">Gallery</span></h1>
			</div>
			<div class="container">
					<div class="row m-3">
					  @if (isset($gallery))
						@if ($gallery->count() > 0)
						@foreach ($gallery as $item)
						<div class="col-md-4 col-lg-4 col-sm-6 col-xs-6" id="gallery-card">
							<div class="card bg-light">
							<img class="card-img-bottom" src="{{asset('public/storage/GalleryCoverImage/'.$item->cover_image)}}" alt="Card image cap">
							  <div class="card-body">
								<h5 class="card-title border-bottom" style="color:black;text-align:center">
								  {{$item->name}}
								</h5>
								<p class="card-text" style="color:black;text-align:center">Hey</p>
								<a href="{{route('pages.viewgallery',$item->album_id)}}" class="btn btn-primary stretched-link" style="text-align:center">See Photos</a>
							  </div>
							</div>
						</div>
					   @endforeach
						@else
						<div class="container" style="padding-top: 150px;padding-bottom:150px;">
							<h1>No Gallery found</h1>
						</div>
							
						@endif
						
					  @elseif(isset($images))
					  @if ($images->count()>0)
							<div class="container" style="padding:0;">
								<div class="row">
								@foreach ($images as $image)
								<div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle" id="img-parent">
									<img src="{{asset('public/storage/GalleryImages/'.$image->name)}}" class="img-responsive single-image" width="100%">
									<P style="text-align:center">{{$image->title}}</P>
								</div>
								@endforeach  
				
								<div id="myModal" class="modal fade" role="dialog">
										<div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-lg" role="document">
												<div class="modal-content">
										<div class="modal-dialog modal-xl">
										<div class="modal-content">
											<div class="modal-body">
											</div>
										</div>
										</div>
									</div>
									</div>
								</div>
							</div>
							</div>
					  @else
					<div class="container" style="padding-top:150px;padding-bottom:150px;">
						<h1>No Photos found</h1>
					</div>
					  @endif
					  @else
					  <div class="container" style="padding-top:150px;padding-bottom:150px;">
						<h1>Nothing to show</h1>
						</div>
					  @endif
					  
					</div>
				  </div>

@endsection