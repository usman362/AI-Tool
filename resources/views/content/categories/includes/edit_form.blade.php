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
                        
                    
                    </div>
                    
                    
                    
                    
                   
                    
                   <!-- row -->
                    </div>
               
</form>