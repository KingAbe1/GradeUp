<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\laravel_example\UserManagement;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$controller_path = 'App\Http\Controllers';

// Main Page Route
Route::get('/', $controller_path . '\dashboard\Ecommerce@index')->name('dashboard')->middleware('auth');

// Route::get('/dashboard/analytics', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics')->middleware('auth');
// Route::get('/dashboard/crm', $controller_path . '\dashboard\Crm@index')->name('dashboard-crm')->middleware('auth');
// Route::get('/dashboard/ecommerce', $controller_path . '\dashboard\Ecommerce@index')->name('dashboard-ecommerce')->middleware('auth');

// locale
Route::get('lang/{locale}', $controller_path . '\language\LanguageController@swap')->middleware('auth');

// layout
// Route::get('/layouts/collapsed-menu', $controller_path . '\layouts\CollapsedMenu@index')->name('layouts-collapsed-menu')->middleware('auth');
// Route::get('/layouts/content-navbar', $controller_path . '\layouts\ContentNavbar@index')->name('layouts-content-navbar')->middleware('auth');
// Route::get('/layouts/content-nav-sidebar', $controller_path . '\layouts\ContentNavSidebar@index')->name('layouts-content-nav-sidebar')->middleware('auth');
// Route::get('/layouts/navbar-full', $controller_path . '\layouts\NavbarFull@index')->name('layouts-navbar-full')->middleware('auth');
// Route::get('/layouts/navbar-full-sidebar', $controller_path . '\layouts\NavbarFullSidebar@index')->name('layouts-navbar-full-sidebar')->middleware('auth');
// Route::get('/layouts/horizontal', $controller_path . '\layouts\Horizontal@index')->name('dashboard-analytics')->middleware('auth');
// Route::get('/layouts/vertical', $controller_path . '\layouts\Vertical@index')->name('dashboard-analytics')->middleware('auth');
// Route::get('/layouts/without-menu', $controller_path . '\layouts\WithoutMenu@index')->name('layouts-without-menu')->middleware('auth');
// Route::get('/layouts/without-navbar', $controller_path . '\layouts\WithoutNavbar@index')->name('layouts-without-navbar')->middleware('auth');
// Route::get('/layouts/fluid', $controller_path . '\layouts\Fluid@index')->name('layouts-fluid')->middleware('auth');
// Route::get('/layouts/container', $controller_path . '\layouts\Container@index')->name('layouts-container')->middleware('auth');
// Route::get('/layouts/blank', $controller_path . '\layouts\Blank@index')->name('layouts-blank')->middleware('auth');

// apps
// Route::get('/app/email', $controller_path . '\apps\Email@index')->name('app-email')->middleware('auth');
Route::get('/app/chat', $controller_path . '\apps\Chat@index')->name('app-chat')->middleware('auth');
// Route::get('/app/calendar', $controller_path . '\apps\Calendar@index')->name('app-calendar')->middleware('auth');
// Route::get('/app/kanban', $controller_path . '\apps\Kanban@index')->name('app-kanban')->middleware('auth');
Route::get('/app/invoice/list', $controller_path . '\apps\InvoiceList@index')->name('app-invoice-list')->middleware('auth');
Route::get('/app/invoice/preview', $controller_path . '\apps\InvoicePreview@index')->name('app-invoice-preview')->middleware('auth');
Route::get('/app/invoice/print', $controller_path . '\apps\InvoicePrint@index')->name('app-invoice-print')->middleware('auth');
Route::get('/app/invoice/edit', $controller_path . '\apps\InvoiceEdit@index')->name('app-invoice-edit')->middleware('auth');
Route::get('/app/invoice/add', $controller_path . '\apps\InvoiceAdd@index')->name('app-invoice-add')->middleware('auth');
Route::get('/app/user/list', $controller_path . '\apps\UserList@index')->name('app-user-list')->middleware('auth');

