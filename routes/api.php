<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\CurrenciesController;
use App\Http\Controllers\PortsController;
use App\Http\Controllers\TimezonesController;
use App\Http\Controllers\TrafficmodesController;
use App\Http\Controllers\TypeofunitsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\VendorsController;
use App\Http\Controllers\AccessmodelsController;
use App\Http\Controllers\AccesspointsController;
use App\Http\Controllers\ActivitylogsController;
use App\Http\Controllers\DefaultvaluesController;
use App\Http\Controllers\EquipmentsController;
use App\Http\Controllers\LoginlogsController;
use App\Http\Controllers\OwnersController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EquipmentsaledetailsController;
use App\Http\Controllers\EquipmentsalesController;
use App\Http\Controllers\SoasController;
use App\Http\Controllers\SoasubsController;
use App\Http\Controllers\SwaphistoriesController;
use App\Http\Controllers\SwapsController;
use App\Http\Controllers\IgmIndiaVoyagesController;
use App\Http\Controllers\BookingConfirmationsController;
use App\Http\Controllers\BillOfLandingSwitchesController;
use App\Http\Controllers\BillOfLandingNonInventoriesController;
use App\Http\Controllers\BillRemoteLogsController;
use App\Http\Controllers\BillOfLandingsController;
use App\Http\Controllers\ArrivalNoticiesController;
use App\Http\Controllers\DetentionInvoicesController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\VouchersController;
use App\Http\Controllers\ReceiptsController;
use App\Http\Controllers\ArrivalNoticeChargesController;
use App\Http\Controllers\ArrivalNoticeContainersController;
use App\Http\Controllers\BillOfLandingSubNonInventoriesController;
use App\Http\Controllers\BillOfLandingSubNonInventoriesExpsController;
use App\Http\Controllers\BillOfLandingSubNonInventoriesImpsController;
use App\Http\Controllers\BillOfLandingSubsController;
use App\Http\Controllers\BillOfLandingSubsExpsController;
use App\Http\Controllers\BillOfLandingSubsImpsController;
use App\Http\Controllers\BillOfLandingSubSwitchesController;
use App\Http\Controllers\BillOfLandingSubSwitchesExpsController;
use App\Http\Controllers\BillOfLandingSubSwitchesImpsController;
use App\Http\Controllers\DetentionInvoiceContainersController;
use App\Http\Controllers\DetentionInvoiceSlabsController;
use App\Http\Controllers\DetentionTraffiesController;
use App\Http\Controllers\DetentionTraffSubsController;
use App\Http\Controllers\InvoiceChargesController;
use App\Http\Controllers\ReceiptPaymentsController;
use App\Http\Controllers\RemoteBlController;
use App\Http\Controllers\VoucherPaymentsController;

use App\Http\Controllers\IgmCarriersController;
use App\Http\Controllers\IgmContainersController;
use App\Http\Controllers\IgmIndiaCargoInfosController;
use App\Http\Controllers\IgmIndiaCfsController;
use App\Http\Controllers\IgmIndiaContainersController;
use App\Http\Controllers\IgmIndiasController;
use App\Http\Controllers\IgmIndiaSubCodesController;
use App\Http\Controllers\IgmIndiaTerminalsController;
use App\Http\Controllers\IgmIndiaWeightsController;
use App\Http\Controllers\IgmLankaDoContainersController;
use App\Http\Controllers\IgmLankaDosController;
use App\Http\Controllers\IgmsController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Access Points-----------------------------------------------OK-1---------------
Route::GET('/accesspoints/show/all', [AccesspointsController::class,'index']);
Route::POST('/accesspoints/store', [AccesspointsController::class,'store']);

//Access Models-----------------------------------------------OK-1---------------
Route::GET('/accessmodels/show/all', [AccessmodelsController::class,'index']);
Route::POST('/accessmodels/store', [AccessmodelsController::class,'store']);

