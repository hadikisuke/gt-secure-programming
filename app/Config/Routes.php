    <?php

    use CodeIgniter\Router\RouteCollection;

    /** @var RouteCollection $routes */
    $routes->get('/', 'Home::index');


    $routes->get('/products', 'ProductController::index');
    $routes->get('/products/create', 'ProductController::create');
    $routes->get('/products/search', 'ProductController::search'); // pengujian reflected xss
    $routes->post('/products', 'ProductController::store' );
    $routes->get('/products/search-vulnerable', 'ProductController::searchVulnerable');
    $routes->get('/products/sort-vuln', 'ProductController::sortVulnerable');
    $routes->get('/products/search-save', 'ProductController::searchVulnerable');
    $routes->get('/products/dom', 'ProductController::domXss'); // pengujian dom xss
    
    $routes->get('/suppliers', 'SupplierController::index');
    $routes->get('/suppliers/create', 'SupplierController::create');
    $routes->post('/suppliers', 'SupplierController::store');


    $routes->get('/login', 'AuthController::login');        
    $routes->post('/login', 'AuthController::attemptLogin');
    $routes->get('/dashboard', 'AuthController::dashboard', ['filter' => 'role:ADMIN,STAFF']);
    $routes->get('/admin/users', 'AuthController::adminUsers', ['filter' => 'role:ADMIN']);
    $routes->get('/admin/users/create', 'AuthController::createUser', ['filter' => 'role:ADMIN']);
    $routes->post('/admin/users', 'AuthController::storeUser', ['filter' => 'role:ADMIN']);
    $routes->post('/logout', 'AuthController::logout');


    $routes->get('/test_password-policy', 'AuthController::testPasswordPolicy');
    $routes->post('/admin/users', 'AuthController::storeUser');