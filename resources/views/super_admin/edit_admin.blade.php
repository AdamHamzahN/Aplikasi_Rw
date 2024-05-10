<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <input type="hidden" name="id_admin" id="id_admin" value="{{$data_admin->id_admin}}">
            <label for="admin">Username Admin</label>
            <input class="form-control"type="text" name="admin" id="admin" value="{{$data_admin->admin}}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control"type="text" name="password" id="password" value="{{$data_admin->password}}">
        </div>
        @csrf
    </div>
</div>
