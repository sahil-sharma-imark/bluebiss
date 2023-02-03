@include('layouts.admin.header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            @if(session()->has('add'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('add') }}
            </div>
            @endif
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add Question Page</span> </h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form method="POST" action="{{url('backend-que')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-fullname">Select Category</label>
                            <select class="form-select" name="selected_cat" id="selected_cat" aria-label="Default select example" name="que_category" id="que_category">
                              <option>Select Category</option>
                              @foreach($que_categories as $que_categorie)
                              <option value="{{$que_categorie->name}}">{{$que_categorie->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Question</label>
                            <input type="text" class="form-control" name="question" id="question" value="" />
                          </div>
                          
                        </div>
                        <div class="row mb-3">
                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Field Name</label>
                            <input type="text" class="form-control" name="field" id="field" value="" />
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Select Field Type</label>
                            <select class="form-select" name="database_field_type" id="database_field_type" aria-label="Default select example" name="que_cate">
                              <option value="">--Select an Item--</option>
                              <option value="text">Input Field</option>
                              <option value="textarea">Text Area</option>
                              <option value="number">Incremantor</option>
                              <option value="select">Dropdown</option>
                              <option value="redio">Radio Button</option>
                              <option value="checkbox">Check Box</option>
                            </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-md-12">
                            
                            <div id="size">
                              
                            </div>
                          </div>
                        </div>

                        <div class="row mb-3 field_wrapper" id="hide" style="display:none">
                          <div class="col-md-12">
                              <input type="text" name="field_name[]" value=""/>
                              <a href="javascript:void(0);" class="add_button" title="Add field"><img src="{{asset('images/add-icon.png')}}"/></a>
                          </div>
                      </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                      </form>
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            @include('layouts.admin.footer')

<!-- for ckeditor -->






<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button"><img src="{{asset('images/remove-icon.png')}}"/></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

$("body").on('change',"#database_field_type",function(){
  var database_field_type = $("#database_field_type").val();
 if(database_field_type == "text" ||database_field_type == "textarea" || database_field_type == "number" ){
  $("#hide").hide()
 }else{
  $("#hide").show()
 }
})
</script>