//Activity Logs-----------------------------------------------OK-1---------------
Route::GET('/activitylogs/show/all', [ActivitylogsController::class,'index']);
Route::GET('/activitylogs/show/{id}', [ActivitylogsController::class,'showById']);
Route::POST('/activitylogs/store', [ActivitylogsController::class,'store']);

//Clients-----------------------------------------------OK-1---------------
Route::GET('/clients/show/all', [ClientsController::class,'index']);//ok
Route::GET('/clients/show/{id}', [ClientsController::class,'showById']);//ok
Route::POST('/clients/store', [ClientsController::class,'store']);//ok

//Countries-----------------------------------------------OK-1---------------
Route::GET('/countries/show/all', [CountriesController::class,'index']);//ok
Route::POST('/countries/store', [CountriesController::class,'store']);//ok

//Currencies-----------------------------------------------OK-1---------------
Route::GET('/currencies/show/all', [CurrenciesController::class,'index']);//ok
Route::GET('/currencies/show/{countryid}', [CurrenciesController::class,'showById']);//ok
Route::POST('/currencies/store', [CurrenciesController::class,'store']);//ok

//Default Values-----------------------------------------------OK-1---------------
Route::GET('/defaultvalues/show/all', [DefaultvaluesController::class,'index']);
Route::POST('/defaultvalues/store', [DefaultvaluesController::class,'store']);

//Departments-----------------------------------------------OK-1---------------
Route::GET('/departments/show/all', [DepartmentsController::class,'index']);//ok
Route::GET('/departments/show/{id}', [DepartmentsController::class,'showById']);//ok
Route::POST('/departments/store', [DepartmentsController::class,'store']);//ok

//Equipments-----------------------------------------------OK-1---------------
Route::GET('/equipments/show/all', [EquipmentsController::class,'index']);
Route::GET('/equipments/show/{id}', [EquipmentsController::class,'showById']);
Route::POST('/equipments/store', [EquipmentsController::class,'store']);

//Login Logs-----------------------------------------------OK-1---------------
Route::GET('/loginlogs/show/all', [LoginlogsController::class,'index']);
Route::GET('/loginlogs/show/{id}', [LoginlogsController::class,'showById']);
Route::POST('/loginlogs/store', [LoginlogsController::class,'store']);

//Owners-----------------------------------------------OK-1---------------
Route::GET('/owners/show/all', [OwnersController::class,'index']);
Route::GET('/owners/show/{id}', [OwnersController::class,'showById']);
Route::POST('/owners/store', [OwnersController::class,'store']);

//Permissions-----------------------------------------------OK-1---------------
Route::GET('/permissions/show/all', [PermissionsController::class,'index']);
Route::GET('/permissions/show/{id}', [PermissionsController::class,'showById']);
Route::POST('/permissions/store', [PermissionsController::class,'store']);

//Ports-----------------------------------------------OK-1---------------
Route::GET('/ports/show/all', [PortsController::class,'index']);//ok
Route::GET('/ports/show/{countryid}', [PortsController::class,'showById']);
Route::POST('/ports/store', [PortsController::class,'store']);//ok

//Properties-----------------------------------------------OK-1---------------
Route::GET('/properties/show/all', [PropertiesController::class,'index']);//ok
Route::GET('/properties/show/{id}', [PropertiesController::class,'showById']);//ok
Route::POST('/properties/store', [PropertiesController::class,'store']);//ok

//Roles-----------------------------------------------OK-1---------------
Route::GET('/roles/show/all', [RolesController::class,'index']);//ok
Route::POST('/roles/store', [RolesController::class,'store']);//ok

//TimeZones-----------------------------------------------OK-1---------------
Route::GET('/timezones/show/all', [TimezonesController::class,'index']);
Route::POST('/timezones/store', [TimezonesController::class,'store']);

//Traffic Modes-----------------------------------------------OK-1---------------
Route::GET('/trafficmodes/show/all', [TrafficmodesController::class,'index']);
Route::POST('/trafficmodes/store', [TrafficmodesController::class,'store']);

