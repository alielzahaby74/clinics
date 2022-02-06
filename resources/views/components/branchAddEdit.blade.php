    <div class="form-group">
        <label for="name">@lang('branch.name')</label>
        <input type="text" class="form-control" name="name" value="{{$branch['name'] ?? ""}}">
    </div>

    <div class="form-group">
        <label for="address">@lang('branch.address')</label>
        <textarea class="d-block form-control" style="resize: none" name="address">{{$branch['address'] ?? ""}}</textarea>
    </div>

    <div class="form-control">
        <button type="submit" class="btn btn-primary btn-lg btn-block w-100 my-2">@lang('branch.submit')</button>
    </div>
