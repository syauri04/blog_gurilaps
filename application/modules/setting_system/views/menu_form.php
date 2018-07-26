        <div class="row">
            <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-title no-border">
                  
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <form enctype="multipart/form-data" method="post" action="<?php echo base_url() ?><?php echo $controller."/".$function?>_<?php if(isset($data)){echo"update";}else{echo"add";} ?>">
                <input type="hidden" name="id" value="<?php if(isset($data)){ echo $data->id; } ?>">
                <input type="hidden" name="controller" id="controller" value="<?php echo $controller ?>">
              <input type="hidden" name="method" value="<?php echo $function ?>" id="method">
                <div class="grid-body no-border">
                  <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-8">
                      <div class="form-group">
                        <label class="form-label">Name Menu</label>
                        <div class="controls">
                          <input type="text" name="name_menu" class="form-control" value="<?php if(isset($data)){ echo $data->name_menu; } ?>">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="form-label">Sub Menu</label>
                        <div class="controls">
                          <select required class="form-control" name="sub_menu">
                          <option value="">--select sub menu--</option>
                          <option <?php if($data and $data->sub_menu=='0'){echo"selected";} ?> value="0">none</option>
                          <?php foreach ($submenu as $key) { ?>
                          <option <?php if( $data and $key->id== $data->sub_menu){echo"selected";} ?> value="<?php echo $key->id ?>"><?php echo $key->name_menu ?></option>
                         <?php } ?>
                          </select>
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="form-label">Target</label>
                        <div class="controls">
                          <input type="text" name="target" class="form-control" value="<?php if(isset($data)){ echo $data->target; } ?>">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="form-label">Icon</label>
                        <div class="controls">
                        <select required class="select2 form-control" name="icon">
                          <option value="none">none</option>
                          <?php foreach ($icon as $key) { ?>
                          <option <?php if( $data and  $key->name_icons== $data->icon){echo"selected";} ?> value="<?php echo $key->name_icons ?>"><span class="<?php echo $key->name_icons ?>"></span><?php echo $key->name_icons ?></option>
                         <?php } ?>
                        </select>
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="form-label">Position</label>
                        <div class="controls">
                          <input type="text" name="position" class="form-control" value="<?php if(isset($data)){ echo $data->position; } ?>">
                        </div>
                      </div>

                        <div class="form-group">
                        <div class="controls">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </form>
              </div>
            </div>
          </div>
