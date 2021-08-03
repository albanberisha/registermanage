<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="js/loginform.js"></script>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" id="wide-class">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Login</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">Register</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" enctype="multipart/form-data" method="post" role="form" style="display: block;">
                                    <div id="ErrorD" class="alert alert-danger text-center display-none" style="display: none;">
                                        <button class="close font-size-iframe" data-dismiss="alert"></button>
                                        You have entered an invalid email or password
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Email">
                                        <span id="emailError" style="color: red;"></span>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                        <span id="Pasworderror" style="color: red;"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <!-- <a href="" tabindex="5" class="forgot-password">Forgot Password?</a>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="register-form" method="post" role="form" style="display: none;">
                                    <div class="form-body">
                                        <div class="tab-content">
                                            <div class="alert alert-info text-center" id="regError">
                                                <button class="close font-size-iframe" data-dismiss="alert"></button>
                                                Please fill the form using latin letters.
                                            </div>
                                            <div class="alert alert-danger text-center display-none" style="display: none;" id="registerErrors">
                                                <button class="close font-size-iframe" data-dismiss="alert"></button>
                                                You have some form errors. Please check below.
                                            </div>
                                            <div class="alert alert-success text-center display-none" style="display: none;" id="successRegister">
                                                <button class="close font-size-iframe" data-dismiss="alert"></button>
                                                You have been registered successfully!
                                                <a href="index.php">Click here</a> to login.
                                            </div>
                                            <div class="alert alert-block alert-warning text-center" style="display: none" id="emailExists">
                                                <button type="button" class="close font-size-iframe" data-dismiss="alert"></button>
                                                <h4 class="alert-heading">Error!</h4>
                                                <p>
                                                    You are already registered!
                                                </p>
                                            </div>
                                            <div class="tab-pane active" id="tab1">
                                                <!--class- has-error -->
                                                <div id="Fname" class="form-group" data-visible="true">
                                                    <div class="row col-md-12">
                                                        <label class="control-label col-md-4">
                                                            First Name
                                                            <span class="required font-size-iframe"> * </span>
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input class="form-control font-size-iframe" data-field-dependency="0" data-mandatory="true" data-visible="true" id="Firstname" name="Firstname" type="text">
                                                            <span id="FnameError" class="help-block font-size-iframe">
                                                                Your first name
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12" data-children="">

                                                    </div>
                                                </div>
                                                <!-- If field has confirmation will be repeated but some values will be changed-->
                                                <!-- End of confirmation field-->

                                                <div id="Lname" class="form-group " data-visible="true">
                                                    <div class="row col-md-12">
                                                        <label class="control-label col-md-4">
                                                            Last Name
                                                            <span class="required font-size-iframe"> * </span>
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input class="form-control font-size-iframe" data-field-dependency="0" data-mandatory="true" data-visible="true" id="Lastname" name="Lastname" type="text">
                                                            <span id="LnameError" class="help-block font-size-iframe">
                                                                Your last name
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12" data-children="">

                                                    </div>
                                                </div>
                                                <!-- If field has confirmation will be repeated but some values will be changed-->
                                                <!-- End of confirmation field-->

                                                <div id="Eml" class="form-group " data-visible="true">
                                                    <div class="row col-md-12">
                                                        <label class="control-label col-md-4">
                                                            Email
                                                            <span class="required font-size-iframe"> * </span>
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input class="form-control font-size-iframe" data-field-dependency="0" data-mandatory="true" data-visible="true" id="Email" name="Email" type="text">
                                                            <span id="EmailError" class="help-block font-size-iframe">
                                                                Your email address
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12" data-children="">

                                                    </div>
                                                </div>





                                                <div id="Psw" class="form-group " data-visible="true">
                                                    <div class="row col-md-12">
                                                        <label class="control-label col-md-4">
                                                            Psssword
                                                            <span class="required font-size-iframe"> * </span>
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input type="password" name="Password" id="Password" tabindex="2" class="form-control" placeholder="Password">
                                                            <span id="PswError" class="help-block font-size-iframe">
                                                                Your password
                                                            </span>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-12" data-children="">

                                                    </div>
                                                </div>
                                                <div id="CPsw" class="form-group " data-visible="true">
                                                    <div class="row col-md-12">
                                                        <label class="control-label col-md-4">
                                                            Confirm Psssword
                                                            <span class="required font-size-iframe"> * </span>
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input type="password" name="Confirmpassword" id="Confirmpassword" tabindex="2" class="form-control" placeholder="Confirm Psssword">
                                                            <span id="Psw2Error" class="help-block font-size-iframe">
                                                                Confirm Psssword
                                                            </span>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-12" data-children="">

                                                    </div>
                                                </div>

                                                </br>
                                                <div id="Gndr" class="form-group " data-visible="true">
                                                    <div class="row col-md-12">
                                                        <label class="control-label col-md-4">
                                                            Gender
                                                            <span class="required font-size-iframe"> * </span>
                                                        </label>
                                                        <div class="col-md-6">
                                                            <label class="radio-inline"> <input type="radio" value="f" name="gender">Female</label>
                                                            <label class="radio-inline"><input type="radio" value="m" name="gender" checked>Male</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </br>
                                            <!-- If field has confirmation will be repeated but some values will be changed-->
                                            <!-- End of confirmation field-->

                                            <div id="Cntry" class="form-group " data-visible="true">
                                                <div class="row col-md-12">
                                                    <label class="control-label col-md-4">
                                                        Country
                                                        <span class="required font-size-iframe"> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <select class="form-control font-size-iframe" data-field-dependency="0" data-mandatory="true" data-visible="true" id="CountryKey" name="CountryKey">
                                                            <option value="-1">[Select]</option>
                                                            <option value="Afghanistan">Afghanistan</option>
                                                            <option value="Albania">Albania</option>
                                                            <option value="Algeria">Algeria</option>
                                                            <option value="American Samoa">American Samoa</option>
                                                            <option value="Andorra">Andorra</option>
                                                            <option value="Angola">Angola</option>
                                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                            <option value="Armenia">Armenia</option>
                                                            <option value="Australia">Australia</option>
                                                            <option value="Austria">Austria</option>
                                                            <option value="Azerbaijan">Azerbaijan</option>
                                                            <option value="Bahamas">Bahamas</option>
                                                            <option value="Bahrain">Bahrain</option>
                                                            <option value="Bangladesh">Bangladesh</option>
                                                            <option value="Barbados">Barbados</option>
                                                            <option value="Belarus">Belarus</option>
                                                            <option value="Belgium">Belgium</option>
                                                            <option value="Belize">Belize</option>
                                                            <option value="Benin">Benin</option>
                                                            <option value="Bermuda">Bermuda</option>
                                                            <option value="Bhutan">Bhutan</option>
                                                            <option value="Bolivia">Bolivia</option>
                                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                            <option value="Botswana">Botswana</option>
                                                            <option value="Brazil">Brazil</option>
                                                            <option value="Brunei">Brunei</option>
                                                            <option value="Bulgaria">Bulgaria</option>
                                                            <option value="Burkina Faso">Burkina Faso</option>
                                                            <option value="Burundi">Burundi</option>
                                                            <option value="Cambodia">Cambodia</option>
                                                            <option value="Cameroon">Cameroon</option>
                                                            <option value="Canada">Canada</option>
                                                            <option value="Cape Verde">Cape Verde</option>
                                                            <option value="Cayman Islands">Cayman Islands</option>
                                                            <option value="Chad">Chad</option>
                                                            <option value="Chile">Chile</option>
                                                            <option value="China">China</option>
                                                            <option value="Colombia">Colombia</option>
                                                            <option value="Comoros">Comoros</option>
                                                            <option value="Congo - Brazzaville">Congo - Brazzaville</option>
                                                            <option value="Congo - Kinshasa">Congo - Kinshasa</option>
                                                            <option value="Costa Rica">Costa Rica</option>
                                                            <option value="Côte d’Ivoire">Côte d’Ivoire</option>
                                                            <option value="Croatia">Croatia</option>
                                                            <option value="Cuba">Cuba</option>
                                                            <option value="Cyprus">Cyprus</option>
                                                            <option value="Czech Republic">Czech Republic</option>
                                                            <option value="Denmark">Denmark</option>
                                                            <option value="Djibouti">Djibouti</option>
                                                            <option value="Dominica">Dominica</option>
                                                            <option value="Dominican Republic">Dominican Republic</option>
                                                            <option value="Ecuador">Ecuador</option>
                                                            <option value="Egypt">Egypt</option>
                                                            <option value="El Salvador">El Salvador</option>
                                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                            <option value="Estonia">Estonia</option>
                                                            <option value="Ethiopia">Ethiopia</option>
                                                            <option value="Fiji">Fiji</option>
                                                            <option value="Finland">Finland</option>
                                                            <option value="France">France</option>
                                                            <option value="Gabon">Gabon</option>
                                                            <option value="Gambia">Gambia</option>
                                                            <option value="Georgia">Georgia</option>
                                                            <option value="Germany">Germany</option>
                                                            <option value="Ghana">Ghana</option>
                                                            <option value="Greece">Greece</option>
                                                            <option value="Guatemala">Guatemala</option>
                                                            <option value="Guinea">Guinea</option>
                                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                            <option value="Guyana">Guyana</option>
                                                            <option value="Haiti">Haiti</option>
                                                            <option value="Honduras">Honduras</option>
                                                            <option value="Hong Kong SAR China">Hong Kong SAR China</option>
                                                            <option value="Hungary">Hungary</option>
                                                            <option value="Iceland">Iceland</option>
                                                            <option value="India">India</option>
                                                            <option value="Indonesia">Indonesia</option>
                                                            <option value="Iran">Iran</option>
                                                            <option value="Iraq">Iraq</option>
                                                            <option value="Ireland">Ireland</option>
                                                            <option value="Israel">Israel</option>
                                                            <option value="Italy">Italy</option>
                                                            <option value="Jamaica">Jamaica</option>
                                                            <option value="Japan">Japan</option>
                                                            <option value="Jordan">Jordan</option>
                                                            <option value="Kazakhstan">Kazakhstan</option>
                                                            <option value="Kenya">Kenya</option>
                                                            <option value="Kuwait">Kuwait</option>
                                                            <option value="Kosovo">Kosovo</option>
                                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                            <option value="Laos">Laos</option>
                                                            <option value="Latvia">Latvia</option>
                                                            <option value="Lebanon">Lebanon</option>
                                                            <option value="Lesotho">Lesotho</option>
                                                            <option value="Libya">Libya</option>
                                                            <option value="Liechtenstein">Liechtenstein</option>
                                                            <option value="Lithuania">Lithuania</option>
                                                            <option value="Luxembourg">Luxembourg</option>
                                                            <option value="Macedonia">Macedonia</option>
                                                            <option value="Madagascar">Madagascar</option>
                                                            <option value="Malawi">Malawi</option>
                                                            <option value="Malaysia">Malaysia</option>
                                                            <option value="Maldives">Maldives</option>
                                                            <option value="Mali">Mali</option>
                                                            <option value="Malta">Malta</option>
                                                            <option value="Marshall Islands">Marshall Islands</option>
                                                            <option value="Mauritania">Mauritania</option>
                                                            <option value="Mauritius">Mauritius</option>
                                                            <option value="Mexico">Mexico</option>
                                                            <option value="Moldova">Moldova</option>
                                                            <option value="Monaco">Monaco</option>
                                                            <option value="Mongolia">Mongolia</option>
                                                            <option value="Montenegro">Montenegro</option>
                                                            <option value="Morocco">Morocco</option>
                                                            <option value="Mozambique">Mozambique</option>
                                                            <option value="Mozambique">Namibia</option>
                                                            <option value="Nepal">Nepal</option>
                                                            <option value="Netherlands">Netherlands</option>
                                                            <option value="New Zealand">New Zealand</option>
                                                            <option value="Nicaragua">Nicaragua</option>
                                                            <option value="Niger">Niger</option>
                                                            <option value="Niger">Nigeria</option>
                                                            <option value="North Korea">North Korea</option>
                                                            <option value="Norway">Norway</option>
                                                            <option value="Oman">Oman</option>
                                                            <option value="Pakistan">Pakistan</option>
                                                            <option value="Panama">Panama</option>
                                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                                            <option value="Paraguay">Paraguay</option>
                                                            <option value="Peru">Peru</option>
                                                            <option value="Philippines">Philippines</option>
                                                            <option value="Poland">Poland</option>
                                                            <option value="Portugal">Portugal</option>
                                                            <option value="Puerto Rico">Puerto Rico</option>
                                                            <option value="Qatar">Qatar</option>
                                                            <option value="Réunion">Réunion</option>
                                                            <option value="Romania">Romania</option>
                                                            <option value="Russia">Russia</option>
                                                            <option value="Rwanda">Rwanda</option>
                                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                            <option value="Saint Lucia">Saint Lucia</option>
                                                            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                            <option value="Saint Vincent and the Grenadines">San Marino</option>
                                                            <option value="São Tomé and Príncipe">São Tomé and Príncipe</option>
                                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                                            <option value="Senegal">Senegal</option>
                                                            <option value="Serbia">Serbia</option>
                                                            <option value="Seychelles">Seychelles</option>
                                                            <option value="Sierra Leone">Sierra Leone</option>
                                                            <option value="Singapore">Singapore</option>
                                                            <option value="Slovakia">Slovakia</option>
                                                            <option value="Slovenia">Slovenia</option>
                                                            <option value="Solomon Islands">Solomon Islands</option>
                                                            <option value="Somalia">Somalia</option>
                                                            <option value="South Africa">South Africa</option>
                                                            <option value="South Korea">South Korea</option>
                                                            <option value="Spain">Spain</option>
                                                            <option value="Sri Lanka">Sri Lanka</option>
                                                            <option value="Sudan">Sudan</option>
                                                            <option value="Suriname">Suriname</option>
                                                            <option value="Swaziland">Swaziland</option>
                                                            <option value="Sweden">Sweden</option>
                                                            <option value="Switzerland">Switzerland</option>
                                                            <option value="Syria">Syria</option>
                                                            <option value="Taiwan">Taiwan</option>
                                                            <option value="Tajikistan">Tajikistan</option>
                                                            <option value="Tanzania">Tanzania</option>
                                                            <option value="Thailand">Thailand</option>
                                                            <option value="Tonga">Tonga</option>
                                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                            <option value="Tunisia">Tunisia</option>
                                                            <option value="Turkey">Turkey</option>
                                                            <option value="Uganda">Uganda</option>
                                                            <option value="Ukraine">Ukraine</option>
                                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                                            <option value="United Kingdom">United Kingdom</option>
                                                            <option value="United States">United States</option>
                                                            <option value="Uruguay">Uruguay</option>
                                                            <option value="Uzbekistan">Uzbekistan</option>
                                                            <option value="Uzbekistan">Vanuatu</option>
                                                            <option value="Venezuela">Venezuela</option>
                                                            <option value="Vietnam">Vietnam</option>
                                                            <option value="Yemen">Yemen</option>
                                                            <option value="Zambia">Zambia</option>
                                                            <option value="Zimbabwe">Zimbabwe</option>
                                                        </select>
                                                        <span id="CntryError" class="help-block font-size-iframe">
                                                            Select your country
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" data-children="">

                                                </div>
                                            </div>
                                            <!-- If field has confirmation will be repeated but some values will be changed-->
                                            <!-- End of confirmation field-->

                                            <div id="Phn" class="form-group" data-visible="true">
                                                <div class="row col-md-12">
                                                    <label class="control-label col-md-4">
                                                        Phone
                                                        <span class="required font-size-iframe"> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <input class="form-control col-md-1 col-xs-1 font-size-iframe" data-visible="true" id="PhoneExtension" maxlength="10" name="PhoneExtension" style="max-width:20%" type="number">
                                                        <input class="form-control font-size-iframe" data-field-dependency="0" data-mandatory="true" data-visible="true" id="Phone" maxlength="15" name="Phone" style="max-width:80%" type="number">
                                                        <span id="PhnError" class="help-block font-size-iframe">
                                                            Enter your phone extension and phone number
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" data-children="">

                                                </div>
                                            </div>
                                            <!-- If field has confirmation will be repeated but some values will be changed-->
                                            <!-- End of confirmation field-->
                                            <!-- If field has confirmation will be repeated but some values will be changed-->
                                            <!-- End of confirmation field-->

                                            <div id="AccTp" class="form-group" data-visible="true">
                                                <div class="row col-md-12">
                                                    <label class="control-label col-md-4">
                                                        Account Type
                                                        <span class="required font-size-iframe"> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <select class="form-control font-size-iframe" data-field-dependency="0" data-mandatory="true" data-visible="true" id="AccountTypeKey" name="AccountTypeKey">
                                                            <option value="-1">[Select]</option>
                                                            <option value="Business">Business</option>
                                                            <option value="Business Plus">Business Plus</option>
                                                            <option value="Professional">Professional</option>
                                                            <option value="STANDARD">STANDARD</option>
                                                            <option value="Normal User">Normal User</option>
                                                        </select> <span id="AccTpError" class="help-block font-size-iframe">
                                                            Select account type
                                                        </span>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- If field has confirmation will be repeated but some values will be changed-->
                                            <!-- End of confirmation field-->

                                            <!-- If field has confirmation will be repeated but some values will be changed-->
                                            <!-- End of confirmation field-->

                                            <div id="vtr" class="form-group has-error" data-visible="true">
                                                <div class="row col-md-12">
                                                    <div class="col-md-offset-4 col-md-1" style="max-width: 45px;    height: max-content;">
                                                        <div class="checker2" id="uniform-HasAcceptedTerms"><span class="checked font-size-iframe">
                                                                <input checked="checked" class="form-control font-size-iframe" data-field-dependency="0" data-mandatory="true" data-visible="true" id="HasAcceptedTerms" name="HasAcceptedTerms" type="checkbox" value="true">
                                                        </div>
                                                    </div>
                                                    <label class="col-md-6">

                                                        I declare that I have carefully read the entire text of the <a href="termsandconditions.html" target="_blank">terms and conditions</a> with which I fully understand, accept and agree.
                                                        <span class="required font-size-iframe"> * </span>
                                                        <span id="cond1" class="help-block font-size-iframe">

                                                        </span>
                                                    </label>
                                                </div>

                                                <div class="col-md-12" data-children="" style="">

                                                </div>
                                            </div>
                                            <!-- If field has confirmation will be repeated but some values will be changed-->
                                            <!-- End of confirmation field-->

                                            <div id="vtr3" class="form-group has-error" data-visible="true">
                                                <div class="row col-md-12">
                                                    <div class="col-md-offset-4 col-md-1" style="max-width: 45px;     height: max-content;">
                                                        <div class="checker2" id="uniform-HasAcceptedRiskDisclaimer">
                                                            <span class="checked font-size-iframe">
                                                                <input checked="checked" class="form-control font-size-iframe" data-field-dependency="0" data-mandatory="true" data-visible="true" id="HasAcceptedRiskDisclaimer" name="HasAcceptedRiskDisclaimer" type="checkbox" value="true">
                                                        </div>
                                                    </div>
                                                    <label class="col-md-6">

                                                        I acknowledge the <a href="riskwarning.html" target="_blank">Risk Warning</a> and the risk involved in online trading and the possibility that I may lose all my capital and that Forex and Contracts for Difference may not be appropriate products for me, but I still wish to proceed with my application.
                                                        <span class="required font-size-iframe"> * </span>
                                                        <span id="cond2" class="help-block font-size-iframe">

                                                        </span>
                                                    </label>

                                                </div>

                                                <div class="col-md-12" data-children="" style="">

                                                </div>
                                            </div>
                                            <!-- If field has confirmation will be repeated but some values will be changed-->
                                            <!-- End of confirmation field-->
                                       

                                        <div id="vtr4" class="row col-md-12">
                                            <div class="col-md-offset-4 col-md-4">
                                                <input type="submit" name="register-submit" id="Register-submit" tabindex="4" class="form-control btn btn-login" value="Sumbit">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script type="text/javascript" src="http://www.google.com/jsapi?key=<YOUR_GOOGLE_API_KEY>"></script>

