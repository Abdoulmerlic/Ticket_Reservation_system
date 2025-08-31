<?php
session_start();
if (!isset($_SESSION['ORDERREF']) || empty($_SESSION['ORDERREF'])) {
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ticket Reservation System - Booking</title>
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.2/semantic.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.2/semantic.min.js"></script>
  <link href="semantic/datepicker.css" rel="stylesheet" type="text/css">
  <script src="semantic/datepicker.js"></script>
  <script>
    var ORDERREF = '<?php echo $_SESSION['ORDERREF'] ?>';
    // Pricing per class
    var classPrices = {
      'High Class Travel': 10000,
      'Middle Class Travel': 7000,
      'Lower Class Travel': 4000,
      'Special Needs Travel': 5000
    };

    function updatePrice() {
      var travelClass = $('#travelclass').val();
      var seats = parseInt($('#seats').val()) || 1;
      var price = classPrices[travelClass] ? classPrices[travelClass] * seats : 0;
      $('#amount').val(price.toLocaleString());
    }
    $(document).ready(function () {
      $('#travelclass, #seats').on('change keyup', updatePrice);
      updatePrice();
    });
  </script>
  <script src="nav.js"></script>

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      margin: 0;
      padding: 0;
    }

    .navbar {
      background: rgba(255, 255, 255, 0.95) !important;
      backdrop-filter: blur(10px);
      box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
      border: none !important;
    }

    .navbar .item {
      color: #333 !important;
      font-weight: 500;
    }

    .navbar .item:hover {
      color: #667eea !important;
    }

    .main-container {
      margin-top: 40px;
      padding: 40px 0;
    }

    .booking-card {
      background: white;
      border-radius: 20px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      margin-bottom: 30px;
    }

    .booking-header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 30px;
      text-align: center;
    }

    .booking-header h1 {
      font-size: 2rem;
      margin-bottom: 10px;
      font-weight: 700;
    }

    .order-ref-display {
      background: rgba(255, 255, 255, 0.2);
      padding: 15px 25px;
      border-radius: 10px;
      display: inline-block;
      margin: 10px 0;
      font-weight: bold;
    }

    .steps-container {
      background: white;
      padding: 30px;
      border-radius: 15px;
      margin-bottom: 30px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    .ui.steps {
      background: transparent;
      box-shadow: none;
    }

    .ui.steps .step {
      background: #f8f9fa;
      border-radius: 10px;
      margin: 5px;
      transition: all 0.3s ease;
      cursor: pointer;
    }

    .ui.steps .step:hover {
      background: #e9ecef;
      transform: translateY(-2px);
    }

    .ui.steps .step.active {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
    }

    .ui.steps .step.disabled {
      opacity: 0.6;
      cursor: not-allowed;
    }

    .form-section {
      background: white;
      border-radius: 15px;
      padding: 40px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
    }

    .form-section h2 {
      color: #333;
      margin-bottom: 30px;
      font-size: 1.8rem;
      text-align: center;
    }

    .ui.form .field {
      margin-bottom: 25px;
    }

    .ui.form .field label {
      color: #333;
      font-weight: 500;
      margin-bottom: 8px;
    }

    .ui.form input,
    .ui.form select {
      border: 2px solid #e9ecef;
      border-radius: 10px;
      padding: 12px 15px;
      transition: all 0.3s ease;
    }

    .ui.form input:focus,
    .ui.form select:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .price-display {
      background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
      color: white;
      padding: 20px;
      border-radius: 15px;
      text-align: center;
      margin: 20px 0;
    }

    .price-display h3 {
      font-size: 1.5rem;
      margin-bottom: 10px;
    }

    .price-amount {
      font-size: 2rem;
      font-weight: bold;
    }

    .submit-button {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border: none;
      padding: 15px 40px;
      border-radius: 50px;
      font-size: 1.1rem;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 20px;
    }

    .submit-button:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    .cancel-link {
      color: #e74c3c;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .cancel-link:hover {
      color: #c0392b;
      text-decoration: underline;
    }

    .field-group {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    .info-box {
      background: #f8f9fa;
      border-left: 4px solid #667eea;
      padding: 20px;
      border-radius: 10px;
      margin: 20px 0;
    }

    .info-box h4 {
      color: #333;
      margin-bottom: 10px;
    }

    .info-box p {
      color: #666;
      margin: 0;
    }

    .payment-methods {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 15px;
      margin: 20px 0;
    }

    .payment-method {
      background: white;
      border: 2px solid #e9ecef;
      border-radius: 10px;
      padding: 15px;
      text-align: center;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .payment-method:hover {
      border-color: #667eea;
      transform: translateY(-2px);
    }

    .payment-method.selected {
      border-color: #667eea;
      background: #f0f4ff;
    }

    .loading-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

    .loading-content {
      background: white;
      padding: 40px;
      border-radius: 15px;
      text-align: center;
    }

    .progress-bar {
      width: 100%;
      height: 6px;
      background: #e9ecef;
      border-radius: 3px;
      overflow: hidden;
      margin: 20px 0;
    }

    .progress-fill {
      height: 100%;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      width: 0%;
      transition: width 0.3s ease;
    }
  </style>
</head>

<body>
  <!-- Navigation -->
  <div class="ui inverted huge borderless fixed fluid menu navbar">
    <div class="ui container">
      <a class="header item" href="../index.php">
        <i class="plane icon"></i>
        TICKET RESERVATION SYSTEM
      </a>
      <div class="right menu">
        <a class="item" href="../index.php">
          <i class="home icon"></i>
          Home
        </a>
        <a class="item" href="index.php">
          <i class="refresh icon"></i>
          New Booking
        </a>
      </div>
    </div>
  </div>

  <div class="ui container main-container">
    <div class="booking-card">
      <div class="booking-header">
        <h1><i class="plane icon"></i> Book Your Ticket</h1>
        <p>Complete your journey in just a few simple steps</p>
        <div class="order-ref-display">
          Order Ref: <?php echo $_SESSION['ORDERREF'] ?>
          <a href='index.php' class="cancel-link" style="margin-left: 15px;">
            <i class="times icon"></i> Cancel Order
          </a>
        </div>
      </div>
    </div>

    <!-- Progress Steps -->
    <div class="steps-container">
      <div class="ui unstackable tiny steps">
        <div class="step active" onclick="booking()">
          <i class="plane icon"></i>
          <div class="content">
            <div class="title">Booking Details</div>
            <div class="description">Travel and booking info</div>
          </div>
        </div>
        <div class="step disabled" onclick="contact()" id="contactbtn">
          <i class="user icon"></i>
          <div class="content">
            <div class="title">Personal Details</div>
            <div class="description">Contact information</div>
          </div>
        </div>
        <div class="disabled step" id="billingbtn" onclick="billing()">
          <i class="credit card icon"></i>
          <div class="content">
            <div class="title">Payment</div>
            <div class="description">Payment and verification</div>
          </div>
        </div>
        <div class="disabled step" onclick="confirmdetails()" id="confimationbtn">
          <i class="check circle icon"></i>
          <div class="content">
            <div class="title">Confirm Details</div>
            <div class="description">Verify order details</div>
          </div>
        </div>
        <div class="disabled step" id="finishbtn">
          <i class="print icon"></i>
          <div class="content">
            <div class="title">Finish & Print</div>
            <div class="description">Printing Ticket</div>
          </div>
        </div>
      </div>
    </div>

    <div id="dynamic">
      <!-- Booking Details Section -->
      <div class="form-section" id="booking-page">
        <h2><i class="plane icon"></i> Booking Information</h2>
        <p style="text-align: center; color: #666; margin-bottom: 30px;">Enter your travel booking details</p>

        <form class="ui form" onsubmit="return contact(this)">
          <div class="field">
            <label><i class="map marker icon"></i> Destination</label>
            <select required id="destination" class="ui dropdown">
              <option value="" selected disabled>-- Select Travel Destination --</option>
              <option>Jigawa To Kano</option>
              <option>Kaduna To Katsina</option>
              <option>Kano To Kaduna</option>
              <option>Katsina To Jigawa</option>
              <option>Kebbi To Kano</option>
              <option>Sokoto To Katsina</option>
              <option>Zamfara To Kano</option>
            </select>
          </div>

          <div class="field">
            <label><i class="star icon"></i> Travel Class</label>
            <select name="gender" required id="travelclass" class="ui dropdown">
              <option value="" selected disabled>-- Select Travel Class --</option>
              <option>High Class Travel</option>
              <option>Middle Class Travel</option>
              <option>Lower Class Travel</option>
              <option>Special Needs Travel</option>
            </select>
            <div class="info-box">
              <h4><i class="info circle icon"></i> Travel Classes Explained</h4>
              <p><strong>High Class:</strong> Premium seating with extra amenities</p>
              <p><strong>Middle Class:</strong> Standard comfortable seating</p>
              <p><strong>Lower Class:</strong> Economy seating</p>
              <p><strong>Special Needs:</strong> Accessible seating with assistance</p>
            </div>
          </div>

          <div class="field-group">
            <div class="field">
              <label><i class="users icon"></i> Number of Seats</label>
              <input placeholder="Number of Seats" type="number" id="seats" min="1" max="72" value="1" required>
            </div>
            <div class="field">
              <label><i class="calendar icon"></i> Date of Travel</label>
              <input type="text" readonly required id="traveldate" class="datepicker-here form-control"
                placeholder="Select travel date">
            </div>
          </div>

          <div class="price-display">
            <h3><i class="money bill icon"></i> Total Amount</h3>
            <div class="price-amount">₦<span id="amount">0</span></div>
            <p>Price will update automatically based on your selection</p>
          </div>

          <div style="text-align: center;">
            <button class="submit-button">
              <i class="arrow right icon"></i>
              Continue to Personal Details
            </button>
          </div>
        </form>
      </div>

      <!-- Contact Details Section -->
      <div class="form-section" id="contact-page" style="display:none">
        <h2><i class="user icon"></i> Personal Information</h2>
        <p style="text-align: center; color: #666; margin-bottom: 30px;">Please provide your contact details</p>

        <form class="ui form" onsubmit="return billing(this)">
          <div class="field">
            <label><i class="user icon"></i> Full Name</label>
            <input placeholder="Enter your full name" type="text" id="fullname" required>
          </div>

          <div class="field">
            <label><i class="phone icon"></i> Contact Information</label>
            <input placeholder="Mobile number or email address" type="text" id="contact" required>
          </div>

          <div class="field">
            <label><i class="venus mars icon"></i> Gender</label>
            <select name="gender" required id="gender" class="ui dropdown">
              <option value="" selected disabled>-- Select Gender --</option>
              <option value="MALE">Male</option>
              <option value="FEMALE">Female</option>
            </select>
          </div>

          <div style="text-align: center;">
            <button class="submit-button">
              <i class="credit card icon"></i>
              Proceed to Payment
            </button>
          </div>
        </form>
      </div>

      <!-- Payment Section -->
      <div class="form-section" id="billing-page" style="display:none">
        <h2><i class="credit card icon"></i> Payment Information</h2>
        <p style="text-align: center; color: #666; margin-bottom: 30px;">Select your preferred payment method
        </p>

        <form class="ui form" id="payment-form" onsubmit="return confirmdetails(this)">
          <div class="field">
            <label><i class="credit card icon"></i> Payment Method</label>
            <select name="paymentmethod" required id="paymentmethod" class="ui dropdown">
              <option value="" selected disabled>Choose Payment Method</option>
              <option value="UBA_NG">UBA (Nigeria)</option>
              <option value="GTB_NG">GTB (Nigeria)</option>
              <option value="ZENITH_NG">Zenith Bank (Nigeria)</option>
              <option value="ACCESS_NG">Access Bank (Nigeria)</option>
              <option value="MPESA">M-Pesa (Kenya)</option>
              <option value="KCD_BANK">KCD Bank</option>
              <option value="CASH">Cash Payment</option>
            </select>
          </div>

          <div class="field">
            <label><i class="credit card icon"></i> Account Number</label>
            <input placeholder="Enter your account number" type="text" id="account" required>
          </div>

          <div class="field">
            <label><i class="money bill icon"></i> Amount to Pay</label>
            <input type="text" readonly id="amount" placeholder="Amount will be calculated automatically">
          </div>

          <div class="field">
            <label><i class="credit card icon"></i> Transaction ID</label>
            <input placeholder="Enter transaction ID" type="text" id="transaction_id" required>
          </div>

          <div style="text-align: center;">
            <button class="submit-button">
              <i class="check circle icon"></i>
              Review & Confirm
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Loading Overlay -->
  <div class="loading-overlay" id="loadingOverlay" style="display: none;">
    <div class="loading-content">
      <div class="ui active loader"></div>
      <h3>Processing your request...</h3>
      <div class="progress-bar">
        <div class="progress-fill" id="progressFill"></div>
      </div>
      <p>Please wait while we process your booking</p>
    </div>
  </div>

  <script>
    $(document).ready(function () {
      // Initialize dropdowns
      $('.ui.dropdown').dropdown();

      // Initialize datepicker
      $('.datepicker-here').datepicker({
        format: 'MM dd, yyyy',
        autoclose: true,
        todayHighlight: true,
        startDate: new Date()
      });

      // Show loading overlay on form submission
      $('form').on('submit', function () {
        $('#loadingOverlay').show();
        $('#progressFill').css('width', '100%');
      });
    });
  </script>
</body>

</html>