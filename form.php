<section class="page-section" id="services" style="display: none">
  
  <div class="container" style="padding: 20px; border:2px solid #0094b3; border-radius: 10px;">
    <div class="imgcontainer">
      <button onclick="HideForm()" class="close" title="Zapri">&times;</button>
    </div>
    <div class="row" style="margin: 0">
      <div class="col-md-4">
        <h4 class="text-center mt-0" id="buy-plan">Pick Your Plan</h4>
      </div>
      <div class="col-md-4">
        <h4 class="text-center mt-0" id="buy-shipping">Shipping & Billing</h4>
      </div>
      <div class="col-md-4">
        <h4 class="text-center mt-0" id="buy-checkout">Checkout</h4>
      </div>
    </div>
    <hr class="divider my-4">
    <div class="row" id="Plan">
      <div class="col-md-8" style="margin: auto;">
        <div class="row">
          <div class="col-md-9">
            <label for="years">Years:</label>
            <input type="range" class="custom-range" onchange="Slider1()" min="1" max="3" step="1" id="years">
          </div>
          <div class="col-md-3">
            <br />
            <input type="text" class="form-control" value="10" id="yearsLbl" style="text-align: center;" readonly>
          </div>
          <div class="col-md-9">
            <label for="data">Data:</label>
            <input type="range" class="custom-range" onchange="Slider2()" min="1" max="3" step="1" id="data">
          </div>
          <div class="col-md-3">
            <br />
            <input type="text" class="form-control" value="1 GB" id="dataLbl" style="text-align: center;" readonly>
          </div>
          <div class="col-md-9">
            <label for="sms">SMS count:</label>
            <input type="range" class="custom-range" onchange="Slider3()" min="1" max="3" step="1" id="sms">
          </div>
          <div class="col-md-3">
            <br />
            <input type="text" class="form-control" value="250" id="smsLbl" style="text-align: center;" readonly>
          </div>
          <div  class="col-md-2">
            <label for="sms">Quantity: </label>
          </div>
          <div class="col-md-2">
            <input type="number" value="1" id="quantity" min="1"  class="form-control" onchange="changeQuantity()" />
          </div>
          <div class="col-md-8">
          </div>
          <div class="col-md-6">
            <br />
            <br />
            <label class="form-control-plaintext">Price: <b id="price">10.45</b>€ + Shipping</label>
          </div>
          <div class="col-md-6" style="text-align: right;">
            <br />
            <br />
            <button class="btn btn-primary" onclick="ShowShipping()">Next</button>
          </div>
          <div class="col-md-12">
            <label class="form-control-plaintext" style="text-align: center;">SIM cards work in EU countries <b>ONLY</b></label>
          </div>
        </div>
      </div>
    </div>

    <div class="row" id="Shipping" style="display: none;">
      <form action="javascript:void(0);">
      <div class="col-md-12" style="margin: auto;">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <input type="text" name="organization" id="company" placeholder="Company" class="form-control shipping-form">
              </div>
              
              <div class="col-md-12">
                <input type="text" name="first" id="name" placeholder="First name" class="form-control shipping-form" required>
              </div>
              <div class="col-md-12">
                <input type="text" name="last" id="surname" placeholder="Last name" class="form-control shipping-form" required>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-8">
                <input type="text" name="street" id="street" placeholder="Street" class="form-control shipping-form" required>
              </div>
              <div class="col-md-4">
                <input type="text" name="number" id="number" placeholder="House number" class="form-control shipping-form" required>
              </div>
              <div class="col-md-12">
                <input type="text" name="address-line2" id="address2" placeholder="Address line 2" class="form-control shipping-form">
              </div>
              <div class="col-md-4">
                <input type="text" name="zip" id="zip" placeholder="Zip code" class="form-control shipping-form" required>
              </div>
              <div class="col-md-8">
                <input type="text" name="city" id="city" placeholder="City" class="form-control shipping-form" required>
              </div>
              <div class="col-md-12">
                <select name="country" id="country" class="form-control shipping-form" required>
                  <?php
                  include_once "country_list.php";
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-6" style="text-align: left; margin-top: 30px;">
            <button id="shipping-back" type="button" class="btn btn-primary" onclick="BackShipping()">Back</button></div>
          <div class="col-6" style="text-align: right; margin-top: 30px;">
            <button id="shipping-next" type="submit" class="btn btn-primary" onclick="ShowCheckout()">Next</button>
          </div>
        </div>
      </div>
      </form>
    </div>


    <div class="row" id="Checkout" style="display: none">
      <form action="javascript:void(0);">
      <div class="col-md-12" style="margin: auto;">
        <div class="row">
          <div class="col-md-6" style="text-align: right;">
            <label class="upper">Plan</label><br />
            <span id="Q_Years">10 Years</span> | 
            <span id="Q_Data">500 MB</span> | 
            <span id="Q_SMS">250 SMS</span>
          </div>
          <div class="col-md-3" style="text-align: right;">
            <label class="upper">Qty</label><br />
            <span id="Q_Quantity">1</span>
          </div>
          <div class="col-md-3" style="text-align: right;">
            <label class="upper">Total</label>
            <h5><span id="Q_Price">10</span> € </h5>
          </div>
          <div class="col-md-12">
            <hr>
          </div>
          <div class="col-md-9"  style="text-align: right;">
            <h6>+ Shipping</h6>
          </div>
          <div class="col-md-3" style="text-align: right;">
            <h5><span id="Q_Shipping">12</span> € </h5>
          </div>
          <div class="col-md-12">
            <hr>
          </div>
          <div class="col-md-12" style="text-align: right;">
            <h4><span id="Q_Total">12</span> €</h4>
          </div>
          <div class="col-md-12">
            <br />
          </div>
          <div class="col-md-3">
            <div class="row">
              <div class="col-md-12">
                <h6>Billing address</h6>
                <p class="address-display">
                <span class="pronounceLbl">Mr.</span> <span class="nameLbl">Sokec</span> <span class="surnameLbl">Sokec</span><br />
                <span class="companyLbl">/</span> <br />
                <span class="streetLbl">Sokec</span> <span class="numberLbl">3</span><br />
                <span class="address2Lbl">/</span> <br />
                <span class="zipLbl">0420</span> <span class="cityLbl">Sokec</span><br />
                <span class="countryLbl">Sokec</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="row">
              <div class="col-md-12">
                <h6>Shipping address</h6>
                <p class="address-display">
                <span class="pronounceLbl">Mr.</span> <span class="nameLbl">Sokec</span> <span class="surnameLbl">Sokec</span><br />
                <span class="companyLbl">/</span> <br />
                <span class="streetLbl">Sokec</span> <span class="numberLbl">3</span><br />
                <span class="address2Lbl">/</span> <br />
                <span class="zipLbl">0420</span> <span class="cityLbl">Sokec</span><br />
                <span class="countryLbl">Sokec</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
            <h6>Payment</h6>
            <label for="fname" >Accepted Cards: </label>
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i><br>
              <div class="row">
              <div class="col-md-3">
                <label for="cname" class="form-control-plaintext payment-form">Name on Card</label>
              </div>
              <div class="col-md-9">
                <input type="text" id="cname" name="cardname" class="form-control payment-form" required>             
              </div>
              <div class="col-md-3">
                <label for="ccnum" class="form-control-plaintext  payment-form">Card number</label>
              </div>
              <div class="col-md-9">
                <input type="text" id="ccnum" name="cardnumber" class="form-control  payment-form" required>              
              </div>
              <div class="col-md-3">
                <label for="expmonth" class="form-control-plaintext payment-form">Exp Month</label>
              </div>
              <div class="col-md-9">
                <input type="text" id="expmonth" name="expmonth" class="form-control payment-form" required>
              </div>
              <div class="col-md-3">
                <label for="expyear" class="form-control-plaintext payment-form">Exp Year</label>
              </div>
              <div class="col-md-3">
                <input type="text" id="expyear" name="expyear" class="form-control payment-form" required>
              </div>
              <div class="col-md-3">
                <label for="cvv" class="form-control-plaintext payment-form">CVV</label>
              </div>
              <div class="col-md-3">
                <input type="text" id="cvv" name="cvv" class="form-control payment-form" required>
              </div>
            </div>
              </div>
            </div>
          </div>
          <div class="col-6" style="text-align: left; margin-top: 30px;">
            <button id="shipping-back" type="button" class="btn btn-primary" onclick="BackCheckout()">Back</button></div>
          <div class="col-6" style="text-align: right; margin-top: 30px;">
            <button id="shipping-next" type="submit" class="btn btn-primary" onclick="Purchase()">Purchase</button>
          </div>
        </div>
      </div>
    </form>
    </div>


  </div>
</section>
