<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="last_name" class="col-lg-4 control-label">Last Name</label>
                        <div class="col-lg-8 form-control-static">{{ $player->last_name }}</div>
                    </div>
                    <div class="form-group">
                        <label for="first_name" class="col-lg-4 control-label">First Name</label>
                        <div class="col-lg-8 form-control-static">{{ $player->first_name }}</div>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="email" class="col-lg-4 control-label">Email</label>
                        <div class="col-lg-8 form-control-static">{{ $player->email }}</div>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="address1" class="col-lg-4 control-label">Address 1</label>
                        <div class="col-lg-8 form-control-static">{{ $player->address1 }}</div>
                    </div>
                    <div class="form-group">
                        <label for="address2" class="col-lg-4 control-label">Address 2</label>
                        <div class="col-lg-8 form-control-static">{{ $player->address2 }}</div>
                    </div>
                    <div class="form-group">
                        <label for="city" class="col-lg-4 control-label">City</label>
                        <div class="col-lg-8 form-control-static">{{ $player->city }}</div>
                    </div>
                    <div class="form-group">
                        <label for="state" class="col-lg-4 control-label">State</label>
                        <div class="col-lg-8 form-control-static">{{ $player->state }}</div>
                    </div>
                    <div class="form-group">
                        <label for="zip" class="col-lg-4 control-label">Zip</label>
                        <div class="col-lg-8 form-control-static">{{ $player->zip }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="home_phone" class="col-lg-4 control-label">Home Phone</label>
                        <div class="col-lg-8 form-control-static">{{ $player->home_phone }}</div>
                    </div>
                    <div class="form-group">
                        <label for="cell_phone" class="col-lg-4 control-label">Cell Phone</label>
                        <div class="col-lg-8 form-control-static">{{ $player->cell_phone }}</div>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="emergency_contact_name" class="col-lg-4 control-label">Emergency Contact Name</label>
                        <div class="col-lg-8 form-control-static">{{ $player->emergency_contact_name }}</div>
                    </div>
                    <div class="form-group">
                        <label for="emergency_contact_phone" class="col-lg-4 control-label">Emergency Contact Phone</label>
                        <div class="col-lg-8 form-control-static">{{ $player->emergency_contact_phone }}</div>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="service_points" class="col-lg-4 control-label">Service Points</label>
                        <div class="col-lg-8 form-control-static">{{ $player->service_points }}</div>
                    </div>
                    <div class="form-group">
                        <label for="event_credits" class="col-lg-4 control-label">Event Credits</label>
                        <div class="col-lg-8 form-control-static">{{ $player->event_credits }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>