//Get signed in user info's
Route::get('/app/user/view/account', $controller_path . '\apps\UserViewAccount@index')->name('app-user-view-account')->middleware('auth');
//Account Setting Password Change
Route::post('/app/user/view/account', $controller_path . '\apps\UserViewAccount@update_password')->name('app-user-update-password')->middleware('auth');
//Account User Information Password Change
Route::put('/app/user/view/account/{id}', $controller_path . '\apps\UserViewAccount@update_info')->name('app-user-update-info')->middleware('auth');

// Route::get('/app/user/view/security', $controller_path . '\apps\UserViewSecurity@index')->name('app-user-view-security')->middleware('auth');
// Route::get('/app/user/view/billing', $controller_path . '\apps\UserViewBilling@index')->name('app-user-view-billing')->middleware('auth');
// Route::get('/app/user/view/notifications', $controller_path . '\apps\UserViewNotifications@index')->name('app-user-view-notifications')->middleware('auth');
// Route::get('/app/user/view/connections', $controller_path . '\apps\UserViewConnections@index')->name('app-user-view-connections')->middleware('auth');
Route::get('/app/access-roles', $controller_path . '\apps\AccessRoles@index')->name('app-access-roles')->middleware('auth');
Route::get('/app/access-permission', $controller_path . '\apps\AccessPermission@index')->name('app-access-permission')->middleware('auth');

// pages
// Route::get('/pages/profile-user', $controller_path . '\pages\UserProfile@index')->name('pages-profile-user')->middleware('auth');
// Route::get('/pages/profile-teams', $controller_path . '\pages\UserTeams@index')->name('pages-profile-teams')->middleware('auth');
// Route::get('/pages/profile-projects', $controller_path . '\pages\UserProjects@index')->name('pages-profile-projects')->middleware('auth');
// Route::get('/pages/profile-connections', $controller_path . '\pages\UserConnections@index')->name('pages-profile-connections')->middleware('auth');
// Route::get('/pages/account-settings-account', $controller_path . '\pages\AccountSettingsAccount@index')->name('pages-account-settings-account')->middleware('auth');
// Route::get('/pages/account-settings-security', $controller_path . '\pages\AccountSettingsSecurity@index')->name('pages-account-settings-security')->middleware('auth');
// Route::get('/pages/account-settings-billing', $controller_path . '\pages\AccountSettingsBilling@index')->name('pages-account-settings-billing')->middleware('auth');
// Route::get('/pages/account-settings-notifications', $controller_path . '\pages\AccountSettingsNotifications@index')->name('pages-account-settings-notifications')->middleware('auth');
// Route::get('/pages/account-settings-connections', $controller_path . '\pages\AccountSettingsConnections@index')->name('pages-account-settings-connections')->middleware('auth');
// Route::get('/pages/faq', $controller_path . '\pages\Faq@index')->name('pages-faq')->middleware('auth');
// Route::get('/pages/help-center-landing', $controller_path . '\pages\HelpCenterLanding@index')->name('pages-help-center-landing')->middleware('auth');
// Route::get('/pages/help-center-categories', $controller_path . '\pages\HelpCenterCategories@index')->name('pages-help-center-categories')->middleware('auth');
// Route::get('/pages/help-center-article', $controller_path . '\pages\HelpCenterArticle@index')->name('pages-help-center-article')->middleware('auth');
// Route::get('/pages/pricing', $controller_path . '\pages\Pricing@index')->name('pages-pricing')->middleware('auth');
// Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error')->middleware('auth');
// Route::get('/pages/misc-under-maintenance', $controller_path . '\pages\MiscUnderMaintenance@index')->name('pages-misc-under-maintenance')->middleware('auth');
// Route::get('/pages/misc-comingsoon', $controller_path . '\pages\MiscComingSoon@index')->name('pages-misc-comingsoon')->middleware('auth');
// Route::get('/pages/misc-not-authorized', $controller_path . '\pages\MiscNotAuthorized@index')->name('pages-misc-not-authorized')->middleware('auth');

// authentication

//Show login page
Route::get('/auth/login', $controller_path . '\authentications\LoginBasic@index')->name('auth-login');
Route::post('/auth/login', $controller_path . '\authentications\LoginBasic@check')->name('auth-login-check');

