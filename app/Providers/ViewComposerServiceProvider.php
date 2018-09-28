<?php

namespace App\Providers;


use View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider{

    
    public function boot(){

        /** VIEW COMPOSERS  **/


        // USERMENU
        View::composer('layouts.admin-sidenav', 'App\Swep\ViewComposers\UserMenuComposer');


        // MENU
        View::composer(['dashboard.user.create', 
                        'dashboard.user.edit'], 'App\Swep\ViewComposers\MenuComposer');
        

        // SUBMENU
        View::composer(['dashboard.user.create', 
                        'dashboard.user.edit'], 'App\Swep\ViewComposers\SubmenuComposer');


        // PROJECT
        View::composer(['dashboard.disbursement_voucher.create', 
                        'dashboard.disbursement_voucher.edit',
                        'dashboard.disbursement_voucher.index',
                        'dashboard.disbursement_voucher.user_index',
                        'dashboard.disbursement_voucher.save_as',
                        'dashboard.employee.create',
                        'dashboard.employee.edit',], 'App\Swep\ViewComposers\ProjectComposer');


        // FUND SOURCE
        View::composer(['dashboard.disbursement_voucher.create', 
                        'dashboard.disbursement_voucher.edit',
                        'dashboard.disbursement_voucher.index',
                        'dashboard.disbursement_voucher.save_as',
                        'dashboard.disbursement_voucher.user_index'], 'App\Swep\ViewComposers\FundSourceComposer');
        


        // DEPARTMENT
        View::composer(['dashboard.disbursement_voucher.create', 
                        'dashboard.disbursement_voucher.edit',
                        'dashboard.disbursement_voucher.index',
                        'dashboard.disbursement_voucher.user_index',
                        'dashboard.disbursement_voucher.save_as',
                        'dashboard.department_unit.create',
                        'dashboard.department_unit.edit',
                        'dashboard.project_code.create',
                        'dashboard.project_code.edit',
                        'dashboard.employee.create',
                        'dashboard.employee.edit',
                        'dashboard.permission_slip.report',
                        'dashboard.employee.index'], 'App\Swep\ViewComposers\DepartmentComposer');


        // DEPARTMENT UNITS
        View::composer(['dashboard.disbursement_voucher.create', 
                        'dashboard.disbursement_voucher.edit',
                        'dashboard.disbursement_voucher.index',
                        'dashboard.disbursement_voucher.user_index',
                        'dashboard.disbursement_voucher.save_as',
                        'dashboard.employee.create',
                        'dashboard.employee.edit'], 'App\Swep\ViewComposers\DepartmentUnitComposer');


        // PROJECT CODES
        View::composer(['dashboard.disbursement_voucher.create', 
                        'dashboard.disbursement_voucher.edit',
                        'dashboard.disbursement_voucher.index',
                        'dashboard.disbursement_voucher.save_as',
                        'dashboard.disbursement_voucher.user_index'], 'App\Swep\ViewComposers\ProjectCodeComposer');
        

        // SIGNATORIES
        View::composer(['printables.disbursement_voucher',
                        'dashboard.leave_application.create',
                        'dashboard.leave_application.edit',
                        'dashboard.signatory.create',
                        'dashboard.signatory.edit'], 'App\Swep\ViewComposers\SignatoryComposer');



        // EMPLOYEES
        View::composer(['dashboard.user.sync_employee',
                        'dashboard.permission_slip.create',
                        'dashboard.permission_slip.edit',
                        'dashboard.permission_slip.index',
                        'dashboard.leave_card.create',
                        'dashboard.leave_card.edit',
                        'dashboard.leave_card.create_overtime',
                        'dashboard.leave_card.edit_overtime',
                        'dashboard.leave_card.create_tardy',
                        'dashboard.leave_card.edit_tardy',
                        'dashboard.leave_card.create_undertime',
                        'dashboard.leave_card.edit_undertime',], 'App\Swep\ViewComposers\EmployeeComposer');



        // DOCUMENT TYPES
        View::composer(['dashboard.document.create',
                        'dashboard.document.edit',
                        'dashboard.document.index',], 'App\Swep\ViewComposers\DocumentFolderComposer');



        
    }

    




    
    public function register(){

      


    
    }




}
