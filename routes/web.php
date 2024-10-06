<?php

use App\Http\Controllers\FrontendController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ActivityLogsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\DataManagementController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyDetailController;
use App\Http\Controllers\CompanyDepartmentController;
use App\Http\Controllers\CompanyDocumentController;
use App\Http\Controllers\CompanyControlReportController;
use App\Http\Controllers\WebCodeBaseController;
use App\Http\Controllers\AcademyContentController;
use App\Http\Controllers\GDPRAdaptationQuestionController;
use App\Http\Controllers\ClientPolicyController;
use App\Http\Controllers\InventoryCategoryController;
use App\Http\Controllers\InventoryDataTypeController;
use App\Http\Controllers\KVKKPrecautionController;
use App\Http\Controllers\InventoryDataSetController;
use App\Http\Controllers\InventoryGenerateController;
use App\Http\Controllers\DataHoldReasonController;

// LanguageController Start
Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
// LanguageController End

// FrontendController Start
Route::get('/home', [FrontendController::class, 'pageHome'])->name('Frontend.Home');
Route::get('/adaptation', [FrontendController::class, 'pageAdaptation'])->name('Frontend.Adaptation');
Route::get('/adaptationresult/{id}', [FrontendController::class, 'pageAdaptationResult'])->name('Frontend.AdaptationResult');
Route::post('/adaptationresult/sendmail', [FrontendController::class, 'sendAdaptationResult'])->name('Frontend.SendAdaptationResult');
Route::get('/{id}/policies', [ClientPolicyController::class, 'index'])->name('Frontend.Policies');
Route::post('/ajax/testresult', [FrontendController::class, 'testResult'])->name('Frontend.TestResult');
Route::get('/{id}/policies/downloadjs', [ClientPolicyController::class, 'downloadPolicyJS'])->name('Frontend.Policies.DownloadJS');
Route::get('/policies/{unique_id}/{document_id}/download', [ClientPolicyController::class, 'downloadPolicy'])->name('Frontend.Policies.DownloadPolicy');
// FrontendController End

