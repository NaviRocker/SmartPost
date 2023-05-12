$(document).ready(function() {
    // Attach input event to the form fields
    $("#delivery_type, #service_type, #size, #unit, #weight").on("input", function() {
        var deliveryType = parseInt(document.getElementById("delivery_type").value);
        var serviceType = parseInt(document.getElementById("service_type").value);
        var size = parseInt(document.getElementById("size").value);
        var unit = parseInt(document.getElementById("unit").value);
        var weight = parseFloat(document.getElementById("weight").value);
      
        var sub_total;
        var message;
        var total;
    
        var receiver_address = 10;
        var pickup_office = 5;
        var regular = 10;
        var speed = 10;
        var registered = 10;
        var logi = 10;
    




        
        if (unit === 1) {
            weight = weight/1000;
          } else {
            weight = weight;
          }
    
        if (deliveryType === 1) {
            if (serviceType === 1) {
                if (size === 1) {
                    sub_total = receiver_address + regular + weight;
                    message ="Pickup Day: Approximately 2 - 3 Days from Today";
                  } else if (size === 2) {
                    sub_total = receiver_address + regular + weight*2;
                    message ="Pickup Day: Approximately 2 - 3 Days from Today";
                  } else {
                    sub_total = receiver_address + regular + weight*5;
                    message ="Pickup Day: Approximately 2 - 3 Days from Today";
                  }
              } else if (serviceType === 2) {
                if (size === 1) {
                    sub_total = receiver_address + speed + weight*2;
                    message ="Pickup Day: Approximately 6 - 24 Hours from Now";
                  } else if (size === 2) {
                    sub_total = receiver_address + speed + weight*4;
                    message ="Pickup Day: Approximately 6 - 24 Hours from Now";
                  } else {
                    sub_total = receiver_address + speed + weight*10;
                    message ="Pickup Day: Approximately 6 - 24 Hours from Now";
                  }
              } else if (serviceType === 3) {
                if (size === 1) {
                    sub_total = receiver_address + registered + weight*2;
                    message ="Pickup Day: Approximately 1 - 2 Days from Today";
                  } else if (size === 2) {
                    sub_total = receiver_address + registered + weight*4;
                    message ="Pickup Day: Approximately 1 - 2 Days from Today";
                  } else {
                    sub_total = receiver_address + registered + weight*8;
                    message ="Pickup Day: Approximately 1 - 2 Days from Today";
                  } 
              }
            else {
                if (size === 1) {
                    sub_total = receiver_address + logi + weight;
                    message ="Pickup Day: Approximately 1 - 2 Days from Today";
                  } else if (size === 2) {
                    sub_total = receiver_address + logi + weight*3;
                    message ="Pickup Day: Approximately 1 - 2 Days from Today";
                  } else {
                    sub_total = receiver_address + logi + weight*6;
                    message ="Pickup Day: Approximately 1 - 2 Days from Today";
                  } 
            }
          } else {
            if (serviceType === 1) {
                if (size === 1) {
                    sub_total = pickup_office + regular + weight;
                    message ="Delivery Day: Approximately 2 - 3 Days from Today";
                  } else if (size === 2) {
                    sub_total = pickup_office + regular + weight*2;
                    message ="Delivery Day: Approximately 2 - 3 Days from Today";
                  } else {
                    sub_total = pickup_office + regular + weight*5;
                    message ="Delivery Day: Approximately 2 - 3 Days from Today";
                  }
              } else if (serviceType === 2) {
                if (size === 1) {
                    sub_total = pickup_office + speed + weight*2;
                    message ="Delivery Day: Approximately 6 - 24 Hours from Now";
                  } else if (size === 2) {
                    sub_total = pickup_office + speed + weight*4;
                    message ="Delivery Day: Approximately 6 - 24 Hours from Now";
                  } else {
                    sub_total = pickup_office + speed + weight*10;
                    message ="Delivery Day: Approximately 6 - 24 Hours from Now";
                  }
              } else if (serviceType === 3) {
                if (size === 1) {
                    sub_total = pickup_office + registered + weight*2;
                    message ="Delivery Day: Approximately 1 - 2 Days from Today";
                  } else if (size === 2) {
                    sub_total = pickup_office + registered + weight*4;
                    message ="Delivery Day: Approximately 1 - 2 Days from Today";
                  } else {
                    sub_total = pickup_office + registered + weight*8;
                    message ="Delivery Day: Approximately 1 - 2 Days from Today";
                  } 
              }
            else {
                if (size === 1) {
                    sub_total = pickup_office + logi + weight;
                    message ="Delivery Day: Approximately 1 - 2 Days from Today";
                  } else if (size === 2) {
                    sub_total = pickup_office + logi + weight*3;
                    message ="Delivery Day: Approximately 1 - 2 Days from Today";
                  } else {
                    sub_total = receiver_address + logi + weight*6;
                    message ="Delivery Day: Approximately 1 - 2 Days from Today";
                  } 
            }
          }
    
          var subtotal = (sub_total).toFixed(2);
          total = ((sub_total*110)/100).toFixed(2);
          var  collect = Math.round(total); 
  
      // Update the output element with the calculated result
      if (!isNaN(subtotal) && !isNaN(total) && !isNaN(collect)) {
        $("#output1").text("Sub Total - Rs. " + subtotal);
        $("#output2").text("Total - Rs. " + total);
        $("#output3").text("Collect - Rs. " + collect + ".00");
        $("#output4").text(message);

        $("#sub_total").val(subtotal);
        $("#final_price").val(collect);

      } else {
        // Clear the output if the calculations resulted in NaN
        $("#output1, #output2, #output3 , #output").empty();
      }
    });

    $.ajax({
        url: 'uploadController.php', // Replace with the URL of your PHP script
        method: 'POST',
        data: { subtotal: subtotal, collect: collect }, // Send the variables as data parameters
        success: function(response) {
          // Handle the response from the PHP script
          console.log(response); // Log the response for testing/debugging
        },
        error: function() {
          // Handle AJAX error
          console.log('Error occurred during AJAX request');
        }
      });
    
  });
  