//Type Of Units-----------------------------------------------OK-1---------------
Route::GET('/typeofunits/show/all', [TypeofunitsController::class,'index']);
Route::POST('/typeofunits/store', [TypeofunitsController::class,'store']);

//Users-----------------------------------------------OK-1---------------
Route::GET('/users/show/all', [UsersController::class,'index']);//ok
Route::GET('/users/show/{id}', [UsersController::class,'showById']);//ok
Route::POST('/users/store', [UsersController::class,'store']);//ok

//Vendors-----------------------------------------------OK-1---------------
Route::GET('/vendors/show/all', [VendorsController::class,'index']);//ok
Route::GET('/vendors/show/{id}', [VendorsController::class,'showById']);//ok
Route::POST('/vendors/store', [VendorsController::class,'store']);//ok

//Soas-----------------------------------------------OK-1---------------
Route::GET('/soas/show/all', [SoasController::class,'index']);//ok
Route::GET('/soas/show/{id}', [SoasController::class,'showById']);//ok
Route::POST('/soas/store', [SoasController::class,'store']);//ok

//Soa Subs -----------------------------------------------OK-1---------------
Route::GET('/soasubs/show/all', [SoasubsController::class,'index']);//ok
Route::GET('/soasubs/show/{id}', [SoasubsController::class,'showById']);//ok
Route::POST('/soasubs/store', [SoasubsController::class,'store']);//ok

//Swap-----------------------------------------------OK-1---------------
Route::GET('/swaps/show/all', [SwapsController::class,'index']);//ok
Route::GET('/swaps/show/{id}', [SwapsController::class,'showById']);//ok
Route::POST('/swaps/store', [SwapsController::class,'store']);//ok

//Swap Histories-----------------------------------------------OK-1---------------
Route::GET('/swaphistories/show/all', [SwaphistoriesController::class,'index']);//ok
Route::GET('/swaphistories/show/{id}', [SwaphistoriesController::class,'showById']);//ok
Route::POST('/swaphistories/store', [SwaphistoriesController::class,'store']);//ok

//Equipment Sales-----------------------------------------------OK-1---------------
Route::GET('/equipmentsales/show/all', [EquipmentsalesController::class,'index']);//ok
Route::GET('/equipmentsales/show/{id}', [EquipmentsalesController::class,'showById']);//ok
Route::POST('/equipmentsales/store', [EquipmentsalesController::class,'store']);//ok

//Equipment Sale Details-----------------------------------------------OK-1 ---------------
Route::GET('/equipmentsaledetails/show/all', [EquipmentsaledetailsController::class,'index']);//ok
Route::GET('/equipmentsaledetails/show/{id}', [EquipmentsaledetailsController::class,'showById']);//ok
Route::POST('/equipmentsaledetails/store', [EquipmentsaledetailsController::class,'store']);//ok

//Igm India Voyages---------------------------------------------------OK-1 ---------------
Route::GET('/igmindiavoyages/show/all', [IgmIndiaVoyagesController::class,'index']);//ok
Route::GET('/igmindiavoyages/show/{id}', [IgmIndiaVoyagesController::class,'showById']);//ok
Route::POST('/igmindiavoyages/store', [IgmIndiaVoyagesController::class,'store']);//ok

//Booking Confirmations----------------------------------------------OK-1 ---------------
Route::GET('/bookingconfirmations/show/all', [BookingConfirmationsController::class,'index']);//ok
Route::GET('/bookingconfirmations/show/{id}', [BookingConfirmationsController::class,'showById']);//ok
Route::POST('/bookingconfirmations/store', [BookingConfirmationsController::class,'store']);//ok

//Bill Of Landings---------------------------------------------------OK-1 ---------------
Route::GET('/billoflandings/show/all', [BillOfLandingsController::class,'index']);//ok
Route::GET('/billoflandings/show/{id}', [BillOfLandingsController::class,'showById']);//ok
Route::POST('/billoflandings/store', [BillOfLandingsController::class,'store']);//ok

