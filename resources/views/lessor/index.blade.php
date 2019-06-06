@extends('layouts.app')
@section('content')

  @include('partials.navbar')

</div>
</nav>
  <section class="intro-single">
    <div class="container">
      <div class="row">
        
        @include('partials.message')
        <div class="col-md-12 col-lg-12">

          @if(! $houses->count())
            <div class="alert alert-danger">
              <strong>No Record Found</strong>
            </div>
          @else

            @include('partials.lessor.table')

          @endif

          <div class="row">
            <div class="col-sm-12" style="margin-bottom: 250px">
              <nav class="pagination-a">
                {{ $houses->links() }}
              </nav>
            </div>
          </div>

        </div>
        </div>
        </div>
  </section>


@endsection