<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="last_name" class="col-lg-4 control-label">Character Name</label>
                        <div class="col-lg-8 form-control-static">{{ $character->character_name }}</div>
                    </div>
                    <div class="form-group">
                        <label for="character_number" class="col-lg-4 control-label">Badge Number</label>
                        <div class="col-lg-8 form-control-static">{{ $character->character_number }}</div>
                    </div>
                    <div class="form-group">
                        <label for="last_played" class="col-lg-4 control-label">Last Played</label>
                        <div class="col-lg-8 form-control-static">{{ $character->last_played }}</div>
                    </div>
                    <div class="form-group">
                        <label for="body" class="col-lg-4 control-label">Body</label>
                        <div class="col-lg-8 form-control-static">{{ $character->body }}</div>
                    </div>
                    <div class="form-group">
                        <label for="build_total" class="col-lg-4 control-label">Total Build</label>
                        <div class="col-lg-8 form-control-static">{{ $character->build_total }}</div>
                    </div>
                    <div class="form-group">
                        <label for="build_unspent" class="col-lg-4 control-label">Unspent Build</label>
                        <div class="col-lg-8 form-control-static">{{ $character->build_unspent }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="stress_level" class="col-lg-4 control-label">Stress Level</label>
                        <div class="col-lg-8 form-control-static">{{ $character->stress_level }}</div>
                    </div>
                    <div class="form-group">
                        <label for="rp_points" class="col-lg-4 control-label">RP Points</label>
                        <div class="col-lg-8 form-control-static">{{ $character->rp_points }}</div>
                    </div>
                    <div class="form-group">
                        <label for="deaths" class="col-lg-4 control-label">Deaths</label>
                        <div class="col-lg-8 form-control-static">{{ $character->deaths }}</div>
                    </div>
                    <div class="form-group">
                        <label for="pre" class="col-lg-4 control-label">Presence</label>
                        <div class="col-lg-8 form-control-static">{{ $character->pre }}</div>
                    </div>
                    <div class="form-group">
                        <label for="end" class="col-lg-4 control-label">Endurance</label>
                        <div class="col-lg-8 form-control-static">{{ $character->end }}</div>
                    </div>
                    <div class="form-group">
                        <label for="foc" class="col-lg-4 control-label">Focus</label>
                        <div class="col-lg-8 form-control-static">{{ $character->foc }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="skills" class="col-lg-4 control-label">Skills</label>
                        <div class="col-lg-8 form-control-static">{{ $character->skills }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>