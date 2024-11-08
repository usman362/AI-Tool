<form id="editForm{{ $av->id }}" action="{{ route('sounds.update', $av->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
                    <div class="col-md-12">
                    	<div class="details">
                            <h4><b>Category Name</b></h4>
                            
                            <div class="row">
                                <div class="col-md-12">
                                	<label><b>Category Name</b></label>
                                    <input class="form-control" name="cat_name" value="{{$av->name}}" placeholder="Type Category Name" required="required" />
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="details">
                            <h4><b>Allowed Portals</b></h4>
                           
                            <div class="row form-switch">
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <div>Yekbun
                                            <input class="form-check-input closetogglebtn toggl-input" {{ old('yekbun', $av->is_yekbun) == 1 ? 'checked' : '' }} name="yekbun" type="checkbox">
                                          </div>
                                        </div>
                                   
                                </div>
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <label for="yahala">Yahala</label>
                                            <input class="form-check-input closetogglebtn toggl-input" {{ old('yahala', $av->is_yahala) == 1 ? 'checked' : '' }} id="yahala" name="yahala" type="checkbox">
                                          
                                        </div>
                                </div>
                                
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <label for="facebook">Facebook</label>
                                            <input class="form-check-input closetogglebtn toggl-input" {{ old('facebook', $av->is_facebook) == 1 ? 'checked' : '' }} id="facebook" name="facebook" type="checkbox">
                                          
                                        </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <label for="tiktok">TikTok</label>
                                            <input class="form-check-input closetogglebtn toggl-input" {{ old('tiktok', $av->is_tiktok) == 1 ? 'checked' : '' }} id="tiktok" name="tiktok" type="checkbox">
                                          
                                        </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <label for="insta">Instagram</label>
                                            <input class="form-check-input closetogglebtn toggl-input" {{ old('insta', $av->is_insta) == 1 ? 'checked' : '' }} id="insta" name="insta" type="checkbox">
                                          
                                        </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <label for="twitter">Twitter</label>
                                            <input class="form-check-input closetogglebtn toggl-input" {{ old('twitter', $av->is_twitter) == 1 ? 'checked' : '' }} id="twitter" name="twitter" type="checkbox">
                                          
                                        </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    
                   <!-- row -->
                    </div>
               
            
</form>