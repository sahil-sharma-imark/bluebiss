<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>




<div class="task-date-popup">
      <div class="modal fade" id="taskDate" aria-hidden="true" aria-labelledby="taskDateLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="ceate-listing-content">
              <h5>Task Date</h5>

              <form role="form" action="{{url('schedule-task')}}" method="POST">
                @csrf
                <div class="task-date-row">
                  <div class="task-date task-date-pic">
                    <h6>DECEMBER 2021</h6>
                     <input type="hidden" name="user_id" value="{{$_GET['user_id']}}">
                     <input type="hidden" name="provider_id" value="{{Auth::user()->id}}">
                     <input type="hidden" name="task_id" value="{{$_GET['task_id']}}">
                    <input type="date" name="schedule_date" id="schedule_date">
                  </div> 
  
                  <div class="task-date day-time">
                    <h6>TIME OF DAY</h6>
  
                    <select class="form-select" name="schedule_time" id="schedule_time" aria-label="Default select example">
                      <option selected>Choose a specific time</option>
                      <option value="Morning (8am - 12pm)">Morning (8am - 12pm)</option>
                      <option value="Afternoon (12pm - 5pm)">Afternoon (12pm - 5pm)</option>
                      <option value="Evening (5pm - 9:30pm)">Evening (5pm - 9:30pm)</option>
                      <option value="I'm flexible">I'm flexible</option>

                    </select>
                  </div> 
                </div>
  
                <div class="create-btn">     
                  <a class="clear-btn" href="#">Clear</a>
                  <button type="submit" class="btn">Confirm</button>
                  <!-- <a class="btn" data-bs-toggle="modal" href="#" role="button">Confirm</a> -->
                 </div>
              </form>
              
            </div>
  
          </div>
        </div>
      </div>
    </div>