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

                                <div class="col-md-12">
                                	<label><b>Description</b></label>
                                    <input class="form-control" name="cat_descr" value="{{$av->description}}" placeholder="Type Description"  />
                                </div>
                            </div>
                            
                        </div>
                        
                        
                    </div>
                    
                   <!-- row -->
                    </div>
               
            
</form>