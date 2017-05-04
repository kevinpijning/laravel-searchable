<form action="{{ \Request::getRequestUri() }}">
    <div class="input-group">
        <input type="text" class="form-control input-sm m-b-xs" name="search"
               placeholder="Zoeken" value="{{ \Illuminate\Support\Facades\Request::input('search') }}">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></button>
        </span>
    </div>
</form>