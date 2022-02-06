<div class="form-group">
    <label for="name">@lang('speciality.name')</label>
    <input id="name" type="text" class="form-control" name="name" value="{{$speciality['name'] ?? old('name')}}">
</div>

<div class="form-group">
    <label for="desc">@lang('speciality.description')</label>
    <textarea id="desc" class="form-control" style="resize: none" name="desc"> {{$speciality['desc'] ?? old('desc')}} </textarea>
</div>

<div class="form-group">
    <label for="photo">@lang('speciality.photo')</label>
    <input id="photo" accept="image/*" class="form-control" type="file" name="photo" value="{{$speciality['photo'] ?? ""}}">
</div>

<div class="form-control">
    <button type="submit" class="btn btn-primary btn-lg btn-block w-100 my-2">@lang('speciality.submit')</button>
</div>