//Bill Remote Logs----------------------------------------------OK-1 ---------------
Route::GET('/billremotelogs/show/all', [BillRemoteLogsController::class,'index']);//ok
Route::GET('/billremotelogs/show/{id}', [BillRemoteLogsController::class,'showById']);//ok
Route::POST('/billremotelogs/store', [BillRemoteLogsController::class,'store']);//ok

//Bill Of Landing Non Inventories------------------------------------OK-1 ---------------
Route::GET('/billoflandingnoninventories/show/all', [BillOfLandingNonInventoriesController::class,'index']);//ok
Route::GET('/billoflandingnoninventories/show/{id}', [BillOfLandingNonInventoriesController::class,'showById']);//ok
Route::POST('/billoflandingnoninventories/store', [BillOfLandingNonInventoriesController::class,'store']);//ok

//Bill Of Landing Switches-----------------------------------------OK-1 ---------------
Route::GET('/billoflandingswitches/show/all', [BillOfLandingSwitchesController::class,'index']);//ok
Route::GET('/billoflandingswitches/show/{id}', [BillOfLandingSwitchesController::class,'showById']);//ok
Route::POST('/billoflandingswitches/store', [BillOfLandingSwitchesController::class,'store']);//ok

//Arival Notices--------------------------------------------------OK-1 ---------------
Route::GET('/arivalnotices/show/all', [ArrivalNoticiesController::class,'index']);//ok
Route::GET('/arivalnotices/show/{id}', [ArrivalNoticiesController::class,'showById']);//ok
Route::POST('/arivalnotices/store', [ArrivalNoticiesController::class,'store']);//ok

//Detention Invoices-----------------------------------------------OK-1 ---------------
Route::GET('/detentioninvoice/show/all', [DetentionInvoicesController::class,'index']);//ok
Route::GET('/detentioninvoice/show/{id}', [DetentionInvoicesController::class,'showById']);//ok
Route::POST('/detentioninvoice/store', [DetentionInvoicesController::class,'store']);//ok

//Invoices-----------------------------------------------OK-1 ---------------
Route::GET('/invoices/show/all', [InvoicesController::class,'index']);//ok
Route::GET('/invoices/show/{id}', [InvoicesController::class,'showById']);//ok
Route::POST('/invoices/store', [InvoicesController::class,'store']);//ok

//Vouchers-----------------------------------------------OK-1 ---------------
Route::GET('/vouchers/show/all', [VouchersController::class,'index']);//ok
Route::GET('/vouchers/show/{id}', [VouchersController::class,'showById']);//ok
Route::POST('/vouchers/store', [VouchersController::class,'store']);//ok

//Receipts-----------------------------------------------OK-1 ---------------
Route::GET('/receipts/show/all', [ReceiptsController::class,'index']);//ok
Route::GET('/receipts/show/{id}', [ReceiptsController::class,'showById']);//ok
Route::POST('/receipts/store', [ReceiptsController::class,'store']);//ok

//Detention Traffies---------------------------------------OK-1 ---------------
Route::GET('/detentiontraffies/show/all', [DetentionTraffiesController::class,'index']);//ok
Route::GET('/detentiontraffies/show/{id}', [DetentionTraffiesController::class,'showById']);//ok
Route::POST('/detentiontraffies/store', [DetentionTraffiesController::class,'store']);//ok

//Arrival Notice Charges-------------------------------------------OK-1 ------------------
Route::GET('/arrivalnoticecharges/show/all', [ArrivalNoticeChargesController::class,'index']);//ok
Route::GET('/arrivalnoticecharges/show/{id}', [ArrivalNoticeChargesController::class,'showById']);//ok
Route::POST('/arrivalnoticecharges/store', [ArrivalNoticeChargesController::class,'store']);//ok

