<div id="person-images-carousel_{{$carousel_id}}" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($items as $item)
            <div class=
                 @if($loop->first)
                     "carousel-item active">
                @else
                    "carousel-item">
                @endif
                <img src="{{url('storage/'.$item->title}}"
                     class="d-block w-100" alt="person_image">
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#person-images-carousel_{{$carousel_id}}"
            data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#person-images-carousel_{{$carousel_id}}"
            data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
