@include('layouts.admin.header')
<!-- / Navbar -->
<!-- Content wrapper -->
<div class="content-wrapper">
  @if(session()->has('add'))
  <div class="alert alert-success" style="text-align: center;">
    {{ session()->get('add') }}
  </div>
  @endif
  @if(session()->has('destroy'))
  <div class="alert alert-success" style="text-align: center;">
    {{ session()->get('destroy') }}
  </div>
  @endif

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span style="color:#47bbd0!important" class="text-muted fw-light">All/</span> Questions</h4>
    <!-- Basic Layout -->
    <!-- <div class="row mb-3">
      <div class="col-md-12">
        <a href="{{url('add-pages')}}" class="btn btn-primary" style="float:right!important">Add New</a>
      </div>
    </div> -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row mb-3">
              <div class="col-xl">
                <label class="form-label" for="basic-default-company">Get questions according to services</label>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-xl">
                <select name="cleaning_radio" id="cleaning_radio" class="cleaning_radio js-example-templating form-control form-select" style="border: 1.3px solid #D4D4D8!important;">
                  <?php
                    if(isset($_GET['name'])){
                      $getselect = $_GET['name'];
                    }else{
                      $getselect = '';
                    }
                  ?>
                  @if(isset($_GET['name']) == NULL)
                  <option>-----Select service-----</option>
                  @foreach($all_category as $select_cat)
                  <option value="{{$select_cat->name}}" {{ ( $select_cat->name == $getselect) ? 'selected' : '' }}>{{$select_cat->name}}</option>
                  @endforeach
                  @else

                  @foreach($all_category as $select_cat)
                  <option value="{{$select_cat->name}}" {{ ( $select_cat->name == $getselect) ? 'selected' : '' }}>{{$select_cat->name}}</option>
                  @endforeach
                  @endif
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @if(isset($cat_id))
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>Questions</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @if(sizeof($select_questions)>0)
            @foreach($select_questions as $select_question)
            <tr>
              <td>
                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                <strong>{{$select_question->question}}</strong>
              </td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item btn btn-outline-danger" href="{{url('delete_que/'.$select_question->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
                    <a class="dropdown-item btn btn-outline-danger" href="{{url('edit-que/'.$select_question->id)}}"><i class="bx bx-trash me-1"></i> Edit</a>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="2" class="alert alert-danger" style="padding-top: 70px;padding-bottom: 70px; text-align:center">
                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                <strong>No questions avilable in selected category..</strong>
              </td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @endif
  @include('layouts.admin.footer')

  <script>
    $(document).ready(function(){
      $(".cleaning_radio").change(function(){
        var radioValue = $(this).val();
        window.location.href = "{{url('all-questions')}}" + "?name=" + radioValue;
      });
    });

    $(".js-example-templating").select2({

    });
  </script>