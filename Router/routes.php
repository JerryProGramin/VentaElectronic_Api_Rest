<?php

use Src\Repository\SuppliersRepository;
use Src\Controller\SuppliersController;
use Src\Repository\UsersRepository;
use Src\Controller\UsersController;
use Src\Repository\PaymentMethodsRepository;
use Src\Controller\PaymentMethodsController;
use Src\Controller\OrdersController;
use Src\Repository\OrdersRepository;
use Src\Repository\OrderDetailsRepository;
use Src\Controller\OrderDetailsController;
use Src\Repository\InventoryRepository;
use Src\Controller\InventoryController;
use Src\Repository\CategoriesRepository;
use Src\Controller\CategoriesController;
use Src\Repository\ProductsRepository;
use Src\Controller\ProductsController;
use Src\Repository\ProfilesRepository;
use Src\Controller\ProfilesController;

// Cargar el autoloading si estás usando Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Crear instancias necesarias
$suppliersRepository = new SuppliersRepository();
$suppliersController = new SuppliersController($suppliersRepository);

// $ordersRepository = new OrdersRepository();
// $ordersController = new OrdersController($ordersRepository);

// $OrderDetailsRepository = new OrderDetailsRepository();
// $OrderDetailsController = new OrderDetailsController($OrderDetailsRepository);

$usersRepository = new UsersRepository();
$usersController = new UsersController($usersRepository);

// $paymentMethodsRepository = new PaymentMethodsRepository();
// $paymentMethodsController = new PaymentMethodsController($paymentMethodsRepository);

// $inventoryRepository = new InventoryRepository();
// $inventoryController = new InventoryController($inventoryRepository);

// $categoriesRepository = new CategoriesRepository();
// $categoriesController = new CategoriesController($categoriesRepository);

// $productsRepository = new ProductsRepository();
// $productsController = new ProductsController($productsRepository);

$profilesRepository = new ProfilesRepository();
$profilesController = new ProfilesController($profilesRepository);

return [
  'GET' => [
    'suppliers' => function() use ($suppliersController){
      $suppliersController->indexSuppliers();
    },
    'suppliers/{id}' => function ($suppliersId) use ($suppliersController) {
      $suppliersController->showSuppliers((int)$suppliersId);
    },

    'users' => function () use ($usersController) {
      $usersController->indexUsers();
    },
    'users/{id}' => function ($usersId) use ($usersController) {
      $usersController->showUsers((int)$usersId);
    },

    // 'payment_methods' => function () use ($paymentMethodsController) {
    //   $paymentMethodsController->indexPaymentMethods();
    // },
    // 'payment_methods/{id}' => function ($paymentMethodId) use ($paymentMethodsController) {
    //   $paymentMethodsController->showPaymentMethods((int)$paymentMethodId);
    // },

    // 'orders' => function () use ($ordersController) {
    //   $ordersController->indexOrders();
    // },
    // 'orders/{id}' => function ($orderId) use ($ordersController) {
    //   $ordersController->showOrders((int)$orderId);
    // },

    // 'order_details' => function () use ($OrderDetailsController) {
    //   $OrderDetailsController->indexOrderDetails();
    // },
    // 'order_details/{id}' => function ($OrderDetailsId) use ($OrderDetailsController) {
    //   $OrderDetailsController->showOrderDetails((int)$OrderDetailsId);
    // },

    // 'inventory' => function () use ($inventoryController) {
    //   $inventoryController->indexInventory();
    // },
    // 'inventory/{id}' => function ($inventoryId) use ($inventoryController) {
    //   $inventoryController->showInventory((int)$inventoryId);
    // },

    // 'categories' => function () use ($categoriesController) {
    //   $categoriesController->indexCategories();
    // },
    // 'categories/{id}' => function ($categoriesId) use ($categoriesController) {
    //   $categoriesController->showCategories((int)$categoriesId);
    // },

    // 'products' => function () use ($productsController) {
    //   $productsController->indexProducts();
    // },
    // 'products/{id}' => function ($productsId) use ($productsController) {
    //   $productsController->showProducts((int)$productsId);
    // },

    'profiles' => function () use ($profilesController) {
      $profilesController->indexProfiles();
    },
    'profiles/{id}' => function ($profilesId) use ($profilesController) {
      $profilesController->showProfiles((int)$profilesId);
    },
  ],

  // 'POST' => [
  //   'suppliers' => function () use ($suppliersController) {
  //     $suppliersController->storeSuppliers();
  //   },

  //   'users' => function () use ($usersController) {
  //     $usersController->storeUsers();
  //   },

  //   'payment_methods' => function () use ($paymentMethodsController) {
  //     $paymentMethodsController->storePaymentMethods();
  //   },

  //   'orders' => function () use ($ordersController) {
  //     $ordersController->storeOrders();
  //   },

  //   'order_details' => function () use ($OrderDetailsController) {
  //     $OrderDetailsController->storeOrderDetails();
  //   },


  // ],

  // 'PUT' => [
  //   'suppliers/{id}' => function ($id) use ($suppliersController) {
  //     $suppliersController->updateSuppliers((int)$id);
  //   },

  //   'users/{id}' => function ($id) use ($usersController) {
  //     $usersController->updateUsers((int)$id);
  //   },

  //   'payment_methods/{id}' => function ($id) use ($paymentMethodsController) {
  //     $paymentMethodsController->updatePaymentMethods((int)$id);
  //   },

  //   'orders/{id}' => function ($id) use ($ordersController) {
  //     $ordersController->updateOrders((int)$id);
  //   },

  //   'order_details/{id}' => function ($id) use ($OrderDetailsController) {
  //     $OrderDetailsController->updateOrderDetails((int)$id);
  //   },
  // ],

  // 'DELETE' => [
  //   'suppliers/{id}' => function ($id) use ($suppliersController) {
  //     $suppliersController->deleteSuppliers((int)$id);
  //   },

  //   'users/{id}' => function ($id) use ($usersController) {
  //     $usersController->deleteUsers((int)$id);
  //   },

  //   'payment_methods/{id}' => function ($id) use ($paymentMethodsController) {
  //     $paymentMethodsController->deletePaymentMethods((int)$id);
  //   },

  //   'orders/{id}' => function ($id) use ($ordersController){
  //     $ordersController->deleteOrders((int)$id);
  //   },

  //   'order_details/{id}' => function ($id) use ($OrderDetailsController) {
  //     $OrderDetailsController->deleteOrderDetails((int)$id);
  //   },
  // ],
];