//Show registration page
Route::get('/auth/register', $controller_path . '\authentications\RegisterMultiSteps@index')->name('auth-register');
//Registering students
Route::post('/auth/register', $controller_path . '\authentications\RegisterMultiSteps@store')->name('auth-register-students');


// Route::get('/auth/login-cover', $controller_path . '\authentications\LoginCover@index')->name('auth-login-cover')->middleware('auth');
// Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic')->middleware('auth');
// Route::get('/auth/register-cover', $controller_path . '\authentications\RegisterCover@index')->name('auth-register-cover')->middleware('auth');
// Route::get('/auth/verify-email-basic', $controller_path . '\authentications\VerifyEmailBasic@index')->name('auth-verify-email-basic');
// Route::get('/auth/verify-email-cover', $controller_path . '\authentications\VerifyEmailCover@index')->name('auth-verify-email-cover');
// Route::get('/auth/reset-password-basic', $controller_path . '\authentications\ResetPasswordBasic@index')->name('auth-reset-password-basic');
// Route::get('/auth/reset-password-cover', $controller_path . '\authentications\ResetPasswordCover@index')->name('auth-reset-password-cover');
// Route::get('/auth/forgot-password-basic', $controller_path . '\authentications\ForgotPasswordBasic@index')->name('auth-reset-password-basic');
// Route::get('/auth/forgot-password-cover', $controller_path . '\authentications\ForgotPasswordCover@index')->name('auth-forgot-password-cover');
// Route::get('/auth/two-steps-basic', $controller_path . '\authentications\TwoStepsBasic@index')->name('auth-two-steps-basic');
// Route::get('/auth/two-steps-cover', $controller_path . '\authentications\TwoStepsCover@index')->name('auth-two-steps-cover');

// wizard example
// Route::get('/wizard/ex-checkout', $controller_path . '\wizard_example\Checkout@index')->name('wizard-ex-checkout')->middleware('auth');
// Route::get('/wizard/ex-property-listing', $controller_path . '\wizard_example\PropertyListing@index')->name('wizard-ex-property-listing')->middleware('auth');
// Route::get('/wizard/ex-create-deal', $controller_path . '\wizard_example\CreateDeal@index')->name('wizard-ex-create-deal')->middleware('auth');

// modal
// Route::get('/modal-examples', $controller_path . '\modal\ModalExample@index')->name('modal-examples')->middleware('auth');

// cards
// Route::get('/cards/basic', $controller_path . '\cards\CardBasic@index')->name('cards-basic')->middleware('auth');
// Route::get('/cards/advance', $controller_path . '\cards\CardAdvance@index')->name('cards-advance')->middleware('auth');
// Route::get('/cards/statistics', $controller_path . '\cards\CardStatistics@index')->name('cards-statistics')->middleware('auth');
// Route::get('/cards/analytics', $controller_path . '\cards\CardAnalytics@index')->name('cards-analytics')->middleware('auth');
// Route::get('/cards/actions', $controller_path . '\cards\CardActions@index')->name('cards-actions')->middleware('auth');