//Arrival Notice Containers-----------------------------------------OK-1 ---------------------
Route::GET('/arrivalnoticecontainers/show/all', [ArrivalNoticeContainersController::class,'index']);//ok
Route::GET('/arrivalnoticecontainers/show/{id}', [ArrivalNoticeContainersController::class,'showById']);//ok
Route::POST('/arrivalnoticecontainers/store', [ArrivalNoticeContainersController::class,'store']);//ok

//Voucher Payments----------------------------------------------OK-1 ----------------
Route::GET('/voucherpayments/show/all', [VoucherPaymentsController::class,'index']);//ok
Route::GET('/voucherpayments/show/{id}', [VoucherPaymentsController::class,'showById']);//ok
Route::POST('/voucherpayments/store', [VoucherPaymentsController::class,'store']);//ok

//Remote Bl-----------------------------------------------------OK-1 ---------
Route::GET('/remotebl/show/all', [RemoteBlController::class,'index']);//ok
Route::GET('/remotebl/show/{id}', [RemoteBlController::class,'showById']);//ok
Route::POST('/remotebl/store', [RemoteBlController::class,'store']);//ok

//Receipt Payments----------------------------------------------OK-1 ----------------
Route::GET('/receiptpayments/show/all', [ReceiptPaymentsController::class,'index']);//ok
Route::GET('/receiptpayments/show/{id}', [ReceiptPaymentsController::class,'showById']);//ok
Route::POST('/receiptpayments/store', [ReceiptPaymentsController::class,'store']);//ok

//Invoice Charges-----------------------------------------------OK-1 ---------------
Route::GET('/invoicecharges/show/all', [InvoiceChargesController::class,'index']);//ok
Route::GET('/invoicecharges/show/{id}', [InvoiceChargesController::class,'showById']);//ok
Route::POST('/invoicecharges/store', [InvoiceChargesController::class,'store']);//ok

//Detention Traff Subs-------------------------------------------OK-1 -------------------
Route::GET('/detentiontraffsubs/show/all', [DetentionTraffSubsController::class,'index']);//ok
Route::GET('/detentiontraffsubs/show/{id}', [DetentionTraffSubsController::class,'showById']);//ok
Route::POST('/detentiontraffsubs/store', [DetentionTraffSubsController::class,'store']);//ok

//Detention Invoice Slabs-----------------------------------------OK-1 ---------------------
Route::GET('/detentioninvoiceslabs/show/all', [DetentionInvoiceSlabsController::class,'index']);//ok
Route::GET('/detentioninvoiceslabs/show/{id}', [DetentionInvoiceSlabsController::class,'showById']);//ok
Route::POST('/detentioninvoiceslabs/store', [DetentionInvoiceSlabsController::class,'store']);//ok

//Bill Of Landing Sub Switches Imps-------------------------------OK-1 -------------------------------
Route::GET('/billoflandingsubswitchesimps/show/all', [BillOfLandingSubSwitchesImpsController::class,'index']);//ok
Route::GET('/billoflandingsubswitchesimps/show/{id}', [BillOfLandingSubSwitchesImpsController::class,'showById']);//ok
Route::POST('/billoflandingsubswitchesimps/store', [BillOfLandingSubSwitchesImpsController::class,'store']);//ok

//Bill Of Landing Sub Switches Exps-------------------------------OK-1 -------------------------------
Route::GET('/billoflandingsubswitchesexps/show/all', [BillOfLandingSubSwitchesExpsController::class,'index']);//ok
Route::GET('/billoflandingsubswitchesexps/show/{id}', [BillOfLandingSubSwitchesExpsController::class,'showById']);//ok
Route::POST('/billoflandingsubswitchesexps/store', [BillOfLandingSubSwitchesExpsController::class,'store']);//ok

