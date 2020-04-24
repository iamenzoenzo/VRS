<title><?= $title ;?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?php echo form_open_multipart('bookings/create'); ?>
<!-- hidden fields -->

<div class="row">
  <div class="col-lg-6 col-sm-12 mt-3">
    <div class="card">
      <div class="card-header">
        <h5><?= $title ;?></h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col">
            <label>Select client</label>
            <select name="clientId" class="form-control" value="<?php echo set_value('clientId'); ?>">
              <option value="">-</option>
              <?php foreach ($clients as $client): ?>
               <option value="<?php echo $client['Id'];?>"><?php echo $client['name'];?></option>
             <?php endforeach; ?>
            </select>
            <div class="text-danger"><?php echo form_error('clientId'); ?></div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col">
            <div class="checkbox">
                <input id="add_driver" name="add_driver" type="checkbox" value="<?php echo set_value('add_driver'); ?>"> Client need driver? Add ₱<?php echo number_format($driver_pay['value'],2);?> per day</label>
            </div>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-lg-8 col-sm-12">
            <label>Start Date</label>
            <input id="start_date" class="form-control col-12" name="start_date" type="text" value="<?php echo set_value('start_date'); ?>">
          </div>
          <div class="col-lg-4 col-sm-12">
            <label>Number of days</label>
            <input id="number_of_days" type="number" min="1" class="form-control" name="number_of_days" value="1" value="<?php echo set_value('number_of_days'); ?>">
          </div>
        </div>
      <div class="row mt-3">
      	<div id="for_car_id" class="col">
          <label>Select vehicle</label>
          <select id="carId" name="carId" class="form-control <?php echo (count($cars)==0)?'is-invalid':'';?>" value="<?php echo set_value('carId'); ?>">
            <option value="">-</option>
            <?php foreach ($cars as $car): ?>
             <option value="<?php echo $car['Id'];?>"><?php echo $car['car_description'].' ('.$car['plate_number'].')';?></option>
           <?php endforeach; ?>
          </select>
          <?php if(count($cars)==0):?>
            <div class="text-danger">Vehicles are fully-booked on this date.</div>
          <?php endif; ?>
      	</div>
      </div>

        <div class="row mt-3">
          <div class="col-lg-6 col-sm-12">
            <label>Downpayment</label>
            <input type="number" min="0" value="0" class="form-control" id="downpayment" name="downpayment" value="<?php echo set_value('downpayment'); ?>">
          </div>
          <div class="col-lg-6 col-sm-12">
            <label>Discount (Optional)</label>
            <input type="number" min="0" value="0" class="form-control" id="discount" name="discount" value="<?php echo set_value('discount'); ?>">
          </div>
        </div>

        <div class="card mt-3 p-3">
          <div class="row">
            <div class="col">
              <label>Driver name (Optional)</label>
              <input type="text" class="form-control" name="driver_name" value="<?php echo set_value('driver_name'); ?>">
            </div>
          </div>
          <div class="row mt-2">
            <div class="col">
              <label>Remarks (Optional)</label>
              <input type="text" class="form-control" name="remarks" value="<?php echo set_value('remarks'); ?>">
            </div>
          </div>
          <div class="row pt-3">
            <div class="col">
              <label>Multiple attachments (Receipts etc.)</label></br>
              <input type="file" name="multiplefiles[]" multiple="">
            </div>
          </div>
        </div>
      <div class="pt-3">
        <button type="button" class="btn btn-success" id="btnCompute">Compute</button>
        <button type="submit" class="btn btn-primary" id="btnSubmit">Submit</button>
        <a href="<?php echo base_url()?>bookings/index" class="btn btn-danger">Cancel</a>
      </div>
      </div> <!-- end of card body -->
    </div>
  </div>

  <div class="col-lg-6 col-sm-12 mt-3">
    <div class="card p-3">
      <div class="row mt-2 text-center">
        <div class="col">
          <h1 id="for_total_rent">₱0.00</h1>
          <small>Total rent to pay in Pesos</small>
        </div>
      </div>
    </div>
  </div>
</div>
</form>

<script type='text/javascript'>

  //set minimum date today
  function setStartDate() {
    //var date = new Date('2020-04-01');
    var date = new Date();
    var dd = date.getDate();
    var mm = date.getMonth()+1; //January is 0!
    var yyyy = date.getFullYear();
    today = (mm>9?'':'0')+mm+"/"+dd+"/"+yyyy;
    document.getElementById("start_date").setAttribute("min", today);
    document.getElementById("start_date").setAttribute("value", today);
  }

  $(document).ready(function() {
      $('#btnCompute').click(function(e) {
        var selectedCar = document.getElementById("carId");
          var driver=$('#add_driver').is(":checked")
          e.preventDefault();
          $.ajax({
              method: "post",
              url: "<?php echo base_url(); ?>bookings/computeRent",
              data: {
                      no_of_days: document.getElementById('number_of_days').value,
                      car_id: selectedCar.options[selectedCar.selectedIndex].value,
                      add_driver: driver,
                      discount: document.getElementById('discount').value
                  },
              dataType: "html",
              context: document.body,
              success: function (response){
                var myhtml='<h1 id="for_total_rent">₱'+response+'</h1>';
                  $('#for_total_rent').html(myhtml);
                  var element = document.getElementById("btnSubmit");
                  if(parseFloat(response)>0){
                    element.classList.remove("d-none");
                  }else{
                    element.classList.add("d-none");
                  }

              }
          });
      })
  });

  $( function() {
    $("#start_date")
    .datepicker()
    .on("change", function() {
      $.ajax({
          method: "post",
          url: "<?php echo base_url(); ?>bookings/get_available_vehicles",
          data: {
                  start_date: document.getElementById('start_date').value,
                  number_of_days: document.getElementById('number_of_days').value
              },
          dataType: "html",
          context: document.body,
          success: function (response){
            var obj = JSON.parse(response);
            var myhtml='<label>Select vehicle</label> <select id="carId" name="carId" class="form-control '+((obj.length==0)?'is-invalid':'')+'"> <option value="0">-</option>';
            for(var i=0;i<obj.length;i++){
              myhtml=myhtml+"<option value="+obj[i].Id+">"+obj[i].code_name+" ("+obj[i].plate_number+")"+"</option>";
            }
            myhtml=myhtml+"</select>";
            if(obj.length==0){
              myhtml=myhtml+'<div class="invalid-feedback">Vehicles are fully-booked on this date.</div>';
            }
            $('#for_car_id').html(myhtml);
          }
      });
    });

    $("#number_of_days")
    .on("change", function() {
      $.ajax({
          method: "post",
          url: "<?php echo base_url(); ?>bookings/get_available_vehicles",
          data: {
                  start_date: document.getElementById('start_date').value,
                  number_of_days: document.getElementById('number_of_days').value
              },
          dataType: "html",
          context: document.body,
          success: function (response){
            var obj = JSON.parse(response);
            var myhtml='<label>Select vehicle</label> <select id="carId" name="carId" class="form-control '+((obj.length==0)?'is-invalid':'')+'"> <option value="0">-</option>';
            for(var i=0;i<obj.length;i++){
              myhtml=myhtml+"<option value="+obj[i].Id+">"+obj[i].code_name+" ("+obj[i].plate_number+")"+"</option>";
            }
            myhtml=myhtml+"</select>";
            if(obj.length==0){
              myhtml=myhtml+'<div class="invalid-feedback">Vehicles are fully-booked on this date.</div>';
            }
            $('#for_car_id').html(myhtml);
          }
      });
    });

  });




  window.onload = setStartDate();

</script>
