<div>
    <div class="card-header text-center">
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
        @endif
    </div>
</div>