//Bill Of Landing Sub Switches-------------------------------------OK-1 -------------------------
Route::GET('/billoflandingsubswitches/show/all', [BillOfLandingSubSwitchesController::class,'index']);//ok
Route::GET('/billoflandingsubswitches/show/{id}', [BillOfLandingSubSwitchesController::class,'showById']);//ok
Route::POST('/billoflandingsubswitches/store', [BillOfLandingSubSwitchesController::class,'store']);//ok

//Bill Of Landing Subs Imps-----------------------------------------OK-1 ---------------------
Route::GET('/billoflandingsubsimps/show/all', [BillOfLandingSubsImpsController::class,'index']);//ok
Route::GET('/billoflandingsubsimps/show/{id}', [BillOfLandingSubsImpsController::class,'showById']);//ok
Route::POST('/billoflandingsubsimps/store', [BillOfLandingSubsImpsController::class,'store']);//ok

//Bill Of Landing Subs Exps---------------------------------------------OK-1 -----------------
Route::GET('/billoflandingsubsexps/show/all', [BillOfLandingSubsExpsController::class,'index']);//ok
Route::GET('/billoflandingsubsexps/show/{id}', [BillOfLandingSubsExpsController::class,'showById']);//ok
Route::POST('/billoflandingsubsexps/store', [BillOfLandingSubsExpsController::class,'store']);//ok

//Bill Of Landing Subs--------------------------------------------------OK-1 ------------
Route::GET('/billoflandingsubs/show/all', [BillOfLandingSubsController::class,'index']);//ok
Route::GET('/billoflandingsubs/show/{id}', [BillOfLandingSubsController::class,'showById']);//ok
Route::POST('/billoflandingsubs/store', [BillOfLandingSubsController::class,'store']);//ok

//Bill Of Landing Sub Non Inventories Imps----------------------------------OK-1 ----------------------------
Route::GET('/billoflandingsubnoninventoriesimps/show/all', [BillOfLandingSubNonInventoriesImpsController::class,'index']);//ok
Route::GET('/billoflandingsubnoninventoriesimps/show/{id}', [BillOfLandingSubNonInventoriesImpsController::class,'showById']);//ok
Route::POST('/billoflandingsubnoninventoriesimps/store', [BillOfLandingSubNonInventoriesImpsController::class,'store']);//ok

//Bill Of Landing Sub Non Inventories Exps----------------------------------OK-1 ----------------------------
Route::GET('/billoflandingsubnoninventoriesexps/show/all', [BillOfLandingSubNonInventoriesExpsController::class,'index']);//ok
Route::GET('/billoflandingsubnoninventoriesexps/show/{id}', [BillOfLandingSubNonInventoriesExpsController::class,'showById']);//ok
Route::POST('/billoflandingsubnoninventoriesexps/store', [BillOfLandingSubNonInventoriesExpsController::class,'store']);//ok

//Bill Of Landing Sub Non Inventories---------------------------------------OK-1 -----------------------
Route::GET('/billoflandingsubnoninventories/show/all', [BillOfLandingSubNonInventoriesController::class,'index']);//ok
Route::GET('/billoflandingsubnoninventories/show/{id}', [BillOfLandingSubNonInventoriesController::class,'showById']);//ok
Route::POST('/billoflandingsubnoninventories/store', [BillOfLandingSubNonInventoriesController::class,'store']);//ok

//Detention Invoice Containers----------------------------------------------OK-1 ----------------
Route::GET('/detentioninvoicecontainers/show/all', [DetentionInvoiceContainersController::class,'index']);//ok
Route::GET('/detentioninvoicecontainers/show/{id}', [DetentionInvoiceContainersController::class,'showById']);//ok
Route::POST('/detentioninvoicecontainers/store', [DetentionInvoiceContainersController::class,'store']);//ok

// ---------------------------------------------------------------------------------------

//Igm Carriers----------------------------------------------O ----------------
Route::GET('/igmcarriers/show/all', [IgmCarriersController::class,'index']);
Route::GET('/igmcarriers/show/{id}', [IgmCarriersController::class,'showById']);
Route::POST('/igmcarriers/store', [IgmCarriersController::class,'store']);

