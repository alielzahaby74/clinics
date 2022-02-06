<div class="row">
    <div class="col-md-12">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="m-0 p-2">
                    @foreach($errors->all() as $error)
                        <li class="h6">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
