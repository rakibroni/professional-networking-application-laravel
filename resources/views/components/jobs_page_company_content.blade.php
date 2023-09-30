 <style>
     body {
         font-family: 'Roboto' !important;
     }

     .shadow-md {
         box-shadow: 0 0 10px rgba(1, 1, 1, 0.2);
     }

     ._br {
         border-radius: 5px !important;
     }

     .container {
         max-width: 1128px;
     }

     .hr {
         margin-top: 0.5rem;
         margin-bottom: 0.5rem;
         border: 0;
         border-top: 1px solid rgba(0, 0, 0, 0.1);
     }

     .row {
         --bs-gutter-x: 0 !important;
         --bs-gutter-y: 0 !important;
         margin: auto !important;
         max-width: 1128px;
     }

     .Company-Profile-Header1 {
         font-size: 35px;
         font-weight: 500;

     }

     .Company-Profile-Header2 {
         font-size: 18px;
         font-weight: 400;
         line-height: 1.3;
         color: #636466;

     }

     .Company-Profile-Header3 {
         font-size: 16px;
         line-height: 1.3;
         color: #7F7F7F;
         font-weight: 500;

     }

     .Company-Profile-Text1 {
         font-size: 20px;
         font-weight: 500;
         line-height: 1.3;

     }

     .Company-Profile-Text2 {
         font-size: 16px;
         color: #636466;
         line-height: 1.5;

     }

     .Company-Profile-Text3 {
         font-size: 17px;
         font-weight: 500;
         line-height: 1.5;

     }

     .Company-Profile-Text4 {
         font-size: 15px;
         font-weight: 500;
         line-height: 1.5;
         color: #3685D6;

     }

 </style>






 <div class="">

     <div class="row px-3">

         <div class="bg-white">
             <div class="position-relative">
                 <img class="" src="/images/{{ $company_details->cover_photo }}" alt=""
                     style="width: 1080px !important">
                 <div class="position-absolute" style="margin-left: 45px; margin-top: 80px; top:0">
                     <img class="border-primary shadow-md" src="/images/{{ $company_details->profile_picture }}" alt=""
                         style="height:100px; border-radius: 1000px">
                 </div>
             </div>
             <div class="px-5 py-3">
                 <div class="d-flex justify-content-between">
                     <div class="Company-Profile-Header1 mt-3">{{ $company_details->name }} <button type="button"
                             class="btn btn-link" onclick="showDiv('company_basic_info')" data-toggle="modal"
                             data-target="#companyProfileModal">
                             Edit
                         </button></div>

                     <div class="align-self-center mt-4">
                         <a href="{{ $company_details->curaworks_profile_link }}" class="me-3"
                             target="blank"><img src="/images/CompanyCuraworkLogo.svg" style="height: 20px" alt=""></a>
                         <a href="{{ $company_details->website_link }}" target="blank"><img
                                 src="/images/Companywebsite.png" style="height: 20px" alt=""></a>
                         <a href="{{ $company_details->facebook_link }}" target="blank"><img
                                 src="/images/Companyfacebook.png" class="mx-2" style="height: 20px"
                                 alt=""></a>
                         <a href="{{ $company_details->instagram_link }}" target="blank"><img
                                 src="/images/Companyinstagram.png" style="height: 20px" alt=""></a>
                     </div>
                 </div>
                 <div class="Company-Profile-Header2 my-2">{{ $company_details->short_desc }}
                 </div>
                 <div class="Company-Profile-Header3 my-4">{{ $company_details->total_employees }} Mitarbeiter ●
                     Gründung {{ $company_details->establishment }}</div>
                 <div class="mb-4">
                     <img src="/images/LocationIconCompany.png" style="height: 16px" alt="">
                     <span
                         class="ms-2">{{ $company_details->location_city }}-{{ $company_details->location_state }}</span>
                 </div>

                 <hr style="color: #BCBBBB">
                 @foreach ($compnay_description as $item_company_des)
                     <div class="py-3">
                         <div class="Company-Profile-Text1 mb-3">{{ $item_company_des->title }}</div>
                         <div class="Company-Profile-Text2">{{ $item_company_des->text }}
                         </div>
                         <button type="button" class="btn btn-link" data-toggle="modal"
                             onclick="showDiv('company_description_table')" data-target="#companyProfileModal">
                             Edit
                         </button>


                     </div>
                     {{-- modal here --}}
                     <hr style="color: #BCBBBB">

                 @endforeach  
                 <div class="py-3">
                     <div class="Company-Profile-Text1 mb-4">Unser Team <button type="button" class="btn btn-link"
                             data-toggle="modal" onclick="showDiv('company_employee_table')"
                             data-target="#companyProfileModal">
                             Edit
                         </button></div>
                     <div class="row text-center">
                         @foreach ($employees as $employe)
                             <div class="col-2">
                                 <img src="/images/{{ $employe->photo != '' ? $employe->photo : 'CompanyTeam3.jfif' }}" style="border-radius: 1000px; height: 80px"
                                     alt="">
                                 <div class="Company-Profile-Text3 mt-1">{{ $employe->name }}</div>
                                 <div class="Company-Profile-Text2">{{ $employe->position }}</div>
                             </div>
                         @endforeach


                     </div>
                 </div>

                 <hr style="color: #BCBBBB">

                 <div class="row py-3">
                     <div class="col-6 pe-3">
                         <div class="Company-Profile-Text1 mb-3">Wir bieten <button type="button" class="btn btn-link"
                                 data-toggle="modal" onclick="showDiv('company_provide_table')"
                                 data-target="#companyProfileModal">
                                 Edit
                             </button></div>
                         <div class="Company-Profile-Text2 list-unstyled">
                             <ul>
                                 @foreach ($provides as $provide)
                                     <li class="mb-1">{{ $provide->name }}</li>
                                 @endforeach


                             </ul>
                         </div>
                     </div>

                     <div class="col-6 ps-2">
                         <div class="d-flex justify-content-between Company-Profile-Text1 mb-3">
                             <div class="">Gallerie</div>
                             <div class="Company-Profile-Text4 align-bottom underline-on-hover pointer-on-hover">
                                 Gallerie anzeigen >
                             </div>
                         </div>
                         <div class="">
                             @foreach ($galarries as $galarry)
                                 <img type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop1"
                                     src="/images/{{ $galarry->photo }}"
                                     style="height: 100px; width: 100px; filter:blur(1px); border-radius: 5px" alt="">
                             @endforeach


                         </div>
                     </div>
                 </div>



                 <!-- Gallerie -->
                 <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false"
                     tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                     <div class="modal-dialog">
                         <div class="modal-content">
                             <div class="modal-body p-2">
                                 <div class="text-end">
                                     <img type="button" class="mb-2" src="/images/Companyclosephotos.svg"
                                         alt="" style="height: 16px" data-bs-dismiss="modal" aria-label="Close">
                                 </div>
                                 <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                     <div class="carousel-inner">
                                         <div class="carousel-item active">
                                             <img src="/images/CompanyProfilePic1.jpg" class="d-block w-100" alt="...">
                                         </div>
                                         <div class="carousel-item">
                                             <img src="/images/CompanyProfilePic2.jpg" class="d-block w-100" alt="...">
                                         </div>
                                         <div class="carousel-item">
                                             <img src="/images/CompanyProfilePic3.jpg" class="d-block w-100" alt="...">
                                         </div>
                                         <div class="carousel-item">
                                             <img src="/images/CompanyProfilePic4.jpg" class="d-block w-100" alt="...">
                                         </div>
                                     </div>
                                     <button class="carousel-control-prev" type="button"
                                         data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                         <span class="visually-hidden">Previous</span>
                                     </button>
                                     <button class="carousel-control-next" type="button"
                                         data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                         <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                         <span class="visually-hidden">Next</span>
                                     </button>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

             </div>


         </div>
     </div>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
          integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
     </script>
     <style>
         .modal-dialog {
             max-width: 950px !important;
             margin: 1.75rem auto;
         }

     </style>
     <!-- Modal company basic information  -->
     <div class="modal fade" id="companyProfileModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div id="company_basic_info" class="d-none">
                         <form>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Name</label>
                                 <input type="text" class="form-control" id="companyName" placeholder=" "
                                     value="{{ $company_details->name }}">
                                 <input type="hidden" id="companyId" value="{{ $company_details->id }}">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Short Description</label>
                                 <textarea class="form-control" id="companyDesc"
                                     rows="6">{{ $company_details->short_desc }}</textarea>
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Total Employee</label>
                                 <input type="text" class="form-control" id="totalEmp" placeholder=" "
                                     value="{{ $company_details->total_employees }}">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Establishment </label>
                                 <input type="text" class="form-control" id="establishment" placeholder=" "
                                     value="{{ $company_details->establishment }}">
                             </div>

                             <div class="px-2 mt-4">
                                 <div class="input-title">
                                     Arbeitsort
                                 </div>
                                 <?php
                                 Helper::showDropdown('city-search20', 'search-dropdown-city1220', 'z.B. Bielefeld', 'filterTest3(this.id,`search-dropdown-city1220`)', $company_details->location_city . ', ' . $company_details->location_state, [''], ['mt-1 job-filter-input', 'position-absolute bg-white shadow-md d-none', 'HideOverFlowText'], ['', 'width: 246px !important; overflow-x: hidden', ''], '');
                                 ?>
                             </div>

                             <div class="form-group">
                                 <label for="exampleInputEmail1">Curaworks Link</label>
                                 <input type="text" class="form-control" id="curaworksLink" placeholder=" "
                                     value="{{ $company_details->curaworks_profile_link }}">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Website </label>
                                 <input type="text" class="form-control" id="website" placeholder=" "
                                     value="{{ $company_details->website_link }}">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Facebook</label>
                                 <input type="text" class="form-control" id="facebook" placeholder=" "
                                     value="{{ $company_details->facebook_link }}">
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Instagram</label>
                                 <input type="text" class="form-control" id="instagram" placeholder=" "
                                     value="{{ $company_details->instagram_link }}">
                             </div>


                         </form>
                         <br>
                         <button type="button" onclick="companyBasicInfoEdit()" class="btn btn-primary">Save
                             changes</button>
                     </div>

                     <div id="company_description_table" class="d-none">
                         <form action="" name="company_description_form">
                             <table id="" class="table company-description-list">
                                 <thead>

                                 </thead>
                                 <tbody>
                                     <tr class="info">
                                         <td>Title</td>
                                         <td>Text</td>
                                         <td class="text-center">Action</td>
                                     </tr>
                                     <tr>
                                         <td class="col-sm-3">

                                         </td>
                                         <td class="col-sm-3">

                                         </td>

                                         <td class="col-sm-3 text-center">
                                             <button class="btn btn-success btn-xs" id="addCompanyDes" title="Add More"
                                                 type="button">Add More</button>
                                         </td>

                                     </tr>

                                     @foreach ($compnay_description as $item_company_des)
                                         <tr>
                                             <td class="col-sm-3">
                                                 <input type="text" name="title[]" class="form-control" required=""
                                                     value="{{ $item_company_des->title }}" />
                                                 <input type="hidden" name="desctiption_id[]"
                                                     value="{{ $item_company_des->id }}">
                                             </td>
                                             <td class="col-sm-3">
                                                 <textarea name="description_text[]" id="" cols="30"
                                                     rows="3">{{ $item_company_des->text }}</textarea>
                                             </td>

                                             <td class="col-sm-3 text-center">
                                                 <button onclick="deleteCompanyDesc({{ $item_company_des->id }})"
                                                     class="btn btn-danger btn-xs ibtnDel" title="Delete" id=""
                                                     type="button">Delete</button>
                                             </td>

                                         </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                             <button type="button" onclick="companyDescriptionEdit()" class="btn btn-primary">Save
                                 changes</button>
                         </form>
                     </div>
                     <div id="company_employee_table" class="d-none">


                         <table id="" class="table company-employee-list">
                             <thead>

                             </thead>
                             <tbody>
                                 <tr class="info">
                                     <td>Name</td>
                                     <td>Position</td>
                                     <td class="text-center">Action</td>
                                 </tr>
                                 <tr>
                                     <td class="col-sm-3">

                                     </td>
                                     <td class="col-sm-3">

                                     </td>

                                     <td class="col-sm-3 text-center">
                                         <button class="btn btn-success btn-xs" id="addCompanyEmp" title="Add More"
                                             type="button">Add More</button>
                                     </td>

                                 </tr>
                                 @foreach ($employees as $employe)
                                     <tr>
                                         <td class="col-sm-3">
                                             <input type="text" name="name[]" class="form-control" required=""
                                                 value="{{ $employe->name }}" />
                                                 <input type="hidden" name="emp_id[]"
                                                     value="{{ $employe->id }}">
                                         </td>
                                         <td class="col-sm-3">
                                             <input type="text" name="position[]" class="form-control" required=""
                                                 value="{{ $employe->position }}" />
                                         </td>

                                         <td class="col-sm-3 text-center">
                                             <button class="btn btn-danger btn-xs ibtnDel" onclick="deleteCompanyEmp({{ $employe->id }})" title="Delete" id=""
                                                 type="button">Delete</button>
                                         </td>

                                     </tr>

                                 @endforeach
                             </tbody>

                         </table>
                         <button type="button" onclick="companyEmpEdit()" class="btn btn-primary">Save
                            changes</button>

                     </div>
                     <div id="company_provide_table" class="d-none">


                         <table id="" class="table company-provide-list">
                             <thead>

                             </thead>
                             <tbody>
                                 <tr class="info">
                                     <td>Name</td>
                                     <td class="text-center">Action</td>
                                 </tr>
                                 <tr>

                                     <td class="col-sm-3">

                                     </td>

                                     <td class="col-sm-3 text-center">
                                         <button class="btn btn-success btn-xs" id="addCompanyPro" title="Add More"
                                             type="button">Add More</button>
                                     </td>

                                 </tr>
                                 @foreach ($provides as $provide)
                                     <tr>

                                         <td class="col-sm-3">
                                             <input type="text" name="provide_name[]" class="form-control" required="" value="{{ $provide->name }}" />
                                             <input type="hidden" name="pro_id[]" class="form-control" required="" value="{{ $provide->id }}" />
                                         </td>


                                         <td class="text-center"><button  onclick="deleteCompanyPro({{ $provide->id }})"  class="btn btn-danger btn-xs ibtnDel"
                                                 title="Delete" id="" type="button">Delete</button></td>

                                     </tr>
                                 @endforeach


                             </tbody>

                         </table>
                         <button type="button" onclick="companyProEdit()" class="btn btn-primary">Save
                             changes</button>
                     </div>

                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                 </div>
             </div>
         </div>
     </div>
     <script>
         $(document).ready(function() {

             var counter = 0;

             $("#addCompanyDes").on("click", function() {
                 var newRow = $("<tr>");
                 var cols = "";
                 cols +=
                     '<td><input required="required" type="text"   class="form-control" name="title[]" id="title_' +
                     counter + '"/></td>';
                 cols += '<td><textarea name="description_text[]" id="text_' + counter +
                     '" cols="30" rows="3"></textarea>  </td>';
                 cols +=
                     '<td class="text-center"><button class="btn btn-danger btn-xs ibtnDel" title="Delete" id="" type="button">Delete</button></td>';
                 newRow.append(cols);
                 $("table.company-description-list").append(newRow);
                 counter++;
             });

             $("table.company-description-list").on("click", ".ibtnDel", function(event) {
                 $(this).closest("tr").remove();
                 counter -= 1
             });

             $("#addCompanyEmp").on("click", function() {
                 var newRow = $("<tr>");
                 var cols = "";
                 cols +=
                     '<td><input required="required" type="text"   class="form-control" name="name[]" id="title_' +
                     counter + '"/></td>';
                 cols +=
                     '<td><input required="required" type="text"   class="form-control" name="position[]" id="title_' +
                     counter + '"/></td>';

                 cols +=
                     '<td class="text-center"><button class="btn btn-danger btn-xs ibtnDel" title="Delete" id="" type="button">Delete</button></td>';
                 newRow.append(cols);
                 $("table.company-employee-list").append(newRow);
                 counter++;
             });

             $("table.company-employee-list").on("click", ".ibtnDel", function(event) {
                 $(this).closest("tr").remove();
                 counter -= 1
             });
             $("#addCompanyPro").on("click", function() {
                 var newRow = $("<tr>");
                 var cols = "";
                 cols +=
                     '<td><input required="required" type="text"   class="form-control" name="provide_name[]" id="title_' +
                     counter + '"/></td>';
                 cols +=
                     '<td class="text-center"><button class="btn btn-danger btn-xs ibtnDel" title="Delete" id="" type="button">Delete</button></td>';
                 newRow.append(cols);
                 $("table.company-provide-list").append(newRow);
                 counter++;
             });

             $("table.company-provide-list").on("click", ".ibtnDel", function(event) {
                 $(this).closest("tr").remove();
                 counter -= 1
             });


         });
         $("#search-dropdown-city1220").click(function() {
             searchTalents();
         });

         function showDiv(div_id) {
             $('#company_basic_info').addClass('d-none');
             $('#company_description_table').addClass('d-none');
             $('#company_employee_table').addClass('d-none');
             $('#company_provide_table').addClass('d-none');
             $('#' + div_id).removeClass('d-none');
         }


         function companyBasicInfoEdit() {
             var companyId = $('#companyId').val();
             var companyName = $('#companyName').val();
             var companyDesc = $('#companyDesc').val();
             var totalEmp = $('#totalEmp').val();
             var establishment = $('#establishment').val();
             var curaworksLink = $('#curaworksLink').val();
             var website = $('#website').val();
             var facebook = $('#facebook').val();
             var instagram = $('#instagram').val();
             var location = $('#city-search20').val();
             var location_split = location.split(/,/);
             var locationCity = location_split[0];
             var locationState = location_split[1];

             var form = new FormData;
             form.append('companyId', companyId);
             form.append('companyName', companyName);
             form.append('companyDesc', companyDesc);
             form.append('totalEmp', totalEmp);
             form.append('establishment', establishment);
             form.append('curaworksLink', curaworksLink);
             form.append('website', website);
             form.append('facebook', facebook);
             form.append('instagram', instagram);
             form.append('locationCity', locationCity);
             form.append('locationState', locationState);

             ajaxSetup();
             var functionsOnSuccess = [
                 [displayCompanyBasicInfoUpdate, ['response']]
             ];
             ajax('/edit_company_basic_info', 'POST', functionsOnSuccess, form);
         }

         function displayCompanyBasicInfoUpdate(content) {
             alert('Data Update successfully');
             $('#companyProfileModal').modal('toggle'); 
             loadCompanyPage('jakob_podkrajac');
         }

         function companyDescriptionEdit() {
             var form = new FormData;
             var companyId = $('#companyId').val();
             form.append('companyId', companyId);
             $.each($('input[name="desctiption_id[]"]'), function(i, elm) {
                 form.append('desctiption_id[]', elm.value);
             });
             $.each($('input[name="title[]"]'), function(i, elm) {
                 form.append('title[]', elm.value);
             });
             $.each($('textarea[name="description_text[]"]'), function(i, elm) {
                 form.append('description_text[]', elm.value);
             });
             ajaxSetup();
             var functionsOnSuccess = [
                 [displayCompanyDescUpdate, ['response']]
             ];
             ajax('/edit_company_desc', 'POST', functionsOnSuccess, form);

         }

         function displayCompanyDescUpdate(content) {
             alert('Data Update successfully');
             $('#companyProfileModal').modal('toggle'); 
             loadCompanyPage('jakob_podkrajac');
         }

         function deleteCompanyDesc(description_id) {
             var form = new FormData;
             form.append('description_id', description_id);

             ajaxSetup();
             var functionsOnSuccess = [
                 [displayCompanyDescDelete, ['response']]
             ];
             ajax('/delete_company_desc', 'POST', functionsOnSuccess, form);

         }
         function displayCompanyDescDelete(content) {
             alert('Data Update successfully');
             
         }

         function companyEmpEdit() {
             var form = new FormData;
             var companyId = $('#companyId').val();
             form.append('companyId', companyId);
             $.each($('input[name="name[]"]'), function(i, elm) {
                 form.append('name[]', elm.value);
             });
             $.each($('input[name="position[]"]'), function(i, elm) {
                 form.append('position[]', elm.value);
             }); 
             $.each($('input[name="emp_id[]"]'), function(i, elm) {
                 form.append('emp_id[]', elm.value);
             }); 
             ajaxSetup();
             var functionsOnSuccess = [
                 [displayCompanyEmpUpdate, ['response']]
             ];
             ajax('/edit_company_emp', 'POST', functionsOnSuccess, form);

         }

         function displayCompanyEmpUpdate(content) {
             alert('Data Update successfully');
             $('#companyProfileModal').modal('toggle'); 
             loadCompanyPage('jakob_podkrajac');
         }

         function deleteCompanyEmp(emp_id) {
             var form = new FormData;
             form.append('emp_id', emp_id);

             ajaxSetup();
             var functionsOnSuccess = [
                 [displayCompanyEmpDelete, ['response']]
             ];
             ajax('/delete_company_emp', 'POST', functionsOnSuccess, form);

         }
         function displayCompanyEmpDelete(content) {
             alert('Data Update successfully');
         }


         function companyProEdit() {
             var form = new FormData;
             var companyId = $('#companyId').val();
             form.append('companyId', companyId);
             $.each($('input[name="provide_name[]"]'), function(i, elm) {
                 form.append('provide_name[]', elm.value);
             });
              
             $.each($('input[name="pro_id[]"]'), function(i, elm) {
                 form.append('pro_id[]', elm.value);
             }); 
             ajaxSetup();
             var functionsOnSuccess = [
                 [displayCompanyProUpdate, ['response']]
             ];
             ajax('/edit_company_pro', 'POST', functionsOnSuccess, form);

         }

         function displayCompanyProUpdate(content) {
             alert('Data Update successfully');
             $('#companyProfileModal').modal('toggle'); 
             loadCompanyPage('jakob_podkrajac');
         }

         function deleteCompanyPro(pro_id) {
             var form = new FormData;
             form.append('pro_id', pro_id);

             ajaxSetup();
             var functionsOnSuccess = [
                 [displayCompanyProDelete, ['response']]
             ];
             ajax('/delete_company_pro', 'POST', functionsOnSuccess, form);

         }
         function displayCompanyProDelete(content) {
             alert('Data Update successfully');
         }
     </script>
