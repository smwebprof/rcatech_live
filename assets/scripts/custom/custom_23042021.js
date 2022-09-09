/**
Custom module for you to write your own javascript functions
**/
var Custom = function () {

    // private functions & variables

    var myFunc = function(text) {
        alert(text);
    }

    // public functions
    return {

        //main function
        init: function () {
            //initialize here something.            
        },

        //some helper function
        doSomeStuff: function () {
            myFunc();
        },

        //////////CompanyMaster Validation Starts
        initCompanyMaster: function () {
            $('.companymaster-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    company_name: {
                        required: true
                    },
                    company_address: {
                        required: true
                    },
                    company_country: {
                        required: true
                    },
                    company_state: {
                        required: true
                    },
                    company_city: {
                        required: true
                    },
                    company_pincode: {
                        required: true
                    },
                    company_telno: {
                        required: true
                    },
                    company_panno: {
                        required: false
                    },
                    remember: {
                        required: false
                    }
                },

                messages: {
                    company_name: {
                        required: "Company Name is required."
                    },
                    company_address: {
                        required: "Company Address is required."
                    },
                    company_country: {
                        required: "Country is required."
                    },
                    company_state: {
                        required: "State is required."
                    },
                    company_city: {
                        required: "City is required."
                    },
                    company_pincode: {
                        required: "Pincode is required."
                    },
                    company_telno: {
                        required: "Telephone No is required."
                    },
                    company_panno: {
                        required: "PAN No is required."
                    },
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.companymaster-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        },
        ////////// CompanyMaster Validation Ends

        //////////BranchMaster Validation Starts
        initBranchMaster: function () {
            $('.branchmaster-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
               
                    branch_name: {
                        required: true
                    },
                    branch_company_name: {
                        required: true
                    },
                    branch_email: {
                        required: true
                    },
                    branch_type: {
                        required: true
                    },
                    branch_cp: {
                        required: false
                    },
                    branch_address: {
                        required: true
                    },
                    bank_name: {
                        required: true
                    },
                    bank_branch: {
                        required: true
                    },
                    bank_address: {
                        required: true
                    },
                    bank_acct: {
                        required: true
                    },
                    bank_ifsc: {
                        required: false
                    },
                    company_country: {
                        required: true
                    },
                    company_state: {
                        required: true
                    },
                    company_city: {
                        required: true
                    },
                    invoice_incharge: {
                        required: false
                    },
                    remember: {
                        required: false
                    }
                },

                messages: {
                    branch_name: {
                        required: "Branch Name is required."
                    },
                    branch_company_name: {
                        required: "Company Name is required."
                    },
                    branch_email: {
                        required: "Branch Email is required."
                    },
                    branch_type: {
                        required: "Branch Type is required."
                    },
                    branch_cp: {
                        required: "Certificate Prefix is required."
                    },
                    branch_address: {
                        required: "Branch Address is required."
                    },
                    bank_name: {
                        required: "Bank Name is required."
                    },
                    bank_branch: {
                        required: "Bank Branch is required."
                    },
                    bank_address: {
                        required: "Bank Address is required."
                    },
                    bank_acct: {
                        required: "Bank Account is required."
                    },
                    bank_ifsc: {
                        required: "Bank Ifsc is required."
                    },
                    company_country: {
                        required: "Country is required."
                    },
                    company_state: {
                        required: "State is required."
                    },
                    company_city: {
                        required: "City is required."
                    },
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.branchmaster-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// BranchMaster Validation Ends 

        //////////ClientMaster Validation Starts
        initClientMaster: function () {
            $('.clientmaster-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    user_company: {
                        required: true
                    },
                    branch_name: {
                        required: true
                    },
                    client_type: {
                        required: true
                    },
                    client_name: {
                        required: true
                    },
                    client_address: {
                        required: true
                    },
                    company_country: {
                        required: true
                    },
                    company_state: {
                        required: true
                    },
                    company_city: {
                        required: true
                    },
                    postal_code: {
                        required: true
                    },
                    client_tel: {
                        required: true
                    },
                    client_email: {
                        required: true,
                        email: true
                    },
                    client_gst: {
                        required: true
                    },
                    client_vat: {
                        required: false
                    },
                    client_tan: {
                        required: true
                    },
                    client_branch: {
                        required: true
                    },
                    client_mobile: {
                        required: false
                    },
                    client_firm: {
                        required: true
                    },
                    remember: {
                        required: false
                    }
                },

                messages: {
                    user_company: {
                        name: "Company Name is required."
                    },
                    branch_name: {
                        name: "Branch Name is required."
                    },
                    client_type: {
                        required: "Client Type is required."
                    },
                    client_name: {
                        required: "Client Name is required."
                    },
                    client_address: {
                        required: "Client Address is required."
                    },
                    company_country: {
                        required: "Client Country is required."
                    },
                    company_state: {
                        required: "Client State is required." 
                    },
                    company_city: {
                        required: "Client City is required."
                    },
                    postal_code: {
                        required: "Client Postal Code is required."
                    },
                    client_tel: {
                        required: "Client Telephone is required."
                    },
                    client_email: {
                        required: "Client Email is required."
                    },
                    client_gst: {
                        required: "Client GST is required."
                    },
                    client_vat: {
                        required: "Client VAT is required."
                    },
                    client_tan: {
                        required: "Client Tan is required."
                    },
                    client_branch: {
                        required: "Client Branch is required."
                    },
                    client_mobile: {
                        required: "Client Mobile is required."
                    },
                    client_firm: {
                        required: "Client Firm is required."
                    },
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.clientmaster-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// ClientMaster Validation Ends 

        //////////VendorMaster Validation Starts
        initVendorMaster: function () {
            $('.vendormaster-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    /*user_company: {
                        required: true
                    },
                    branch_name: {
                        required: true
                    },*/
                    vendor_type: {
                        required: true
                    },
                    vendor_name: {
                        required: true
                    },
                    vendor_address: {
                        required: true
                    },
                    company_country: {
                        required: true
                    },
                    company_state: {
                        required: true
                    },
                    company_city: {
                        required: true
                    },
                    postal_code: {
                        required: true
                    },
                    vendor_tel: {
                        required: true
                    },
                    vendor_email: {
                        required: true,
                        email: true
                    },
                    vendor_gst: {
                        required: true
                    },
                    vendor_vat: {
                        required: false
                    },
                    vendor_tan: {
                        required: true
                    },
                    vendor_branch: {
                        required: true
                    },
                    vendor_mobile: {
                        required: false
                    },
                    vendor_firm: {
                        required: true
                    },
                    remember: {
                        required: false
                    }
                },

                messages: {
                    user_company: {
                        name: "Company Name is required."
                    },
                    branch_name: {
                        name: "Branch Name is required."
                    },
                    client_type: {
                        required: "Vendor Type is required."
                    },
                    client_name: {
                        required: "Vendor Name is required."
                    },
                    client_address: {
                        required: "Vendor Address is required."
                    },
                    company_country: {
                        required: "Vendor Country is required."
                    },
                    company_state: {
                        required: "Vendor State is required." 
                    },
                    company_city: {
                        required: "Vendor City is required."
                    },
                    postal_code: {
                        required: "Vendor Postal Code is required."
                    },
                    client_tel: {
                        required: "Vendor Telephone is required."
                    },
                    client_email: {
                        required: "Vendor Email is required."
                    },
                    client_gst: {
                        required: "Vendor GST is required."
                    },
                    client_vat: {
                        required: "Vendor VAT is required."
                    },
                    client_tan: {
                        required: "Vendor Tan is required."
                    },
                    client_branch: {
                        required: "Vendor Branch is required."
                    },
                    client_mobile: {
                        required: "Vendor Mobile is required."
                    },
                    client_firm: {
                        required: "Vendor Firm is required."
                    },
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.vendormaster-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// VendorMaster Validation Ends 

        //////////UserEmployeeMaster Validation Starts
        initUserMaster: function () {
            $('.useremployeemaster-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    user_company: {
                        required: true
                    },
                    branch_name: {
                        required: true
                    },
                    first_name: {
                        required: true
                    },
                    middle_name: {
                        required: false
                    },
                    last_name: {
                        required: true
                    },
                    curr_address: {
                        required: true
                    },
                    perm_address: {
                        required: true
                    },
                    birth_date: {
                        required: true
                    },
                    office_mail: {
                        required: true,
                        email: true
                    },
                    person_mail: {
                        required: true,
                        email: true
                    },
                    user_pass: {
                        required: true
                    },
                    user_gender: {
                        required: true
                    },
                    mobile_no: {
                        required: true
                    },
                    pan_no: {
                        required: true
                    },
                    uidaino: {
                        required: true
                    },
                    employee_staff: {
                        required: true
                    },
                    designation_id: {
                        required: true
                    },
                    client_firm: {
                        required: true
                    },
                    remember: {
                        required: false
                    }
                },

                messages: {
                    user_company: {
                        name: "Company Name is required."
                    },
                    branch_name: {
                        required: "Branch Name is required."
                    },
                    first_name: {
                        required: "First Name is required."
                    },
                    middle_name: {
                        required: "Middle Name is required."
                    },
                    last_name: {
                        required: "Last Name is required."
                    },
                    curr_address: {
                        required: "Current Address is required."
                    },
                    perm_address: {
                        required: "Permanent Address is required."
                    },
                    birth_date: {
                        required: "Birth Date is required."
                    },
                    office_mail: {
                        required: "Office Email is required."
                    },
                    person_mail: {
                        required: "Personal Email is required."
                    },
                    user_pass: {
                        required: "Password is required."
                    },
                    user_gender: {
                        required: "Gender is required."
                    },
                    mobile_no: {
                        required: "Mobile No is required."
                    },
                    pan_no: {
                        required: "Pan No is required."
                    },
                    uidaino: {
                        required: "Aadhar No is required."
                    },
                    employee_staff: {
                        required: "Employee Type is required."
                    },
                    designation_id: {
                        required: "Designation is required."
                    },
                    client_firm: {
                        required: "Client Firm is required."
                    },
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.useremployeemaster-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// UserEmployeeMaster Validation Ends   



//////////UserEmployeeDetails Validation Starts
        initUserDetails: function () {
            $('.useremployeedetails-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    user_data: {
                        required: true
                    },
                    qualification_type_id: {
                        required: true
                    },
                    marital_status: {
                        required: true
                    },
                    nationality_id: {
                        required: true
                    },
                    nominee_name: {
                        required: true
                    },
                    department_id: {
                        required: true
                    },
                    effective_from: {
                        required: true
                    },
                    leave_approver_reporting_id: {
                        required: true
                    },
                    company_bank_account_name: {
                        required: true
                    },
                    company_bank_account_no: {
                        required: true
                    },
                    company_bank_account_type: {
                        required: true
                    },
                    company_bank_account_address: {
                        required: true
                    },
                    personal_bank_account_name: {
                        required: true
                    },
                    personal_bank_account_address: {
                        required: true
                    },
                    personal_bank_account_no: {
                        required: true
                    },
                    personal_bank_account_type: {
                        required: true
                    },
                    client_firm: {
                        required: false
                    },
                    remember: {
                        required: false
                    }
                },

                messages: {
                    user_data: {
                        name: "User Data is required."
                    },
                    qualification_type_id: {
                        required: "Qualification is required."
                    },
                    marital_status: {
                        required: "Marital Status is required."
                    },
                    nationality_id: {
                        required: "Nationality is required."
                    },
                    nominee_name: {
                        required: "Nominee Name is required."
                    },
                    department_id: {
                        required: "Department is required."
                    },
                    effective_from: {
                        required: "Effective is required."
                    },
                    leave_approver_reporting_id: {
                        required: "Leave Approval is required."
                    },
                    company_bank_account_name: {
                        required: "Company Bank is required."
                    },
                    company_bank_account_no: {
                        required: "Company Bank No is required."
                    },
                    company_bank_account_type: {
                        required: "Bank Account Type is required."
                    },
                    company_bank_account_address: {
                        required: "Company bank account address is required."
                    },
                    personal_bank_account_name: {
                        required: "Personal bank account name is required."
                    },
                    personal_bank_account_address: {
                        required: "personal bank account address is required."
                    },
                    personal_bank_account_no: {
                        required: "personal bank account No is required."
                    },
                    personal_bank_account_type: {
                        required: "personalbank account type is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.useremployeedetails-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// UserEmployeeDetails Validation Ends 



        //////////CargoMaster Validation Starts
        initCargoMaster: function () {
            $('.cargomaster-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    cargo_group_id: {
                        required: true
                    },
                    commodity_name: {
                        required: true
                    },
                    parameter_name: {
                        required: false
                    },
                    subparameter_name: {
                        required: false
                    },
                    test_method: {
                        required: false
                    },
                    unit_id: {
                        required: false
                    },
                    fssai_applicable: {
                        required: false
                    },
                    fosfa_applicable: {
                        required: false
                    },
                    gafta_applicable: {
                        required: false
                    },
                    parameter_category: {
                        required: false
                    },
                    branch_id: {
                        required: false
                    },
                    remember: {
                        required: false
                    }
                },

                messages: {
                    cargo_group_id: {
                        required: "Cargo Group Id is required."
                    },
                    commodity_name: {
                        required: "Commodity Name is required."
                    },
                    parameter_name: {
                        required: "Parameter Name is required."
                    },
                    subparameter_name: {
                        required: "Subparameter Name is required."
                    },
                    test_method: {
                        required: "Test Method is required."
                    },
                    unit_id: {
                        required: "Unit Id is required."
                    },
                    fssai_applicable: {
                        required: "Fssai Applicable is required."
                    },
                    fosfa_applicable: {
                        required: "Fosfa Applicable is required."
                    },
                    gafta_applicable: {
                        required: "Gafta Applicable is required."
                    },
                    parameter_category: {
                        required: "Parameter Category is required."
                    },
                    branch_id: {
                        required: "Branch Id is required."
                    },
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.cargomaster-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// CargoMaster Validation Ends  

        //////////CargoGroupMaster Validation Starts
        initCargoGroupMaster: function () {
            $('.cargogroupmaster-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    name: {
                        required: true
                    },
                    short_name: {
                        required: true
                    },
                    remember: {
                        required: false
                    }
                },

                messages: {
                    cargo_group_id: {
                        name: "Cargo Group Name is required."
                    },
                    short_name: {
                        required: "Short Name is required."
                    },
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.cargogroupmaster-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// CargoGroupMaster Validation Ends 


//////////initUserAccess Validation Starts
        initUserAccess: function () {
            $('.accessmaster-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    user_type: {
                        required: true
                    },
                    user_name: {
                        required: true
                    },
                    main_menus: {
                        required: true
                    },
                    remember: {
                        required: false
                    }
                },

                messages: {
                    user_type: {
                        name: "Access Type is required."
                    },
                    user_name: {
                        required: "User Name is required."
                    },
                    main_menus: {
                        required: "Main Menus is required."
                    },
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.accessmaster-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// CargoGroupMaster Validation Ends

        //////////ChangePassword Validation Starts
        initChangePassMaster: function () {
            $('.changepassword-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    current_password: {
                        required: true
                    },
                    new_password: {
                        required: true
                    },
                    confirm_password: {
                        required: true
                    }
                },

                messages: {
                    current_password: {
                        name: "Current Password is required."
                    },
                    new_password: {
                        required: "New Password is required."
                    },
                    confirm_password: {
                        required: "Confirm Password is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.changepassword-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// CargoGroupMaster Validation Ends 


    //////////AddActivity Validation Starts
        initAddActivity: function () {
            $('.adddailyactivity-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    report_type: {
                        required: true
                    },
                    activity_file_no: {
                        required: true
                    },
                    report_date: {
                        required: true
                    },
                    activity_date: {
                        required: true
                    },
                    commodity: {
                        required: true
                    },
                    attended_by: {
                        required: true
                    },
                    location: {
                        required: true
                    },
                    installation_name: {
                        required: true
                    },
                    barge_no: {
                        required: true
                    },
                    client_name: {
                        required: true
                    },
                    weight_unit: {
                        required: true
                    },
                    vessel_name: {
                        required: false
                    },
                    remember: {
                        required: false
                    }
                },

                messages: {
                    report_type: {
                        name: "Report Type is required."
                    },
                    activity_file_no: {
                        required: "File No is required."
                    },
                    report_date: {
                        required: "Report Date is required."
                    },
                    activity_date: {
                        required: "Activity Date is required."
                    },
                    commodity: {
                        required: "Commodity is required."
                    },
                    attended_by: {
                        required: "Attended by is required."
                    },
                    location: {
                        required: "Location is required."
                    },
                    installation_name: {
                        required: "Installation Name is required."
                    },
                    barge_no: {
                        required: "Barge No is required."
                    },
                    client_name: {
                        required: "Client Name is required."
                    },
                    weight_unit: {
                        required: "Weight Unit is required."
                    },
                    vessel_name: {
                        required: "Vessel Name is required."
                    },
                    remember: {
                        required: "Remember is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.adddailyactivity-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// AddActivity Validation Ends 

        //////////UpdateActivity Validation Starts
        initUpdateActivity: function () {
            $('.upldailyactivity-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    report_type: {
                        required: true
                    },
                    upl_activity_report: {
                        required: true
                    },                    
                    remember: {
                        required: false
                    }
                },

                messages: {
                    report_type: {
                        name: "Report Type is required."
                    },
                    upl_activity_report: {
                        required: "Upload Activity is required."
                    },
                    remember: {
                        required: "Remember is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.upldailyactivity-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// updateActivity Validation Ends 


        //////////UnitMaster Validation Starts
        initUnitMaster: function () {
            $('.unitmaster-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    unit_name: {
                        required: true
                    },
                    description: {
                        required: false
                    },
                    remember: {
                        required: false
                    }
                },

                messages: {
                    unit_name: {
                        name: "Name is required."
                    },
                    description: {
                        required: "Description is required."
                    },
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.unitmaster-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// CargoGroupMaster Validation Ends 

        //////////Select Invoice Type Validation Starts
        initInvoiceTypeMaster: function () {
            $('.select-inv-type-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    select_inv_type: {
                        required: true
                    },
                    description: {
                        required: false
                    },
                    remember: {
                        required: false
                    }
                },

                messages: {
                    select_inv_type: {
                        select_inv_type: "Invoice Type is required."
                    },
                    description: {
                        required: "Description is required."
                    },
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.select-inv-type-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// Select Invoice Type  Validation Ends 

        //////////Select Invoice Type Validation Starts
        initInvoiceTypeMaster: function () {
            $('.select-inv-type-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    select_inv_type: {
                        required: true
                    },
                    description: {
                        required: false
                    },
                    remember: {
                        required: false
                    }
                },

                messages: {
                    select_inv_type: {
                        select_inv_type: "Invoice Type is required."
                    },
                    description: {
                        required: "Description is required."
                    },
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.select-inv-type-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// Select Invoice Type  Validation Ends

        //////////LabMethodMaster Validation Starts
        initLabMethodMaster: function () {
            $('.labmethodmaster-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    lab_method: {
                        required: true
                    },
                    company_country: {
                        required: false
                    },
                    remember: {
                        required: false
                    }
                },

                messages: {
                    lab_method: {
                        name: "Lab Method is required."
                    },
                    company_country: {
                        required: "Branch is required."
                    },
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.labmethodmaster-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// LabMethodMaster Validation Ends 

        //////////LabSpecificationMaster Validation Starts
        initLabSpecificationMaster: function () {
            $('.labspecificationmaster-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    spec_name: {
                        required: true
                    },
                    company_country: {
                        required: true
                    },
                    remember: {
                        required: false
                    }
                },

                messages: {
                    spec_name: {
                        name: "Specification is required."
                    },
                    company_country: {
                        required: "Branch is required."
                    },
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.labspecificationmaster-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// LabMethodMaster Validation Ends 

        //////////LabParameterMaster Validation Starts
        initLabParameterMaster: function () {
            $('.labparametermaster-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    method_name: {
                        required: true
                    },
                    parameter_min: {
                        required: false
                    },
                    parameter_max: {
                        required: false
                    },
                    specification_name: {
                        required: true
                    },
                    remember: {
                        required: false
                    }
                },

                messages: {
                    method_name: {
                        required: "Method is required."
                    },
                    parameter_min: {
                        required: "Min Value is required."
                    },
                    parameter_max: {
                        required: "Max Value is required."
                    },
                    specification_name: {
                        required: "Specification is required."
                    },
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.labparametermaster-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// LabMethodMaster Validation Ends 


        //////////operationsmaster Validation Starts
        initOperationsMaster: function () {
            $('.operationsmaster-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    file_no: {
                        required: true
                    },
                    file_date: {
                        required: true
                    },
                    client_name: {
                        required: true
                    },
                    billing_name: {
                        required: true
                    },
                    doc_types: {
                        required: true
                    },
                    upl_document_type: {
                        required: true
                    },
                    commodity_name: {
                        required: true
                    },            
                    remember: {
                        required: false
                    }
                },

                messages: {
                    file_no: {
                        name: "File No is required."
                    },
                    file_date: {
                        required: "File Date is required."
                    },
                    client_name: {
                        required: "Client Name is required."
                    },
                    billing_name: {
                        required: "Billing Name is required."
                    },
                    doc_types: {
                        required: "Document Type is required."
                    },
                    upl_document_type: {
                        required: "Upload Document Type is required."
                    },
                    commodity_name: {
                        required: "Commodity Name is required."
                    },                    
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.operationsmaster-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// operationsmaster Validation Ends 

        //////////paymentinvoicefileregister Validation Starts
        initPaymentInvoiceMaster: function () {
            $('.payinvfileregister-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    invoice_no: {
                        required: true
                    },
                    client_name: {
                        required: true
                    },
                    pay_mode: {
                        required: true
                    },
                    invoice_amt: {
                        required: true
                    },
                    invoice_basic_amt: {
                        required: true
                    },
                    invoice_rec_amt: {
                        required: true
                    },
                    invoice_balane_amt: {
                        required: true
                    },
                    invoice_ex_rate: {
                        required: false
                    }, 
                    invoice_ex_amt: {
                        required: false
                    },  
                    remarks: {
                        required: true
                    }
                },

                messages: {
                    invoice_no: {
                        required: "Invoice No is required."
                    },
                    client_name: {
                        required: "Client Name is required."
                    },
                    pay_mode: {
                        required: "Payment Mode is required."
                    },
                    invoice_amt: {
                        required: "Invoice Amount is required."
                    },
                    invoice_basic_amt: {
                        required: "Invoice Basic Amount is required."
                    },
                    invoice_rec_amt: {
                        required: "Invoice Received Amount is required."
                    },
                    invoice_balane_amt: {
                        required: "Invoice Balance Amount is required."
                    },
                    invoice_ex_rate: {
                        required: "Invoice Exchange Rate is required."
                    }, 
                    invoice_ex_amt: {
                        required: "Invoice Exchange Amount is required."
                    },  
                    remarks: {
                        required: "Remarks is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.payinvfileregister-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// paymentinvoicefileregister Validation Ends 

        //////////invoicefileregister Validation Starts
        initInvoiceMaster: function () {
            $('.invoicefileregister-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    client_name: {
                        required: true
                    },
                    invoice_date: {
                        required: true
                    },
                    invoice_to: {
                        required: false
                    },
                    client_address: {
                        required: true
                    },
                    company_country: {
                        required: true
                    },
                    company_state: {
                        required: true
                    },
                    company_city: {
                        required: true
                    },  
                    client_vat: {  
                        required: false
                    }, 
                    client_contact: {  
                        required: true
                    },
                    inspection_start_date: {  
                        required: true
                    },
                    inspection_end_date: {  
                        required: true
                    }, 
                    invoice_city: {
                        required: false
                    }, 
                    inv_desc_details: {
                        required: true
                    },  
                    invoice_currency: {
                        required: false
                    },
                    invoice_ex_rate: {
                        required: false
                    }, 
                    invoice_basic_ex_amt: {
                        required: false
                    },
                    invoice_basic_amt: {
                        required: false
                    },
                    invoice_total_vat_percnt: {
                        required: true
                    },
                    invoice_tax_amt: {
                        required: false
                    },
                    invoice_amt: {
                        required: false
                    },   
                    invoice_subtotal_amt: {
                        required: true
                    }, 
                    invoice_total_full_amt: {
                        required: true
                    }, 
                    invitems_quantity: {
                        required: true
                    },  
                    remember: {
                        required: false
                    }
                },

                messages: {
                    client_name: {
                        name: "Client Name is required."
                    },
                    invoice_date: {
                        required: "File Date is required."
                    },
                    invoice_to: {
                        required: "Invoice To is required."
                    },
                    client_address: {
                        required: "Client Address is required."
                    },
                    company_country: {
                        required: "Country is required."
                    },
                    company_state: {
                        required: "State is required."
                    },
                    company_city: {
                        required: "City is required."
                    },
                    company_city: {
                        required: "City is required."
                    },  
                    client_vat: {
                        required: "VAT is required."
                    }, 
                    client_contact: {
                        required: "Kind Attention is required."
                    },
                    inspection_start_date: {
                        required: "Inspection Start Date is required."
                    },
                    inspection_end_date: {
                        required: "Inspection End Date is required."
                    }, 
                    invoice_city: {
                        required: "Invoice City is required."
                    },
                    inv_desc_details: {
                        required: "Invoice Details is required."
                    },  
                    invoice_currency: {
                        required: "Invoice Currency is required."
                    },
                    invoice_ex_rate: {
                        required: "Invoice Exchange Rate is required."
                    }, 
                    invoice_basic_ex_amt: {
                        required: "Invoice Basic Exchange Amount is required."
                    },
                    invoice_basic_amt: { 
                        required: "Invoice Basic Amount is required."
                    },
                    invoice_total_vat_percnt: {
                        required: "VAT % is required."
                    },
                    invoice_tax_amt: {
                        required: "Invoice Tax Amount is required."
                    },
                    invoice_amt: {
                        required: "Invoice Amount is required."
                    }, 
                    invoice_subtotal_amt: {
                        required: "Invoice Subtotal Amount is required."
                    },  
                    invoice_total_full_amt: {
                        required: "Invoice Total Amount is required."
                    }, 
                    invitems_quantity: {
                        required: "invitems_quantity is required."
                    },                 
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.invoicefileregister-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// invoicefileregister Validation Ends 


        //////////creditnoteregister Validation Starts
        initCreditnoteregister: function () {
            $('.creditnoteregister-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    client_contact: {  
                        required: true
                    },                      
                    remember: {
                        required: false
                    }
                },

                messages: {
                    client_contact: {
                        required: "Kind Attention is required."
                    },                                     
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.creditnoteregister-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// creditnoteregister Validation Ends 

        //////////editinvoicefileregister Validation Starts
        initEditInvoiceMaster: function () {
            $('.editinvoicefileregister-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    client_name: {
                        required: true
                    },
                    invoice_date: {
                        required: true
                    },
                    invoice_to: {
                        required: false
                    },
                    client_address: {
                        required: true
                    },
                    company_country: {
                        required: true
                    },
                    company_state: {
                        required: true
                    },
                    company_city: {
                        required: true
                    }, 
                    client_vat: {
                        required: false
                    },
                    client_contact: {  
                        required: true
                    },  
                    invoice_city: {
                        required: false
                    },  
                    invoice_currency: {
                        required: false
                    },
                    invoice_ex_rate: {
                        required: false
                    }, 
                    invoice_basic_ex_amt: {
                        required: false
                    },
                    invoice_basic_amt: {
                        required: false
                    },
                    invoice_total_vat_percnt: {
                        required: false
                    },
                    invoice_tax_amt: {
                        required: false
                    },
                    invoice_amt: {
                        required: false
                    },   
                    invoice_subtotal_amt: {
                        required: true
                    }, 
                    invoice_total_full_amt: {
                        required: true
                    },   
                    remember: {
                        required: false
                    }
                },

                messages: {
                    client_name: {
                        name: "Client Name is required."
                    },
                    invoice_date: {
                        required: "File Date is required."
                    },
                    invoice_to: {
                        required: "Invoice To is required."
                    },
                    client_address: {
                        required: "Client Address is required."
                    },
                    company_country: {
                        required: "Country is required."
                    },
                    company_state: {
                        required: "State is required."
                    },
                    company_city: {
                        required: "City is required."
                    },
                    company_city: {
                        required: "City is required."
                    }, 
                    client_vat: {
                        required: "VAT is required."
                    },
                    client_contact: {
                        required: "Kind Attention is required."
                    },   
                    invoice_city: {
                        required: "Invoice City is required."
                    },  
                    invoice_currency: {
                        required: "Invoice Currency is required."
                    },
                    invoice_ex_rate: {
                        required: "Invoice Exchange Rate is required."
                    }, 
                    invoice_basic_ex_amt: {
                        required: "Invoice Basic Exchange Amount is required."
                    },
                    invoice_basic_amt: { 
                        required: "Invoice Basic Amount is required."
                    },
                    invoice_total_vat_percnt: {
                        required: "VAT % is required."
                    },
                    invoice_tax_amt: {
                        required: "Invoice Tax Amount is required."
                    },
                    invoice_amt: {
                        required: "Invoice Amount is required."
                    }, 
                    invoice_subtotal_amt: {
                        required: "Invoice Subtotal Amount is required."
                    },  
                    invoice_total_full_amt: {
                        required: "Invoice Total Amount is required."
                    },                  
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.editinvoicefileregister-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// editinvoicefileregister Validation Ends 

        //////////addinvoicefileregister Validation Starts
        initAddInvoiceMaster: function () {
            $('.addinvoicefileregister-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    inv_file_no: {
                        required: true
                    },
                    inv_file_date: {
                        required: true
                    },
                    client_name: {
                        required: true
                    },
                    invoice_date: {
                        required: true
                    },
                    invoice_to: {
                        required: true
                    },
                    client_address: {
                        required: true
                    },
                    company_country: {
                        required: true
                    },
                    company_state: {
                        required: true
                    },
                    company_city: {
                        required: true
                    }, 
                    client_vat: {
                        required: false
                    },  
                    invoice_city: {
                        required: true
                    },  
                    invoice_currency: {
                        required: true
                    },
                    invoice_ex_rate: {
                        required: true
                    }, 
                    invoice_basic_ex_amt: {
                        required: true
                    },
                    invoice_basic_amt: {
                        required: true
                    },
                    invoice_tax_amt: {
                        required: true
                    },
                    invoice_amt: {
                        required: true
                    },       
                    remember: {
                        required: false
                    }
                },

                messages: {
                    inv_file_no: {
                        name: "Invoice File no is required."
                    },
                    inv_file_date: {
                        name: "Invoice File Date is required."
                    },
                    client_name: {
                        name: "Client Name is required."
                    },
                    invoice_date: {
                        required: "File Date is required."
                    },
                    invoice_to: {
                        required: "Invoice To is required."
                    },
                    client_address: {
                        required: "Client Address is required."
                    },
                    company_country: {
                        required: "Country is required."
                    },
                    company_state: {
                        required: "State is required."
                    },
                    company_city: {
                        required: "City is required."
                    },
                    company_city: {
                        required: "City is required."
                    }, 
                    client_vat: {
                        required: "VAT is required."
                    },  
                    invoice_city: {
                        required: "Invoice City is required."
                    },  
                    invoice_currency: {
                        required: "Invoice Currency is required."
                    },
                    invoice_ex_rate: {
                        required: "Invoice Exchange Rate is required."
                    }, 
                    invoice_basic_ex_amt: {
                        required: "Invoice Basic Exchange Amount is required."
                    },
                    invoice_basic_amt: {
                        required: "Invoice Basic Amount is required."
                    },
                    invoice_tax_amt: {
                        required: "Invoice Tax Amount is required."
                    },
                    invoice_amt: {
                        required: "Invoice Amount is required."
                    },                    
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.addinvoicefileregister-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// addinvoicefileregister Validation Ends 

        //////////addinvoicefileregister Validation Starts
        initEditInvoiceMaster: function () {
            $('.editinvoicefileregister-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    inv_file_no: {
                        required: true
                    },
                    inv_file_date: {
                        required: true
                    },
                    client_name: {
                        required: true
                    },
                    invoice_date: {
                        required: true
                    },
                    invoice_to: {
                        required: true
                    },
                    client_address: {
                        required: true
                    },
                    company_country: {
                        required: true
                    },
                    company_state: {
                        required: true
                    },
                    company_city: {
                        required: true
                    }, 
                    client_vat: {
                        required: false
                    },  
                    invoice_city: {
                        required: true
                    },  
                    invoice_currency: {
                        required: true
                    },
                    invoice_ex_rate: {
                        required: true
                    }, 
                    invoice_basic_ex_amt: {
                        required: true
                    },
                    invoice_basic_amt: {
                        required: true
                    },
                    invoice_tax_amt: {
                        required: true
                    },
                    invoice_amt: {
                        required: true
                    },       
                    remember: {
                        required: false
                    }
                },

                messages: {
                    inv_file_no: {
                        name: "Invoice File no is required."
                    },
                    inv_file_date: {
                        name: "Invoice File Date is required."
                    },
                    client_name: {
                        name: "Client Name is required."
                    },
                    invoice_date: {
                        required: "File Date is required."
                    },
                    invoice_to: {
                        required: "Invoice To is required."
                    },
                    client_address: {
                        required: "Client Address is required."
                    },
                    company_country: {
                        required: "Country is required."
                    },
                    company_state: {
                        required: "State is required."
                    },
                    company_city: {
                        required: "City is required."
                    },
                    company_city: {
                        required: "City is required."
                    }, 
                    client_vat: {
                        required: "VAT is required."
                    },  
                    invoice_city: {
                        required: "Invoice City is required."
                    },  
                    invoice_currency: {
                        required: "Invoice Currency is required."
                    },
                    invoice_ex_rate: {
                        required: "Invoice Exchange Rate is required."
                    }, 
                    invoice_basic_ex_amt: {
                        required: "Invoice Basic Exchange Amount is required."
                    },
                    invoice_basic_amt: {
                        required: "Invoice Basic Amount is required."
                    },
                    invoice_tax_amt: {
                        required: "Invoice Tax Amount is required."
                    },
                    invoice_amt: {
                        required: "Invoice Amount is required."
                    },                    
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.editinvoicefileregister-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// addinvoicefileregister Validation Ends 

        //////////invoicefileregister Validation Starts
        initProformaInvoice: function () {
            $('.proformainvoice-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    client_name: {
                        required: true
                    },
                    invoice_date: {
                        required: true
                    },
                    invoice_to: {
                        required: false
                    },
                    client_address: {
                        required: true
                    },
                    company_country: {
                        required: true
                    },
                    company_state: {
                        required: true
                    },
                    company_city: {
                        required: true
                    }, 
                    postal_code: {
                        required: false
                    }, 
                    client_vat: {  
                        required: false
                    }, 
                    client_contact: {  
                        required: true
                    },
                    inspection_start_date: {  
                        required: false
                    },
                    inspection_end_date: {  
                        required: false
                    }, 
                    invoice_city: {
                        required: false
                    }, 
                    inv_desc_details: {
                        required: true
                    },  
                    invoice_currency: {
                        required: false
                    },
                    invoice_ex_rate: {
                        required: false
                    }, 
                    invoice_basic_ex_amt: {
                        required: false
                    },
                    invoice_basic_amt: {
                        required: false
                    },
                    invoice_total_vat_percnt: {
                        required: false
                    },
                    invoice_tax_amt: {
                        required: false
                    },
                    invoice_amt: {
                        required: false
                    },   
                    invoice_subtotal_amt: {
                        required: true
                    }, 
                    invoice_total_full_amt: {
                        required: true
                    }, 
                    invitems_quantity: {
                        required: true
                    },  
                    remember: {
                        required: false
                    }
                },

                messages: {
                    client_name: {
                        name: "Client Name is required."
                    },
                    invoice_date: {
                        required: "File Date is required."
                    },
                    invoice_to: {
                        required: "Invoice To is required."
                    },
                    client_address: {
                        required: "Client Address is required."
                    },
                    company_country: {
                        required: "Country is required."
                    },
                    company_state: {
                        required: "State is required."
                    },
                    company_city: {
                        required: "City is required."
                    },
                    company_city: {
                        required: "City is required."
                    },  
                    client_vat: {
                        required: "VAT is required."
                    }, 
                    client_contact: {
                        required: "Kind Attention is required."
                    },
                    inspection_start_date: {
                        required: "Inspection Start Date is required."
                    },
                    inspection_end_date: {
                        required: "Inspection End Date is required."
                    }, 
                    invoice_city: {
                        required: "Invoice City is required."
                    },
                    inv_desc_details: {
                        required: "Invoice Details is required."
                    },  
                    invoice_currency: {
                        required: "Invoice Currency is required."
                    },
                    invoice_ex_rate: {
                        required: "Invoice Exchange Rate is required."
                    }, 
                    invoice_basic_ex_amt: {
                        required: "Invoice Basic Exchange Amount is required."
                    },
                    invoice_basic_amt: { 
                        required: "Invoice Basic Amount is required."
                    },
                    invoice_total_vat_percnt: {
                        required: "VAT % is required."
                    },
                    invoice_tax_amt: {
                        required: "Invoice Tax Amount is required."
                    },
                    invoice_amt: {
                        required: "Invoice Amount is required."
                    }, 
                    invoice_subtotal_amt: {
                        required: "Invoice Subtotal Amount is required."
                    },  
                    invoice_total_full_amt: {
                        required: "Invoice Total Amount is required."
                    }, 
                    invitems_quantity: {
                        required: "invitems_quantity is required."
                    },                 
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.invoicefileregister-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// invoicefileregister Validation Ends 

        //////////qcertificatemaster Validation Starts
        initQCertificateMaster: function () {
            $('.qcertificatemaster-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    file_no: {
                        required: true
                    },
                    loading_date: {
                        required: true
                    },
                    cert_notify: {
                        required: true
                    },
                    cert_shipper: {
                        required: false
                    },
                    cert_consignee: {
                        required: false
                    },                      
                    remember: {
                        required: false
                    }
                },

                messages: {
                    file_no: {
                        name: "File No is required."
                    },
                    loading_date: {
                        required: "Loading Date is required."
                    },
                    cert_notify: {
                        required: "Notify is required."
                    },
                    cert_shipper: {
                        required: "Shipper is required."
                    },
                    cert_consignee: {
                        required: "Consignee is required."
                    },
                    company_state: {
                        required: "State is required."
                    },                                    
                    remember: {
                        required: "Remember is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.qcertificatemaster-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// qcertificatemaster Validation Ends 

        
        //////////Account Ledger Validation Starts
        initAccountLedger: function () {
            $('.accountledger-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    vendor_name: {
                        required: true
                    },
                    ledger_date: {
                        required: true
                    },
                    ledger_narration: {
                        required: true
                    },
                    ledger_number: {
                        required: true
                    },
                    ledger_type: {
                        required: true
                    },
                    ledger_amount: {
                        required: true
                    },
                    remember: {
                        required: false
                    }
                },

                messages: {
                    vendor_name: {
                        name: "This Field is required."
                    },
                    ledger_date: {
                        required: "This Field is required."
                    },
                    ledger_narration: {
                        required: "This Field is required."
                    },
                    ledger_number: {
                        required: "This Field is required."
                    },
                    ledger_type: {
                        required: "This Field is required."
                    },
                    ledger_amount: {
                        required: "This Field is required."
                    },
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.unitmaster-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// Account Ledger Validation Ends 


        //////////DesignationMaster Validation Starts
        initDesignationMaster: function () {
            $('.designationmaster-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    designation_name: {
                        required: true
                    },
                    designation_shortname: {
                        required: true
                    },
                    remember: {
                        required: false
                    }
                },

                messages: {
                    designation_name: {
                        name: "Name is required."
                    },
                    designation_shortname: {
                        required: "Description is required."
                    },
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.designationmaster-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// CargoGroupMaster Validation Ends 

       //////////PackingMaster Validation Starts
        initPackingMaster: function () {
            $('.packingmaster-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    paking_name: {
                        required: true
                    },
                    description: {
                        required: true
                    },
                    remember: {
                        required: false
                    }
                },

                messages: {
                    paking_name: {
                        name: "Name is required."
                    },
                    description: {
                        required: "Description is required."
                    },
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.packingmaster-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// PackingMaster Validation Ends  

//////////addclientinteraction Validation Starts
        initClientInteraction: function () {
            $('.clientinteraction-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    client_type: {
                        required: true
                    },
                    full_name: {
                        required: true
                    },
                    job_title: {
                        required: false
                    },
                    company: {
                        required: true
                    },
                    office_address: {
                        required: true
                    },
                    company_country: {
                        required: true
                    },
                    company_state: {
                        required: true
                    },
                    company_city: {
                        required: true
                    },
                    office_no: {
                        required: true
                    },
                    mobile_no: {
                        required: true
                    },
                    email_address: {
                        required: true,
                        email: true
                    },
                    alt_no: {
                        required: false
                    },
                    company_web: {
                        required: false
                    },
                    interaction_date: {
                        required: true
                    },
                    location_interaction: {
                        required: false
                    },
                    phone_interaction: {
                        required: false
                    },
                    client_attendees: {
                        required: true
                    },
                    aci_attendees: {
                        required: true
                    },
                    purpose_meeting: {
                        required: true
                    },
                    sales_target: {
                        required: false
                    },
                    specific_issue: {
                        required: false
                    },
                    client_complaint: {
                        required: false
                    },
                    items_discussed: {
                        required: false
                    },
                    action_points: {
                        required: true
                    },
                    purpose_acheived: {
                        required: true
                    },
                    action_acheived: {
                        required: true
                    },
                    aci_followup: {
                        required: true
                    },
                    remember: {
                        required: false
                    }
                },

                messages: {
                    client_type: {
                        name: "Client Type is required"
                    },
                    full_name: {
                        name: "Name is required."
                    },
                    job_title: {
                        required: "Job Title is required."
                    },
                    company: {
                        required: "Company is required."
                    },
                    office_address: {
                        required: "Office Address is required."
                    },
                    company_country: {
                        required: "Country is required."
                    },
                    company_state: {
                        required: "State is required."
                    },
                    company_city: {
                        required: "City is required."
                    },
                    office_no: {
                        required: "Office No is required."
                    },
                    mobile_no: {
                        required: "Mobile No is required."
                    },
                    email_address: {
                        required: "Email Address is required."
                    },
                    alt_no: {
                        required: "Alternate No is required."
                    },
                    company_web: {
                        required: "Company Web Address is required."
                    },
                    interaction_date: {
                        required: "Interaction date is required."
                    },
                    location_interaction: {
                        required: "Location Interaction is required."
                    },
                    phone_interaction: {
                        required: "phone Interaction is required."
                    },
                    client_attendees: {
                        required: "Client Attendees is required."
                    },
                    aci_attendees: {
                        required: "ACI attendees is required."
                    },
                    purpose_meeting: {
                        required: "Purpose Of Meeting is required."
                    },
                    sales_target: {
                        required: "Sales Target is required."
                    },
                    specific_issue: {
                        required: "Specific Issue is required."
                    },
                    client_complaint: {
                        required: "Client Complaint is required."
                    },
                    items_discussed: {
                        required: "Items Discussed is required."
                    },
                    action_points: {
                        required: "Action Points is required."
                    },
                    purpose_acheived: {
                        required: "Purpose Acheived is required."
                    },
                    action_acheived: {
                        required: "Action Acheived is required."
                    },
                    aci_followup: {
                        required: "ACI Followup is required."
                    },
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.clientinteraction-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// PackingMaster Validation Ends          

//////////addclientinteraction Validation Starts
        initNewClientInteraction: function () {
            $('.newclientinteraction-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    int_full_name: {
                        required: true
                    },
                    int_job_title: {
                        required: false
                    },
                    int_company: {
                        required: true
                    },
                    int_office_address: {
                        required: true
                    },
                    int_office_no: {
                        required: true
                    },
                    int_mobile_no: {
                        required: true
                    },
                    int_alt_no: {
                        required: false
                    },
                    int_email_address: {
                        required: true,
                        email: true
                    },
                    int_company_web: {
                        required: false
                    },
                    interaction_date: {
                        required: true
                    },
                    location_interaction: {
                        required: false
                    },
                    phone_interaction: {
                        required: false
                    },
                    client_attendees: {
                        required: true
                    },
                    aci_attendees: {
                        required: true
                    },
                    purpose_meeting: {
                        required: true
                    },
                    sales_target: {
                        required: false
                    },
                    specific_issue: {
                        required: false
                    },
                    client_complaint: {
                        required: false
                    },
                    items_discussed: {
                        required: false
                    },
                    action_points: {
                        required: true
                    },
                    purpose_acheived: {
                        required: true
                    },
                    action_acheived: {
                        required: true
                    },
                    aci_followup: {
                        required: true
                    },
                    remember: {
                        required: false
                    }
                },

                messages: {
                    int_full_name: {
                        name: "Name is required."
                    },
                    int_job_title: {
                        required: "Job Title is required."
                    },
                    int_company: {
                        required: "Company is required."
                    },
                    int_office_address: {
                        required: "Office Address is required."
                    },
                    int_office_no: {
                        required: "Office No is required."
                    },
                    int_mobile_no: {
                        required: "Mobile No is required."
                    },
                    int_alt_no: {
                        required: "ALT No is required."
                    },
                    int_email_address: {
                        required: "Email Address is required."
                    },
                    int_company_web: {
                        required: "Company Web is required."
                    },
                    interaction_date: {
                        required: "Interaction date is required."
                    },
                    location_interaction: {
                        required: "Location Interaction is required."
                    },
                    phone_interaction: {
                        required: "phone Interaction is required."
                    },
                    client_attendees: {
                        required: "Client Attendees is required."
                    },
                    aci_attendees: {
                        required: "ACI attendees is required."
                    },
                    purpose_meeting: {
                        required: "Purpose Of Meeting is required."
                    },
                    sales_target: {
                        required: "Sales Target is required."
                    },
                    specific_issue: {
                        required: "Specific Issue is required."
                    },
                    client_complaint: {
                        required: "Client Complaint is required."
                    },
                    items_discussed: {
                        required: "Items Discussed is required."
                    },
                    action_points: {
                        required: "Action Points is required."
                    },
                    purpose_acheived: {
                        required: "Purpose Achieved is required."
                    },
                    action_acheived: {
                        required: "Action Achieved is required."
                    },
                    aci_followup: {
                        required: "ACI Followup is required."
                    },
                    invoice_incharge: {
                        required: "Invoice Incharge is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.newclientinteraction-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// addclientinteraction Validation Ends      


        //////////addfileregister Validation Starts
        initAddfileregister: function () { 
            $('.addfileregister-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    file_date: {
                        required: true
                    },
                    clients_name: {
                        required: true
                    },
                    branch_name: {
                        required: false
                    },
                    billing_name: {
                        required: false
                    },
                    client_ref_no: {
                        required: false
                    },
                    scope_services: {
                        required: true
                    },
                    tax_options: {
                        required: true
                    },
                    nomination_date: {
                        required: true
                    },
                    import_export: { 
                        required: true
                    },
                    file_type: {
                        required: true
                    },
                    for_sub_type: {
                        required: true
                    },
                    sub_type: {
                        required: true
                    },
                    option_type: {
                        required: true
                    },
                    vessel_name: {
                        required: false
                    },
                    voyage_no: {
                        required: false
                    },
                    cargo_group: {
                        required: true
                    },
                    cargo: {
                        required: false
                    },
                    packing: {
                        required: false
                    },
                    packing_desc: {
                        required: false
                    },
                    approx_unit: {
                        required: false
                    },
                    approx_unit_name: {
                        required: false
                    },
                    invoice_by: {
                        required: true
                    },
                    file_ins: {
                        required: true
                    },
                    status: {
                        required: true
                    },
                    attendance: {
                        required: false
                    },
                    origin: {
                        required: false
                    },
                    load_port: {
                        required: false
                    },
                    discharge_port: {
                        required: false
                    },
                    upl_nomination: {
                        required: true
                    },
                    upl_rate: {
                        required: false
                    }

                },

                messages: {
                    file_date: {
                        name: "File Date is required"
                    },
                    clients_name: {
                        name: "Clients Name is required."
                    },
                    branch_name: {
                        required: "Branch Name is required."
                    },
                    company: {
                        required: "Billing Name is required."
                    },
                    client_ref_no: {
                        required: "Client Ref No is required."
                    },
                    scope_services: {
                        required: "Scope Of Services is required."
                    },
                    tax_options: {
                        required: "Tax Options is required."
                    },
                    nomination_date: {
                        required: "Nomination Date is required."
                    },
                    import_export: { 
                        required: "Import/Export is required."
                    },
                    file_type: {
                        required: "File Type is required."
                    }, 
                    for_sub_type: {
                        required: "File Options is required."
                    },
                    sub_type: {
                        required: "File Options is required."
                    },
                    option_type: {
                        required: "File Options is required."
                    },
                    vessel_name: {
                        required: "Vessel Name is required."
                    },
                    voyage_no: {
                        required: "Voyage No is required."
                    },
                    cargo_group: {
                        required: "Cargo Group is required."
                    },
                    cargo_group_new: {
                        required: "Cargo Group is required."
                    },
                    cargo: {
                        required: "Cargo is required."
                    },
                    packing: {
                        required: "Packing is required."
                    },
                    packing_desc: {
                        required: "Packing Desc is required."
                    }, 
                    approx_unit: {
                        required: "Approx Qty is required."
                    },
                    approx_unit_name: {
                        required: "Approx Unit is required."
                    },
                    invoice_by: {
                        required: "Invoice By is required."
                    },
                    file_ins: {
                        required: "File Instructions is required."
                    },
                    status: {
                        required: "Status is required."
                    },
                    attendance: {
                        required: "Attendance is required."
                    },
                    origin: {
                        required: "Origin is required."
                    },
                    load_port: {
                        required: "Load Port is required."
                    },
                    discharge_port: {
                        required: "Discharge Port is required."
                    },
                    hid_upl_nomination: {
                        required: "This is required."
                    },
                    upl_rate: {
                        required: "This is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.addfileregister-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// addfileregister Validation Ends 

        //////////addfileregister Validation Starts
        initEditfileregister: function () { 
            $('.editfileregister-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    file_date: {
                        required: true
                    },
                    clients_name: {
                        required: true
                    },
                    branch_name: {
                        required: true
                    },
                    billing_name: {
                        required: true
                    },
                    client_ref_no: {
                        required: false
                    },
                    scope_services: {
                        required: true
                    },
                    tax_options: {
                        required: true
                    },
                    nomination_date: {
                        required: true
                    },
                    import_export: {
                        required: true
                    },
                    file_options: {
                        required: true
                    },
                    vessel_name: {
                        required: false
                    },
                    voyage_no: {
                        required: false
                    },
                    cargo_group: {
                        required: true
                    },
                    cargo: {
                        required: true
                    },
                    packing: {
                        required: true
                    },
                    packing_desc: {
                        required: true
                    },
                    approx_unit: {
                        required: true
                    },
                    approx_unit_name: {
                        required: true
                    },
                    invoice_by: {
                        required: true
                    },
                    special_ins: {
                        required: true
                    },
                    status: {
                        required: true
                    },
                    cancel_remarks: {
                        required: true
                    },
                    attendance: {
                        required: false
                    },
                    origin: {
                        required: false
                    },
                    load_port: {
                        required: false
                    },
                    discharge_port: {
                        required: false
                    }
                },

                messages: {
                    file_date: {
                        name: "File Date is required"
                    },
                    clients_name: {
                        name: "Clients Name is required."
                    },
                    branch_name: {
                        required: "Branch Name is required."
                    },
                    company: {
                        required: "Billing Name is required."
                    },
                    client_ref_no: {
                        required: "Client Ref No is required."
                    },
                    scope_services: {
                        required: "Scope Of Services is required."
                    },
                    tax_options: {
                        required: "Tax Options is required."
                    },
                    nomination_date: {
                        required: "Nomination Date is required."
                    },
                    import_export: {
                        required: "Import/Export is required."
                    },
                    file_options: {
                        required: "File Options is required."
                    },
                    vessel_name: {
                        required: "Vessel Name is required."
                    },
                    voyage_no: {
                        required: "Voyage No is required."
                    },
                    cargo_group: {
                        required: "Cargo Group is required."
                    },
                    cargo: {
                        required: "Cargo is required."
                    },
                    packing: {
                        required: "Packing is required."
                    },
                    packing_desc: {
                        required: "Packing Desc is required."
                    },
                    approx_unit: {
                        required: "Approx Qty is required."
                    },
                    approx_unit_name: {
                        required: "Approx Unit is required."
                    },
                    invoice_by: {
                        required: "Invoice By is required."
                    },
                    special_ins: {
                        required: "Special Instruction is required."
                    },
                    status: {
                        required: "Status is required."
                    },
                    status: {
                        required: "Cancelled Status Remarks is required."
                    },
                    attendance: {
                        required: "Attendance is required."
                    },
                    origin: {
                        required: "Origin is required."
                    },
                    load_port: {
                        required: "Load Port is required."
                    },
                    discharge_port: {
                        required: "Discharge Port is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-danger', $('.editfileregister-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

        }, 
        ////////// addfileregister Validation Ends               

    };

}();
 
/***
Usage
***/
//Custom.init();
//Custom.doSomeStuff();