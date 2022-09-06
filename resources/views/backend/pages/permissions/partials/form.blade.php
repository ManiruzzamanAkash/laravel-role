<div class="row form-group">
    <div class="col-2 justify-content-center d-flex align-items-center"><label for="name">Role Name</label></div>
    <div class="col-4"><input type="text" class="form-control" id="name" value="{{ $permission->name ?? '' }}" name="name" placeholder="Enter a Permission Name"></div>
</div>

<div class="row form-group">
    <div class="col-2 justify-content-center d-flex align-items-center"><label for="name">Guard Name</label></div>
    <div class="col-4"><input type="text" class="form-control" id="guard_name" value="{{ $permission->guard_name ?? ''}}" name="guard_name" placeholder="Enter a Guard Name"></div>
</div>

<div class="row form-group">
    <div class="col-2 justify-content-center d-flex align-items-center"><label for="name">Group Name</label></div>
    <div class="col-4"><input type="text" class="form-control" id="group_name" value="{{ $permission->group_name ?? ''}}" name="group_name" placeholder="Enter a Group Name"></div>
</div>