// User Interface
// Route::get('/ui/accordion', $controller_path . '\user_interface\Accordion@index')->name('ui-accordion')->middleware('auth');
// Route::get('/ui/alerts', $controller_path . '\user_interface\Alerts@index')->name('ui-alerts')->middleware('auth');
// Route::get('/ui/badges', $controller_path . '\user_interface\Badges@index')->name('ui-badges')->middleware('auth');
// Route::get('/ui/buttons', $controller_path . '\user_interface\Buttons@index')->name('ui-buttons')->middleware('auth');
// Route::get('/ui/carousel', $controller_path . '\user_interface\Carousel@index')->name('ui-carousel')->middleware('auth');
// Route::get('/ui/collapse', $controller_path . '\user_interface\Collapse@index')->name('ui-collapse')->middleware('auth');
// Route::get('/ui/dropdowns', $controller_path . '\user_interface\Dropdowns@index')->name('ui-dropdowns')->middleware('auth');
// Route::get('/ui/footer', $controller_path . '\user_interface\Footer@index')->name('ui-footer')->middleware('auth');
// Route::get('/ui/list-groups', $controller_path . '\user_interface\ListGroups@index')->name('ui-list-groups')->middleware('auth');
// Route::get('/ui/modals', $controller_path . '\user_interface\Modals@index')->name('ui-modals')->middleware('auth');
// Route::get('/ui/navbar', $controller_path . '\user_interface\Navbar@index')->name('ui-navbar')->middleware('auth');
// Route::get('/ui/offcanvas', $controller_path . '\user_interface\Offcanvas@index')->name('ui-offcanvas')->middleware('auth');
// Route::get('/ui/pagination-breadcrumbs', $controller_path . '\user_interface\PaginationBreadcrumbs@index')->name('ui-pagination-breadcrumbs')->middleware('auth');
// Route::get('/ui/progress', $controller_path . '\user_interface\Progress@index')->name('ui-progress')->middleware('auth');
// Route::get('/ui/spinners', $controller_path . '\user_interface\Spinners@index')->name('ui-spinners')->middleware('auth');
// Route::get('/ui/tabs-pills', $controller_path . '\user_interface\TabsPills@index')->name('ui-tabs-pills')->middleware('auth');
// Route::get('/ui/toasts', $controller_path . '\user_interface\Toasts@index')->name('ui-toasts')->middleware('auth');
// Route::get('/ui/tooltips-popovers', $controller_path . '\user_interface\TooltipsPopovers@index')->name('ui-tooltips-popovers')->middleware('auth');
// Route::get('/ui/typography', $controller_path . '\user_interface\Typography@index')->name('ui-typography')->middleware('auth');

// extended ui
// Route::get('/extended/ui-avatar', $controller_path . '\extended_ui\Avatar@index')->name('extended-ui-avatar')->middleware('auth');
// Route::get('/extended/ui-blockui', $controller_path . '\extended_ui\BlockUI@index')->name('extended-ui-blockui')->middleware('auth');
// Route::get('/extended/ui-drag-and-drop', $controller_path . '\extended_ui\DragAndDrop@index')->name('extended-ui-drag-and-drop')->middleware('auth');
// Route::get('/extended/ui-media-player', $controller_path . '\extended_ui\MediaPlayer@index')->name('extended-ui-media-player')->middleware('auth');
// Route::get('/extended/ui-perfect-scrollbar', $controller_path . '\extended_ui\PerfectScrollbar@index')->name('extended-ui-perfect-scrollbar')->middleware('auth');
// Route::get('/extended/ui-star-ratings', $controller_path . '\extended_ui\StarRatings@index')->name('extended-ui-star-ratings')->middleware('auth');
// Route::get('/extended/ui-sweetalert2', $controller_path . '\extended_ui\SweetAlert@index')->name('extended-ui-sweetalert2')->middleware('auth');
// Route::get('/extended/ui-text-divider', $controller_path . '\extended_ui\TextDivider@index')->name('extended-ui-text-divider')->middleware('auth');
// Route::get('/extended/ui-timeline-basic', $controller_path . '\extended_ui\TimelineBasic@index')->name('extended-ui-timeline-basic')->middleware('auth');
// Route::get('/extended/ui-timeline-fullscreen', $controller_path . '\extended_ui\TimelineFullscreen@index')->name('extended-ui-timeline-fullscreen')->middleware('auth');
// Route::get('/extended/ui-tour', $controller_path . '\extended_ui\Tour@index')->name('extended-ui-tour')->middleware('auth');
// Route::get('/extended/ui-treeview', $controller_path . '\extended_ui\Treeview@index')->name('extended-ui-treeview')->middleware('auth');
// Route::get('/extended/ui-misc', $controller_path . '\extended_ui\Misc@index')->name('extended-ui-misc')->middleware('auth');