Route::group(['middleware' => ['auth', 'auth.timeout']], function () {
    Route::get('/authentication/deactivated', [StatusController::class, 'userDeactivated'])->name('UserDeactivated');

    Route::group(['middleware' => 'status.active'], function () {
        // DashboardController Start
        Route::get('/', [DashboardController::class, 'index'])->name('Dashboard.Index');
        // DashboardController End

        // UserController Start
        Route::resource('users', UserController::class, [
            'names' => ['index' => 'Users.Index', 'create' => 'Users.Create', 'store' => 'Users.Store', 'edit' => 'Users.Edit', 'update' => 'Users.Update', 'destroy' => 'Users.Destroy']
        ]);
        Route::post('/ajax/users', [UserController::class, 'getUserNameData'])->name('Users.GetUserNameData');
        // UserController End

        // RoleController Start
        Route::resource('roles', RoleController::class, [
            'names' => ['index' => 'Roles.Index', 'create' => 'Roles.Create', 'store' => 'Roles.Store', 'edit' => 'Roles.Edit', 'update' => 'Roles.Update', 'destroy' => 'Roles.Destroy']
        ]);
        // RoleController End

        // PermissionController Start
        Route::resource('permissions', PermissionController::class, [
            'names' => ['index' => 'Permissions.Index', 'create' => 'Permissions.Create', 'store' => 'Permissions.Store', 'edit' => 'Permissions.Edit', 'update' => 'Permissions.Update', 'destroy' => 'Permissions.Destroy']
        ]);
        // PermissionController End

        // ActivityLogsController Start
        Route::get('/activitylogs', [ActivityLogsController::class, 'index'])->name('ActivityLogs.Index');
        Route::post('/ajax/activitylogs', [ActivityLogsController::class, 'showLogData'])->name('ActivityLogs.ShowLogData');
        // ActivityLogsController End

        // SettingsController Start
        Route::get('/systemsettings', [SettingsController::class, 'systemSettings'])->name('SystemSettings.Index');
        Route::post('/systemsettings', [SettingsController::class, 'systemSettingsUpdate'])->name('SystemSettings.Update');
        Route::get('/generalsettings', [SettingsController::class, 'generalSettings'])->name('GeneralSettings.Index');
        Route::post('/generalsettings', [SettingsController::class, 'generalSettingsUpdate'])->name('GeneralSettings.Update');
        // SettingsController End

        // ClientController Start
        Route::resource('clients', ClientController::class, [
            'names' => ['index' => 'Clients.Index', 'create' => 'Clients.Create', 'store' => 'Clients.Store', 'edit' => 'Clients.Edit', 'update' => 'Clients.Update', 'destroy' => 'Clients.Destroy']
        ]);
        // ClientController End

        // EmployeeController Start
        Route::resource('employees', EmployeeController::class, [
            'names' => ['index' => 'Employees.Index', 'create' => 'Employees.Create', 'store' => 'Employees.Store', 'edit' => 'Employees.Edit', 'update' => 'Employees.Update', 'destroy' => 'Employees.Destroy']
        ]);
        // EmployeeController End

        // CompanyDepartmentController Start
        Route::resource('departments', CompanyDepartmentController::class, [
            'names' => ['index' => 'CompanyDepartments.Index', 'create' => 'CompanyDepartments.Create', 'store' => 'CompanyDepartments.Store', 'edit' => 'CompanyDepartments.Edit', 'update' => 'CompanyDepartments.Update', 'destroy' => 'CompanyDepartments.Destroy']
        ]);
        // CompanyDepartmentController End

        // CompanyDocumentController Start
        Route::resource('companydocuments', CompanyDocumentController::class, [
            'names' => ['index' => 'CompanyDocuments.Index', 'create' => 'CompanyDocuments.Create', 'store' => 'CompanyDocuments.Store', 'edit' => 'CompanyDocuments.Edit', 'update' => 'CompanyDocuments.Update', 'destroy' => 'CompanyDocuments.Destroy']
        ]);
        Route::get('/kvkkdocuments', [CompanyDocumentController::class, 'kvkkDocuments'])->name('CompanyDocuments.KVKKDocuments');
        Route::get('/kvkkdocuments/{id}', [CompanyDocumentController::class, 'downloadKVKKDocument'])->name('CompanyDocuments.DownloadKVKKDocument');
        // CompanyDocumentController End

        // CompanyControlReportController Start
        Route::resource('companycontrolreports', CompanyControlReportController::class, [
            'names' => ['index' => 'CompanyControlReports.Index', 'create' => 'CompanyControlReports.Create', 'store' => 'CompanyControlReports.Store', 'edit' => 'CompanyControlReports.Edit', 'update' => 'CompanyControlReports.Update', 'destroy' => 'CompanyControlReports.Destroy']
        ]);
        Route::get('/controlreports', [CompanyControlReportController::class, 'controlReports'])->name('CompanyControlReports.ControlReports');
        Route::get('/controlreports/{id}', [CompanyControlReportController::class, 'downloadControlReport'])->name('CompanyControlReports.DownloadControlReport');
        // CompanyControlReportController End

        // AcademyContentController Start
        Route::resource('academymanagement', AcademyContentController::class, [
            'names' => ['index' => 'AcademyContents.Index', 'create' => 'AcademyContents.Create', 'store' => 'AcademyContents.Store', 'edit' => 'AcademyContents.Edit', 'update' => 'AcademyContents.Update', 'destroy' => 'AcademyContents.Destroy']
        ]);
        Route::get('/academycontent', [AcademyContentController::class, 'academyContent'])->name('AcademyContents.AcademyContent');
        Route::get('/academycontents/{id}', [AcademyContentController::class, 'downloadAcademyContent'])->name('AcademyContents.DownloadAcademyContent');
        Route::get('/academycontent/documents', [AcademyContentController::class, 'academyContentDocuments'])->name('AcademyContents.Documents.Index');
        Route::get('/academycontent/presentations', [AcademyContentController::class, 'academyContentPresentations'])->name('AcademyContents.Presentations.Index');
        Route::get('/academycontent/videos', [AcademyContentController::class, 'academyContentVideos'])->name('AcademyContents.Videos.Index');
        // AcademyContentController End

        // WebCodeBaseController Start
        Route::get('/webcodebase', [WebCodeBaseController::class, 'index'])->name('WebCodeBase.Index');
        // WebCodeBaseController End

        // CompanyDepartmentController Start
        Route::resource('departments', CompanyDepartmentController::class, [
            'names' => ['index' => 'CompanyDepartments.Index', 'create' => 'CompanyDepartments.Create', 'store' => 'CompanyDepartments.Store', 'edit' => 'CompanyDepartments.Edit', 'update' => 'CompanyDepartments.Update', 'destroy' => 'CompanyDepartments.Destroy']
        ]);
        // CompanyDepartmentController End

        // InventoryCategoryController Start
        Route::resource('inventorycategories', InventoryCategoryController::class, [
            'names' => ['index' => 'InventoryCategories.Index', 'create' => 'InventoryCategories.Create', 'store' => 'InventoryCategories.Store', 'edit' => 'InventoryCategories.Edit', 'update' => 'InventoryCategories.Update', 'destroy' => 'InventoryCategories.Destroy']
        ]);
        // InventoryCategoryController End

        // DataHoldReasonController Start
        Route::resource('dataholdreasons', DataHoldReasonController::class, [
            'names' => ['index' => 'DataHoldReasons.Index', 'create' => 'DataHoldReasons.Create', 'store' => 'DataHoldReasons.Store', 'edit' => 'DataHoldReasons.Edit', 'update' => 'DataHoldReasons.Update', 'destroy' => 'DataHoldReasons.Destroy']
        ]);
        // DataHoldReasonController End

        // InventoryDataTypeController Start
        Route::resource('inventorydatatypes', InventoryDataTypeController::class, [
            'names' => ['index' => 'InventoryDataTypes.Index', 'create' => 'InventoryDataTypes.Create', 'store' => 'InventoryDataTypes.Store', 'edit' => 'InventoryDataTypes.Edit', 'update' => 'InventoryDataTypes.Update', 'destroy' => 'InventoryDataTypes.Destroy']
        ]);
        // InventoryDataTypeController End

        // InventoryDataSetController Start
        Route::resource('inventorydatasets', InventoryDataSetController::class, [
            'names' => ['index' => 'InventoryDataSets.Index', 'create' => 'InventoryDataSets.Create', 'store' => 'InventoryDataSets.Store', 'edit' => 'InventoryDataSets.Edit', 'update' => 'InventoryDataSets.Update', 'destroy' => 'InventoryDataSets.Destroy']
        ]);
        // InventoryDataSetController End

        // InventoryGenerateController Start
        Route::get('/inventorygenerates', [InventoryGenerateController::class, 'index'])->name('InventoryGenerates.Index');
        Route::post('/ajax/inventorygenerates', [InventoryGenerateController::class, 'generateInventoryReport'])->name('InventoryGenerates.Generate');
        Route::post('/downloadreport/{id}', [InventoryGenerateController::class, 'downloadInventoryReport'])->name('InventoryGenerates.DownloadReport');

        // InventoryGenerateController End

        // KVKKPrecautionController Start
        Route::resource('kvkkprecautions', KVKKPrecautionController::class, [
            'names' => ['index' => 'KVKKPrecautions.Index', 'create' => 'KVKKPrecautions.Create', 'store' => 'KVKKPrecautions.Store', 'edit' => 'KVKKPrecautions.Edit', 'update' => 'KVKKPrecautions.Update', 'destroy' => 'KVKKPrecautions.Destroy']
        ]);
        // KVKKPrecautionController End

        // GDPRAdaptationQuestionController Start
        Route::resource('gdpradaptation', GDPRAdaptationQuestionController::class, [
            'names' => ['index' => 'GDPRAdaptationQuestions.Index', 'create' => 'GDPRAdaptationQuestions.Create', 'store' => 'GDPRAdaptationQuestions.Store', 'edit' => 'GDPRAdaptationQuestions.Edit', 'update' => 'GDPRAdaptationQuestions.Update', 'destroy' => 'GDPRAdaptationQuestions.Destroy']
        ]);
        // GDPRAdaptationQuestionController End
    });
});
