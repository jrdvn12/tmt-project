<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Vendor</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="vendor_add.php" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="vendor_name" class="col-sm-2 control-label">Vendor Name</label>

                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="vendor_name" name="vendor_name" required placeholder="Vendor Name">
                    </div>

                    
                    <label for="company_name" class="col-sm-2 control-label">Company Name</label>

                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="company_name" name="company_name" required  placeholder="Company Name">
                    </div>                                         
                </div>

                <div class="form-group">
                    <label for="vendor_address" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="vendor_address" name="vendor_address" required placeholder="Address">
                    </div>

                    
                    <label for="city" class="col-sm-2 control-label">City</label>
                    <div class="col-sm-4"> 
                        <select class="form-control" name="city" id="city" required>
                            <option value="" selected>- CITY -</option>
                            <option value="ANGELES">ANGELES</option>
                            <option value="ANTIPOLO">ANTIPOLO</option>
                            <option value="BACOLOD">BACOLOD</option>
                            <option value="BACOOR">BACOOR</option>
                            <option value="BAGUIO">BAGUIO</option>
                            <option value="BAYAWAN">BAYAWAN</option>
                            <option value="BAYBAY">BAYBAY</option>
                            <option value="BORONGAN">BORONGAN</option>
                            <option value="BUTUAN">BUTUAN</option>
                            <option value="CAGAYAN DE ORO">CAGAYAN DE ORO</option>
                            <option value="CALAMBA">CALAMBA</option>
                            <option value="CALOOCAN">CALOOCAN</option>
                            <option value="CEBU CITY">CEBU CITY</option>
                            <option value="DASMARIÑAS">DASMARIÑAS</option>
                            <option value="DAVAO CITY">DAVAO CITY</option>
                            <option value="DIGOS">DIGOS</option>
                            <option value="GINGOOG">GINGOOG</option>
                            <option value="GENERAL SANTOS">GENERAL SANTOS</option>
                            <option value="ILOILO CITY">ILOILO CITY</option>
                            <option value="ILIGAN">ILIGAN</option>
                            <option value="IRIGA">IRIGA</option>
                            <option value="ISABELA">ISABELA</option>
                            <option value="LAPU-LAPU">LAPU-LAPU</option>
                            <option value="LAS PIÑAS">LAS PIÑAS</option>
                            <option value="LEGAZPI">LEGAZPI</option>
                            <option value="LIPA">LIPA</option>
                            <option value="LUCENA">LUCENA</option>
                            <option value="MANDAUE">MANDAUE</option>
                            <option value="MANDALUYONG">MANDALUYONG</option>
                            <option value="MANILA">MANILA</option>
                            <option value="MARIKINA">MARIKINA</option>
                            <option value="MAKATI">MAKATI</option>
                            <option value="MALAYBALAY">MALAYBALAY</option>
                            <option value="MUNTINLUPA">MUNTINLUPA</option>
                            <option value="NAGA">NAGA</option>
                            <option value="NAVOTAS">NAVOTAS</option>
                            <option value="ORMOC">ORMOC</option>
                            <option value="PARAÑAQUE">PARAÑAQUE</option>
                            <option value="PASAY">PASAY</option>
                            <option value="PASIG">PASIG</option>
                            <option value="PUERTO PRINCESA">PUERTO PRINCESA</option>
                            <option value="QUEZON CITY">QUEZON CITY</option>
                            <option value="SAN JOSE DEL MONTE">SAN JOSE DEL MONTE</option>
                            <option value="SANTA ROSA">SANTA ROSA</option>
                            <option value="SANTIAGO">SANTIAGO</option>
                            <option value="TAGUIG">TAGUIG</option>
                            <option value="TACLOBAN">TACLOBAN</option>
                            <option value="TANAUAN">TANAUAN</option>
                            <option value="VALENZUELA">VALENZUELA</option>
                            <option value="ZAMBOANGA CITY">ZAMBOANGA CITY</option>

                        </select>                                      
                    </div>
                </div>


                <div class="form-group">          
                    <label for="province" class="col-sm-2 control-label">PROVINCE</label>
                    <div class="col-sm-4"> 
                        <select class="form-control" name="province" id="province" required>
                            <option value="" selected>- PROVINCE -</option>
                            <option value="ABRA">ABRA</option>
                            <option value="AGUSAN DEL NORTE">AGUSAN DEL NORTE</option>
                            <option value="AGUSAN DEL SUR">AGUSAN DEL SUR</option>
                            <option value="AKLAN">AKLAN</option>
                            <option value="ALBAY">ALBAY</option>
                            <option value="ANTIQUE">ANTIQUE</option>
                            <option value="APAYAO">APAYAO</option>
                            <option value="AURORA">AURORA</option>
                            <option value="BASILAN">BASILAN</option>
                            <option value="BATAAN">BATAAN</option>
                            <option value="BATANES">BATANES</option>
                            <option value="BATANGAS">BATANGAS</option>
                            <option value="BENGUET">BENGUET</option>
                            <option value="BILIRAN">BILIRAN</option>
                            <option value="BOHOL">BOHOL</option>
                            <option value="BUKIDNON">BUKIDNON</option>
                            <option value="BULACAN">BULACAN</option>
                            <option value="CAGAYAN">CAGAYAN</option>
                            <option value="CAMARINES NORTE">CAMARINES NORTE</option>
                            <option value="CAMARINES SUR">CAMARINES SUR</option>
                            <option value="CAMIGUIN">CAMIGUIN</option>
                            <option value="CAPIZ">CAPIZ</option>
                            <option value="CATANDUANES">CATANDUANES</option>
                            <option value="CAVITE">CAVITE</option>
                            <option value="CEBU">CEBU</option>
                            <option value="COMPOSTELA VALLEY">COMPOSTELA VALLEY (NOW DAVAO DE ORO)</option>
                            <option value="COTABATO">COTABATO</option>
                            <option value="DAVAO DEL NORTE">DAVAO DEL NORTE</option>
                            <option value="DAVAO DEL SUR">DAVAO DEL SUR</option>
                            <option value="DAVAO OCCIDENTAL">DAVAO OCCIDENTAL</option>
                            <option value="DAVAO ORIENTAL">DAVAO ORIENTAL</option>
                            <option value="DINAGAT ISLANDS">DINAGAT ISLANDS</option>
                            <option value="EASTERN SAMAR">EASTERN SAMAR</option>
                            <option value="GUIMARAS">GUIMARAS</option>
                            <option value="IFUGAO">IFUGAO</option>
                            <option value="ILOCOS NORTE">ILOCOS NORTE</option>
                            <option value="ILOCOS SUR">ILOCOS SUR</option>
                            <option value="ILOILO">ILOILO</option>
                            <option value="ISABELA">ISABELA</option>
                            <option value="KALINGA">KALINGA</option>
                            <option value="LA UNION">LA UNION</option>
                            <option value="LAGUNA">LAGUNA</option>
                            <option value="LANAO DEL NORTE">LANAO DEL NORTE</option>
                            <option value="LANAO DEL SUR">LANAO DEL SUR</option>
                            <option value="LEYTE">LEYTE</option>
                            <option value="MAGUINDANAO">MAGUINDANAO</option>
                            <option value="MARINDUQUE">MARINDUQUE</option>
                            <option value="MASBATE">MASBATE</option>
                            <option value="METRO MANILA">METRO MANILA</option>
                            <option value="MISAMIS OCCIDENTAL">MISAMIS OCCIDENTAL</option>
                            <option value="MISAMIS ORIENTAL">MISAMIS ORIENTAL</option>
                            <option value="MOUNTAIN PROVINCE">MOUNTAIN PROVINCE</option>
                            <option value="NEGROS OCCIDENTAL">NEGROS OCCIDENTAL</option>
                            <option value="NEGROS ORIENTAL">NEGROS ORIENTAL</option>
                            <option value="NORTHERN SAMAR">NORTHERN SAMAR</option>
                            <option value="NUEVA ECIJA">NUEVA ECIJA</option>
                            <option value="NUEVA VIZCAYA">NUEVA VIZCAYA</option>
                            <option value="OCCIDENTAL MINDORO">OCCIDENTAL MINDORO</option>
                            <option value="ORIENTAL MINDORO">ORIENTAL MINDORO</option>
                            <option value="PALAWAN">PALAWAN</option>
                            <option value="PAMPANGA">PAMPANGA</option>
                            <option value="PANGASINAN">PANGASINAN</option>
                            <option value="QUEZON">QUEZON</option>
                            <option value="QUIRINO">QUIRINO</option>
                            <option value="RIZAL">RIZAL</option>
                            <option value="ROMBLON">ROMBLON</option>
                            <option value="SAMAR">SAMAR</option>
                            <option value="SARANGANI">SARANGANI</option>
                            <option value="SIQUIJOR">SIQUIJOR</option>
                            <option value="SORSOGON">SORSOGON</option>
                            <option value="SOUTH COTABATO">SOUTH COTABATO</option>
                            <option value="SOUTHERN LEYTE">SOUTHERN LEYTE</option>
                            <option value="SULTAN KUDARAT">SULTAN KUDARAT</option>
                            <option value="SULU">SULU</option>
                            <option value="SURIGAO DEL NORTE">SURIGAO DEL NORTE</option>
                            <option value="SURIGAO DEL SUR">SURIGAO DEL SUR</option>
                            <option value="TARLAC">TARLAC</option>
                            <option value="TAWI-TAWI">TAWI-TAWI</option>
                            <option value="ZAMBALES">ZAMBALES</option>
                            <option value="ZAMBOANGA DEL NORTE">ZAMBOANGA DEL NORTE</option>
                            <option value="ZAMBOANGA DEL SUR">ZAMBOANGA DEL SUR</option>
                            <option value="ZAMBOANGA SIBUGAY">ZAMBOANGA SIBUGAY</option>
                    


                        </select>                                      
                    </div>

                    <label for="zip_code" class="col-sm-2 control-label">Zip Code</label>

                    <div class="col-sm-4">
                    <input type="text" class="form-control" id="zip_code" name="zip_code" required placeholder="ZIP CODE">
                    </div>
                   
                </div>

                <div class="form-group">          
                    <label for="country" class="col-sm-2 control-label">Country</label>
                        <div class="col-sm-4"> 
                            <input type="text" class="form-control" id="country" name="country" required placeholder="Country">                        
                        </div>                        
                    <label for="phone_number" class="col-sm-2 control-label">Phone Number</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="phone_number" name="phone_number" required placeholder="Phone Number" maxlength="11">
                        </div>     
                </div>

                <div class="form-group">          
                    <label for="email_address" class="col-sm-2 control-label">Email Address</label>
                        <div class="col-sm-4"> 
                            <input type="email" class="form-control" id="email_address" name="email_address" required placeholder="Email Address">                        
                        </div>
                </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" name="add" onclick="validateForm()"><i class="fa fa-save"></i> Save</button>
                    </div>
                    </form>
                
            </div>
        </div>    
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	
                <h4 class="modal-title"><b>Edit Vendor <span class="vendor_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="vendor_edit.php" enctype="multipart/form-data">
                    
                <input type="hidden" class="vendor_id" name="vendor_id" aria-label="Vendor ID">
                <div class="form-group">
                    <label for="edit_vendor_name" class="col-sm-2 control-label">Vendor Name</label>

                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="edit_vendor_name" name="edit_vendor_name" required placeholder="Vendor Name">
                    </div>

                    
                    <label for="edit_company_name" class="col-sm-2 control-label">Company Name</label>

                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="edit_company_name" name="edit_company_name" required  placeholder="Company Name">
                    </div>                                         
                </div>

                <div class="form-group">
                    <label for="edit_vendor_address" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="edit_vendor_address" name="edit_vendor_address" required placeholder="Address">
                    </div>

                    
                    <label for="city" class="col-sm-2 control-label">City</label>
                    <div class="col-sm-4"> 
                        <select class="form-control" name="edit_city" id="edit_city" required>
                            <option value="" selected>- CITY -</option>
                            <option value="ANGELES">ANGELES</option>
                            <option value="ANTIPOLO">ANTIPOLO</option>
                            <option value="BACOLOD">BACOLOD</option>
                            <option value="BACOOR">BACOOR</option>
                            <option value="BAGUIO">BAGUIO</option>
                            <option value="BAYAWAN">BAYAWAN</option>
                            <option value="BAYBAY">BAYBAY</option>
                            <option value="BORONGAN">BORONGAN</option>
                            <option value="BUTUAN">BUTUAN</option>
                            <option value="CAGAYAN DE ORO">CAGAYAN DE ORO</option>
                            <option value="CALAMBA">CALAMBA</option>
                            <option value="CALOOCAN">CALOOCAN</option>
                            <option value="CEBU CITY">CEBU CITY</option>
                            <option value="DASMARIÑAS">DASMARIÑAS</option>
                            <option value="DAVAO CITY">DAVAO CITY</option>
                            <option value="DIGOS">DIGOS</option>
                            <option value="GINGOOG">GINGOOG</option>
                            <option value="GENERAL SANTOS">GENERAL SANTOS</option>
                            <option value="ILOILO CITY">ILOILO CITY</option>
                            <option value="ILIGAN">ILIGAN</option>
                            <option value="IRIGA">IRIGA</option>
                            <option value="ISABELA">ISABELA</option>
                            <option value="LAPU-LAPU">LAPU-LAPU</option>
                            <option value="LAS PIÑAS">LAS PIÑAS</option>
                            <option value="LEGAZPI">LEGAZPI</option>
                            <option value="LIPA">LIPA</option>
                            <option value="LUCENA">LUCENA</option>
                            <option value="MANDAUE">MANDAUE</option>
                            <option value="MANDALUYONG">MANDALUYONG</option>
                            <option value="MANILA">MANILA</option>
                            <option value="MARIKINA">MARIKINA</option>
                            <option value="MAKATI">MAKATI</option>
                            <option value="MALAYBALAY">MALAYBALAY</option>
                            <option value="MUNTINLUPA">MUNTINLUPA</option>
                            <option value="NAGA">NAGA</option>
                            <option value="NAVOTAS">NAVOTAS</option>
                            <option value="ORMOC">ORMOC</option>
                            <option value="PARAÑAQUE">PARAÑAQUE</option>
                            <option value="PASAY">PASAY</option>
                            <option value="PASIG">PASIG</option>
                            <option value="PUERTO PRINCESA">PUERTO PRINCESA</option>
                            <option value="QUEZON CITY">QUEZON CITY</option>
                            <option value="SAN JOSE DEL MONTE">SAN JOSE DEL MONTE</option>
                            <option value="SANTA ROSA">SANTA ROSA</option>
                            <option value="SANTIAGO">SANTIAGO</option>
                            <option value="TAGUIG">TAGUIG</option>
                            <option value="TACLOBAN">TACLOBAN</option>
                            <option value="TANAUAN">TANAUAN</option>
                            <option value="VALENZUELA">VALENZUELA</option>
                            <option value="ZAMBOANGA CITY">ZAMBOANGA CITY</option>

                        </select>                                      
                    </div>
                </div>


                <div class="form-group">          
                    <label for="province" class="col-sm-2 control-label">PROVINCE</label>
                    <div class="col-sm-4"> 
                        <select class="form-control" name="edit_province" id="edit_province" required>
                            <option value="" selected>- PROVINCE -</option>
                            <option value="ABRA">ABRA</option>
                            <option value="AGUSAN DEL NORTE">AGUSAN DEL NORTE</option>
                            <option value="AGUSAN DEL SUR">AGUSAN DEL SUR</option>
                            <option value="AKLAN">AKLAN</option>
                            <option value="ALBAY">ALBAY</option>
                            <option value="ANTIQUE">ANTIQUE</option>
                            <option value="APAYAO">APAYAO</option>
                            <option value="AURORA">AURORA</option>
                            <option value="BASILAN">BASILAN</option>
                            <option value="BATAAN">BATAAN</option>
                            <option value="BATANES">BATANES</option>
                            <option value="BATANGAS">BATANGAS</option>
                            <option value="BENGUET">BENGUET</option>
                            <option value="BILIRAN">BILIRAN</option>
                            <option value="BOHOL">BOHOL</option>
                            <option value="BUKIDNON">BUKIDNON</option>
                            <option value="BULACAN">BULACAN</option>
                            <option value="CAGAYAN">CAGAYAN</option>
                            <option value="CAMARINES NORTE">CAMARINES NORTE</option>
                            <option value="CAMARINES SUR">CAMARINES SUR</option>
                            <option value="CAMIGUIN">CAMIGUIN</option>
                            <option value="CAPIZ">CAPIZ</option>
                            <option value="CATANDUANES">CATANDUANES</option>
                            <option value="CAVITE">CAVITE</option>
                            <option value="CEBU">CEBU</option>
                            <option value="COMPOSTELA VALLEY">COMPOSTELA VALLEY (NOW DAVAO DE ORO)</option>
                            <option value="COTABATO">COTABATO</option>
                            <option value="DAVAO DEL NORTE">DAVAO DEL NORTE</option>
                            <option value="DAVAO DEL SUR">DAVAO DEL SUR</option>
                            <option value="DAVAO OCCIDENTAL">DAVAO OCCIDENTAL</option>
                            <option value="DAVAO ORIENTAL">DAVAO ORIENTAL</option>
                            <option value="DINAGAT ISLANDS">DINAGAT ISLANDS</option>
                            <option value="EASTERN SAMAR">EASTERN SAMAR</option>
                            <option value="GUIMARAS">GUIMARAS</option>
                            <option value="IFUGAO">IFUGAO</option>
                            <option value="ILOCOS NORTE">ILOCOS NORTE</option>
                            <option value="ILOCOS SUR">ILOCOS SUR</option>
                            <option value="ILOILO">ILOILO</option>
                            <option value="ISABELA">ISABELA</option>
                            <option value="KALINGA">KALINGA</option>
                            <option value="LA UNION">LA UNION</option>
                            <option value="LAGUNA">LAGUNA</option>
                            <option value="LANAO DEL NORTE">LANAO DEL NORTE</option>
                            <option value="LANAO DEL SUR">LANAO DEL SUR</option>
                            <option value="LEYTE">LEYTE</option>
                            <option value="MAGUINDANAO">MAGUINDANAO</option>
                            <option value="MARINDUQUE">MARINDUQUE</option>
                            <option value="MASBATE">MASBATE</option>
                            <option value="METRO MANILA">METRO MANILA</option>
                            <option value="MISAMIS OCCIDENTAL">MISAMIS OCCIDENTAL</option>
                            <option value="MISAMIS ORIENTAL">MISAMIS ORIENTAL</option>
                            <option value="MOUNTAIN PROVINCE">MOUNTAIN PROVINCE</option>
                            <option value="NEGROS OCCIDENTAL">NEGROS OCCIDENTAL</option>
                            <option value="NEGROS ORIENTAL">NEGROS ORIENTAL</option>
                            <option value="NORTHERN SAMAR">NORTHERN SAMAR</option>
                            <option value="NUEVA ECIJA">NUEVA ECIJA</option>
                            <option value="NUEVA VIZCAYA">NUEVA VIZCAYA</option>
                            <option value="OCCIDENTAL MINDORO">OCCIDENTAL MINDORO</option>
                            <option value="ORIENTAL MINDORO">ORIENTAL MINDORO</option>
                            <option value="PALAWAN">PALAWAN</option>
                            <option value="PAMPANGA">PAMPANGA</option>
                            <option value="PANGASINAN">PANGASINAN</option>
                            <option value="QUEZON">QUEZON</option>
                            <option value="QUIRINO">QUIRINO</option>
                            <option value="RIZAL">RIZAL</option>
                            <option value="ROMBLON">ROMBLON</option>
                            <option value="SAMAR">SAMAR</option>
                            <option value="SARANGANI">SARANGANI</option>
                            <option value="SIQUIJOR">SIQUIJOR</option>
                            <option value="SORSOGON">SORSOGON</option>
                            <option value="SOUTH COTABATO">SOUTH COTABATO</option>
                            <option value="SOUTHERN LEYTE">SOUTHERN LEYTE</option>
                            <option value="SULTAN KUDARAT">SULTAN KUDARAT</option>
                            <option value="SULU">SULU</option>
                            <option value="SURIGAO DEL NORTE">SURIGAO DEL NORTE</option>
                            <option value="SURIGAO DEL SUR">SURIGAO DEL SUR</option>
                            <option value="TARLAC">TARLAC</option>
                            <option value="TAWI-TAWI">TAWI-TAWI</option>
                            <option value="ZAMBALES">ZAMBALES</option>
                            <option value="ZAMBOANGA DEL NORTE">ZAMBOANGA DEL NORTE</option>
                            <option value="ZAMBOANGA DEL SUR">ZAMBOANGA DEL SUR</option>
                            <option value="ZAMBOANGA SIBUGAY">ZAMBOANGA SIBUGAY</option>
                    


                        </select>                                      
                    </div>

                    <label for="edit_zip_code" class="col-sm-2 control-label">Zip Code</label>

                    <div class="col-sm-4">
                    <input type="text" class="form-control" id="edit_zip_code" name="edit_zip_code" required placeholder="ZIP CODE">
                    </div>
                   
                </div>

                <div class="form-group">          
                    <label for="edit_country" class="col-sm-2 control-label">Country</label>

                    <div class="col-sm-4"> 
                        <input type="text" class="form-control" id="edit_country" name="edit_country" required placeholder="Country">                        
                    </div>

                    <label for="edit_phone_number" class="col-sm-2 control-label">Phone Number</label>

                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="edit_phone_number" name="edit_phone_number" required placeholder="Phone Number">
                    </div>
                   
                </div>

                <div class="form-group">          
                    <label for="edit_email_address" class="col-sm-2 control-label">Email Address</label>
                    <div class="col-sm-4"> 
                        <input type="email" class="form-control" id="edit_email_address" name="edit_email_address" required placeholder="Email Address">
                        <small id="emailHelp" class="form-text text-muted">Please enter a valid email address ending with @gmail.com or @yahoo.com</small>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</div>


<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span id="attendance_date"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="attendance_delete.php">
            		<input type="hidden" class="id" name="id">
            		<div class="text-center">
	                	<p>DELETE VENDOR</p>
	                	<b> <h2 class="del_vendor_name" class="bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>



<script>
function validateForm() {
    var phone_number = document.getElementById("phone_number").value;
    var email_address = document.getElementById("email_address").value;

    // Phone number validation
    if (phone_number.length !== 11 || phone_number.substring(0, 2) !== "09" || isNaN(phone_number)) {
        alert("Phone number must be 11 digits and start with '09'");
        return false;
    }

    // Email address validation
    if (!email_address.endsWith("@gmail.com") && !email_address.endsWith("@yahoo.com")) {
        alert("Email address must end with @gmail.com or @yahoo.com");
        return false;
    }

    return true;
}
</script>
