<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>REstful CRUD Application</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <h1 class="mt-5">All Customers</h1>
      </div>

      <div class="row mt-5">
        <div class="ml-auto">
          <button type="button" class="btn btn-primary btn-sm mb-2 ml-auto" id="show-customers">Show Customers</button>
          <button type="button" class="btn btn-success btn-sm mb-2 ml-auto" id="add-customer">Add New Customer</button>
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Phone Number</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>

    </div>

    <div class="modal fade" role="dialog" id="add-customer-modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <form id="add-customer-form" method="post">
            <div class="modal-header">
              <h4 class="modal-title">Add Customer</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Enter Customer Name</label>
                <input type="text" name="customerName" id="customer-name" class="form-control">
              </div>
              <div class="form-group">
                <label>Phone Number</label>
                <input type="number" name="customerNumber" id="customer-number" class="form-control">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="customerEmail" id="customer-email" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">ADD</button>
              <button type="button" class="btn btn-default" id="close-modal" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" role="dialog" id="update-customer-modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <form id="update-customer-form" method="post">
            <div class="modal-header">
              <h4 class="modal-title">Update Customer</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Enter Customer Name</label>
                <input type="text" name="customerName" id="customer-name-update" class="form-control">
                <input type="hidden" id="customer-id-update">
              </div>
              <div class="form-group">
                <label>Phone Number</label>
                <input type="number" name="customerNumber" id="customer-number-update" class="form-control">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="customerEmail" id="customer-email-update" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">UPDATE</button>
              <button type="button" class="btn btn-default" id="close-modal" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
  </body>
</html>
