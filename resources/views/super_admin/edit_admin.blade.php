<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <input type="hidden" name="id_admin" id="id_admin" value="{{$data_admin->id_admin}}">
            <label for="username">Username</label>
            <input class="form-control"type="text" name="username" id="username" value="{{$data_admin->username}}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control"type="text" name="password" id="password">
        </div>
        <label for="role">Role :</label>
        <select class="form-control" name="role" id="role"
            value="{{ $data_admin->role }}" required>
            <option value='Super Admin' {{ $data_admin->role == 'Super Admin' ? 'selected' : '' }}>Super Admin</option>
            <option value='Admin' {{ $data_admin->role == 'Admin' ? 'selected' : '' }}>Admin</option>
        </select>
        @csrf
    </div>
</div>
