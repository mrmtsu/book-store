<div class="card mt-3" style="width: 350px;">
  <button type="button" class="btn" data-toggle="modal" data-target="#modalQuickView" style="margin:0;padding:0;">
    @if(!empty($article->image))
      <img src="{{ asset('storage/images'.$article->image) }}" style="width:350px; height:380px;">
    @else
      <div class='image-wrapper'><img class='book-image' src="{{ asset('images/dummy.png') }}"></div>
    @endif
  </button>
  
  <div class="card-body d-flex flex-row">
    <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="text-dark">
      <i class="fas fa-user-circle fa-3x mr-1" style="color: gray;"></i>
    </a>
    <div>
      <div class="font-weight-bold">
        <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="text-dark">
          {{ $article->user->name }}
        </a>
      </div> 
      <div class="font-weight-lighter" style="font-size: 10px;">
        <i class="far fa-clock pr-2"></i>{{ $article->created_at->format('Y/m/d H:i') }}
      </div>
    </div>
    @if( Auth::id() === $article->user_id )
      <!-- dropdown -->
      <div class="ml-auto card-text">
        <div class="dropdown">
          <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <button type="button" class="btn btn-link text-muted m-0 p-2">
              <i class="fas fa-ellipsis-v"></i>
            </button>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route("articles.edit", ['article' => $article]) }}">
              <i class="fas fa-pen mr-1"></i>記事を編集する
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $article->id }}">
              <i class="fas fa-trash-alt mr-1"></i>記事を削除する
            </a>
          </div>
        </div>
      </div>
      <!-- dropdown -->

      <!-- modal -->
      <div id="modal-delete-{{ $article->id }}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form method="POST" action="{{ route('articles.destroy', ['article' => $article]) }}">
              @csrf
              @method('DELETE')
              <div class="modal-body">
                {{ $article->title }}を削除します。よろしいですか？
              </div>
              <div class="modal-footer justify-content-between">
                <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                <button type="submit" class="btn btn-danger">削除する</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- modal -->
    @endif
  </div>
  <div class="card-body pt-0 pb-2">
    <h3 class="h4 card-title">
      <a class="text-dark" href="{{ route('articles.show', ['article' => $article]) }}"> 
        {{ $article->title }}
      </a>
    </h3>
    <hr>
    <div class="card-text">
      {!! nl2br(e( $article->body )) !!}
    </div>
  </div>
  <div class="card-body pt-0 pb-2 pl-3">
    <div class="card-text">
      <article-like
        :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))'
        :initial-count-likes='@json($article->count_likes)'
        :authorized='@json(Auth::check())'
        endpoint="{{ route('articles.like', ['article' => $article]) }}"
      >
      </article-like>
    </div>
  </div>
  @foreach($article->tags as $tag)
    @if($loop->first)
      <div class="card-body pt-0 pb-4 pl-3">
        <div class="card-text line-height">
    @endif
          <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted"　style="background: aliceblue;　font-size: 10px;　letter-spacing: .12em; border-radius: 15px;">
            {{ $tag->hashtag }}
          </a>
    @if($loop->last)
        </div>
      </div>
    @endif
  @endforeach
</div>





<!-- Modal: modalQuickView -->
<div class="modal fade" id="modalQuickView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-5">
            <!--Carousel Wrapper-->
            <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails"
              data-ride="carousel">
              <!--Slides-->
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                  <img class="d-block w-100"
                    src="{{ asset('storage/images'.$article->image) }}"
                    alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100"
                    src="{{ asset('storage/images'.$article->image) }}"
                    alt="Third slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100"
                    src="{{ asset('storage/images'.$article->image) }}"
                    alt="Third slide">
                </div>
              </div>
              <!--/.Slides-->
              <!--Controls-->
              <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
              <!--/.Controls-->
              <ol class="carousel-indicators">
                <li data-target="#carousel-thumb" data-slide-to="0" class="active">
                  <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(23).jpg" width="60">
                </li>
                <li data-target="#carousel-thumb" data-slide-to="1">
                  <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(24).jpg" width="60">
                </li>
                <li data-target="#carousel-thumb" data-slide-to="2">
                  <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(25).jpg" width="60">
                </li>
              </ol>
            </div>
            <!--/.Carousel Wrapper-->
          </div>
          <div class="col-lg-7">
            <h2 class="h2-responsive product-name">
              <a class="text-dark" href="{{ route('articles.show', ['article' => $article]) }}"> 
                <strong>{{ $article->title }}</strong>
              </a>
            </h2>

            <!--Accordion wrapper-->
            <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

              <!-- Accordion card -->
              <div class="card">

                <!-- Card header -->
                <div class="card-header" role="tab" id="headingOne1">
                  <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
                    aria-controls="collapseOne1">
                    <h5 class="mb-0">
                      Review<i class="fas fa-angle-down rotate-icon"></i>
                    </h5>
                  </a>
                </div>

                <!-- Card body -->
                <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                  data-parent="#accordionEx">
                  <div class="card-body">
                    {!! nl2br(e( $article->body )) !!}
                  </div>
                </div>

              </div>
              <!-- Accordion card -->

              <!-- Accordion card -->
              <div class="card">

                <!-- Card header -->
                <div class="card-header" role="tab" id="headingTwo2">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
                    aria-expanded="false" aria-controls="collapseTwo2">
                    <h5 class="mb-0">
                      Tag <i class="fas fa-angle-down rotate-icon"></i>
                    </h5>
                  </a>
                </div>

                <!-- Card body -->
                <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
                  data-parent="#accordionEx">
                  <div class="card-body">
                  @foreach($article->tags as $tag)
                    @if($loop->first)
                      <div class="card-body pt-0 pb-4 pl-3">
                        <div class="card-text line-height">
                    @endif
                          <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
                            {{ $tag->hashtag }}
                          </a>
                    @if($loop->last)
                        </div>
                      </div>
                    @endif
                  @endforeach
                  </div>
                </div>

              </div>
              <!-- Accordion card -->

            </div>
            <!-- Accordion wrapper -->


            <!-- Add to Cart -->
            <div class="card-body">
              <div class="row">
                <div class="card-body pt-0 pb-2 pl-3">
                  <div class="card-text">
                    <article-like
                      :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))'
                      :initial-count-likes='@json($article->count_likes)'
                      :authorized='@json(Auth::check())'
                      endpoint="{{ route('articles.like', ['article' => $article]) }}"
                    >
                    </article-like>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.Add to Cart -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>





