<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PosController;
use App\Http\Controllers\Admin\TaxController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SiteController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\Admin\DamageController;
use App\Http\Controllers\Admin\BarcodeController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\LicenseController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\PosOrderController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\TimezoneController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\SimpleUserController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Admin\CountryCodeController;
use App\Http\Controllers\Admin\MenuSectionController;
use App\Http\Controllers\Admin\SalesReportController;
use App\Http\Controllers\Auth\RefreshTokenController;
use App\Http\Controllers\Admin\MenuTemplateController;
use App\Http\Controllers\Admin\ProductBrandController;
use App\Http\Controllers\Admin\AdministratorController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\MyOrderDetailsController;
use App\Http\Controllers\Admin\ProductsReportController;
use App\Http\Controllers\Admin\CustomerAddressController;
use App\Http\Controllers\Admin\EmployeeAddressController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductVariationController;
use App\Http\Controllers\Admin\AdministratorAddressController;
use App\Http\Controllers\Admin\ProductAttributeOptionController;
use App\Http\Controllers\Frontend\SettingController as FrontendSettingController;
use App\Http\Controllers\Frontend\LanguageController as FrontendLanguageController;
use App\Http\Controllers\Frontend\CountryCodeController as FrontendCountryCodeController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::match(['get', 'post'], '/login', function () {
    return response()->json(['errors' => 'unauthenticated'], 401);
})->name('login');

Route::match(['get', 'post'], '/refresh-token', [RefreshTokenController::class, 'refreshToken'])->middleware(['installed']);

Route::prefix('auth')->middleware(['installed', 'localization'])->name('auth.')->namespace('Auth')->group(function () {
    Route::post('/login', [LoginController::class, 'login']);

    Route::prefix('forgot-password')->name('forgot-password.')->group(function () {
        Route::post('/', [ForgotPasswordController::class, 'forgotPassword']);
        Route::post('/otp-phone', [ForgotPasswordController::class, 'otpPhone']);
        Route::post('/otp-email', [ForgotPasswordController::class, 'otpEmail']);
        Route::post('/verify-phone', [ForgotPasswordController::class, 'verifyPhone']);
        Route::post('/verify-email', [ForgotPasswordController::class, 'verifyEmail']);
        Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword']);
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [LoginController::class, 'logout']);
    });

    Route::post('/authcheck', function () {
        if (Auth::check()) {
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    });
});

/* all routes must be singular word*/
Route::prefix('profile')->name('profile.')->middleware(['installed', 'auth:sanctum', 'localization'])->group(function () {
    Route::get('/', [ProfileController::class, 'profile']);
    Route::match(['post', 'put', 'patch'], '/', [ProfileController::class, 'update']);
    Route::match(['put', 'patch'], '/change-password', [ProfileController::class, 'changePassword']);
    Route::post('/change-image', [ProfileController::class, 'changeImage']);
});



