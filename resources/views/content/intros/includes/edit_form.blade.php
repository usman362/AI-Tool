<form id="editForm{{ $av->id }}" action="{{ route('intros.update', $av->id) }}" method="post" enctype="multipart/form-data">
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
                                    <input class="form-control" name="cat_name" value="{{$av->name}}" placeholder="Type Category Name" required="required" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                	<label><b>Category Description</b></label>
                                    <input class="form-control" name="cat_description" value="{{$av->description}}" placeholder="Type Category Description"  />
                                </div>
                            </div>
                            
                        </div>
                        
                        
                    </div>
                    
                   <!-- row -->
                    </div>
               
</form>