// icons
// Route::get('/icons/tabler', $controller_path . '\icons\Tabler@index')->name('icons-tabler')->middleware('auth');
// Route::get('/icons/font-awesome', $controller_path . '\icons\FontAwesome@index')->name('icons-font-awesome')->middleware('auth');

// form elements
// Route::get('/forms/basic-inputs', $controller_path . '\form_elements\BasicInput@index')->name('forms-basic-inputs')->middleware('auth');
// Route::get('/forms/input-groups', $controller_path . '\form_elements\InputGroups@index')->name('forms-input-groups')->middleware('auth');
// Route::get('/forms/custom-options', $controller_path . '\form_elements\CustomOptions@index')->name('forms-custom-options')->middleware('auth');
// Route::get('/forms/editors', $controller_path . '\form_elements\Editors@index')->name('forms-editors')->middleware('auth');
// Route::get('/forms/file-upload', $controller_path . '\form_elements\FileUpload@index')->name('forms-file-upload')->middleware('auth');
// Route::get('/forms/pickers', $controller_path . '\form_elements\Picker@index')->name('forms-pickers')->middleware('auth');
// Route::get('/forms/selects', $controller_path . '\form_elements\Selects@index')->name('forms-selects')->middleware('auth');
// Route::get('/forms/sliders', $controller_path . '\form_elements\Sliders@index')->name('forms-sliders')->middleware('auth');
// Route::get('/forms/switches', $controller_path . '\form_elements\Switches@index')->name('forms-switches')->middleware('auth');
// Route::get('/forms/extras', $controller_path . '\form_elements\Extras@index')->name('forms-extras')->middleware('auth');

// form layouts
// Route::get('/form/layouts-vertical', $controller_path . '\form_layouts\VerticalForm@index')->name('form-layouts-vertical')->middleware('auth');
// Route::get('/form/layouts-horizontal', $controller_path . '\form_layouts\HorizontalForm@index')->name('form-layouts-horizontal')->middleware('auth');
// Route::get('/form/layouts-sticky', $controller_path . '\form_layouts\StickyActions@index')->name('form-layouts-sticky')->middleware('auth');

// form wizards
// Route::get('/form/wizard-numbered', $controller_path . '\form_wizard\Numbered@index')->name('form-wizard-numbered')->middleware('auth');
// Route::get('/form/wizard-icons', $controller_path . '\form_wizard\Icons@index')->name('form-wizard-icons')->middleware('auth');
// Route::get('/form/validation', $controller_path . '\form_validation\Validation@index')->name('form-validation')->middleware('auth');

// tables
// Route::get('/tables/basic', $controller_path . '\tables\Basic@index')->name('tables-basic')->middleware('auth');
// Route::get('/tables/datatables-basic', $controller_path . '\tables\DatatableBasic@index')->name('tables-datatables-basic')->middleware('auth');
// Route::get('/tables/datatables-advanced', $controller_path . '\tables\DatatableAdvanced@index')->name('tables-datatables-advanced')->middleware('auth');
// Route::get('/tables/datatables-extensions', $controller_path . '\tables\DatatableExtensions@index')->name('tables-datatables-extensions')->middleware('auth');

// charts
// Route::get('/charts/apex', $controller_path . '\charts\ApexCharts@index')->name('charts-apex')->middleware('auth');
// Route::get('/charts/chartjs', $controller_path . '\charts\ChartJs@index')->name('charts-chartjs')->middleware('auth');

// maps
// Route::get('/maps/leaflet', $controller_path . '\maps\Leaflet@index')->name('maps-leaflet')->middleware('auth');

// laravel example
Route::get('/laravel/user-management', [UserManagement::class, 'UserManagement'])->name('laravel-example-user-management')->middleware('auth')->middleware('auth');
Route::resource('/user-list', UserManagement::class)->middleware('auth');

// Route::middleware([
//   'auth:sanctum',
//   config('jetstream.auth_session'),
//   'verified'
// ])->group(function () {
//   Route::get('/dashboard', function () {
//     return view('dashboard');
//   })->name('dashboard');
// });