Route::prefix('admin')->name('admin.')->middleware(['auth:sanctum'])->group(function () {
    Route::prefix('timezone')->name('timezone.')->group(function () {
        Route::get('/', [TimezoneController::class, 'index']);
    });

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/total-sales', [DashboardController::class, 'totalSales']);
        Route::get('/total-orders', [DashboardController::class, 'totalOrders']);
        Route::get('/total-customers', [DashboardController::class, 'totalCustomers']);
        Route::get('/total-products', [DashboardController::class, 'totalProducts']);
        Route::get('/sales-summary', [DashboardController::class, 'salesSummary']);
        Route::get('/customer-states', [DashboardController::class, 'customerStates']);
        Route::get('/top-products', [DashboardController::class, 'topProducts']);
    });

    Route::prefix('setting')->name('setting.')->group(function () {
        Route::prefix('company')->name('company.')->group(function () {
            Route::get('/', [CompanyController::class, 'index']);
            Route::match(['put', 'patch'], '/', [CompanyController::class, 'update']);
        });

        Route::prefix('site')->name('site.')->group(function () {
            Route::get('/', [SiteController::class, 'index']);
            Route::match(['put', 'patch'], '/', [SiteController::class, 'update']);
        });

        Route::prefix('theme')->name('theme.')->group(function () {
            Route::get('/', [ThemeController::class, 'index']);
            Route::post('/', [ThemeController::class, 'update']);
        });

        Route::prefix('mail')->name('mail.')->group(function () {
            Route::get('/', [MailController::class, 'index']);
            Route::match(['put', 'patch'], '/', [MailController::class, 'update']);
        });

        Route::prefix('currency')->name('currency.')->group(function () {
            Route::get('/', [CurrencyController::class, 'index']);
            Route::get('/show/{currency}', [CurrencyController::class, 'show']);
            Route::post('/', [CurrencyController::class, 'store']);
            Route::match(['put', 'patch'], '/{currency}', [CurrencyController::class, 'update']);
            Route::delete('/{currency}', [CurrencyController::class, 'destroy']);
        });

        Route::prefix('tax')->name('tax.')->group(function () {
            Route::get('/', [TaxController::class, 'index']);
            Route::get('/show/{tax}', [TaxController::class, 'show']);
            Route::post('/', [TaxController::class, 'store']);
            Route::match(['put', 'patch'], '/{tax}', [TaxController::class, 'update']);
            Route::delete('/{tax}', [TaxController::class, 'destroy']);
        });

        Route::prefix('product-category')->name('product-category.')->group(function () {
            Route::get('/', [ProductCategoryController::class, 'index']);
            Route::get('/depth-tree', [ProductCategoryController::class, 'depthTree']);
            Route::get('/show/{productCategory}', [ProductCategoryController::class, 'show']);
            Route::post('/', [ProductCategoryController::class, 'store']);
            Route::match(['post', 'put', 'patch'], '/{productCategory}', [ProductCategoryController::class, 'update']);
            Route::delete('/{productCategory}', [ProductCategoryController::class, 'destroy']);
            Route::get('/ancestors-and-self/{productCategory:slug}', [ProductCategoryController::class, 'ancestorsAndSelf']);
            Route::get('/tree', [ProductCategoryController::class, 'tree']);
            Route::get('/export', [ProductCategoryController::class, 'export']);
            Route::get('/download-attachment', [ProductCategoryController::class, 'downloadAttachment']);
            Route::post('/import/file', [ProductCategoryController::class, 'import']);
        });

        Route::prefix('product-brand')->name('product-brand.')->group(function () {
            Route::get('/', [ProductBrandController::class, 'index']);
            Route::get('/show/{productBrand}', [ProductBrandController::class, 'show']);
            Route::post('/', [ProductBrandController::class, 'store']);
            Route::match(['post', 'put', 'patch'], '/{productBrand}', [ProductBrandController::class, 'update']);
            Route::delete('/{productBrand}', [ProductBrandController::class, 'destroy']);
        });

        Route::prefix('supplier')->name('supplier.')->group(function () {
            Route::get('/', [SupplierController::class, 'index']);
            Route::get('/show/{supplier}', [SupplierController::class, 'show']);
            Route::post('/', [SupplierController::class, 'store']);
            Route::match(['post', 'put',  'patch'], '/{supplier}', [SupplierController::class, 'update']);
            Route::delete('/{supplier}', [SupplierController::class, 'destroy']);
        });


        Route::prefix('language')->name('language.')->group(function () {
            Route::get('/', [LanguageController::class, 'index']);
            Route::post('/', [LanguageController::class, 'store']);
            Route::get('/show/{language}', [LanguageController::class, 'show']);
            Route::match(['post', 'put', 'patch'], '/update/{language}', [LanguageController::class, 'update']);
            Route::delete('/{language}', [LanguageController::class, 'destroy']);

            Route::get('/file-list/{language:code}', [LanguageController::class, 'fileList']);
            Route::post('/file-text', [LanguageController::class, 'fileText']);
            Route::post('/file-text/store', [LanguageController::class, 'fileTextStore']);
        });

        Route::prefix('menu-section')->name('menu-section.')->group(function () {
            Route::get('/', [MenuSectionController::class, 'index']);
        });

        Route::prefix('menu-template')->name('menu-template.')->group(function () {
            Route::get('/', [MenuTemplateController::class, 'index']);
            Route::get('/show/{menuTemplate}', [MenuTemplateController::class, 'show']);
            Route::post('/', [MenuTemplateController::class, 'store']);
            Route::match(['put', 'patch'], '/{menuTemplate}', [MenuTemplateController::class, 'update']);
            Route::delete('/{menuTemplate}', [MenuTemplateController::class, 'destroy']);
        });

        Route::prefix('product-attribute')->name('product-attribute.')->group(function () {
            Route::get('/', [ProductAttributeController::class, 'index']);
            Route::get('/show/{productAttribute}', [ProductAttributeController::class, 'show']);
            Route::post('/', [ProductAttributeController::class, 'store']);
            Route::match(['put', 'patch'], '/{productAttribute}', [ProductAttributeController::class, 'update']);
            Route::delete('/{productAttribute}', [ProductAttributeController::class, 'destroy']);
        });

        Route::prefix('product-attribute-option')->name('product-attribute-option.')->group(function () {
            Route::get('/{productAttribute}', [ProductAttributeOptionController::class, 'index']);
            Route::get('/{productAttribute}/show/{productAttributeOption}', [ProductAttributeOptionController::class, 'show']);
            Route::post('/{productAttribute}', [ProductAttributeOptionController::class, 'store']);
            Route::match(['put', 'patch'], '/{productAttribute}/{productAttributeOption}', [ProductAttributeOptionController::class, 'update']);
            Route::delete('/{productAttribute}/{productAttributeOption}', [ProductAttributeOptionController::class, 'destroy']);
        });

        Route::prefix('unit')->name('unit.')->group(function () {
            Route::get('/', [UnitController::class, 'index']);
            Route::get('/show/{unit}', [UnitController::class, 'show']);
            Route::post('/', [UnitController::class, 'store']);
            Route::match(['put', 'patch'], '/{unit}', [UnitController::class, 'update']);
            Route::delete('/{unit}', [UnitController::class, 'destroy']);
        });

        Route::prefix('barcode')->name('barcode.')->group(function () {
            Route::get('/', [BarcodeController::class, 'index']);
        });

        Route::prefix('role')->name('role.')->group(function () {
            Route::get('/', [RoleController::class, 'index']);
            Route::post('/', [RoleController::class, 'store']);
            Route::get('/show/{role}', [RoleController::class, 'show']);
            Route::match(['put', 'patch'], '/{role}', [RoleController::class, 'update']);
            Route::delete('/{role}', [RoleController::class, 'destroy']);
        });

        Route::prefix('permission')->name('permission.')->group(function () {
            Route::get('/{role}', [PermissionController::class, 'index']);
            Route::match(['put', 'patch'], '/{role}', [PermissionController::class, 'update']);
        });

        Route::prefix('license')->name('license.')->group(function () {
            Route::get('/', [LicenseController::class, 'index']);
            Route::match(['put', 'patch'], '/', [LicenseController::class, 'update']);
        });
    });

    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/show/{product}', [ProductController::class, 'show']);
        Route::get('/pos-product/{product}', [ProductController::class, 'posProduct']);
        Route::post('/', [ProductController::class, 'store']);
        Route::match(['post', 'put', 'patch'], '/{product}', [ProductController::class, 'update']);
        Route::delete('/{product}', [ProductController::class, 'destroy']);
        Route::post('/upload-image/{product}', [ProductController::class, 'uploadImage']);
        Route::get('/delete-image/{product}/{index}', [ProductController::class, 'deleteImage']);
        Route::get('/export', [ProductController::class, 'export']);
        Route::get('/generate-sku', [ProductController::class, 'generateSku']);
        Route::post('/offer/{product}', [ProductController::class, 'productOffer']);
        Route::get('/purchasable-product', [ProductController::class, 'purchasableProducts']);
        Route::get('/simple-product', [ProductController::class, 'simpleProducts']);
        Route::get('/download-attachment', [ProductController::class, 'downloadAttachment']);
        Route::post('/import/file', [ProductController::class, 'import']);

        Route::prefix('variation')->name('variation.')->group(function () {
            Route::get('/{product}', [ProductVariationController::class, 'index']);
            Route::get('/{product}/tree', [ProductVariationController::class, 'tree']);
            Route::get('/{product}/single-tree', [ProductVariationController::class, 'singleTree']);
            Route::get('/{product}/tree-with-selected', [ProductVariationController::class, 'treeWithSelected']);
            Route::post('/{product}/store', [ProductVariationController::class, 'store']);
            Route::match(['post', 'put', 'patch'], '/{product}/update/{productVariation}', [ProductVariationController::class, 'update']);
            Route::delete('/{product}/destroy/{productVariation}', [ProductVariationController::class, 'destroy']);
            Route::get('/{product}/show/{productVariation}', [ProductVariationController::class, 'show']);
            Route::get('/ancestors-and-self/{productVariation}', [ProductVariationController::class, 'ancestorsToString']);
        });

        Route::get('/initial-variation/{product}', [ProductVariationController::class, 'initialVariation']);
        Route::get('/children-variation/{productVariation}', [ProductVariationController::class, 'childrenVariation']);
        Route::get('/ancestors-and-self-id/{productVariation}', [ProductVariationController::class, 'ancestorsAndSelfId']);
    });

    Route::prefix('country-code')->name('country-code.')->group(function () {
        Route::get('/', [CountryCodeController::class, 'index']);
        Route::get('/show/{country}', [CountryCodeController::class, 'show']);
        Route::get('/calling-code/{callingCode}', [CountryCodeController::class, 'callingCode']);
    });

    Route::prefix('country')->name('country')->group(function () {
        Route::get('/', [CountryController::class, 'index']);
        Route::get('/show/{country}', [CountryController::class, 'show']);
        Route::post('/', [CountryController::class, 'store']);
        Route::delete('/{country}', [CountryController::class, 'destroy']);
        Route::match(['put', 'patch', 'post'], '/{country}', [CountryController::class, 'update']);
    });

    Route::prefix('state')->name('state')->group(function () {
        Route::get('/', [StateController::class, 'index']);
        Route::get('/simple-lists', [StateController::class, 'simpleLists']);
        Route::get('/show/{state}', [StateController::class, 'show']);
        Route::post('/', [StateController::class, 'store']);
        Route::delete('/{state}', [StateController::class, 'destroy']);
        Route::match(['put', 'patch', 'post'], '/{state}', [StateController::class, 'update']);
        Route::get('/states/{country}', [StateController::class, 'statesByCountry']);
    });

    Route::prefix('city')->name('city')->group(function () {
        Route::get('/', [CityController::class, 'index']);
        Route::get('/show/{city}', [CityController::class, 'show']);
        Route::post('/', [CityController::class, 'store']);
        Route::delete('/{city}', [CityController::class, 'destroy']);
        Route::match(['put', 'patch', 'post'], '/{city}', [CityController::class, 'update']);
        Route::get('/cities/{state}', [CityController::class, 'citiesByState']);
    });

    Route::prefix('administrator')->name('administrator.')->group(function () {
        Route::get('/', [AdministratorController::class, 'index']);
        Route::get('/show/{administrator}', [AdministratorController::class, 'show']);
        Route::post('/', [AdministratorController::class, 'store']);
        Route::match(['post', 'put', 'patch'], '/{administrator}', [AdministratorController::class, 'update']);
        Route::delete('/{administrator}', [AdministratorController::class, 'destroy']);
        Route::get('/export', [AdministratorController::class, 'export']);
        Route::post('/change-password/{administrator}', [AdministratorController::class, 'changePassword']);
        Route::post('/change-image/{administrator}', [AdministratorController::class, 'changeImage']);
        Route::get('/my-order/{administrator}', [AdministratorController::class, 'myOrder']);
        Route::get('/address/{administrator}', [AdministratorAddressController::class, 'index']);
        Route::get('/address/show/{administrator}/{address}', [AdministratorAddressController::class, 'show']);
        Route::post('/address/{administrator}', [AdministratorAddressController::class, 'store']);
        Route::match(['put', 'patch'], '/address/{administrator}/{address}', [AdministratorAddressController::class, 'update']);
        Route::delete('/address/{administrator}/{address}', [AdministratorAddressController::class, 'destroy']);
    });

    Route::prefix('customer')->name('customer.')->group(function () {
        Route::get('/', [CustomerController::class, 'index']);
        Route::post('/', [CustomerController::class, 'store']);
        Route::get('/show/{customer}', [CustomerController::class, 'show']);
        Route::match(['post', 'put', 'patch'], '/{customer}', [CustomerController::class, 'update']);
        Route::delete('/{customer}', [CustomerController::class, 'destroy']);
        Route::get('/export', [CustomerController::class, 'export']);
        Route::post('/change-password/{customer}', [CustomerController::class, 'changePassword']);
        Route::post('/change-image/{customer}', [CustomerController::class, 'changeImage']);
        Route::get('/my-order/{customer}', [CustomerController::class, 'myOrder']);
        Route::get('/address/{customer}', [CustomerAddressController::class, 'index']);
        Route::get('/address/show/{customer}/{address}', [CustomerAddressController::class, 'show']);
        Route::post('/address/{customer}', [CustomerAddressController::class, 'store']);
        Route::match(['put', 'patch'], '/address/{customer}/{address}', [CustomerAddressController::class, 'update']);
        Route::delete('/address/{customer}/{address}', [CustomerAddressController::class, 'destroy']);
    });

    Route::prefix('employee')->name('employee.')->group(function () {
        Route::get('/', [EmployeeController::class, 'index']);
        Route::post('/', [EmployeeController::class, 'store']);
        Route::get('/show/{employee}', [EmployeeController::class, 'show']);
        Route::match(['put', 'patch'], '/{employee}', [EmployeeController::class, 'update']);
        Route::delete('/{employee}', [EmployeeController::class, 'destroy']);
        Route::get('/export', [EmployeeController::class, 'export']);
        Route::post('/change-password/{employee}', [EmployeeController::class, 'changePassword']);
        Route::post('/change-image/{employee}', [EmployeeController::class, 'changeImage']);
        Route::get('/my-order/{employee}', [EmployeeController::class, 'myOrder']);
        Route::get('/address/{employee}', [EmployeeAddressController::class, 'index']);
        Route::get('/address/show/{employee}/{address}', [EmployeeAddressController::class, 'show']);
        Route::post('/address/{employee}', [EmployeeAddressController::class, 'store']);
        Route::match(['put', 'patch'], '/address/{employee}/{address}', [EmployeeAddressController::class, 'update']);
        Route::delete('/address/{employee}/{address}', [EmployeeAddressController::class, 'destroy']);
    });

    Route::prefix('my-order')->name('my-order.')->group(function () {
        Route::get('/show/{user}/{order}', [MyOrderDetailsController::class, 'orderDetails']);
    });

    Route::prefix('sales-report')->name('sales-report.')->group(function () {
        Route::get('/', [SalesReportController::class, 'index']);
        Route::get('/export', [SalesReportController::class, 'export']);
        Route::get('/overview', [SalesReportController::class, 'salesReportOverview']);
        Route::get('/export-pdf', [SalesReportController::class, 'exportPdf']);
    });

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [SimpleUserController::class, 'index']);
    });

    Route::prefix('purchase')->name('purchase.')->group(function () {
        Route::get('/', [PurchaseController::class, 'index']);
        Route::post('/', [PurchaseController::class, 'store']);
        Route::get('/show/{purchase}', [PurchaseController::class, 'show']);
        Route::get('/edit/{purchase}', [PurchaseController::class, 'edit']);
        Route::match(['post', 'put', 'patch'], '/update/{purchase}', [PurchaseController::class, 'update']);
        Route::delete('/{purchase}', [PurchaseController::class, 'destroy']);
        Route::get('/export', [PurchaseController::class, 'export']);
        Route::get('/download-attachment/{purchase}', [PurchaseController::class, 'downloadAttachment']);
        Route::get('/payment/{purchase}', [PurchaseController::class, 'paymentHistory']);
        Route::post('/payment/{purchase}', [PurchaseController::class, 'payment']);
        Route::get('/payment/download-attachment/{purchasePayment}', [PurchaseController::class, 'paymentDownloadAttachment']);
        Route::delete('/payment/{purchase}/{purchasePayment}', [PurchaseController::class, 'paymentDestroy']);
    });

    Route::prefix('stock')->name('stock.')->group(function () {
        Route::get('/', [StockController::class, 'index']);
        Route::get('/export', [StockController::class, 'export']);
    });

    Route::prefix('damage')->name('damage.')->group(function () {
        Route::get('/', [DamageController::class, 'index']);
        Route::post('/', [DamageController::class, 'store']);
        Route::get('/show/{damage}', [DamageController::class, 'show']);
        Route::get('/edit/{damage}', [DamageController::class, 'edit']);
        Route::match(['post', 'put', 'patch'], '/update/{damage}', [DamageController::class, 'update']);
        Route::delete('/{damage}', [DamageController::class, 'destroy']);
        Route::get('/export', [DamageController::class, 'export']);
        Route::get('/download-attachment/{damage}', [DamageController::class, 'downloadAttachment']);
    });


    Route::prefix('products-report')->name('products-report.')->group(function () {
        Route::get('/', [ProductsReportController::class, 'index']);
        Route::get('/export', [ProductsReportController::class, 'export']);
        Route::get('/overview', [ProductsReportController::class, 'productsReportOverview']);
        Route::get('/export-pdf', [ProductsReportController::class, 'exportPdf']);
    });

    Route::prefix('pos-order')->name('posOrder.')->group(function () {
        Route::get('/', [PosOrderController::class, 'index']);
        Route::get('show/{order}', [PosOrderController::class, 'show']);
        Route::delete('/{order}', [PosOrderController::class, 'destroy']);
        Route::get('/export', [PosOrderController::class, 'export']);
        Route::post('/change-status/{order}', [PosOrderController::class, 'changeStatus']);
        Route::post('/change-payment-status/{order}', [PosOrderController::class, 'changePaymentStatus']);
    });

    Route::prefix('pos')->name('pos.')->group(function () {
        Route::post('/', [PosController::class, 'store']);
        Route::post('/customer', [PosController::class, 'storeCustomer']);
    });
});

Route::prefix('frontend')->name('frontend.')->middleware(['installed', 'localization'])->group(function () {
    Route::prefix('setting')->name('setting.')->group(function () {
        Route::get('/', [FrontendSettingController::class, 'index']);
    });

    Route::prefix('country-code')->name('country-code.')->group(function () {
        Route::get('/', [FrontendCountryCodeController::class, 'index']);
        Route::get('/show/{country}', [FrontendCountryCodeController::class, 'show']);
        Route::get('/calling-code/{callingCode}', [FrontendCountryCodeController::class, 'callingCode']);
    });

    Route::prefix('language')->name('language.')->group(function () {
        Route::get('/', [FrontendLanguageController::class, 'index']);
        Route::get('/show/{language}', [FrontendLanguageController::class, 'show']);
    });
});