<script>
    ipAddress = "";
    continentCode = "";
    continentName = "";
    countryCode = "";
    countryName = "";
    stateProv = "";
    city = "";


    $("#login-form").submit(function(e) {
        e.preventDefault();
        $('#ErrorD').removeClass('has-error');

        try {
            $.getJSON('https://api.db-ip.com/v2/free/self', function(data) {
                ipAddress = data.ipAddress;
                continentCode = data.continentCode;
                continentName = data.continentName;
                countryCode = data.countryCode;
                countryName = data.countryName;
                stateProv = data.stateProv;
                city = data.city;
                var x = document.getElementById("ErrorD");
                x.style.display = "none";
                var myform = document.getElementById("login-form");
                var fd = new FormData(myform);
                fd.append('ipAddress', ipAddress);
                fd.append('continentCode', continentCode);
                fd.append('continentName', continentName);
                fd.append('countryCode', countryCode);
                fd.append('countryName', countryName);
                fd.append('stateProv', stateProv);
                fd.append('city', city);
                Login(fd);
            })
        } catch (error) {
            var x = document.getElementById("ErrorD");
            x.style.display = "none";
            var myform = document.getElementById("login-form");
            var fd = new FormData(myform);
            fd.append('ipAddress', ipAddress);
            fd.append('continentCode', continentCode);
            fd.append('continentName', continentName);
            fd.append('countryCode', countryCode);
            fd.append('countryName', countryName);
            fd.append('stateProv', stateProv);
            fd.append('city', city);
            alert("mire");
            Login(fd);
        }
    })

    function Login(fd) {
        $.ajax({
                url: "includes/authenticate.php",
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                method: 'POST'
            })
            .done(function(response) {
                $message = "";
                resp = response.split(" ").join("");
                switch (resp) {
                    case "1":
                        var x = document.getElementById("ErrorD");
                        x.style.display = "block";
                        $('#ErrorD').addClass('has-error');
                        var element = document.getElementById("username");
                        element.scrollIntoView({
                            behavior: "smooth",
                            block: "center",
                            inline: "nearest"
                        });
                        break;
                    default:
                        window.location.href=response;
                }
            });
        return false;
    }









    $("#register-form").submit(function(e) {
        e.preventDefault();
        $('#Fname').removeClass('has-error');
        $('#Lname').removeClass('has-error');
        $('#Eml').removeClass('has-error');
        $('#Psw').removeClass('has-error');
        $('#CPsw').removeClass('has-error');
        $('#Gndr').removeClass('has-error');
        $('#Cntry').removeClass('has-error');
        $('#Phn').removeClass('has-error');
        $('#AccTp').removeClass('has-error');

        try {
            $.getJSON('https://api.db-ip.com/v2/free/self', function(data) {
                ipAddress = data.ipAddress;
                continentCode = data.continentCode;
                continentName = data.continentName;
                countryCode = data.countryCode;
                countryName = data.countryName;
                stateProv = data.stateProv;
                city = data.city;
                var x = document.getElementById("registerErrors");
                x.style.display = "none";
                var x = document.getElementById("successRegister");
                x.style.display = "none";
                var x = document.getElementById("emailExists");
                x.style.display = "none";
                var myform = document.getElementById("register-form");
                var fd = new FormData(myform);
                fd.append('ipAddress', ipAddress);
                fd.append('continentCode', continentCode);
                fd.append('continentName', continentName);
                fd.append('countryCode', countryCode);
                fd.append('countryName', countryName);
                fd.append('stateProv', stateProv);
                fd.append('city', city);
                svData(fd);
            })
        } catch (error) {
            var x = document.getElementById("registerErrors");
            x.style.display = "none";
            var x = document.getElementById("successRegister");
            x.style.display = "none";
            var x = document.getElementById("emailExists");
            x.style.display = "none";
            var myform = document.getElementById("register-form");
            var fd = new FormData(myform);
            fd.append('ipAddress', ipAddress);
            fd.append('continentCode', continentCode);
            fd.append('continentName', continentName);
            fd.append('countryCode', countryCode);
            fd.append('countryName', countryName);
            fd.append('stateProv', stateProv);
            fd.append('city', city);
            svData(fd);
        }
    })

    function svData(fd) {
        $('#FnameError').html("Your first name");
        $('#LnameError').html("Your last name");
        $('#EmailError').html("Your email address");
        $('#PswError').html("Your password");
        $('#Psw2Error').html("Confirm Psssword");
        $('#CntryError').html("Select your country");
        $('#PhnError').html("Enter your phone extension and phone number");
        $('#AccTpError').html("Select account type");
        $('#cond1').html("");
        $('#cond2').html("");

        $.ajax({
                url: "includes/register.php",
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                method: 'POST'
            })
            .done(function(response) {
                $message = "";
                resp = response.split(" ").join("");
                switch (resp) {
                    case "1":
                        var x = document.getElementById("registerErrors");
                        x.style.display = "block";
                        $('#Fname').addClass('has-error');
                        $message = "Please enter your first name";
                        $('#FnameError').html($message);
                        var element = document.getElementById("Fname");
                        element.scrollIntoView({
                            behavior: "smooth",
                            block: "start",
                            inline: "nearest"
                        });
                        break;
                    case "2":
                        var x = document.getElementById("registerErrors");
                        x.style.display = "block";
                        $('#Lname').addClass('has-error');
                        $message = "Please enter your last name";
                        $('#LnameError').html($message);
                        var element = document.getElementById("Lastname");
                        element.scrollIntoView({
                            behavior: "smooth",
                            block: "start",
                            inline: "nearest"
                        });
                        break;
                    case "3":
                        var x = document.getElementById("registerErrors");
                        x.style.display = "block";
                        $('#Eml').addClass('has-error');
                        $message = "Enter a valid email address!";
                        $('#EmailError').html($message);
                        var element = document.getElementById("Eml");
                        element.scrollIntoView({
                            behavior: "smooth",
                            block: "start",
                            inline: "nearest"
                        });
                        break;
                    case "4":
                        var x = document.getElementById("registerErrors");
                        x.style.display = "block";
                        $('#Eml').addClass('has-error');
                        $message = "Email exists";
                        $('#EmailError').html($message);
                        var element = document.getElementById("Eml");
                        element.scrollIntoView({
                            behavior: "smooth",
                            block: "start",
                            inline: "nearest"
                        });
                        break;
                    case "5":
                        var x = document.getElementById("registerErrors");
                        x.style.display = "block";
                        $('#Psw').addClass('has-error');
                        $message = "Your password needs to include at least 4 letters";
                        $('#PswError').html($message);
                        var element = document.getElementById("Psw");
                        element.scrollIntoView({
                            behavior: "smooth",
                            block: "start",
                            inline: "nearest"
                        });
                        break;
                    case "6":
                        var x = document.getElementById("registerErrors");
                        x.style.display = "block";
                        $('#CPsw').addClass('has-error');
                        $message = "Password doesn't match";
                        $('#Confirmpassword').html($message);
                        var element = document.getElementById("CPsw");
                        element.scrollIntoView({
                            behavior: "smooth",
                            block: "start",
                            inline: "nearest"
                        });
                        break;
                    case "7":
                        var x = document.getElementById("registerErrors");
                        x.style.display = "block";
                        $('#Cntry').addClass('has-error');
                        $message = "Select your country";
                        $('#CntryError').html($message);
                        var element = document.getElementById("Cntry");
                        element.scrollIntoView({
                            behavior: "smooth",
                            block: "start",
                            inline: "nearest"
                        });
                        break;
                    case "8":
                        var x = document.getElementById("registerErrors");
                        x.style.display = "block";
                        $('#Phn').addClass('has-error');
                        $message = "Type your phone number";
                        $('#PhnError').html($message);
                        var element = document.getElementById("Phn");
                        element.scrollIntoView({
                            behavior: "smooth",
                            block: "start",
                            inline: "nearest"
                        });
                        break;
                    case "9":
                        var x = document.getElementById("registerErrors");
                        x.style.display = "block";
                        $('#AccTp').addClass('has-error');
                        $message = "Select account type";
                        $('#AccTpError').html($message);
                        var element = document.getElementById("AccTp");
                        element.scrollIntoView({
                            behavior: "smooth",
                            block: "start",
                            inline: "nearest"
                        });
                        break;
                    case "10":
                        var x = document.getElementById("registerErrors");
                        x.style.display = "block";
                        $message = "You have to accept our Terms And Conditions";
                        $('#cond1').html($message);
                        var element = document.getElementById(" HasAcceptedTerms");
                        element.scrollIntoView({
                            behavior: "smooth",
                            block: "start",
                            inline: "nearest"
                        });
                        break;
                    case "11":
                        var x = document.getElementById("registerErrors");
                        x.style.display = "block";
                        $message = "You have to accept Risk Warning ";
                        $('#cond2').html($message);
                        var element = document.getElementById("HasAcceptedRiskDisclaimer");
                        element.scrollIntoView({
                            behavior: "smooth",
                            block: "start",
                            inline: "nearest"
                        });
                        break;

                    default:
                        //alert(response);
                        var x = document.getElementById("regError");
                        x.style.display = "none";
                        var x = document.getElementById("successRegister");
                        x.style.display = "block";
                        $('#tab1').html("");
                        $('#Phn').html("");
                        $('#Cntry').html("");

                        $('#AccTp').html("");
                        $('#vtr').html("");
                        $('#vtr3').html("");
                        $('#vtr4').html("");
                        

                        //window.location.href = response;
                }
            });
        return false;
    }

    function getLocation() {
        $.getJSON('https://api.db-ip.com/v2/free/self', function(data) {
            //d2=JSON.stringify(data);
            //d2=JSON.parse(d2);
            //console.log(data);
            d2 = JSON.stringify(data, null, 2);
            console.log(d2);
            return data;
        });
    }

    function showPosition(position) {
        alert(position.coords.latitude);
        //document.frm1.submit();
    }

    function positionError(error) {
        if (error.PERMISSION_DENIED) alert('Please accept geolocation');
        hideLoadingDiv();
        showError(
            'Geolocation is not enabled. Please enable to use this feature'
        );
    }
</script>