<form id="editForm{{ $av->id }}" action="{{ url('series/categories/update', $av->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <input type="hidden" name="showEditFormModal{{ $av->id }}" value="1">
 
    <div class="row">
                    
                   
                    
                    <div class="col-md-12">
                    
                    	
                    	<div class="details">
                            <h4><b>Category Name</b></h4>
                            
                            <div class="row">
                                <div class="col-md-12">
                                	<label><b>Category Name</b></label>
                                    <input class="form-control" name="cat_name" placeholder="Type Category Name" value="{{$av->name}}" required="required" />
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                	<label><b>Description</b></label>
                                    <input class="form-control" name="cat_descr" value="{{$av->description}}" placeholder="Type Category Description"  />
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="details"
                            <h4><b>Allowed Portals</b></h4>
                           
                            <div class="row form-switch">
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <div>Yekbun

                                            <input  {{ $av->is_yekbun == 1 ? "checked='checked'" : "" }}  class="form-check-input closetogglebtn toggl-input" name="yekbun" type="checkbox">
                                          </div>
                                        </div>
                                   
                                </div>
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <label for="yahala">Yahala</label>
                                            <input {{ $av->is_yahala == 1 ? 'checked="checked"' : '' }} class="form-check-input closetogglebtn toggl-input" id="yahala" name="yahala" type="checkbox">
                                          
                                        </div>
                                </div>
                                
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <label for="facebook">Facebook</label>
                                            <input {{ $av->is_facebook == 1 ? 'checked="checked"' : '' }} class="form-check-input closetogglebtn toggl-input"  id="facebook" name="facebook" type="checkbox">
                                          
                                        </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <label for="tiktok">TikTok</label>
                                            <input  {{ $av->is_tiktok == 1 ? 'checked="checked"' : '' }} class="form-check-input closetogglebtn toggl-input" id="tiktok" name="tiktok" type="checkbox">
                                          
                                        </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <label for="insta">Instagram</label>
                                            <input {{ $av->is_insta == 1 ? 'checked="checked"' : '' }} class="form-check-input closetogglebtn toggl-input" id="insta" name="insta" type="checkbox">
                                          
                                        </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <label for="twitter">Twitter</label>
                                            <input {{ $av->is_twitter == 1 ? 'checked="checked"' : '' }} class="form-check-input closetogglebtn toggl-input" id="twitter" name="twitter" type="checkbox">
                                          
                                        </div>
                                </div>
                                
                                
                            </div>
                        </div>
                        
                       
                    
                    </div>
                    
                    
                    
                    
                   
                    
                   <!-- row -->
                    </div>
               
</form>