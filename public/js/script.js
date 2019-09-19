$(document).ready(function(){

  //Show customers when page is loaded
  showCustomers();

  //SHOW ADD CUSTOMER MODAL
  $('#add-customer').click(function(){
    $('#add-customer-modal').modal('show');
  });

  //SHOW UPDATE MODAL
  $('table').on('click', '.update', function(){

    var rowElemnt = $(this).closest('tr');
    var id = rowElemnt.find('.id').val();
    var name = rowElemnt.find('.name').text();
    var number = parseInt(rowElemnt.find('.number').text());
    var email = rowElemnt.find('.email').text();

    $('#customer-name-update').val("");
    $('#customer-number-update').val("");
    $('#customer-email-update').val("");

    $('#customer-id-update').val(id);
    $('#customer-name-update').val(name);
    $('#customer-number-update').val(number);
    $('#customer-email-update').val(email);

    $('#update-customer-modal').modal('show');

  });


  //SHOW CUSTOMERS
  $('#show-customers').on('click', function(){
    showCustomers();
  });

  //ADD CUSTOMER
  $('#add-customer-form').on('submit', function(event){
    addCustomer();
  });

  //UPDATE CUSTOMER
  $('#update-customer-form').on('submit', function(event){
    updateCustomer();
    });
  
  //DELETE CUSTOMER
  $('table').on('click', '.delete', function(){
    var id = $(this).closest('tr').find('.id').val();

    deleteCustomer(id);
  });

  //Show customers method
  function showCustomers() {
    $.ajax({
      url:'http://localhost/restful-crud-ajax/public/api/customers',
      contentType:'application/json',
      access: 'application/json',
      success: function(response){
       
        var tbodyEl = $('tbody');
        tbodyEl.html('');

        response.data.forEach(function(customer){
          tbodyEl.append('\
            <tr>\
            <input type="hidden" class="id" value="' + customer.id + '">\
            <td class="name">' + customer.name + '</td>\
            <td class="number">' + customer.number + '</td>\
            <td class="email">' + customer.email + '</td>\
            <td>\
            <button type="button" class="btn btn-secondary btn-sm update">UPDATE</button>\
            <button type="button" class="btn btn-danger btn-sm delete">DELETE</button>\
            </td>\
            </tr>\
          ');
        });
      

      }
    });
  }

  //Add customer method
  function addCustomer() {
    event.preventDefault();
    if($('#customer-name').val() == ''){
      alert('Enter Customer Name');
    }else if($('#customer-number').val() == ''){
      alert('Enter Customer Number');
    }else if($('#customer-email').val() == ''){
      alert('Enter Customer Email');
    }else{

      $.ajax({
        url:'http://localhost/restful-crud-ajax/public/api/customers',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({
          name: $('#customer-name').val(),
          number: $('#customer-number').val(),
          email: $('#customer-email').val()
        }),
        success: function(response){
          alert(response['success']);
          $('#add-customer-modal').modal('hide');
          $('#show-customers').click();
        }
      });
    }
  }

  //Update customer method
  function updateCustomer() {
    event.preventDefault();
    if($('#customer-name-update').val() == ''){
      alert('Enter Customer Name');
    }else if($('#customer-number-update').val() == ''){
      alert('Enter Customer Number');
    }else if($('#customer-email-update').val() == ''){
      alert('Enter Customer Email');
    }else{

      $.ajax({
        url: 'http://localhost/restful-crud-ajax/public/api/customers/'+$('#customer-id-update').val(),
        method: 'PUT',
        contentType: 'application/json',
        data: JSON.stringify({
          name: $('#customer-name-update').val(),
          number: $('#customer-number-update').val(),
          email: $('#customer-email-update').val()
        }),
        success: function(response) {
          alert(response['success']);
          $('#update-customer-modal').modal('hide');
          $('#show-customers').click();
        }
      });
    }
  }

  //Delete customer method
  function deleteCustomer(id) {
    
     $.ajax({
      url: 'http://localhost/restful-crud-ajax/public/api/customers/'+id,
      method: 'DELETE',
      contentType: 'application/json',
      success: function(response){
        $('#show-customers').click();
        alert(response['success']);
      }
    });

  }

});
