<div class="p-3 mb-3 bg-light rounded">
  <h4 class="font-italic">About</h4>
  <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
</div>

<div class="p-3">
  <h4 class="font-italic">Archives</h4>
  <div class="row">
    <div class="col-3"><h6>Years</h6></div>
    <div class="col-9"><h6>Months</h6></div>
  </div>
  <div class="row">
    <div class="col-md-3">    
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      @forelse( $archives->groupBy('year') as $year => $data )      
        <a class="nav-link @if($loop->first) active @endif" id="v-pills-{{$year}}-tab" data-toggle="pill" href="#v-pills-{{$year}}" role="tab" aria-controls="v-pills-{{$year}}" 
        aria-selected= @if($loop->first) "true" @else "false" @endif > {{ $year }}</a>
      @empty
        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Empty</a>
      @endforelse
      </div>
    </div>
    <div class="col-md-9">
      <div class="tab-content" id="v-pills-tabContent">
      @forelse( $archives->groupBy('year') as $year => $data )
        <div class="tab-pane fade  @if($loop->first) show active @endif" id="v-pills-{{$year}}" role="tabpanel" aria-labelledby="v-pills-{{$year}}-tab">
          <ol class="list-unstyled mb-0">
            @forelse( $data as $item )
              <li  class="d-flex justify-content-between align-items-center">
                <a href="{{ route( 'blog.index', [ 'year' => $item->year, 'month' => $item->month ] ) }}">
                  {{ $item->monthname."   " }}
                </a>
                <span class="badge badge-pill badge-warning">{{ $item->published }}</span>
              </li>
            @empty
              <li> - Archives is empty - </li>
            @endforelse
          </ol>      
        </div>
      @empty
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">Empty</div>
      @endforelse
      </div>
    </div>
  </div>
</div>

<div class="p-3">
  <h4 class="font-italic">Elsewhere</h4>
  <ol class="list-unstyled">
    <li><a href="#">GitHub</a></li>
    <li><a href="#">Twitter</a></li>
    <li><a href="#">Facebook</a></li>
  </ol>
</div>