//Igm Containers----------------------------------------------O ----------------
Route::GET('/igmcontainers/show/all', [IgmContainersController::class,'index']);
Route::GET('/igmcontainers/show/{id}', [IgmContainersController::class,'showById']);
Route::POST('/igmcontainers/store', [IgmContainersController::class,'store']);

//Igm India Cargo Infos----------------------------------------------O ----------------
Route::GET('/igmindiacargoinfos/show/all', [IgmIndiaCargoInfosController::class,'index']);
Route::GET('/igmindiacargoinfos/show/{id}', [IgmIndiaCargoInfosController::class,'showById']);
Route::POST('/igmindiacargoinfos/store', [IgmIndiaCargoInfosController::class,'store']);

//Igm India Cfs----------------------------------------------O ----------------
Route::GET('/igmindiacfs/show/all', [IgmIndiaCfsController::class,'index']);
Route::GET('/igmindiacfs/show/{id}', [IgmIndiaCfsController::class,'showById']);
Route::POST('/igmindiacfs/store', [IgmIndiaCfsController::class,'store']);

//Igm India Containers----------------------------------------------O ----------------
Route::GET('/igmindiacontainers/show/all', [IgmIndiaContainersController::class,'index']);
Route::GET('/igmindiacontainers/show/{id}', [IgmIndiaContainersController::class,'showById']);
Route::POST('/igmindiacontainers/store', [IgmIndiaContainersController::class,'store']);

//Igm Indias----------------------------------------------O ----------------
Route::GET('/igmindias/show/all', [IgmIndiasController::class,'index']);
Route::GET('/igmindias/show/{id}', [IgmIndiasController::class,'showById']);
Route::POST('/igmindias/store', [IgmIndiasController::class,'store']);

//Igm India Sub Codes----------------------------------------------O ----------------
Route::GET('/igmindiasubcodes/show/all', [IgmIndiaSubCodesController::class,'index']);
Route::GET('/igmindiasubcodes/show/{id}', [IgmIndiaSubCodesController::class,'showById']);
Route::POST('/igmindiasubcodes/store', [IgmIndiaSubCodesController::class,'store']);

//Igm India Terminals----------------------------------------------O ----------------
Route::GET('/igmindiaterminals/show/all', [IgmIndiaTerminalsController::class,'index']);
Route::GET('/igmindiaterminals/show/{id}', [IgmIndiaTerminalsController::class,'showById']);
Route::POST('/igmindiaterminals/store', [IgmIndiaTerminalsController::class,'store']);

//Igm India Weights----------------------------------------------O ----------------
Route::GET('/igmindiaweights/show/all', [IgmIndiaWeightsController::class,'index']);
Route::GET('/igmindiaweights/show/{id}', [IgmIndiaWeightsController::class,'showById']);
Route::POST('/igmindiaweights/store', [IgmIndiaWeightsController::class,'store']);

//Igm Lanka Do Containers----------------------------------------------O ----------------
Route::GET('/igmlankadodcontainers/show/all', [IgmLankaDoContainersController::class,'index']);
Route::GET('/igmlankadodcontainers/show/{id}', [IgmLankaDoContainersController::class,'showById']);
Route::POST('/igmlankadodcontainers/store', [IgmLankaDoContainersController::class,'store']);

//Igm Lanka Dos----------------------------------------------O ----------------
Route::GET('/igmlankados/show/all', [IgmLankaDosController::class,'index']);
Route::GET('/detentioninvoicecontainers/show/{id}', [IgmLankaDosController::class,'showById']);
Route::POST('/detentioninvoicecontainers/store', [IgmLankaDosController::class,'store']);

//Igms----------------------------------------------O ----------------
Route::GET('/igms/show/all', [IgmsController::class,'index']);
Route::GET('/igms/show/{id}', [IgmsController::class,'showById']);
Route::POST('/igms/store', [IgmsController::class,'store']);