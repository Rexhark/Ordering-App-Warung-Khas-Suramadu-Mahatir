<div class="col-lg-6">
    <div class="d-flex align-items-center">
        <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('storage/' . $item->image) }}" alt=""
            style="width: 80px;">
        <div class="w-100 d-flex flex-column text-start ps-4">
            <h5 class="d-flex justify-content-between border-bottom pb-2">
                <span>{{ $item->name }}</span>
                <span class="text-primary">Rp{{ $item->price }}</span>
            </h5>
            <div class="d-flex justify-content-between">
                <small class="fst-italic">{{ strip_tags($item->description) }}</small>
                <div>
                    <button class="btn btn-primary rounded-pill py-2 like-btn" data-slug="{{ $item->slug }}"
                        data-liked="{{ $isLiked ? 'true' : 'false' }}">
                        <i class="{{ $isLiked ? 'fas' : 'far' }} fa-heart text-light"></i>
                    </button>

                    <a href="{{ route('food.beli', [$item->slug]) }}">
                        <button class="btn btn-primary rounded-pill py-2">
                            <i class="fas fa-plus text-light"></i>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
